<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($currentPage) ? ucfirst($currentPage) : 'Admin'; ?> - CodeConnect 2025</title>
    <link rel="icon" type="image/png" href="../assets/favicon.PNG">
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
        
        /* Layout */
        .admin-layout {
            display: flex;
            min-height: 100vh;
        }
        
        /* Sidebar */
        .sidebar {
            width: 260px;
            background: linear-gradient(180deg, #0a2a66 0%, #1034A6 55%, #1b4fcf 100%);
            color: white;
            position: fixed;
            height: 100vh;
            overflow-y: auto;
            box-shadow: 2px 0 10px rgba(0,0,0,0.15);
            z-index: 100;
        }
        
        .sidebar-header {
            padding: 30px 20px;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }
        
        .sidebar-logo {
            height: 40px;
            margin-bottom: 10px;
        }
        
        .sidebar-title {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 5px;
        }
        
        .sidebar-subtitle {
            font-size: 0.9rem;
            opacity: 0.9;
        }
        
        .sidebar-nav {
            padding: 20px 0;
        }
        
        .nav-item {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 15px 25px;
            color: white;
            text-decoration: none;
            transition: all 0.3s ease;
            border-left: 3px solid transparent;
        }
        
        .nav-item:hover {
            background: rgba(255,255,255,0.1);
            border-left-color: white;
        }
        
        .nav-item.active {
            background: rgba(255,255,255,0.2);
            border-left-color: white;
            font-weight: 600;
        }
        
        .nav-icon {
            font-size: 1.3rem;
        }
        
        .nav-label {
            font-size: 0.95rem;
        }
        
        .sidebar-footer {
            padding: 20px 25px;
            margin-top: auto;
            border-top: 1px solid rgba(255,255,255,0.1);
        }
        
        .back-link {
            display: flex;
            align-items: center;
            gap: 10px;
            color: white;
            text-decoration: none;
            font-size: 0.9rem;
            opacity: 0.9;
            transition: opacity 0.3s;
        }
        
        .back-link:hover {
            opacity: 1;
        }
        
        /* Main Content */
        .main-content {
            margin-left: 260px;
            flex: 1;
            padding: 30px;
            width: calc(100% - 260px);
        }
        
        .page-header {
            margin-bottom: 30px;
        }
        
        .page-title {
            font-size: 2rem;
            font-weight: 700;
            color: #333;
            margin-bottom: 5px;
        }
        
        .page-subtitle {
            color: #666;
            font-size: 1rem;
        }
        
        /* Statistics Grid */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }
        
        .stat-card {
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            display: flex;
            align-items: center;
            gap: 20px;
            transition: transform 0.3s, box-shadow 0.3s;
        }
        
        .stat-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 4px 15px rgba(0,0,0,0.15);
        }
        
        .stat-icon {
            font-size: 2.5rem;
        }
        
        .stat-info h3 {
            color: #666;
            font-size: 0.85rem;
            font-weight: 500;
            margin-bottom: 5px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        .stat-value {
            font-size: 2rem;
            font-weight: 700;
            color: #667eea;
        }
        
        .stat-card.primary { border-left: 4px solid #667eea; }
        .stat-card.success { border-left: 4px solid #10b981; }
        .stat-card.info { border-left: 4px solid #3b82f6; }
        .stat-card.warning { border-left: 4px solid #f59e0b; }
        .stat-card.en { border-left: 4px solid #1976d2; }
        .stat-card.fr { border-left: 4px solid #c2185b; }
        
        /* Section Card */
        .section-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            margin-bottom: 30px;
            overflow: hidden;
        }
        
        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 25px 30px;
            border-bottom: 2px solid #f0f0f0;
        }
        
        .section-header h2 {
            font-size: 1.3rem;
            color: #333;
            font-weight: 600;
        }
        
        .btn-link {
            color: #667eea;
            text-decoration: none;
            font-weight: 600;
            font-size: 0.95rem;
            transition: color 0.3s;
        }
        
        .btn-link:hover {
            color: #5568d3;
        }
        
        /* Filters */
        .filters-form {
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
            align-items: center;
            padding: 25px 30px;
        }
        
        .filter-group {
            flex: 1;
            min-width: 200px;
        }
        
        .filter-input,
        .filter-select {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            font-size: 0.95rem;
            transition: border-color 0.3s;
        }
        
        .filter-input:focus,
        .filter-select:focus {
            outline: none;
            border-color: #667eea;
        }
        
        .btn-filter,
        .btn-clear {
            padding: 12px 25px;
            border: none;
            border-radius: 8px;
            font-size: 0.95rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            text-decoration: none;
            display: inline-block;
        }
        
        .btn-filter {
            background: #667eea;
            color: white;
        }
        
        .btn-filter:hover {
            background: #5568d3;
        }
        
        .btn-clear {
            background: #e0e0e0;
            color: #333;
        }
        
        .btn-clear:hover {
            background: #d0d0d0;
        }
        
        .result-count {
            margin-left: auto;
            color: #666;
            font-size: 0.9rem;
            font-weight: 500;
        }
        
        /* Badges Grid */
        .badges-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 25px;
            padding: 25px;
        }
        
        .badge-card {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            transition: transform 0.3s, box-shadow 0.3s;
        }
        
        .badge-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
        }
        
        .badge-image {
            position: relative;
            width: 100%;
            aspect-ratio: 1080/1365;
            overflow: hidden;
            cursor: pointer;
            background: #f5f5f5;
        }
        
        .badge-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }
        
        .badge-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0,0,0,0.7);
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.3s;
        }
        
        .badge-image:hover .badge-overlay {
            opacity: 1;
        }
        
        .zoom-icon {
            font-size: 3rem;
        }
        
        .badge-info {
            padding: 20px;
        }
        
        .badge-info h3 {
            font-size: 1.1rem;
            color: #333;
            margin-bottom: 5px;
            font-weight: 600;
        }
        
        .badge-role {
            color: #666;
            font-size: 0.9rem;
            margin-bottom: 12px;
        }
        
        .badge-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
            padding: 10px 0;
            border-top: 1px solid #f0f0f0;
            border-bottom: 1px solid #f0f0f0;
        }
        
        .language-badge {
            display: inline-block;
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 0.75rem;
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
        
        .badge-date {
            font-size: 0.8rem;
            color: #999;
        }
        
        .badge-actions {
            display: flex;
            gap: 10px;
        }
        
        .btn-small {
            flex: 1;
            padding: 8px 15px;
            font-size: 0.85rem;
            border-radius: 6px;
            text-decoration: none;
            font-weight: 500;
            text-align: center;
            transition: all 0.3s;
        }
        
        .btn-view {
            background: #e3f2fd;
            color: #1976d2;
        }
        
        .btn-view:hover {
            background: #1976d2;
            color: white;
        }
        
        .btn-download {
            background: #f3e5f5;
            color: #7b1fa2;
        }
        
        .btn-download:hover {
            background: #7b1fa2;
            color: white;
        }
        
        /* Table */
        .table-container {
            overflow-x: auto;
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
            height: 76px;
            object-fit: cover;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            cursor: pointer;
            transition: transform 0.3s;
        }
        
        .badge-preview:hover {
            transform: scale(1.1);
        }
        
        .actions {
            display: flex;
            gap: 10px;
        }
        
        /* Pagination */
        .pagination {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
            padding: 30px 25px;
        }
        
        .pagination-btn {
            padding: 8px 15px;
            background: white;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            text-decoration: none;
            color: #333;
            font-weight: 500;
            transition: all 0.3s;
        }
        
        .pagination-btn:hover {
            background: #667eea;
            color: white;
            border-color: #667eea;
        }
        
        .pagination-btn.active {
            background: #667eea;
            color: white;
            border-color: #667eea;
        }
        
        /* Modal */
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
            transition: transform 0.3s;
        }
        
        .modal-close:hover {
            transform: scale(1.2);
        }
        
        /* No Data */
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
        
        .no-data h3 {
            font-size: 1.5rem;
            color: #666;
            margin-bottom: 10px;
        }
        
        .no-data p {
            color: #999;
        }
        
        /* Error Alert */
        .error-alert {
            background: #fee;
            color: #c00;
            padding: 20px;
            border-radius: 8px;
            border-left: 4px solid #c00;
            margin-bottom: 20px;
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .sidebar {
                width: 200px;
            }
            
            .main-content {
                margin-left: 200px;
                width: calc(100% - 200px);
            }
            
            .stats-grid {
                grid-template-columns: 1fr;
            }
            
            .badges-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="admin-layout">
        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="sidebar-header">
                <img src="../assets/logo.PNG" alt="CodeConnect Logo" class="sidebar-logo">
                <div class="sidebar-title">Admin Panel</div>
                <div class="sidebar-subtitle">CodeConnect 2025</div>
            </div>
            
            <nav class="sidebar-nav">
                <a href="dashboard.php" class="nav-item <?php echo $currentPage === 'dashboard' ? 'active' : ''; ?>">
                    <span class="nav-icon">📊</span>
                    <span class="nav-label">Dashboard</span>
                </a>
                <a href="badges.php" class="nav-item <?php echo $currentPage === 'badges' ? 'active' : ''; ?>">
                    <span class="nav-icon">🎫</span>
                    <span class="nav-label">Badges</span>
                </a>
            </nav>
            
            <div class="sidebar-footer">
                <a href="../index.php" class="back-link">
                    <span>←</span>
                    <span>Back to Generator</span>
                </a>
            </div>
        </aside>
        
        <!-- Main Content -->
        <main class="main-content">
            <div class="page-header">
                <h1 class="page-title"><?php echo ucfirst($currentPage); ?></h1>
                <p class="page-subtitle">
                    <?php 
                    if ($currentPage === 'dashboard') {
                        echo 'Overview of badge statistics and recent activity';
                    } else {
                        echo 'Browse and manage all generated badges';
                    }
                    ?>
                </p>
            </div>
