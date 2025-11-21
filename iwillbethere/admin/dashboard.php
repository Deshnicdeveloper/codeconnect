<?php
/**
 * Admin Dashboard - Statistics Overview
 */

require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/auth.php';

$currentPage = 'dashboard';

// Filters
$languageFilter = isset($_GET['language']) ? $_GET['language'] : '';
$searchQuery = isset($_GET['search']) ? trim($_GET['search']) : '';

try {
    $pdo = getDBConnection();
    
    // Build query for filtering
    $where = [];
    $params = [];
    
    if ($languageFilter && in_array($languageFilter, ['en', 'fr'])) {
        $where[] = "language = :language";
        $params[':language'] = $languageFilter;
    }
    
    if ($searchQuery !== '') {
        // Use distinct placeholders; MySQL PDO forbids reusing a named placeholder multiple times
        $where[] = "(full_name LIKE :search_name OR role LIKE :search_role)";
        $params[':search_name'] = '%' . $searchQuery . '%';
        $params[':search_role'] = '%' . $searchQuery . '%';
    }
    
    $whereClause = $where ? 'WHERE ' . implode(' AND ', $where) : '';
    
    // Get total count with filters
    $countSql = "SELECT COUNT(*) as total FROM badges $whereClause";
    $countStmt = $pdo->prepare($countSql);
    $countStmt->execute($params);
    $filteredTotal = $countStmt->fetch()['total'];
    
    // Get statistics
    $stats = [
        'total' => $pdo->query("SELECT COUNT(*) FROM badges")->fetchColumn(),
        'today' => $pdo->query("SELECT COUNT(*) FROM badges WHERE DATE(created_at) = CURDATE()")->fetchColumn(),
        'this_week' => $pdo->query("SELECT COUNT(*) FROM badges WHERE YEARWEEK(created_at, 1) = YEARWEEK(CURDATE(), 1)")->fetchColumn(),
        'this_month' => $pdo->query("SELECT COUNT(*) FROM badges WHERE YEAR(created_at) = YEAR(CURDATE()) AND MONTH(created_at) = MONTH(CURDATE())")->fetchColumn(),
        'english' => $pdo->query("SELECT COUNT(*) FROM badges WHERE language = 'en'")->fetchColumn(),
        'french' => $pdo->query("SELECT COUNT(*) FROM badges WHERE language = 'fr'")->fetchColumn(),
    ];
    
    // Recent badges (limited to 10)
    $recentSql = "SELECT * FROM badges $whereClause ORDER BY created_at DESC LIMIT 10";
    $recentStmt = $pdo->prepare($recentSql);
    $recentStmt->execute($params);
    $recentBadges = $recentStmt->fetchAll();
    
} catch (Exception $e) {
    $error = "Database error: " . $e->getMessage();
}

include 'layout_header.php';
?>

<div class="dashboard-content">
    <?php if (isset($error)): ?>
        <div class="error-alert">❌ <?php echo htmlspecialchars($error); ?></div>
    <?php else: ?>
        
        <!-- Statistics Cards -->
        <div class="stats-grid">
            <div class="stat-card primary">
                <div class="stat-icon">📊</div>
                <div class="stat-info">
                    <h3>Total Badges</h3>
                    <div class="stat-value"><?php echo number_format($stats['total']); ?></div>
                </div>
            </div>
            
            <div class="stat-card success">
                <div class="stat-icon">📅</div>
                <div class="stat-info">
                    <h3>Today</h3>
                    <div class="stat-value"><?php echo number_format($stats['today']); ?></div>
                </div>
            </div>
            
            <div class="stat-card info">
                <div class="stat-icon">📆</div>
                <div class="stat-info">
                    <h3>This Week</h3>
                    <div class="stat-value"><?php echo number_format($stats['this_week']); ?></div>
                </div>
            </div>
            
            <div class="stat-card warning">
                <div class="stat-icon">📈</div>
                <div class="stat-info">
                    <h3>This Month</h3>
                    <div class="stat-value"><?php echo number_format($stats['this_month']); ?></div>
                </div>
            </div>
            
            <div class="stat-card en">
                <div class="stat-icon">🇬🇧</div>
                <div class="stat-info">
                    <h3>English</h3>
                    <div class="stat-value"><?php echo number_format($stats['english']); ?></div>
                </div>
            </div>
            
            <div class="stat-card fr">
                <div class="stat-icon">🇫🇷</div>
                <div class="stat-info">
                    <h3>French</h3>
                    <div class="stat-value"><?php echo number_format($stats['french']); ?></div>
                </div>
            </div>
        </div>
        
        <!-- Recent Badges Section -->
        <div class="section-card">
            <div class="section-header">
                <h2>Recent Badges</h2>
                <a href="badges.php" class="btn-link">View All →</a>
            </div>
            
            <?php if (empty($recentBadges)): ?>
                <div class="no-data">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                    </svg>
                    <h3>No badges found</h3>
                    <p>Badges will appear here once users start creating them.</p>
                </div>
            <?php else: ?>
                <div class="table-container">
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
                            <?php foreach ($recentBadges as $badge): ?>
                                <tr>
                                    <td>#<?php echo $badge['id']; ?></td>
                                    <td>
                                        <img src="../<?php echo htmlspecialchars($badge['badge_path']); ?>" 
                                             alt="Badge" 
                                             class="badge-preview"
                                             onclick="showModal('../<?php echo htmlspecialchars($badge['badge_path']); ?>')">
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
                                        <a href="../<?php echo htmlspecialchars($badge['badge_path']); ?>" 
                                           target="_blank" 
                                           class="btn-small btn-view">View</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php endif; ?>
        </div>
        
    <?php endif; ?>
</div>

<?php include 'layout_footer.php'; ?>
