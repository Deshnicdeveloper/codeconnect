<?php
/**
 * Simple Admin Dashboard to View Saved Badges
 * 
 * Access: http://localhost/iwillbethere/admin.php
 */

require_once __DIR__ . '/config/database.php';

// Pagination settings
$perPage = 20;
$page = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;
$offset = ($page - 1) * $perPage;

// Filters
$languageFilter = isset($_GET['language']) ? $_GET['language'] : '';
$searchQuery = isset($_GET['search']) ? trim($_GET['search']) : '';

try {
    $pdo = getDBConnection();
    
    // Build query
    $where = [];
    $params = [];
    
    if ($languageFilter && in_array($languageFilter, ['en', 'fr'])) {
        $where[] = "language = :language";
        $params[':language'] = $languageFilter;
    }
    
    if ($searchQuery) {
        $where[] = "(full_name LIKE :search OR role LIKE :search)";
        $params[':search'] = '%' . $searchQuery . '%';
    }
    
    $whereClause = $where ? 'WHERE ' . implode(' AND ', $where) : '';
    
    // Get total count
    $countSql = "SELECT COUNT(*) as total FROM badges $whereClause";
    $countStmt = $pdo->prepare($countSql);
    $countStmt->execute($params);
    $totalBadges = $countStmt->fetch()['total'];
    $totalPages = ceil($totalBadges / $perPage);
    
    // Get badges
    $sql = "SELECT * FROM badges $whereClause ORDER BY created_at DESC LIMIT :limit OFFSET :offset";
    $stmt = $pdo->prepare($sql);
    
    foreach ($params as $key => $value) {
        $stmt->bindValue($key, $value);
    }
    $stmt->bindValue(':limit', $perPage, PDO::PARAM_INT);
    $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
    
    $stmt->execute();
    $badges = $stmt->fetchAll();
    
    // Get statistics
    $stats = [
        'total' => $totalBadges,
        'today' => $pdo->query("SELECT COUNT(*) FROM badges WHERE DATE(created_at) = CURDATE()")->fetchColumn(),
        'english' => $pdo->query("SELECT COUNT(*) FROM badges WHERE language = 'en'")->fetchColumn(),
        'french' => $pdo->query("SELECT COUNT(*) FROM badges WHERE language = 'fr'")->fetchColumn(),
    ];
    
} catch (Exception $e) {
    $error = "Database error: " . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - CodeConnect 2025</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            background: #f5f7fa;
            color: #333;
        }
        
        .header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 30px 20px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        .header h1 {
            font-size: 2rem;
            margin-bottom: 5px;
        }
        
        .header p {
            opacity: 0.9;
            font-size: 1rem;
        }
        
        .container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 30px 20px;
        }
        
        .stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }
        
        .stat-card {
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            border-left: 4px solid #667eea;
        }
        
        .stat-card h3 {
            color: #666;
            font-size: 0.9rem;
            font-weight: 500;
            margin-bottom: 8px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        .stat-card .value {
            font-size: 2.5rem;
            font-weight: 700;
            color: #667eea;
        }
        
        .filters {
            background: white;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            margin-bottom: 20px;
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
            align-items: center;
        }
        
        .filters input,
        .filters select {
            padding: 10px 15px;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            font-size: 0.95rem;
            flex: 1;
            min-width: 200px;
        }
        
        .filters button {
            padding: 10px 25px;
            background: #667eea;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 0.95rem;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.3s;
        }
        
        .filters button:hover {
            background: #5568d3;
        }
        
        .table-container {
            background: white;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            overflow: hidden;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
        }
        
        th {
            background: #f8f9fa;
            padding: 15px;
            text-align: left;
            font-weight: 600;
            color: #555;
            border-bottom: 2px solid #e0e0e0;
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        td {
            padding: 15px;
            border-bottom: 1px solid #f0f0f0;
        }
        
        tr:hover {
            background: #f8f9fa;
        }
        
        .badge-preview {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            cursor: pointer;
            transition: transform 0.3s;
        }
        
        .badge-preview:hover {
            transform: scale(1.1);
        }
        
        .language-badge {
            display: inline-block;
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
        }
        
        .language-badge.en {
            background: #e3f2fd;
            color: #1976d2;
        }
        
        .language-badge.fr {
            background: #fce4ec;
            color: #c2185b;
        }
        
        .pagination {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
            margin-top: 30px;
        }
        
        .pagination a,
        .pagination span {
            padding: 8px 15px;
            background: white;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            text-decoration: none;
            color: #333;
            font-weight: 500;
        }
        
        .pagination a:hover {
            background: #667eea;
            color: white;
            border-color: #667eea;
        }
        
        .pagination .current {
            background: #667eea;
            color: white;
            border-color: #667eea;
        }
        
        .error {
            background: #fee;
            color: #c00;
            padding: 20px;
            border-radius: 8px;
            border-left: 4px solid #c00;
        }
        
        .no-data {
            text-align: center;
            padding: 60px 20px;
            color: #999;
        }
        
        .no-data svg {
            width: 80px;
            height: 80px;
            margin-bottom: 20px;
            opacity: 0.3;
        }
        
        .actions {
            display: flex;
            gap: 10px;
        }
        
        .btn-small {
            padding: 5px 12px;
            font-size: 0.85rem;
            border-radius: 6px;
            text-decoration: none;
            font-weight: 500;
        }
        
        .btn-view {
            background: #e3f2fd;
            color: #1976d2;
        }
        
        .btn-view:hover {
            background: #1976d2;
            color: white;
        }
        
        /* Modal for image preview */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.9);
            align-items: center;
            justify-content: center;
        }
        
        .modal.active {
            display: flex;
        }
        
        .modal img {
            max-width: 90%;
            max-height: 90vh;
            border-radius: 12px;
            box-shadow: 0 0 50px rgba(0,0,0,0.5);
        }
        
        .modal-close {
            position: absolute;
            top: 20px;
            right: 40px;
            color: white;
            font-size: 40px;
            cursor: pointer;
            background: none;
            border: none;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>📊 Badge Dashboard</h1>
        <p>CodeConnect 2025 - Admin Panel</p>
    </div>
    
    <div class="container">
        <?php if (isset($error)): ?>
            <div class="error">❌ <?php echo htmlspecialchars($error); ?></div>
        <?php else: ?>
            
            <!-- Statistics -->
            <div class="stats">
                <div class="stat-card">
                    <h3>Total Badges</h3>
                    <div class="value"><?php echo number_format($stats['total']); ?></div>
                </div>
                <div class="stat-card">
                    <h3>Today</h3>
                    <div class="value"><?php echo number_format($stats['today']); ?></div>
                </div>
                <div class="stat-card">
                    <h3>English</h3>
                    <div class="value"><?php echo number_format($stats['english']); ?></div>
                </div>
                <div class="stat-card">
                    <h3>French</h3>
                    <div class="value"><?php echo number_format($stats['french']); ?></div>
                </div>
            </div>
            
            <!-- Filters -->
            <form method="GET" class="filters">
                <input type="text" name="search" placeholder="Search by name or role..." value="<?php echo htmlspecialchars($searchQuery); ?>">
                <select name="language">
                    <option value="">All Languages</option>
                    <option value="en" <?php echo $languageFilter === 'en' ? 'selected' : ''; ?>>English</option>
                    <option value="fr" <?php echo $languageFilter === 'fr' ? 'selected' : ''; ?>>French</option>
                </select>
                <button type="submit">🔍 Filter</button>
                <?php if ($searchQuery || $languageFilter): ?>
                    <a href="admin.php" style="padding: 10px 20px; background: #e0e0e0; border-radius: 8px; text-decoration: none; color: #333;">Clear</a>
                <?php endif; ?>
            </form>
            
            <!-- Table -->
            <div class="table-container">
                <?php if (empty($badges)): ?>
                    <div class="no-data">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                        </svg>
                        <h3>No badges found</h3>
                        <p>Try adjusting your filters or check back later.</p>
                    </div>
                <?php else: ?>
                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Badge</th>
                                <th>Name</th>
                                <th>Role</th>
                                <th>Language</th>
                                <th>Created</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($badges as $badge): ?>
                                <tr>
                                    <td>#<?php echo $badge['id']; ?></td>
                                    <td>
                                        <img src="<?php echo htmlspecialchars($badge['badge_path']); ?>" 
                                             alt="Badge" 
                                             class="badge-preview"
                                             onclick="showModal('<?php echo htmlspecialchars($badge['badge_path']); ?>')">
                                    </td>
                                    <td><strong><?php echo htmlspecialchars($badge['full_name']); ?></strong></td>
                                    <td><?php echo htmlspecialchars($badge['role']); ?></td>
                                    <td>
                                        <span class="language-badge <?php echo $badge['language']; ?>">
                                            <?php echo strtoupper($badge['language']); ?>
                                        </span>
                                    </td>
                                    <td><?php echo date('M d, Y H:i', strtotime($badge['created_at'])); ?></td>
                                    <td class="actions">
                                        <a href="<?php echo htmlspecialchars($badge['badge_path']); ?>" 
                                           target="_blank" 
                                           class="btn-small btn-view">View</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php endif; ?>
            </div>
            
            <!-- Pagination -->
            <?php if ($totalPages > 1): ?>
                <div class="pagination">
                    <?php if ($page > 1): ?>
                        <a href="?page=<?php echo $page - 1; ?><?php echo $languageFilter ? '&language=' . $languageFilter : ''; ?><?php echo $searchQuery ? '&search=' . urlencode($searchQuery) : ''; ?>">← Previous</a>
                    <?php endif; ?>
                    
                    <?php for ($i = max(1, $page - 2); $i <= min($totalPages, $page + 2); $i++): ?>
                        <?php if ($i == $page): ?>
                            <span class="current"><?php echo $i; ?></span>
                        <?php else: ?>
                            <a href="?page=<?php echo $i; ?><?php echo $languageFilter ? '&language=' . $languageFilter : ''; ?><?php echo $searchQuery ? '&search=' . urlencode($searchQuery) : ''; ?>"><?php echo $i; ?></a>
                        <?php endif; ?>
                    <?php endfor; ?>
                    
                    <?php if ($page < $totalPages): ?>
                        <a href="?page=<?php echo $page + 1; ?><?php echo $languageFilter ? '&language=' . $languageFilter : ''; ?><?php echo $searchQuery ? '&search=' . urlencode($searchQuery) : ''; ?>">Next →</a>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
            
        <?php endif; ?>
    </div>
    
    <!-- Modal for image preview -->
    <div id="imageModal" class="modal" onclick="hideModal()">
        <button class="modal-close" onclick="hideModal()">×</button>
        <img id="modalImage" src="" alt="Badge Preview">
    </div>
    
    <script>
        function showModal(imagePath) {
            const modal = document.getElementById('imageModal');
            const modalImage = document.getElementById('modalImage');
            modalImage.src = imagePath;
            modal.classList.add('active');
        }
        
        function hideModal() {
            const modal = document.getElementById('imageModal');
            modal.classList.remove('active');
        }
        
        // Prevent modal from closing when clicking on image
        document.getElementById('modalImage').addEventListener('click', function(e) {
            e.stopPropagation();
        });
    </script>
</body>
</html>
