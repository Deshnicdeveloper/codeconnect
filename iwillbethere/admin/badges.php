<?php
/**
 * Admin Badges Gallery - Full Size View
 */

require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/auth.php';

$currentPage = 'badges';

// Pagination settings
$perPage = 12; // 12 badges per page (3x4 grid)
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
    
    if ($searchQuery !== '') {
        // Use distinct placeholders; MySQL PDO does not allow reusing the same named placeholder twice
        $where[] = "(full_name LIKE :search_name OR role LIKE :search_role)";
        $params[':search_name'] = '%' . $searchQuery . '%';
        $params[':search_role'] = '%' . $searchQuery . '%';
    }
    
    $whereClause = $where ? 'WHERE ' . implode(' AND ', $where) : '';
    
    // Get total count
    $countSql = "SELECT COUNT(*) as total FROM badges $whereClause";
    $countStmt = $pdo->prepare($countSql);
    $countStmt->execute($params);
    $totalBadges = $countStmt->fetch()['total'];
    $totalPages = ceil($totalBadges / $perPage);
    
    // Get badges with pagination - use direct values for LIMIT/OFFSET
    $sql = "SELECT * FROM badges $whereClause ORDER BY created_at DESC LIMIT $perPage OFFSET $offset";
    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);
    $badges = $stmt->fetchAll();
    
} catch (Exception $e) {
    $error = "Database error: " . $e->getMessage();
}

include 'layout_header.php';
?>

<div class="badges-content">
    <?php if (isset($error)): ?>
        <div class="error-alert">❌ <?php echo htmlspecialchars($error); ?></div>
    <?php else: ?>
        
        <!-- Filters -->
        <div class="section-card">
            <form method="GET" class="filters-form">
                <div class="filter-group">
                    <input type="text" 
                           name="search" 
                           placeholder="Search by name or role..." 
                           value="<?php echo htmlspecialchars($searchQuery); ?>"
                           class="filter-input">
                </div>
                
                <div class="filter-group">
                    <select name="language" class="filter-select">
                        <option value="">All Languages</option>
                        <option value="en" <?php echo $languageFilter === 'en' ? 'selected' : ''; ?>>🇬🇧 English</option>
                        <option value="fr" <?php echo $languageFilter === 'fr' ? 'selected' : ''; ?>>🇫🇷 French</option>
                    </select>
                </div>
                
                <button type="submit" class="btn-filter">🔍 Filter</button>
                
                <?php if ($searchQuery || $languageFilter): ?>
                    <a href="badges.php" class="btn-clear">Clear</a>
                <?php endif; ?>
                
                <div class="result-count">
                    Showing <?php echo number_format($totalBadges); ?> badge<?php echo $totalBadges != 1 ? 's' : ''; ?>
                </div>
            </form>
        </div>
        
        <!-- Badges Grid -->
        <?php if (empty($badges)): ?>
            <div class="section-card">
                <div class="no-data">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                    </svg>
                    <h3>No badges found</h3>
                    <p>Try adjusting your filters or check back later.</p>
                </div>
            </div>
        <?php else: ?>
            <div class="badges-grid">
                <?php foreach ($badges as $badge): ?>
                    <div class="badge-card">
                        <div class="badge-image" onclick="showModal('../<?php echo htmlspecialchars($badge['badge_path']); ?>')">
                            <img src="../<?php echo htmlspecialchars($badge['badge_path']); ?>" 
                                 alt="Badge for <?php echo htmlspecialchars($badge['full_name']); ?>">
                            <div class="badge-overlay">
                                <span class="zoom-icon">🔍</span>
                            </div>
                        </div>
                        <div class="badge-info">
                            <h3><?php echo htmlspecialchars($badge['full_name']); ?></h3>
                            <p class="badge-role"><?php echo htmlspecialchars($badge['role']); ?></p>
                            <div class="badge-meta">
                                <span class="language-badge <?php echo $badge['language']; ?>">
                                    <?php echo $badge['language'] === 'en' ? '🇬🇧 EN' : '🇫🇷 FR'; ?>
                                </span>
                                <span class="badge-date">
                                    <?php echo date('M d, Y', strtotime($badge['created_at'])); ?>
                                </span>
                            </div>
                            <div class="badge-actions">
                                <a href="../<?php echo htmlspecialchars($badge['badge_path']); ?>" 
                                   target="_blank" 
                                   class="btn-small btn-view">
                                    View Full
                                </a>
                                <a href="../<?php echo htmlspecialchars($badge['badge_path']); ?>" 
                                   download 
                                   class="btn-small btn-download">
                                    Download
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            
            <!-- Pagination -->
            <?php if ($totalPages > 1): ?>
                <div class="pagination">
                    <?php if ($page > 1): ?>
                        <a href="?page=<?php echo $page - 1; ?><?php echo $languageFilter ? '&language=' . $languageFilter : ''; ?><?php echo $searchQuery ? '&search=' . urlencode($searchQuery) : ''; ?>" 
                           class="pagination-btn">
                            ← Previous
                        </a>
                    <?php endif; ?>
                    
                    <?php for ($i = max(1, $page - 2); $i <= min($totalPages, $page + 2); $i++): ?>
                        <?php if ($i == $page): ?>
                            <span class="pagination-btn active"><?php echo $i; ?></span>
                        <?php else: ?>
                            <a href="?page=<?php echo $i; ?><?php echo $languageFilter ? '&language=' . $languageFilter : ''; ?><?php echo $searchQuery ? '&search=' . urlencode($searchQuery) : ''; ?>" 
                               class="pagination-btn">
                                <?php echo $i; ?>
                            </a>
                        <?php endif; ?>
                    <?php endfor; ?>
                    
                    <?php if ($page < $totalPages): ?>
                        <a href="?page=<?php echo $page + 1; ?><?php echo $languageFilter ? '&language=' . $languageFilter : ''; ?><?php echo $searchQuery ? '&search=' . urlencode($searchQuery) : ''; ?>" 
                           class="pagination-btn">
                            Next →
                        </a>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        <?php endif; ?>
        
    <?php endif; ?>
</div>

<?php include 'layout_footer.php'; ?>
