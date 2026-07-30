<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Number Status — VIP Number Management</title>
        <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>

    <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700;900&family=DM+Sans:ital,opsz,wght@0,9..40,300;0,9..40,400;0,9..40,500;0,9..40,600;0,9..40,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../public/css/numbers.css">
</head>
<body>
    <div class="gold-line"></div>

    <!-- Sidebar Overlay (mobile) -->
    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <!-- Sidebar -->
    <aside class="sidebar" id="sidebar">
        <div class="sidebar-header" style="border-bottom-color: var(--border);">
            <div class="sidebar-brand">
                <div class="brand-logo gradient-gold">
                    <span class="brand-logo-text">V</span>
                </div>
                <div>
                    <h1 class="sidebar-brand-name">VIP Numbers</h1>
                    <p class="sidebar-brand-subtitle" style="letter-spacing: 0.05em;">Admin Panel</p>
                </div>
            </div>
        </div>
        <nav class="sidebar-nav" aria-label="Main navigation">
            <p class="sidebar-nav-label">Main</p>
            <a href="dashboard.html" class="sidebar-link">
                <i data-lucide="layout-dashboard"></i> Dashboard
            </a>
            <a href="add-numbers.html" class="sidebar-link">
                <i data-lucide="phone"></i>Add Numbers
            </a>
            <a href="numbers.html" class="sidebar-link active">
                <i data-lucide="check-circle"></i> Number List & Status
            </a>
            <p class="sidebar-nav-label">Settings</p>
            <a href="profile.html" class="sidebar-link">
                <i data-lucide="user"></i> Profile
            </a>
            <a href="logout.php" class="sidebar-link">
                <i data-lucide="log-out"></i> Logout
            </a>
        </nav>
        <div class="sidebar-footer">
            <div class="sidebar-stats-card">
                <p class="sidebar-stats-title">Inventory Health</p>
                <p class="sidebar-stats-text">8,432 numbers available across 5 categories</p>
                <div class="sidebar-stats-progress">
                    <div class="sidebar-stats-progress-fill" style="width:65%"></div>
                </div>
            </div>
        </div>
    </aside>

    <!-- Main Area -->
    <div class="main-area" id="mainArea">
        <!-- Page Header -->
        <header class="page-header">
            <div class="page-header-inner">
                <div class="header-left">
                    <button class="menu-toggle" id="menuToggle" aria-label="Toggle menu">
                        <i data-lucide="menu"></i>
                    </button>
                    <div>
                        <h2 class="page-title">Number List</h2>
                        <p class="page-subtitle">Manage and track all numbers</p>
                    </div>
                </div>
                <div class="header-right">
                    <form method="GET" action="number-status.php" class="header-search-box">
                        <i data-lucide="search" class="header-search-icon"></i>
                        <input type="text" name="search" placeholder="Quick search..." class="header-search-input">
                    </form>
                    <button class="header-icon-btn" id="filterToggleBtn" aria-label="Toggle filters">
                        <i data-lucide="sliders-horizontal"></i>
                    </button>
                    <button class="header-icon-btn" id="refreshBtn" aria-label="Refresh data">
                        <i data-lucide="refresh-cw"></i>
                    </button>
                    <div class="dropdown-trigger">
                        <button class="header-icon-btn" id="notifBtn" aria-label="Notifications">
                            <i data-lucide="bell"></i>
                            <span class="notification-badge">3</span>
                        </button>
                        <div class="dropdown" id="notifDropdown" style="min-width:280px;">
                            <p class="dropdown-label">Notifications</p>
                            <div class="dropdown-item">
                                <div class="notification-icon-wrap" style="background:rgba(34,197,94,0.1);">
                                    <i data-lucide="plus-circle" style="color:var(--green);"></i>
                                </div>
                                <div class="notification-text-wrap">
                                    <p class="notification-title">New number added</p>
                                    <p class="notification-time">2 minutes ago</p>
                                </div>
                            </div>
                            <div class="dropdown-item">
                                <div class="notification-icon-wrap" style="background:rgba(212,175,55,0.1);">
                                    <i data-lucide="star" style="color:var(--accent);"></i>
                                </div>
                                <div class="notification-text-wrap">
                                    <p class="notification-title">Premium number tagged</p>
                                    <p class="notification-time">15 minutes ago</p>
                                </div>
                            </div>
                            <div class="dropdown-item">
                                <div class="notification-icon-wrap" style="background:rgba(239,68,68,0.1);">
                                    <i data-lucide="alert-triangle" style="color:var(--red);"></i>
                                </div>
                                <div class="notification-text-wrap">
                                    <p class="notification-title">Low stock alert</p>
                                    <p class="notification-time">1 hour ago</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="dropdown-trigger">
                        <button class="profile-menu-btn" id="profileBtn" aria-label="Profile menu">
                            <div class="profile-avatar">A</div>
                            <span class="profile-username" style="display:none;">Admin</span>
                            <i data-lucide="chevron-down" class="profile-chevron"></i>
                        </button>
                        <div class="dropdown" id="profileDropdown">
                            <div style="padding:10px 12px;" class="dropdown-divider">
                                <p class="dropdown-profile-name">Admin User</p>
                                <p class="dropdown-profile-email">admin@vipnumbers.com</p>
                            </div>
                            <a href="profile.html" class="dropdown-item"><i data-lucide="user"></i> My Profile</a>
                            <a href="logout.php" class="dropdown-item"><i data-lucide="log-out"></i> Logout</a>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        
        <main class="dashboard-content">
            <!-- Summary Cards -->
            <section class="stats-grid reveal">
                <div class="glass-card stat-card">
                    <div class="stat-card-inner">
                        <div class="stat-info">
                            <p class="stat-label">Total Numbers</p>
                            <p class="stat-value">25</p>
                            <div class="stat-trend">
                                <i data-lucide="trending-up" style="color:var(--green);"></i>
                                <span class="stat-trend-value" style="color:var(--green);">+12.5%</span>
                                <span class="stat-trend-period">vs last month</span>
                            </div>
                        </div>
                        <div class="stat-icon" style="background:rgba(74,157,255,0.1);">
                            <i data-lucide="phone" style="color:var(--accent-blue);"></i>
                        </div>
                    </div>
                </div>
                <div class="glass-card stat-card">
                    <div class="stat-card-inner">
                        <div class="stat-info">
                            <p class="stat-label">Available Numbers</p>
                            <p class="stat-value">17</p>
                            <div class="stat-trend">
                                <i data-lucide="trending-up" style="color:var(--green);"></i>
                                <span class="stat-trend-value" style="color:var(--green);">+8.3%</span>
                                <span class="stat-trend-period">vs last month</span>
                            </div>
                        </div>
                        <div class="stat-icon" style="background:rgba(34,197,94,0.1);">
                            <i data-lucide="check-circle" style="color:var(--green);"></i>
                        </div>
                    </div>
                </div>
                <div class="glass-card stat-card">
                    <div class="stat-card-inner">
                        <div class="stat-info">
                            <p class="stat-label">Sold Numbers</p>
                            <p class="stat-value">8</p>
                            <div class="stat-trend">
                                <i data-lucide="trending-up" style="color:var(--red);"></i>
                                <span class="stat-trend-value" style="color:var(--red);">+22.1%</span>
                                <span class="stat-trend-period">vs last month</span>
                            </div>
                        </div>
                        <div class="stat-icon" style="background:rgba(239,68,68,0.1);">
                            <i data-lucide="x-circle" style="color:var(--red);"></i>
                        </div>
                    </div>
                </div>
                <div class="glass-card stat-card">
                    <div class="stat-card-inner">
                        <div class="stat-info">
                            <p class="stat-label">Premium Numbers</p>
                            <p class="stat-value">8</p>
                            <div class="stat-trend">
                                <i data-lucide="trending-up" style="color:var(--accent);"></i>
                                <span class="stat-trend-value" style="color:var(--accent);">+18.2%</span>
                                <span class="stat-trend-period">vs last month</span>
                            </div>
                        </div>
                        <div class="stat-icon" style="background:rgba(212,175,55,0.1);">
                            <i data-lucide="crown" style="color:var(--accent);"></i>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Filters Section -->
            <section class="glass-card glass-card--static filter-section reveal" id="filterPanel">
                <form method="GET" action="number-status.php" id="filterForm">
                    <div class="filter-grid" style="align-items: flex-end;">
                        <div class="filter-group">
                            <label class="filter-label" for="filterSearch">Search Number</label>
                            <div class="filter-search-wrapper">
                                <i data-lucide="search" class="filter-search-icon"></i>
                                <input type="text" name="search" id="filterSearch" class="input-field filter-search-input" placeholder="Enter mobile number...">
                            </div>
                        </div>
                        <div class="filter-group">
                            <label class="filter-label" for="filterCategory">Category</label>
                            <select name="category" id="filterCategory" class="input-field">
                                <option value="all">All Categories</option>
                                <option value="VIP">VIP</option>
                                <option value="Premium">Premium</option>
                                <option value="Fancy">Fancy</option>
                            </select>
                        </div>
                        <div class="filter-group">
                            <label class="filter-label" for="filterStatus">Status</label>
                            <select name="status" id="filterStatus" class="input-field">
                                <option value="all">All Status</option>
                                <option value="Available">Available</option>
                                <option value="Sold">Sold</option>
                            </select>
                        </div>
                        <div class="filter-group">
                            <label class="filter-label" for="filterSort">Sort By</label>
                            <select name="sort" id="filterSort" class="input-field">
                                <option value="latest">Latest Added</option>
                                <option value="oldest">Oldest Added</option>
                                <option value="price-high">Price (High to Low)</option>
                                <option value="price-low">Price (Low to High)</option>
                            </select>
                        </div>
                        <div class="filter-group">
                            <button type="submit" class="btn-gold" style="width: 100%; padding: 10px 14px; border-radius: 10px;">Apply Filters</button>
                        </div>
                    </div>
                </form>
            </section>

            <!-- Bulk Actions Bar -->
            <div class="bulk-bar" id="bulkBar" style="display:none;">
                <span class="bulk-count" id="bulkCount">0 selected</span>
                <form method="POST" action="bulk_update.php" class="bulk-form" id="bulkForm">
                    <input type="hidden" name="ids" id="bulkIds" value="">
                    <button type="submit" name="action" value="available" class="bulk-btn gold">Mark Available</button>
                    <button type="submit" name="action" value="sold" class="bulk-btn">Mark Sold</button>
                    <button type="submit" name="action" value="delete" formaction="bulk_delete.php" class="bulk-btn red">Delete</button>
                </form>
                <button type="button" class="bulk-btn" id="bulkCancelBtn">Cancel</button>
            </div>

            <!-- Table -->
            <section class="glass-card glass-card--static table-section reveal">
                <div class="table-scroll-wrapper" id="tableScrollWrapper">
                    <table class="data-table" id="numbersTable">
                        <thead>
                            <tr>
                                <th style="width:44px;">
                                    <div class="custom-checkbox" id="selectAllCheckbox" role="checkbox" aria-checked="false" aria-label="Select all rows">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                    </div>
                                </th>
                                <th>Mobile Number</th>
                                <th>Category</th>
                                <th>Current Status</th>
                                <th>Last Updated</th>
                                <th>Status Update</th>
                                <th style="text-align:right;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="custom-checkbox row-checkbox" data-id="1" role="checkbox" aria-checked="false" aria-label="Select row 1">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                    </div>
                                </td>
                                <td><span class="row-number">9999 0011 22</span></td>
                                <td><span class="badge badge-fancy">Fancy</span></td>
                                <td><span class="badge badge-available">Available</span></td>
                                <td>2025-01-15 14:30</td>
                                <td>
                                    <form method="POST" action="update_status.php" class="status-update-form">
                                        <input type="hidden" name="id" value="1">
                                        <select name="status" class="status-select status-available" onchange="this.form.submit()">
                                            <option value="Available" selected>Available</option>
                                            <option value="Sold">Sold</option>
                                        </select>
                                    </form>
                                </td>
                                <td style="text-align:right;">
                                    <div class="action-btns">
                                        <button type="button" class="action-btn gold" onclick="openViewModal(this)" data-number="9999 0011 22" data-category="Fancy" data-original-price="₹55,000" data-selling-price="₹45,000" data-status="Available" data-date="2025-01-15" data-updated="2025-01-15 14:30" title="View details"><i data-lucide="eye"></i></button>
                                        <a href="edit.php?id=1" class="action-btn" title="Edit"><i data-lucide="pencil"></i></a>
                                        <form method="POST" action="delete.php" class="delete-form" onsubmit="return confirm('Are you sure you want to delete this number?')"><input type="hidden" name="id" value="1"><button type="submit" class="action-btn" title="Delete"><i data-lucide="trash-2"></i></button></form>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="custom-checkbox row-checkbox" data-id="2" role="checkbox" aria-checked="false" aria-label="Select row 2">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                    </div>
                                </td>
                                <td><span class="row-number">8888 7777 66</span></td>
                                <td><span class="badge badge-premium">Premium</span></td>
                                <td><span class="badge badge-sold">Sold</span></td>
                                <td>2025-01-14 18:22</td>
                                <td>
                                    <form method="POST" action="update_status.php" class="status-update-form">
                                        <input type="hidden" name="id" value="2">
                                        <select name="status" class="status-select status-sold" onchange="this.form.submit()">
                                            <option value="Available">Available</option>
                                            <option value="Sold" selected>Sold</option>
                                        </select>
                                    </form>
                                </td>
                                <td style="text-align:right;">
                                    <div class="action-btns">
                                        <button type="button" class="action-btn gold" onclick="openViewModal(this)" data-number="8888 7777 66" data-category="Premium" data-original-price="₹1,50,000" data-selling-price="₹1,25,000" data-status="Sold" data-date="2025-01-14" data-updated="2025-01-14 18:22" title="View details"><i data-lucide="eye"></i></button>
                                        <a href="edit.php?id=2" class="action-btn" title="Edit"><i data-lucide="pencil"></i></a>
                                        <form method="POST" action="delete.php" class="delete-form" onsubmit="return confirm('Are you sure you want to delete this number?')"><input type="hidden" name="id" value="2"><button type="submit" class="action-btn" title="Delete"><i data-lucide="trash-2"></i></button></form>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="custom-checkbox row-checkbox" data-id="3" role="checkbox" aria-checked="false" aria-label="Select row 3">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                    </div>
                                </td>
                                <td><span class="row-number">7777 6666 55</span></td>
                                <td><span class="badge badge-vip">VIP</span></td>
                                <td><span class="badge badge-available">Available</span></td>
                                <td>2025-01-14 11:05</td>
                                <td>
                                    <form method="POST" action="update_status.php" class="status-update-form">
                                        <input type="hidden" name="id" value="3">
                                        <select name="status" class="status-select status-available" onchange="this.form.submit()">
                                            <option value="Available" selected>Available</option>
                                            <option value="Sold">Sold</option>
                                        </select>
                                    </form>
                                </td>
                                <td style="text-align:right;">
                                    <div class="action-btns">
                                        <button type="button" class="action-btn gold" onclick="openViewModal(this)" data-number="7777 6666 55" data-category="VIP" data-original-price="₹95,000" data-selling-price="₹78,000" data-status="Available" data-date="2025-01-14" data-updated="2025-01-14 11:05" title="View details"><i data-lucide="eye"></i></button>
                                        <a href="edit.php?id=3" class="action-btn" title="Edit"><i data-lucide="pencil"></i></a>
                                        <form method="POST" action="delete.php" class="delete-form" onsubmit="return confirm('Are you sure you want to delete this number?')"><input type="hidden" name="id" value="3"><button type="submit" class="action-btn" title="Delete"><i data-lucide="trash-2"></i></button></form>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="custom-checkbox row-checkbox" data-id="4" role="checkbox" aria-checked="false" aria-label="Select row 4">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                    </div>
                                </td>
                                <td><span class="row-number">9999 1111 22</span></td>
                                <td><span class="badge badge-fancy">Fancy</span></td>
                                <td><span class="badge badge-available">Available</span></td>
                                <td>2025-01-13 09:47</td>
                                <td>
                                    <form method="POST" action="update_status.php" class="status-update-form">
                                        <input type="hidden" name="id" value="4">
                                        <select name="status" class="status-select status-available" onchange="this.form.submit()">
                                            <option value="Available" selected>Available</option>
                                            <option value="Sold">Sold</option>
                                        </select>
                                    </form>
                                </td>
                                <td style="text-align:right;">
                                    <div class="action-btns">
                                        <button type="button" class="action-btn gold" onclick="openViewModal(this)" data-number="9999 1111 22" data-category="Fancy" data-original-price="₹70,000" data-selling-price="₹55,000" data-status="Available" data-date="2025-01-13" data-updated="2025-01-13 09:47" title="View details"><i data-lucide="eye"></i></button>
                                        <a href="edit.php?id=4" class="action-btn" title="Edit"><i data-lucide="pencil"></i></a>
                                        <form method="POST" action="delete.php" class="delete-form" onsubmit="return confirm('Are you sure you want to delete this number?')"><input type="hidden" name="id" value="4"><button type="submit" class="action-btn" title="Delete"><i data-lucide="trash-2"></i></button></form>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="custom-checkbox row-checkbox" data-id="5" role="checkbox" aria-checked="false" aria-label="Select row 5">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                    </div>
                                </td>
                                <td><span class="row-number">8888 0000 99</span></td>
                                <td><span class="badge badge-vip">VIP</span></td>
                                <td><span class="badge badge-available">Available</span></td>
                                <td>2025-01-13 16:33</td>
                                <td>
                                    <form method="POST" action="update_status.php" class="status-update-form">
                                        <input type="hidden" name="id" value="5">
                                        <select name="status" class="status-select status-available" onchange="this.form.submit()">
                                            <option value="Available" selected>Available</option>
                                            <option value="Sold">Sold</option>
                                        </select>
                                    </form>
                                </td>
                                <td style="text-align:right;">
                                    <div class="action-btns">
                                        <button type="button" class="action-btn gold" onclick="openViewModal(this)" data-number="8888 0000 99" data-category="VIP" data-original-price="₹2,50,000" data-selling-price="₹2,10,000" data-status="Available" data-date="2025-01-13" data-updated="2025-01-13 16:33" title="View details"><i data-lucide="eye"></i></button>
                                        <a href="edit.php?id=5" class="action-btn" title="Edit"><i data-lucide="pencil"></i></a>
                                        <form method="POST" action="delete.php" class="delete-form" onsubmit="return confirm('Are you sure you want to delete this number?')"><input type="hidden" name="id" value="5"><button type="submit" class="action-btn" title="Delete"><i data-lucide="trash-2"></i></button></form>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="custom-checkbox row-checkbox" data-id="6" role="checkbox" aria-checked="false" aria-label="Select row 6">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                    </div>
                                </td>
                                <td><span class="row-number">6666 5555 44</span></td>
                                <td><span class="badge badge-fancy">Fancy</span></td>
                                <td><span class="badge badge-sold">Sold</span></td>
                                <td>2025-01-12 20:18</td>
                                <td>
                                    <form method="POST" action="update_status.php" class="status-update-form">
                                        <input type="hidden" name="id" value="6">
                                        <select name="status" class="status-select status-sold" onchange="this.form.submit()">
                                            <option value="Available">Available</option>
                                            <option value="Sold" selected>Sold</option>
                                        </select>
                                    </form>
                                </td>
                                <td style="text-align:right;">
                                    <div class="action-btns">
                                        <button type="button" class="action-btn gold" onclick="openViewModal(this)" data-number="6666 5555 44" data-category="Fancy" data-original-price="₹40,000" data-selling-price="₹32,000" data-status="Sold" data-date="2025-01-12" data-updated="2025-01-12 20:18" title="View details"><i data-lucide="eye"></i></button>
                                        <a href="edit.php?id=6" class="action-btn" title="Edit"><i data-lucide="pencil"></i></a>
                                        <form method="POST" action="delete.php" class="delete-form" onsubmit="return confirm('Are you sure you want to delete this number?')"><input type="hidden" name="id" value="6"><button type="submit" class="action-btn" title="Delete"><i data-lucide="trash-2"></i></button></form>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="custom-checkbox row-checkbox" data-id="7" role="checkbox" aria-checked="false" aria-label="Select row 7">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                    </div>
                                </td>
                                <td><span class="row-number">9999 8888 77</span></td>
                                <td><span class="badge badge-premium">Premium</span></td>
                                <td><span class="badge badge-available">Available</span></td>
                                <td>2025-01-12 08:55</td>
                                <td>
                                    <form method="POST" action="update_status.php" class="status-update-form">
                                        <input type="hidden" name="id" value="7">
                                        <select name="status" class="status-select status-available" onchange="this.form.submit()">
                                            <option value="Available" selected>Available</option>
                                            <option value="Sold">Sold</option>
                                        </select>
                                    </form>
                                </td>
                                <td style="text-align:right;">
                                    <div class="action-btns">
                                        <button type="button" class="action-btn gold" onclick="openViewModal(this)" data-number="9999 8888 77" data-category="Premium" data-original-price="₹2,20,000" data-selling-price="₹1,85,000" data-status="Available" data-date="2025-01-12" data-updated="2025-01-12 08:55" title="View details"><i data-lucide="eye"></i></button>
                                        <a href="edit.php?id=7" class="action-btn" title="Edit"><i data-lucide="pencil"></i></a>
                                        <form method="POST" action="delete.php" class="delete-form" onsubmit="return confirm('Are you sure you want to delete this number?')"><input type="hidden" name="id" value="7"><button type="submit" class="action-btn" title="Delete"><i data-lucide="trash-2"></i></button></form>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="custom-checkbox row-checkbox" data-id="8" role="checkbox" aria-checked="false" aria-label="Select row 8">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                    </div>
                                </td>
                                <td><span class="row-number">7777 0000 88</span></td>
                                <td><span class="badge badge-vip">VIP</span></td>
                                <td><span class="badge badge-available">Available</span></td>
                                <td>2025-01-11 13:40</td>
                                <td>
                                    <form method="POST" action="update_status.php" class="status-update-form">
                                        <input type="hidden" name="id" value="8">
                                        <select name="status" class="status-select status-available" onchange="this.form.submit()">
                                            <option value="Available" selected>Available</option>
                                            <option value="Sold">Sold</option>
                                        </select>
                                    </form>
                                </td>
                                <td style="text-align:right;">
                                    <div class="action-btns">
                                        <button type="button" class="action-btn gold" onclick="openViewModal(this)" data-number="7777 0000 88" data-category="VIP" data-original-price="₹80,000" data-selling-price="₹65,000" data-status="Available" data-date="2025-01-11" data-updated="2025-01-11 13:40" title="View details"><i data-lucide="eye"></i></button>
                                        <a href="edit.php?id=8" class="action-btn" title="Edit"><i data-lucide="pencil"></i></a>
                                        <form method="POST" action="delete.php" class="delete-form" onsubmit="return confirm('Are you sure you want to delete this number?')"><input type="hidden" name="id" value="8"><button type="submit" class="action-btn" title="Delete"><i data-lucide="trash-2"></i></button></form>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="custom-checkbox row-checkbox" data-id="9" role="checkbox" aria-checked="false" aria-label="Select row 9">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                    </div>
                                </td>
                                <td><span class="row-number">5555 4444 33</span></td>
                                <td><span class="badge badge-fancy">Fancy</span></td>
                                <td><span class="badge badge-sold">Sold</span></td>
                                <td>2025-01-11 07:12</td>
                                <td>
                                    <form method="POST" action="update_status.php" class="status-update-form">
                                        <input type="hidden" name="id" value="9">
                                        <select name="status" class="status-select status-sold" onchange="this.form.submit()">
                                            <option value="Available">Available</option>
                                            <option value="Sold" selected>Sold</option>
                                        </select>
                                    </form>
                                </td>
                                <td style="text-align:right;">
                                    <div class="action-btns">
                                        <button type="button" class="action-btn gold" onclick="openViewModal(this)" data-number="5555 4444 33" data-category="Fancy" data-original-price="₹28,000" data-selling-price="₹22,000" data-status="Sold" data-date="2025-01-11" data-updated="2025-01-11 07:12" title="View details"><i data-lucide="eye"></i></button>
                                        <a href="edit.php?id=9" class="action-btn" title="Edit"><i data-lucide="pencil"></i></a>
                                        <form method="POST" action="delete.php" class="delete-form" onsubmit="return confirm('Are you sure you want to delete this number?')"><input type="hidden" name="id" value="9"><button type="submit" class="action-btn" title="Delete"><i data-lucide="trash-2"></i></button></form>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="custom-checkbox row-checkbox" data-id="10" role="checkbox" aria-checked="false" aria-label="Select row 10">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                    </div>
                                </td>
                                <td><span class="row-number">9999 7777 66</span></td>
                                <td><span class="badge badge-premium">Premium</span></td>
                                <td><span class="badge badge-available">Available</span></td>
                                <td>2025-01-10 15:28</td>
                                <td>
                                    <form method="POST" action="update_status.php" class="status-update-form">
                                        <input type="hidden" name="id" value="10">
                                        <select name="status" class="status-select status-available" onchange="this.form.submit()">
                                            <option value="Available" selected>Available</option>
                                            <option value="Sold">Sold</option>
                                        </select>
                                    </form>
                                </td>
                                <td style="text-align:right;">
                                    <div class="action-btns">
                                        <button type="button" class="action-btn gold" onclick="openViewModal(this)" data-number="9999 7777 66" data-category="Premium" data-original-price="₹1,80,000" data-selling-price="₹1,55,000" data-status="Available" data-date="2025-01-10" data-updated="2025-01-10 15:28" title="View details"><i data-lucide="eye"></i></button>
                                        <a href="edit.php?id=10" class="action-btn" title="Edit"><i data-lucide="pencil"></i></a>
                                        <form method="POST" action="delete.php" class="delete-form" onsubmit="return confirm('Are you sure you want to delete this number?')"><input type="hidden" name="id" value="10"><button type="submit" class="action-btn" title="Delete"><i data-lucide="trash-2"></i></button></form>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="custom-checkbox row-checkbox" data-id="11" role="checkbox" aria-checked="false" aria-label="Select row 11">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                    </div>
                                </td>
                                <td><span class="row-number">8888 6666 55</span></td>
                                <td><span class="badge badge-vip">VIP</span></td>
                                <td><span class="badge badge-sold">Sold</span></td>
                                <td>2025-01-10 22:05</td>
                                <td>
                                    <form method="POST" action="update_status.php" class="status-update-form">
                                        <input type="hidden" name="id" value="11">
                                        <select name="status" class="status-select status-sold" onchange="this.form.submit()">
                                            <option value="Available">Available</option>
                                            <option value="Sold" selected>Sold</option>
                                        </select>
                                    </form>
                                </td>
                                <td style="text-align:right;">
                                    <div class="action-btns">
                                        <button type="button" class="action-btn gold" onclick="openViewModal(this)" data-number="8888 6666 55" data-category="VIP" data-original-price="₹1,20,000" data-selling-price="₹98,000" data-status="Sold" data-date="2025-01-10" data-updated="2025-01-10 22:05" title="View details"><i data-lucide="eye"></i></button>
                                        <a href="edit.php?id=11" class="action-btn" title="Edit"><i data-lucide="pencil"></i></a>
                                        <form method="POST" action="delete.php" class="delete-form" onsubmit="return confirm('Are you sure you want to delete this number?')"><input type="hidden" name="id" value="11"><button type="submit" class="action-btn" title="Delete"><i data-lucide="trash-2"></i></button></form>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="custom-checkbox row-checkbox" data-id="12" role="checkbox" aria-checked="false" aria-label="Select row 12">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                    </div>
                                </td>
                                <td><span class="row-number">7777 8888 99</span></td>
                                <td><span class="badge badge-fancy">Fancy</span></td>
                                <td><span class="badge badge-available">Available</span></td>
                                <td>2025-01-09 10:15</td>
                                <td>
                                    <form method="POST" action="update_status.php" class="status-update-form">
                                        <input type="hidden" name="id" value="12">
                                        <select name="status" class="status-select status-available" onchange="this.form.submit()">
                                            <option value="Available" selected>Available</option>
                                            <option value="Sold">Sold</option>
                                        </select>
                                    </form>
                                </td>
                                <td style="text-align:right;">
                                    <div class="action-btns">
                                        <button type="button" class="action-btn gold" onclick="openViewModal(this)" data-number="7777 8888 99" data-category="Fancy" data-original-price="₹65,000" data-selling-price="₹52,000" data-status="Available" data-date="2025-01-09" data-updated="2025-01-09 10:15" title="View details"><i data-lucide="eye"></i></button>
                                        <a href="edit.php?id=12" class="action-btn" title="Edit"><i data-lucide="pencil"></i></a>
                                        <form method="POST" action="delete.php" class="delete-form" onsubmit="return confirm('Are you sure you want to delete this number?')"><input type="hidden" name="id" value="12"><button type="submit" class="action-btn" title="Delete"><i data-lucide="trash-2"></i></button></form>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="custom-checkbox row-checkbox" data-id="13" role="checkbox" aria-checked="false" aria-label="Select row 13">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                    </div>
                                </td>
                                <td><span class="row-number">9999 3333 44</span></td>
                                <td><span class="badge badge-premium">Premium</span></td>
                                <td><span class="badge badge-available">Available</span></td>
                                <td>2025-01-09 17:42</td>
                                <td>
                                    <form method="POST" action="update_status.php" class="status-update-form">
                                        <input type="hidden" name="id" value="13">
                                        <select name="status" class="status-select status-available" onchange="this.form.submit()">
                                            <option value="Available" selected>Available</option>
                                            <option value="Sold">Sold</option>
                                        </select>
                                    </form>
                                </td>
                                <td style="text-align:right;">
                                    <div class="action-btns">
                                        <button type="button" class="action-btn gold" onclick="openViewModal(this)" data-number="9999 3333 44" data-category="Premium" data-original-price="₹1,70,000" data-selling-price="₹1,40,000" data-status="Available" data-date="2025-01-09" data-updated="2025-01-09 17:42" title="View details"><i data-lucide="eye"></i></button>
                                        <a href="edit.php?id=13" class="action-btn" title="Edit"><i data-lucide="pencil"></i></a>
                                        <form method="POST" action="delete.php" class="delete-form" onsubmit="return confirm('Are you sure you want to delete this number?')"><input type="hidden" name="id" value="13"><button type="submit" class="action-btn" title="Delete"><i data-lucide="trash-2"></i></button></form>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="custom-checkbox row-checkbox" data-id="14" role="checkbox" aria-checked="false" aria-label="Select row 14">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                    </div>
                                </td>
                                <td><span class="row-number">8888 2222 33</span></td>
                                <td><span class="badge badge-vip">VIP</span></td>
                                <td><span class="badge badge-sold">Sold</span></td>
                                <td>2025-01-08 12:30</td>
                                <td>
                                    <form method="POST" action="update_status.php" class="status-update-form">
                                        <input type="hidden" name="id" value="14">
                                        <select name="status" class="status-select status-sold" onchange="this.form.submit()">
                                            <option value="Available">Available</option>
                                            <option value="Sold" selected>Sold</option>
                                        </select>
                                    </form>
                                </td>
                                <td style="text-align:right;">
                                    <div class="action-btns">
                                        <button type="button" class="action-btn gold" onclick="openViewModal(this)" data-number="8888 2222 33" data-category="VIP" data-original-price="₹1,10,000" data-selling-price="₹90,000" data-status="Sold" data-date="2025-01-08" data-updated="2025-01-08 12:30" title="View details"><i data-lucide="eye"></i></button>
                                        <a href="edit.php?id=14" class="action-btn" title="Edit"><i data-lucide="pencil"></i></a>
                                        <form method="POST" action="delete.php" class="delete-form" onsubmit="return confirm('Are you sure you want to delete this number?')"><input type="hidden" name="id" value="14"><button type="submit" class="action-btn" title="Delete"><i data-lucide="trash-2"></i></button></form>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="custom-checkbox row-checkbox" data-id="15" role="checkbox" aria-checked="false" aria-label="Select row 15">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                    </div>
                                </td>
                                <td><span class="row-number">6666 7777 88</span></td>
                                <td><span class="badge badge-fancy">Fancy</span></td>
                                <td><span class="badge badge-available">Available</span></td>
                                <td>2025-01-08 06:55</td>
                                <td>
                                    <form method="POST" action="update_status.php" class="status-update-form">
                                        <input type="hidden" name="id" value="15">
                                        <select name="status" class="status-select status-available" onchange="this.form.submit()">
                                            <option value="Available" selected>Available</option>
                                            <option value="Sold">Sold</option>
                                        </select>
                                    </form>
                                </td>
                                <td style="text-align:right;">
                                    <div class="action-btns">
                                        <button type="button" class="action-btn gold" onclick="openViewModal(this)" data-number="6666 7777 88" data-category="Fancy" data-original-price="₹35,000" data-selling-price="₹28,000" data-status="Available" data-date="2025-01-08" data-updated="2025-01-08 06:55" title="View details"><i data-lucide="eye"></i></button>
                                        <a href="edit.php?id=15" class="action-btn" title="Edit"><i data-lucide="pencil"></i></a>
                                        <form method="POST" action="delete.php" class="delete-form" onsubmit="return confirm('Are you sure you want to delete this number?')"><input type="hidden" name="id" value="15"><button type="submit" class="action-btn" title="Delete"><i data-lucide="trash-2"></i></button></form>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="custom-checkbox row-checkbox" data-id="16" role="checkbox" aria-checked="false" aria-label="Select row 16">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                    </div>
                                </td>
                                <td><span class="row-number">9999 0000 99</span></td>
                                <td><span class="badge badge-premium">Premium</span></td>
                                <td><span class="badge badge-available">Available</span></td>
                                <td>2025-01-07 19:18</td>
                                <td>
                                    <form method="POST" action="update_status.php" class="status-update-form">
                                        <input type="hidden" name="id" value="16">
                                        <select name="status" class="status-select status-available" onchange="this.form.submit()">
                                            <option value="Available" selected>Available</option>
                                            <option value="Sold">Sold</option>
                                        </select>
                                    </form>
                                </td>
                                <td style="text-align:right;">
                                    <div class="action-btns">
                                        <button type="button" class="action-btn gold" onclick="openViewModal(this)" data-number="9999 0000 99" data-category="Premium" data-original-price="₹3,00,000" data-selling-price="₹2,60,000" data-status="Available" data-date="2025-01-07" data-updated="2025-01-07 19:18" title="View details"><i data-lucide="eye"></i></button>
                                        <a href="edit.php?id=16" class="action-btn" title="Edit"><i data-lucide="pencil"></i></a>
                                        <form method="POST" action="delete.php" class="delete-form" onsubmit="return confirm('Are you sure you want to delete this number?')"><input type="hidden" name="id" value="16"><button type="submit" class="action-btn" title="Delete"><i data-lucide="trash-2"></i></button></form>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="custom-checkbox row-checkbox" data-id="17" role="checkbox" aria-checked="false" aria-label="Select row 17">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                    </div>
                                </td>
                                <td><span class="row-number">7777 1111 22</span></td>
                                <td><span class="badge badge-vip">VIP</span></td>
                                <td><span class="badge badge-sold">Sold</span></td>
                                <td>2025-01-07 14:02</td>
                                <td>
                                    <form method="POST" action="update_status.php" class="status-update-form">
                                        <input type="hidden" name="id" value="17">
                                        <select name="status" class="status-select status-sold" onchange="this.form.submit()">
                                            <option value="Available">Available</option>
                                            <option value="Sold" selected>Sold</option>
                                        </select>
                                    </form>
                                </td>
                                <td style="text-align:right;">
                                    <div class="action-btns">
                                        <button type="button" class="action-btn gold" onclick="openViewModal(this)" data-number="7777 1111 22" data-category="VIP" data-original-price="₹85,000" data-selling-price="₹70,000" data-status="Sold" data-date="2025-01-07" data-updated="2025-01-07 14:02" title="View details"><i data-lucide="eye"></i></button>
                                        <a href="edit.php?id=17" class="action-btn" title="Edit"><i data-lucide="pencil"></i></a>
                                        <form method="POST" action="delete.php" class="delete-form" onsubmit="return confirm('Are you sure you want to delete this number?')"><input type="hidden" name="id" value="17"><button type="submit" class="action-btn" title="Delete"><i data-lucide="trash-2"></i></button></form>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="custom-checkbox row-checkbox" data-id="18" role="checkbox" aria-checked="false" aria-label="Select row 18">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                    </div>
                                </td>
                                <td><span class="row-number">8888 5555 66</span></td>
                                <td><span class="badge badge-fancy">Fancy</span></td>
                                <td><span class="badge badge-available">Available</span></td>
                                <td>2025-01-06 09:38</td>
                                <td>
                                    <form method="POST" action="update_status.php" class="status-update-form">
                                        <input type="hidden" name="id" value="18">
                                        <select name="status" class="status-select status-available" onchange="this.form.submit()">
                                            <option value="Available" selected>Available</option>
                                            <option value="Sold">Sold</option>
                                        </select>
                                    </form>
                                </td>
                                <td style="text-align:right;">
                                    <div class="action-btns">
                                        <button type="button" class="action-btn gold" onclick="openViewModal(this)" data-number="8888 5555 66" data-category="Fancy" data-original-price="₹45,000" data-selling-price="₹36,000" data-status="Available" data-date="2025-01-06" data-updated="2025-01-06 09:38" title="View details"><i data-lucide="eye"></i></button>
                                        <a href="edit.php?id=18" class="action-btn" title="Edit"><i data-lucide="pencil"></i></a>
                                        <form method="POST" action="delete.php" class="delete-form" onsubmit="return confirm('Are you sure you want to delete this number?')"><input type="hidden" name="id" value="18"><button type="submit" class="action-btn" title="Delete"><i data-lucide="trash-2"></i></button></form>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="custom-checkbox row-checkbox" data-id="19" role="checkbox" aria-checked="false" aria-label="Select row 19">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                    </div>
                                </td>
                                <td><span class="row-number">9999 2222 33</span></td>
                                <td><span class="badge badge-premium">Premium</span></td>
                                <td><span class="badge badge-available">Available</span></td>
                                <td>2025-01-06 21:45</td>
                                <td>
                                    <form method="POST" action="update_status.php" class="status-update-form">
                                        <input type="hidden" name="id" value="19">
                                        <select name="status" class="status-select status-available" onchange="this.form.submit()">
                                            <option value="Available" selected>Available</option>
                                            <option value="Sold">Sold</option>
                                        </select>
                                    </form>
                                </td>
                                <td style="text-align:right;">
                                    <div class="action-btns">
                                        <button type="button" class="action-btn gold" onclick="openViewModal(this)" data-number="9999 2222 33" data-category="Premium" data-original-price="₹1,95,000" data-selling-price="₹1,65,000" data-status="Available" data-date="2025-01-06" data-updated="2025-01-06 21:45" title="View details"><i data-lucide="eye"></i></button>
                                        <a href="edit.php?id=19" class="action-btn" title="Edit"><i data-lucide="pencil"></i></a>
                                        <form method="POST" action="delete.php" class="delete-form" onsubmit="return confirm('Are you sure you want to delete this number?')"><input type="hidden" name="id" value="19"><button type="submit" class="action-btn" title="Delete"><i data-lucide="trash-2"></i></button></form>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="custom-checkbox row-checkbox" data-id="20" role="checkbox" aria-checked="false" aria-label="Select row 20">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                    </div>
                                </td>
                                <td><span class="row-number">6666 8888 99</span></td>
                                <td><span class="badge badge-vip">VIP</span></td>
                                <td><span class="badge badge-sold">Sold</span></td>
                                <td>2025-01-05 11:20</td>
                                <td>
                                    <form method="POST" action="update_status.php" class="status-update-form">
                                        <input type="hidden" name="id" value="20">
                                        <select name="status" class="status-select status-sold" onchange="this.form.submit()">
                                            <option value="Available">Available</option>
                                            <option value="Sold" selected>Sold</option>
                                        </select>
                                    </form>
                                </td>
                                <td style="text-align:right;">
                                    <div class="action-btns">
                                        <button type="button" class="action-btn gold" onclick="openViewModal(this)" data-number="6666 8888 99" data-category="VIP" data-original-price="₹1,30,000" data-selling-price="₹1,08,000" data-status="Sold" data-date="2025-01-05" data-updated="2025-01-05 11:20" title="View details"><i data-lucide="eye"></i></button>
                                        <a href="edit.php?id=20" class="action-btn" title="Edit"><i data-lucide="pencil"></i></a>
                                        <form method="POST" action="delete.php" class="delete-form" onsubmit="return confirm('Are you sure you want to delete this number?')"><input type="hidden" name="id" value="20"><button type="submit" class="action-btn" title="Delete"><i data-lucide="trash-2"></i></button></form>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="custom-checkbox row-checkbox" data-id="21" role="checkbox" aria-checked="false" aria-label="Select row 21">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                    </div>
                                </td>
                                <td><span class="row-number">7777 5555 66</span></td>
                                <td><span class="badge badge-fancy">Fancy</span></td>
                                <td><span class="badge badge-available">Available</span></td>
                                <td>2025-01-05 16:55</td>
                                <td>
                                    <form method="POST" action="update_status.php" class="status-update-form">
                                        <input type="hidden" name="id" value="21">
                                        <select name="status" class="status-select status-available" onchange="this.form.submit()">
                                            <option value="Available" selected>Available</option>
                                            <option value="Sold">Sold</option>
                                        </select>
                                    </form>
                                </td>
                                <td style="text-align:right;">
                                    <div class="action-btns">
                                        <button type="button" class="action-btn gold" onclick="openViewModal(this)" data-number="7777 5555 66" data-category="Fancy" data-original-price="₹38,000" data-selling-price="₹30,000" data-status="Available" data-date="2025-01-05" data-updated="2025-01-05 16:55" title="View details"><i data-lucide="eye"></i></button>
                                        <a href="edit.php?id=21" class="action-btn" title="Edit"><i data-lucide="pencil"></i></a>
                                        <form method="POST" action="delete.php" class="delete-form" onsubmit="return confirm('Are you sure you want to delete this number?')"><input type="hidden" name="id" value="21"><button type="submit" class="action-btn" title="Delete"><i data-lucide="trash-2"></i></button></form>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="custom-checkbox row-checkbox" data-id="22" role="checkbox" aria-checked="false" aria-label="Select row 22">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                    </div>
                                </td>
                                <td><span class="row-number">8888 3333 44</span></td>
                                <td><span class="badge badge-premium">Premium</span></td>
                                <td><span class="badge badge-available">Available</span></td>
                                <td>2025-01-04 08:10</td>
                                <td>
                                    <form method="POST" action="update_status.php" class="status-update-form">
                                        <input type="hidden" name="id" value="22">
                                        <select name="status" class="status-select status-available" onchange="this.form.submit()">
                                            <option value="Available" selected>Available</option>
                                            <option value="Sold">Sold</option>
                                        </select>
                                    </form>
                                </td>
                                <td style="text-align:right;">
                                    <div class="action-btns">
                                        <button type="button" class="action-btn gold" onclick="openViewModal(this)" data-number="8888 3333 44" data-category="Premium" data-original-price="₹1,60,000" data-selling-price="₹1,35,000" data-status="Available" data-date="2025-01-04" data-updated="2025-01-04 08:10" title="View details"><i data-lucide="eye"></i></button>
                                        <a href="edit.php?id=22" class="action-btn" title="Edit"><i data-lucide="pencil"></i></a>
                                        <form method="POST" action="delete.php" class="delete-form" onsubmit="return confirm('Are you sure you want to delete this number?')"><input type="hidden" name="id" value="22"><button type="submit" class="action-btn" title="Delete"><i data-lucide="trash-2"></i></button></form>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="custom-checkbox row-checkbox" data-id="23" role="checkbox" aria-checked="false" aria-label="Select row 23">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                    </div>
                                </td>
                                <td><span class="row-number">9999 4444 55</span></td>
                                <td><span class="badge badge-vip">VIP</span></td>
                                <td><span class="badge badge-sold">Sold</span></td>
                                <td>2025-01-04 20:33</td>
                                <td>
                                    <form method="POST" action="update_status.php" class="status-update-form">
                                        <input type="hidden" name="id" value="23">
                                        <select name="status" class="status-select status-sold" onchange="this.form.submit()">
                                            <option value="Available">Available</option>
                                            <option value="Sold" selected>Sold</option>
                                        </select>
                                    </form>
                                </td>
                                <td style="text-align:right;">
                                    <div class="action-btns">
                                        <button type="button" class="action-btn gold" onclick="openViewModal(this)" data-number="9999 4444 55" data-category="VIP" data-original-price="₹2,40,000" data-selling-price="₹2,00,000" data-status="Sold" data-date="2025-01-04" data-updated="2025-01-04 20:33" title="View details"><i data-lucide="eye"></i></button>
                                        <a href="edit.php?id=23" class="action-btn" title="Edit"><i data-lucide="pencil"></i></a>
                                        <form method="POST" action="delete.php" class="delete-form" onsubmit="return confirm('Are you sure you want to delete this number?')"><input type="hidden" name="id" value="23"><button type="submit" class="action-btn" title="Delete"><i data-lucide="trash-2"></i></button></form>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="custom-checkbox row-checkbox" data-id="24" role="checkbox" aria-checked="false" aria-label="Select row 24">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                    </div>
                                </td>
                                <td><span class="row-number">5555 6666 77</span></td>
                                <td><span class="badge badge-fancy">Fancy</span></td>
                                <td><span class="badge badge-available">Available</span></td>
                                <td>2025-01-03 13:15</td>
                                <td>
                                    <form method="POST" action="update_status.php" class="status-update-form">
                                        <input type="hidden" name="id" value="24">
                                        <select name="status" class="status-select status-available" onchange="this.form.submit()">
                                            <option value="Available" selected>Available</option>
                                            <option value="Sold">Sold</option>
                                        </select>
                                    </form>
                                </td>
                                <td style="text-align:right;">
                                    <div class="action-btns">
                                        <button type="button" class="action-btn gold" onclick="openViewModal(this)" data-number="5555 6666 77" data-category="Fancy" data-original-price="₹32,000" data-selling-price="₹25,000" data-status="Available" data-date="2025-01-03" data-updated="2025-01-03 13:15" title="View details"><i data-lucide="eye"></i></button>
                                        <a href="edit.php?id=24" class="action-btn" title="Edit"><i data-lucide="pencil"></i></a>
                                        <form method="POST" action="delete.php" class="delete-form" onsubmit="return confirm('Are you sure you want to delete this number?')"><input type="hidden" name="id" value="24"><button type="submit" class="action-btn" title="Delete"><i data-lucide="trash-2"></i></button></form>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="custom-checkbox row-checkbox" data-id="25" role="checkbox" aria-checked="false" aria-label="Select row 25">
                                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                    </div>
                                </td>
                                <td><span class="row-number">8888 9999 00</span></td>
                                <td><span class="badge badge-premium">Premium</span></td>
                                <td><span class="badge badge-available">Available</span></td>
                                <td>2025-01-03 07:42</td>
                                <td>
                                    <form method="POST" action="update_status.php" class="status-update-form">
                                        <input type="hidden" name="id" value="25">
                                        <select name="status" class="status-select status-available" onchange="this.form.submit()">
                                            <option value="Available" selected>Available</option>
                                            <option value="Sold">Sold</option>
                                        </select>
                                    </form>
                                </td>
                                <td style="text-align:right;">
                                    <div class="action-btns">
                                        <button type="button" class="action-btn gold" onclick="openViewModal(this)" data-number="8888 9999 00" data-category="Premium" data-original-price="₹2,75,000" data-selling-price="₹2,30,000" data-status="Available" data-date="2025-01-03" data-updated="2025-01-03 07:42" title="View details"><i data-lucide="eye"></i></button>
                                        <a href="edit.php?id=25" class="action-btn" title="Edit"><i data-lucide="pencil"></i></a>
                                        <form method="POST" action="delete.php" class="delete-form" onsubmit="return confirm('Are you sure you want to delete this number?')"><input type="hidden" name="id" value="25"><button type="submit" class="action-btn" title="Delete"><i data-lucide="trash-2"></i></button></form>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <!-- Empty State (hidden, shown by PHP when no results) -->
                    <div class="empty-state" id="emptyState" style="display:none;">
                        <div class="empty-icon">
                            <i data-lucide="search-x"></i>
                        </div>
                        <h3 class="empty-title">No VIP numbers found</h3>
                        <p class="empty-description">Try adjusting your search or filter criteria</p>
                        <a href="number-status.php" class="btn-gold">
                            <i data-lucide="rotate-ccw"></i> Reset Filters
                        </a>
                    </div>
                </div>

                <!-- Result Count Bar -->
                <div class="result-count-bar">
                    <span class="result-text">25 numbers found</span>
                    <button class="back-to-top-btn" id="scrollToTopBtn">
                        <i data-lucide="arrow-up"></i> Back to top
                    </button>
                </div>
            </section>
        </main>

        <!-- Footer -->
        <footer class="page-footer" style="padding: 24px 32px;">
            <div class="footer-inner">
                <div class="footer-brand">
                    <div class="footer-brand-logo gradient-gold">
                        <span class="footer-brand-logo-text" style="font-size: 12px;">V</span>
                    </div>
                    <span class="footer-brand-name">VIP Number Management System</span>
                </div>
                <div class="footer-meta">
                    <span>v2.4.1</span>
                    <span class="footer-dot"></span>
                    <span>Last updated: Jan 15, 2025</span>
                    <span class="footer-dot"></span>
                    <span>2025 All Rights Reserved</span>
                </div>
            </div>
        </footer>
    </div>

    <!-- View Details Modal -->
    <div class="modal-overlay" id="viewModal">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Number Details</h3>
                <button class="modal-close-btn" id="viewModalClose" aria-label="Close">
                    <i data-lucide="x"></i>
                </button>
            </div>
            <div id="viewModalContent"></div>
        </div>
    </div>

    <script>
        /* =============================================
           Initialize Lucide Icons
        ============================================= */
        document.addEventListener('DOMContentLoaded', function() {
            lucide.createIcons();
            initScrollReveal();
            initEventListeners();
        });

        /* =============================================
           Event Listener Setup
        ============================================= */
        function initEventListeners() {
            // Sidebar toggle (mobile)
            var menuToggle = document.getElementById('menuToggle');
            var sidebarOverlay = document.getElementById('sidebarOverlay');
            if (menuToggle) menuToggle.addEventListener('click', toggleSidebar);
            if (sidebarOverlay) sidebarOverlay.addEventListener('click', toggleSidebar);

            // Select all checkbox
            var selectAllCb = document.getElementById('selectAllCheckbox');
            if (selectAllCb) selectAllCb.addEventListener('click', toggleSelectAll);

            // Individual row checkboxes
            document.querySelectorAll('.row-checkbox').forEach(function(cb) {
                cb.addEventListener('click', function() {
                    toggleRowSelect(this);
                });
            });

            // Bulk cancel button
            var bulkCancelBtn = document.getElementById('bulkCancelBtn');
            if (bulkCancelBtn) bulkCancelBtn.addEventListener('click', clearSelection);

            // Bulk form - collect selected IDs before submit
            var bulkForm = document.getElementById('bulkForm');
            if (bulkForm) {
                bulkForm.addEventListener('submit', function() {
                    var ids = [];
                    document.querySelectorAll('.row-checkbox.checked').forEach(function(cb) {
                        ids.push(cb.dataset.id);
                    });
                    document.getElementById('bulkIds').value = ids.join(',');
                    if (ids.length === 0) {
                        return false;
                    }
                });
            }

            // Dropdown toggles
            var notifBtn = document.getElementById('notifBtn');
            var profileBtn = document.getElementById('profileBtn');
            if (notifBtn) notifBtn.addEventListener('click', function(e) {
                e.stopPropagation();
                toggleDropdown('notifDropdown');
            });
            if (profileBtn) profileBtn.addEventListener('click', function(e) {
                e.stopPropagation();
                toggleDropdown('profileDropdown');
            });

            // Close dropdowns on outside click
            document.addEventListener('click', function(e) {
                if (!e.target.closest('.dropdown-trigger')) {
                    document.querySelectorAll('.dropdown').forEach(function(d) {
                        d.classList.remove('visible');
                    });
                }
            });

            // Filter panel toggle
            var filterToggleBtn = document.getElementById('filterToggleBtn');
            if (filterToggleBtn) filterToggleBtn.addEventListener('click', toggleFilterPanel);

            // Refresh button
            var refreshBtn = document.getElementById('refreshBtn');
            if (refreshBtn) refreshBtn.addEventListener('click', function() {
                location.reload();
            });

            // Modal close
            var viewModalClose = document.getElementById('viewModalClose');
            if (viewModalClose) viewModalClose.addEventListener('click', function() {
                closeModal('viewModal');
            });

            // Close modal on overlay click
            var viewModal = document.getElementById('viewModal');
            if (viewModal) viewModal.addEventListener('click', function(e) {
                if (e.target === this) closeModal('viewModal');
            });

            // Table scroll - show/hide back to top
            var tableScrollWrapper = document.getElementById('tableScrollWrapper');
            if (tableScrollWrapper) {
                tableScrollWrapper.addEventListener('scroll', handleTableScroll);
            }

            // Back to top button
            var scrollToTopBtn = document.getElementById('scrollToTopBtn');
            if (scrollToTopBtn) {
                scrollToTopBtn.addEventListener('click', function() {
                    document.getElementById('tableScrollWrapper').scrollTo({ top: 0, behavior: 'smooth' });
                });
            }

            // Show profile username on larger screens
            updateProfileVisibility();
            window.addEventListener('resize', updateProfileVisibility);
        }

        function updateProfileVisibility() {
            var username = document.querySelector('.profile-username');
            if (username) {
                username.style.display = window.innerWidth >= 640 ? 'inline' : 'none';
            }
        }

        /* =============================================
           Sidebar Toggle
        ============================================= */
        function toggleSidebar() {
            document.getElementById('sidebar').classList.toggle('open');
            document.getElementById('sidebarOverlay').classList.toggle('visible');
        }

        /* =============================================
           Dropdown Toggle
        ============================================= */
        function toggleDropdown(id) {
            var dd = document.getElementById(id);
            var isOpen = dd.classList.contains('visible');
            document.querySelectorAll('.dropdown').forEach(function(d) {
                d.classList.remove('visible');
            });
            if (!isOpen) dd.classList.add('visible');
        }

        /* =============================================
           Filter Panel Toggle
        ============================================= */
        var filterPanelVisible = true;
        function toggleFilterPanel() {
            var panel = document.getElementById('filterPanel');
            filterPanelVisible = !filterPanelVisible;
            panel.style.display = filterPanelVisible ? 'block' : 'none';
        }

        /* =============================================
           Checkbox Selection
        ============================================= */
        function toggleSelectAll() {
            var selectAll = document.getElementById('selectAllCheckbox');
            var isChecked = !selectAll.classList.contains('checked');
            selectAll.classList.toggle('checked', isChecked);
            selectAll.setAttribute('aria-checked', String(isChecked));

            document.querySelectorAll('.row-checkbox').forEach(function(cb) {
                cb.classList.toggle('checked', isChecked);
                cb.setAttribute('aria-checked', String(isChecked));
                cb.closest('tr').classList.toggle('selected-row', isChecked);
            });

            updateBulkBar();
        }

        function toggleRowSelect(el) {
            el.classList.toggle('checked');
            var isChecked = el.classList.contains('checked');
            el.setAttribute('aria-checked', String(isChecked));
            el.closest('tr').classList.toggle('selected-row', isChecked);
            updateBulkBar();
        }

        function clearSelection() {
            var selectAll = document.getElementById('selectAllCheckbox');
            selectAll.classList.remove('checked');
            selectAll.setAttribute('aria-checked', 'false');

            document.querySelectorAll('.row-checkbox').forEach(function(cb) {
                cb.classList.remove('checked');
                cb.setAttribute('aria-checked', 'false');
                cb.closest('tr').classList.remove('selected-row');
            });

            updateBulkBar();
        }

        function updateBulkBar() {
            var checked = document.querySelectorAll('.row-checkbox.checked').length;
            var bar = document.getElementById('bulkBar');
            var count = document.getElementById('bulkCount');

            if (checked > 0) {
                bar.style.display = 'flex';
                count.textContent = checked + ' selected';
            } else {
                bar.style.display = 'none';
            }
        }

        /* =============================================
           View Modal
        ============================================= */
        function openViewModal(btn) {
            var modal = document.getElementById('viewModal');
            var content = document.getElementById('viewModalContent');

            var number = btn.dataset.number;
            var category = btn.dataset.category;
            var origPrice = btn.dataset.originalPrice;
            var sellPrice = btn.dataset.sellingPrice;
            var status = btn.dataset.status;
            var date = btn.dataset.date;
            var updated = btn.dataset.updated;

            var categoryBadgeClass = 'badge-' + category.toLowerCase();
            var statusBadgeClass = status === 'Available' ? 'badge-available' : 'badge-sold';

            content.innerHTML =
                '<div class="modal-number-display">' + number + '</div>' +
                '<div class="modal-details-grid">' +
                    '<div class="modal-detail-item">' +
                        '<span class="modal-detail-label">Category</span>' +
                        '<span class="badge ' + categoryBadgeClass + '">' + category + '</span>' +
                    '</div>' +
                    '<div class="modal-detail-item">' +
                        '<span class="modal-detail-label">Status</span>' +
                        '<span class="badge ' + statusBadgeClass + '">' + status + '</span>' +
                    '</div>' +
                    '<div class="modal-detail-item">' +
                        '<span class="modal-detail-label">Original Price</span>' +
                        '<span class="modal-detail-value">' + origPrice + '</span>' +
                    '</div>' +
                    '<div class="modal-detail-item">' +
                        '<span class="modal-detail-label">Selling Price</span>' +
                        '<span class="modal-detail-value">' + sellPrice + '</span>' +
                    '</div>' +
                    '<div class="modal-detail-item">' +
                        '<span class="modal-detail-label">Date Added</span>' +
                        '<span class="modal-detail-value">' + date + '</span>' +
                    '</div>' +
                    '<div class="modal-detail-item">' +
                        '<span class="modal-detail-label">Last Updated</span>' +
                        '<span class="modal-detail-value">' + updated + '</span>' +
                    '</div>' +
                '</div>';

            modal.classList.add('visible');
            lucide.createIcons();
        }

        function closeModal(id) {
            document.getElementById(id).classList.remove('visible');
        }

        /* =============================================
           Table Scroll - Back to Top
        ============================================= */
        function handleTableScroll() {
            var wrapper = document.getElementById('tableScrollWrapper');
            var btn = document.getElementById('scrollToTopBtn');
            btn.style.display = wrapper.scrollTop > 200 ? 'inline-flex' : 'none';
        }

        /* =============================================
           Scroll Reveal Animation
        ============================================= */
        function initScrollReveal() {
            var observer = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry, index) {
                    if (entry.isIntersecting) {
                        var delay = Array.prototype.indexOf.call(
                            document.querySelectorAll('.reveal'), entry.target
                        ) * 80;
                        setTimeout(function() {
                            entry.target.classList.add('visible');
                        }, delay);
                        observer.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.1 });

            document.querySelectorAll('.reveal').forEach(function(el) {
                observer.observe(el);
            });
        }
        /* =============================================
   Mobile Dropdown Enhancements
============================================= */
(function() {
    // Close all dropdowns when tapping outside on mobile
    document.addEventListener('click', function(e) {
        if (!e.target.closest('.dropdown-trigger')) {
            document.querySelectorAll('.dropdown.visible').forEach(function(d) {
                d.classList.remove('visible');
            });
        }
    });

    // Close any open dropdown when the mobile menu toggle is tapped,
    // preventing dropdown from lingering behind the sidebar overlay
    var menuToggle = document.getElementById('menuToggle');
    if (menuToggle) {
        menuToggle.addEventListener('click', function() {
            document.querySelectorAll('.dropdown.visible').forEach(function(d) {
                d.classList.remove('visible');
            });
        });
    }

    // Close any open dropdown when the sidebar overlay is tapped
    var sidebarOverlay = document.getElementById('sidebarOverlay');
    if (sidebarOverlay) {
        sidebarOverlay.addEventListener('click', function() {
            document.querySelectorAll('.dropdown.visible').forEach(function(d) {
                d.classList.remove('visible');
            });
        });
    }
})();
    </script>
</body>
</html>