<?php
/**
 * Save Badge API Endpoint
 * 
 * This endpoint receives badge data from the frontend and:
 * 1. Saves the badge image to the uploads folder
 * 2. Stores badge information in the database
 * 
 * Expected POST data:
 * - name: User's full name
 * - role: User's role/title
 * - language: Badge language (en/fr)
 * - badge: Base64 encoded image data
 */

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');

// Only allow POST requests
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode([
        'success' => false,
        'message' => 'Method not allowed. Only POST requests are accepted.'
    ]);
    exit;
}

// Log incoming request for debugging
error_log("=== Save Badge Request ===");
error_log("POST data: " . print_r($_POST, true));
error_log("FILES data: " . print_r($_FILES, true));
error_log("========================");

// Include database configuration
require_once __DIR__ . '/../config/database.php';

// Function to sanitize input
function sanitizeInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
    return $data;
}

// Function to generate unique filename
function generateUniqueFilename($name, $extension = 'png') {
    $timestamp = time();
    $random = bin2hex(random_bytes(8));
    $safeName = preg_replace('/[^a-zA-Z0-9]/', '_', strtolower($name));
    $safeName = substr($safeName, 0, 30); // Limit length
    return $safeName . '_' . $timestamp . '_' . $random . '.' . $extension;
}

// Function to save base64 image
function saveBase64Image($base64String, $uploadPath) {
    // Remove data URI scheme if present
    if (preg_match('/^data:image\/(\w+);base64,/', $base64String, $type)) {
        $base64String = substr($base64String, strpos($base64String, ',') + 1);
        $type = strtolower($type[1]); // jpg, png, gif
        
        // Validate image type
        if (!in_array($type, ['jpg', 'jpeg', 'png', 'gif'])) {
            throw new Exception('Invalid image type. Only JPG, PNG, and GIF are allowed.');
        }
    }
    
    // Decode base64
    $imageData = base64_decode($base64String);
    
    if ($imageData === false) {
        throw new Exception('Failed to decode image data.');
    }
    
    // Save to file
    if (file_put_contents($uploadPath, $imageData) === false) {
        throw new Exception('Failed to save image file.');
    }
    
    return true;
}

try {
    // Get POST data
    $name = isset($_POST['name']) ? sanitizeInput($_POST['name']) : '';
    $role = isset($_POST['role']) ? sanitizeInput($_POST['role']) : '';
    $language = isset($_POST['language']) ? sanitizeInput($_POST['language']) : 'en';
    $badgeData = isset($_POST['badge']) ? $_POST['badge'] : '';
    
    error_log("Processing badge for: $name ($role) - Language: $language");
    error_log("Badge data length: " . strlen($badgeData));
    
    // Validate required fields
    if (empty($name)) {
        throw new Exception('Name is required.');
    }
    
    if (empty($role)) {
        throw new Exception('Role is required.');
    }
    
    if (empty($badgeData)) {
        throw new Exception('Badge image data is required.');
    }
    
    if (!in_array($language, ['en', 'fr'])) {
        $language = 'en';
    }
    
    // Generate unique filename
    $filename = generateUniqueFilename($name);
    error_log("Generated filename: $filename");
    
    // Define upload path
    $uploadDir = __DIR__ . '/../uploads/badges/';
    $uploadPath = $uploadDir . $filename;
    $relativePath = 'uploads/badges/' . $filename;
    
    error_log("Upload directory: $uploadDir");
    error_log("Real path: " . realpath($uploadDir));
    error_log("Upload path: $uploadPath");
    error_log("Directory exists: " . (is_dir($uploadDir) ? 'YES' : 'NO'));
    error_log("Directory writable: " . (is_writable($uploadDir) ? 'YES' : 'NO'));
    error_log("Current user: " . get_current_user());
    error_log("PHP process user: " . (function_exists('posix_getpwuid') ? posix_getpwuid(posix_geteuid())['name'] : 'unknown'));
    
    // Ensure upload directory exists
    if (!is_dir($uploadDir)) {
        error_log("Creating upload directory: $uploadDir");
        if (!mkdir($uploadDir, 0777, true)) {
            throw new Exception('Failed to create upload directory.');
        }
        chmod($uploadDir, 0777); // Ensure permissions are set
    }
    
    // Check if directory is writable
    if (!is_writable($uploadDir)) {
        $perms = substr(sprintf('%o', fileperms($uploadDir)), -4);
        error_log("Directory permissions: $perms");
        throw new Exception("Upload directory is not writable. Permissions: $perms. Run: chmod 777 uploads/badges/");
    }
    
    // Save the image
    error_log("Saving image to: $uploadPath");
    saveBase64Image($badgeData, $uploadPath);
    error_log("Image saved successfully");
    
    // Get client information
    $ipAddress = $_SERVER['REMOTE_ADDR'] ?? null;
    $userAgent = $_SERVER['HTTP_USER_AGENT'] ?? null;
    
    // Save to database
    error_log("Connecting to database...");
    $pdo = getDBConnection();
    error_log("Database connected");
    
    $sql = "INSERT INTO badges (full_name, role, language, badge_filename, badge_path, ip_address, user_agent) 
            VALUES (:full_name, :role, :language, :badge_filename, :badge_path, :ip_address, :user_agent)";
    
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':full_name' => $name,
        ':role' => $role,
        ':language' => $language,
        ':badge_filename' => $filename,
        ':badge_path' => $relativePath,
        ':ip_address' => $ipAddress,
        ':user_agent' => $userAgent
    ]);
    
    $badgeId = $pdo->lastInsertId();
    error_log("Badge saved to database with ID: $badgeId");
    
    // Return success response
    http_response_code(200);
    echo json_encode([
        'success' => true,
        'message' => 'Badge saved successfully!',
        'data' => [
            'id' => $badgeId,
            'filename' => $filename,
            'path' => $relativePath
        ]
    ]);
    error_log("=== Success ===");
    
} catch (PDOException $e) {
    error_log("Database error: " . $e->getMessage());
    error_log("Stack trace: " . $e->getTraceAsString());
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'message' => 'Database error occurred. Please try again later.',
        'error' => $e->getMessage() // Remove in production
    ]);
    
} catch (Exception $e) {
    error_log("Error: " . $e->getMessage());
    error_log("Stack trace: " . $e->getTraceAsString());
    http_response_code(400);
    echo json_encode([
        'success' => false,
        'message' => $e->getMessage()
    ]);
}
?>
