<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VIP Number Management — Admin Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
    <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700;900&family=DM+Sans:ital,opsz,wght@0,9..40,300;0,9..40,400;0,9..40,500;0,9..40,600;0,9..40,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../public/css/dashboard.css">
</head>
<body>
    <!-- Gold top accent line -->
    <div class="gold-line"></div>

    <!-- Mobile sidebar overlay -->
    <div class="sidebar-overlay" id="sidebarOverlay" onclick="toggleSidebar()"></div>

    <!-- Sidebar -->
    <aside class="sidebar" id="sidebar">
        <!-- Logo area -->
        <div class="sidebar-brand">
            <div class="brand-row">
                <div class="brand-logo">
                    <span class="brand-logo-letter">V</span>
                </div>
                <div>
                    <h1 class="brand-title">VIP Numbers</h1>
                    <p class="brand-subtitle">Admin Panel</p>
                </div>
            </div>
        </div>

        <!-- Navigation -->
        <nav class="sidebar-nav" aria-label="Main navigation">
            <p class="nav-section-label">Main</p>
            <a href="dashboard.html" class="sidebar-link active" data-section="stats">
                <i data-lucide="layout-dashboard"></i> Dashboard
            </a>
            <a href="add-numbers.html" class="sidebar-link" data-section="numbers">
                <i data-lucide="phone"></i>Add Numbers
            </a>
            <a href="numbers.html" class="sidebar-link" data-section="numberStatus">
                <i data-lucide="check-circle"></i> Number List & Status
            </a>
            <p class="nav-section-label nav-section-label--spaced">Settings</p>
            <a href="profile.html" class="sidebar-link" data-section="profile">
                <i data-lucide="user"></i> Profile
            </a>
            <a href="logout.php" class="sidebar-link">
                <i data-lucide="log-out"></i> Logout
            </a>
        </nav>

        <!-- Sidebar footer -->
        <div class="sidebar-footer">
            <div class="glass-card sidebar-health-card">
                <p class="sidebar-health-title">Inventory Health</p>
                <p class="sidebar-health-text">8,432 numbers available across 5 categories</p>
                <div class="progress-track progress-track--compact" style="margin-top:12px;">
                    <div class="progress-fill progress-fill--gold" data-width="65" style="width:65%"></div>
                </div>
            </div>
        </div>
    </aside>

    <!-- Main content wrapper -->
    <div class="main-wrapper" id="mainWrapper">
        <!-- Top header -->
        <header class="dashboard-header">
            <div class="header-inner">
                <!-- Left: hamburger (mobile) + title -->
                <div class="header-left">
                    <button class="menu-toggle" onclick="toggleSidebar()" aria-label="Toggle menu">
                        <i data-lucide="menu"></i>
                    </button>
                    <div>
                        <h2 class="page-title">Dashboard</h2>
                        <p class="page-subtitle">Welcome back, Admin</p>
                    </div>
                </div>

                <!-- Right: search, notifications, profile -->
                <div class="header-right">
                    <!-- Search -->
                    <div class="search-bar">
                        <i data-lucide="search"></i>
                        <input type="text" id="globalSearch" placeholder="Search numbers..." class="search-input" oninput="filterTable(this.value)">
                    </div>

                    <!-- Notification -->
                    <button class="notification-btn" onclick="toggleDropdown('notifDropdown')" aria-label="Notifications">
                        <i data-lucide="bell"></i>
                        <span class="notification-badge pulse-dot">3</span>
                    </button>

                    <!-- Profile -->
                    <div class="profile-wrapper">
                        <button class="profile-btn" onclick="toggleDropdown('profileDropdown')" aria-label="Profile menu">
                            <div class="profile-avatar">
                                <span>A</span>
                            </div>
                            <span class="profile-name">Admin</span>
                            <i data-lucide="chevron-down" class="profile-chevron"></i>
                        </button>
                        <div class="dropdown" id="profileDropdown">
                            <div class="dropdown-header">
                                <p class="dropdown-header-name">Admin User</p>
                                <p class="dropdown-header-email">admin@vipnumbers.com</p>
                            </div>
                            <a href="profile.html" class="dropdown-item">
                                <i data-lucide="user"></i> My Profile
                            </a>
                            <a href="logout.php" class="dropdown-item">
                                <i data-lucide="log-out"></i> Logout
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Main content -->
        <main class="dashboard-content">

            <!-- Statistics Cards -->
            <section id="stats" class="stats-grid reveal">
                <!-- Total Numbers -->
                <div class="glass-card stat-card">
                    <div class="stat-card-inner">
                        <div class="stat-info">
                            <p class="stat-label">Total Numbers</p>
                            <p id="totalCount" class="stat-value">1,000</p>
                            <div class="stat-trend stat-trend--up">
                                <i data-lucide="trending-up"></i>
                                <span id="totalPercent" class="stat-trend-value">+12.5%</span>
                                <span class="stat-trend-period">vs last month</span>
                            </div>
                        </div>
                        <div class="stat-icon stat-icon--blue">
                            <i data-lucide="phone"></i>
                        </div>
                    </div>
                </div>
                <!-- Available -->
                <div class="glass-card stat-card">
                    <div class="stat-card-inner">
                        <div class="stat-info">
                            <p class="stat-label">Available Numbers</p>
                            <p  id="availableCount" class="stat-value">800</p>
                            <div class="stat-trend stat-trend--up">
                                <i data-lucide="trending-up"></i>
                                <span id="availablePercent" class="stat-trend-value">+8.3%</span>
                                <span class="stat-trend-period">vs last month</span>
                            </div>
                        </div>
                        <div class="stat-icon stat-icon--green">
                            <i data-lucide="check-circle"></i>
                        </div>
                    </div>
                </div>
                <!-- Premium -->
                <div class="glass-card stat-card">
                    <div class="stat-card-inner">
                        <div class="stat-info">
                            <p class="stat-label">Premium Numbers</p>
                            <p id="premiumCount" class="stat-value">356</p>
                            <div class="stat-trend stat-trend--up-gold">
                                <i data-lucide="trending-up"></i>
                                <span id="premiumPercent" class="stat-trend-value">+18.2%</span>
                                <span class="stat-trend-period">vs last month</span>
                            </div>
                        </div>
                        <div class="stat-icon stat-icon--gold">
                            <i data-lucide="crown"></i>
                        </div>
                    </div>
                </div>
                <!-- Reserved -->
                <div class="glass-card stat-card">
                    <div class="stat-card-inner">
                        <div class="stat-info">
                            <p  class="stat-label">Reserved / Featured</p>
                            <p id="reservedCount" class="stat-value">159</p>
                            <div class="stat-trend stat-trend--down">
                                <i data-lucide="trending-down"></i>
                                <span id="reservedPercent" class="stat-trend-value">-3.1%</span>
                                <span class="stat-trend-period">vs last month</span>
                            </div>
                        </div>
                        <div class="stat-icon stat-icon--purple">
                            <i data-lucide="bookmark"></i>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Recently Added Numbers -->
            <section id="numbers" class="reveal">
                <div class="glass-card glass-card--static table-card">
                    <div class="table-header">
                        <div class="table-header-left">
                            <h3 class="section-title">Recently Added Numbers</h3>
                            <p class="section-subtitle">Latest VIP numbers in the inventory</p>
                        </div>
                        <div class="table-header-right">
                            <div class="mobile-search">
                                <i data-lucide="search"></i>
                                <input type="text" placeholder="Search..." class="mobile-search-input" oninput="filterTable(this.value)">
                            </div>
                            <select class="table-filter" onchange="filterByStatus(this.value)">
                                <option value="all">All Status</option>
                                <option value="Available">Available</option>
                                <option value="Sold">Sold</option>
                                <option value="Premium">Premium</option>
                                <option value="Reserved">Reserved</option>
                            </select>
                        </div>
                    </div>
                    <div class="table-container">
                        <table class="data-table" id="numbersTable">
                            <thead>
                                <tr>
                                    <th>VIP Number</th>
                                    <th>Category</th>
                                    <th>Price</th>
                                    <th>Status</th>
                                    <th>Date Added</th>
                                    <th class="cell-actions">Actions</th>
                                </tr>
                            </thead>
                            <tbody id="tableBody">
                                
                            </tbody>
                        </table>
                    </div>
                    <div class="table-footer">
                        <p class="table-footer-info">Showing <span id="showingCount">5</span> of 1,000 numbers</p>
                        <div class="table-footer-actions">
                            <button class="pagination-btn" aria-label="Next page">
                                Show All<i data-lucide="chevron-right"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Charts Row 1: Monthly Added + Monthly Sold -->
            <section id="numberStatus" class="charts-row">
                <div class="glass-card chart-card reveal">
                    <div class="chart-header">
                        <div>
                            <h3 class="chart-title">Monthly Numbers Added</h3>
                            <p class="chart-subtitle">New inventory added each month</p>
                        </div>
                        <div class="chart-icon chart-icon--gold">
                            <i data-lucide="trending-up"></i>
                        </div>
                    </div>
                    <div class="chart-body">
                        <canvas id="monthlyAddedChart"></canvas>
                    </div>
                </div>
                <div class="glass-card chart-card reveal">
                    <div class="chart-header">
                        <div>
                            <h3 class="chart-title">Numbers Sold (Monthly)</h3>
                            <p class="chart-subtitle">Monthly sales tracking</p>
                        </div>
                        <div class="chart-icon chart-icon--blue">
                            <i data-lucide="bar-chart-3"></i>
                        </div>
                    </div>
                    <div class="chart-body">
                        <canvas id="monthlySoldChart"></canvas>
                    </div>
                </div>
            </section>

            <!-- Charts Row 2: Donuts + Comparison -->
            <section class="charts-row" style="grid-template-columns: 1fr;">
                <div style="display:grid; grid-template-columns: 1fr; gap:20px;">
                    <div style="display:grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap:20px;">
                        <!-- Status Distribution Donut -->
                        <div class="glass-card chart-card reveal">
                            <div style="margin-bottom:16px;">
                                <h3 class="chart-title">Status Distribution</h3>
                                <p class="chart-subtitle">Number status breakdown</p>
                            </div>
                            <div class="donut-wrapper">
                                <canvas id="statusDonutChart"></canvas>
                                <div class="donut-center">
                                    <p id="totalCount2" class="donut-center-value">1,000</p>
                                    <p class="donut-center-label">Total</p>
                                </div>
                            </div>
                            <div class="legend-grid">
                                <div class="legend-item">
                                    <span class="legend-dot legend-dot--green"></span>
                                    <span class="legend-label">Available</span>
                                </div>
                                <div class="legend-item">
                                    <span class="legend-dot legend-dot--red"></span>
                                    <span class="legend-label">Sold</span>
                                </div>
                                <div class="legend-item">
                                    <span class="legend-dot legend-dot--gold"></span>
                                    <span class="legend-label">Premium</span>
                                </div>
                                <div class="legend-item">
                                    <span class="legend-dot legend-dot--blue"></span>
                                    <span class="legend-label">Reserved</span>
                                </div>
                            </div>
                        </div>

                        <!-- Category Distribution Donut -->
                        <div class="glass-card chart-card reveal">
                            <div style="margin-bottom:16px;">
                                <h3 class="chart-title">Category Distribution</h3>
                                <p class="chart-subtitle">Numbers by category</p>
                            </div>
                            <div class="donut-wrapper">
                                <canvas id="categoryDonutChart"></canvas>
                                <div class="donut-center">
                                    <p class="donut-center-value">5</p>
                                    <p class="donut-center-label">Categories</p>
                                </div>
                            </div>
                            <div class="legend-grid">
                                <div class="legend-item">
                                    <span class="legend-dot" style="background:#E8CC6E;"></span>
                                    <span class="legend-label">Fancy</span>
                                </div>
                                <div class="legend-item">
                                    <span class="legend-dot" style="background:#D4AF37;"></span>
                                    <span class="legend-label">Premium</span>
                                </div>
                                <div class="legend-item">
                                    <span class="legend-dot" style="background:#4A9DFF;"></span>
                                    <span class="legend-label">Platinum</span>
                                </div>
                                <div class="legend-item">
                                    <span class="legend-dot" style="background:#A78BFA;"></span>
                                    <span class="legend-label">Golden</span>
                                </div>
                                <div class="legend-item">
                                    <span class="legend-dot" style="background:#F472B6;"></span>
                                    <span class="legend-label">VIP</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Available vs Sold Bar -->
                    <div class="glass-card chart-card reveal">
                        <div class="chart-header">
                            <div>
                                <h3 class="chart-title">Available vs Sold</h3>
                                <p class="chart-subtitle">Monthly comparison</p>
                            </div>
                        </div>
                        <div class="chart-body chart-body--tall">
                            <canvas id="comparisonChart"></canvas>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Inventory Overview -->
            <section class="reveal">
                <div class="glass-card glass-card--static" style="padding:20px;">
                    <div style="margin-bottom:20px;">
                        <h3 class="section-title">Inventory Overview</h3>
                        <p class="section-subtitle">Current stock status across all categories</p>
                    </div>
                    <div class="inventory-grid">
                        <!-- Available Numbers -->
                        <div class="inventory-item">
                            <div class="inventory-item-header">
                                <span class="inventory-item-label">Available Numbers</span>
                                <span id="availableCounts"class="inventory-item-value">0</span>
                            </div>
                            <div class="progress-track">
                                <div id="availableBars" class="progress-fill progress-fill--green" ></div>
                            </div>
                            <p id="availablePercents" class="inventory-item-note">65.6% of total inventory</p>
                        </div>
                        <!-- Sold Numbers -->
                        <div class="inventory-item">
                            <div class="inventory-item-header">
                                <span class="inventory-item-label">Sold Numbers</span>
                                <span id="soldCounts" class="inventory-item-value">3,156</span>
                            </div>
                            <div class="progress-track">
                                <div id="soldBars" class="progress-fill progress-fill--red" data-width="24.6"></div>
                            </div>
                            <p id="soldPercents" class="inventory-item-note">24.6% of total inventory</p>
                        </div>
                        <!-- Premium Numbers -->
                        <div class="inventory-item">
                            <div class="inventory-item-header">
                                <span class="inventory-item-label">Premium Numbers</span>
                                <span id="premiumCounts" class="inventory-item-value">3,156</span>
                            </div>
                            <div class="progress-track">
                                <div id="premiumBars" class="progress-fill progress-fill--gold" data-width="24.6"></div>
                            </div>
                            <p id="premiumPercents" class="inventory-item-note">24.6% of total inventory</p>
                        </div>
                        <!-- Reserved Numbers -->
                        <div class="inventory-item">
                            <div class="inventory-item-header">
                                <span class="inventory-item-label">Reserved Numbers</span>
                                <span id="reservedCounts" class="inventory-item-value">1,259</span>
                            </div>
                            <div class="progress-track">
                                <div id="reservedBars" class="progress-fill progress-fill--blue" data-width="9.8"></div>
                            </div>
                            <p id="reservedPercents" class="inventory-item-note">9.8% of total inventory</p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Recent Activity + Quick Actions -->
            <section class="bottom-row">
                <!-- Recent Activity -->

                <div class="glass-card glass-card--static" style="padding:20px;">

                    <div style="margin-bottom:20px;">
                        <h3 class="section-title">Recent Activity</h3>
                        <p class="section-subtitle">Latest administrative actions</p>
                    </div>

                    <div id="activityList">

                        <div class="text-center text-white/40 py-6">
                            Loading recent activity...
                        </div>

                    </div>

                </div>


                <!-- Quick Actions -->
                <div class="glass-card glass-card--static" style="padding:20px;">
                    <div style="margin-bottom:20px;">
                        <h3 class="section-title">Quick Actions</h3>
                        <p class="section-subtitle">Common management tasks</p>
                    </div>
                    <div class="quick-actions-grid">
                        <div class="quick-btn" onclick="openModal('addModal')">
                            <div class="icon-wrap"><i data-lucide="plus"></i></div>
                            <span>Add New Number</span>
                        </div>
                        <a href="import.php" class="quick-btn">
                            <div class="icon-wrap"><i data-lucide="upload"></i></div>
                            <span>Import Numbers</span>
                        </a>
                        <a href="export.php" class="quick-btn">
                            <div class="icon-wrap"><i data-lucide="download"></i></div>
                            <span>Export Numbers</span>
                        </a>
                        <a href="bulkedit.php" class="quick-btn">
                            <div class="icon-wrap"><i data-lucide="pencil"></i></div>
                            <span>Bulk Edit</span>
                        </a>
                        <a href="reports.php" class="quick-btn">
                            <div class="icon-wrap"><i data-lucide="file-bar-chart"></i></div>
                            <span>Reports</span>
                        </a>
                        <a href="settings.html" class="quick-btn">
                            <div class="icon-wrap"><i data-lucide="settings"></i></div>
                            <span>Settings</span>
                        </a>
                    </div>
                </div>
            </section>
        </main>
    </div>

    <!-- Add Number Modal -->
    <div class="modal-overlay" id="addModal">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Add New Number</h3>
                <button class="modal-close" onclick="closeModal('addModal')" aria-label="Close modal">
                    <i data-lucide="x"></i>
                </button>
            </div>
            <form onsubmit="handleAddNumber(event)">
                <div class="form-group">
                    <label class="form-label" for="addNumber">VIP Number</label>
                    <input type="text" id="addNumber" class="input-field" placeholder="e.g. 9999001122" required>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label" for="addCategory">Category</label>
                        <select id="addCategory" class="input-field" required>
                            <option value="">Select category</option>
                            <option value="Fancy">Fancy</option>
                            <option value="Premium">Premium</option>
                            <option value="Business">Business</option>
                            <option value="Lucky">Lucky</option>
                            <option value="VIP">VIP</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="addPrice">Price (₹)</label>
                        <input type="number" id="addPrice" class="input-field" placeholder="e.g. 45000" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label" for="addStatus">Status</label>
                        <select id="addStatus" class="input-field" required>
                            <option value="Available">Available</option>
                            <option value="Premium">Premium</option>
                            <option value="Reserved">Reserved</option>
                            <option value="Sold">Sold</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="addDate">Date Added</label>
                        <input type="date" id="addDate" class="input-field" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" onclick="closeModal('addModal')">Cancel</button>
                    <button type="submit" class="btn btn-primary">Add Number</button>
                </div>
            </form>
        </div>
    </div>

    <!-- View Number Modal -->
    <div class="modal-overlay" id="viewModal">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Number Details</h3>
                <button class="modal-close" onclick="closeModal('viewModal')" aria-label="Close modal">
                    <i data-lucide="x"></i>
                </button>
            </div>
            <div id="viewModalBody"></div>
            <div class="modal-footer">
                <button class="btn btn-secondary" onclick="closeModal('viewModal')">Close</button>
            </div>
        </div>
    </div>

    <script>
        // ========================================
        // Initialize Lucide Icons
        // ========================================
        lucide.createIcons();

        // ========================================
        // Sidebar Toggle
        // ========================================
        function toggleSidebar() {
            var sidebar = document.getElementById('sidebar');
            var overlay = document.getElementById('sidebarOverlay');
            sidebar.classList.toggle('open');
            overlay.classList.toggle('show');
        }

        // ========================================
        // Dropdown Toggle
        // ========================================
        function toggleDropdown(id) {
            var dropdown = document.getElementById(id);
            // Close all other dropdowns first
            document.querySelectorAll('.dropdown.show').forEach(function(d) {
                if (d.id !== id) d.classList.remove('show');
            });
            dropdown.classList.toggle('show');
        }

        // Close dropdowns on outside click
        document.addEventListener('click', function(e) {
            if (!e.target.closest('.profile-wrapper') && !e.target.closest('.notification-btn')) {
                document.querySelectorAll('.dropdown.show').forEach(function(d) {
                    d.classList.remove('show');
                });
            }
        });

        // ========================================
        // Table Filtering
        // ========================================
        function filterTable(query) {
            query = query.toLowerCase().trim();
            var rows = document.querySelectorAll('#tableBody tr');
            var visibleCount = 0;
            rows.forEach(function(row) {
                var number = (row.dataset.number || '').toLowerCase();
                var category = (row.dataset.category || '').toLowerCase();
                var status = (row.dataset.status || '').toLowerCase();
                var match = !query || number.includes(query) || category.includes(query) || status.includes(query);
                row.style.display = match ? '' : 'none';
                if (match) visibleCount++;
            });
            var countEl = document.getElementById('showingCount');
            if (countEl) countEl.textContent = visibleCount;
        }

        function filterByStatus(status) {
            var rows = document.querySelectorAll('#tableBody tr');
            var visibleCount = 0;
            rows.forEach(function(row) {
                var match = status === 'all' || row.dataset.status === status;
                row.style.display = match ? '' : 'none';
                if (match) visibleCount++;
            });
            var countEl = document.getElementById('showingCount');
            if (countEl) countEl.textContent = visibleCount;
        }

        // ========================================
        // Modal Functions
        // ========================================
        function openModal(id) {
            document.getElementById(id).classList.add('show');
            document.body.style.overflow = 'hidden';
            lucide.createIcons();
        }

        function closeModal(id) {
            document.getElementById(id).classList.remove('show');
            document.body.style.overflow = '';
        }

        // Close modal on overlay click
        document.querySelectorAll('.modal-overlay').forEach(function(overlay) {
            overlay.addEventListener('click', function(e) {
                if (e.target === overlay) {
                    overlay.classList.remove('show');
                    document.body.style.overflow = '';
                }
            });
        });

        // ========================================
        // View Number Details
        // ========================================
        function viewNumber(btn) {
            var row = btn.closest('tr');
            var number = row.dataset.number;
            var category = row.dataset.category;
            var price = row.dataset.price;
            var status = row.dataset.status;
            var date = row.dataset.date;

            var statusClass = 'badge-' + status.toLowerCase();
            var formattedPrice = '₹' + parseInt(price).toLocaleString('en-IN');

            var body = document.getElementById('viewModalBody');
            body.innerHTML = '<div style="text-align:center; margin-bottom:24px;">' +
                '<p style="font-family:var(--font-display); font-size:32px; font-weight:700; letter-spacing:0.05em;">' + number + '</p>' +
                '<span class="badge ' + statusClass + '" style="margin-top:12px;"><span class="badge-dot"></span>' + status + '</span>' +
                '</div>' +
                '<div style="display:grid; grid-template-columns:1fr 1fr; gap:16px;">' +
                '<div style="padding:12px 16px; border-radius:10px; background:rgba(255,255,255,0.03); border:1px solid rgba(255,255,255,0.05);">' +
                '<p style="font-size:11px; color:rgba(255,255,255,0.4); text-transform:uppercase; letter-spacing:0.05em;">Category</p>' +
                '<p style="font-size:15px; font-weight:600; color:#fff; margin-top:4px;">' + category + '</p>' +
                '</div>' +
                '<div style="padding:12px 16px; border-radius:10px; background:rgba(255,255,255,0.03); border:1px solid rgba(255,255,255,0.05);">' +
                '<p style="font-size:11px; color:rgba(255,255,255,0.4); text-transform:uppercase; letter-spacing:0.05em;">Price</p>' +
                '<p style="font-size:15px; font-weight:600; color:#fff; margin-top:4px;">' + formattedPrice + '</p>' +
                '</div>' +
                '<div style="padding:12px 16px; border-radius:10px; background:rgba(255,255,255,0.03); border:1px solid rgba(255,255,255,0.05); grid-column:1/-1;">' +
                '<p style="font-size:11px; color:rgba(255,255,255,0.4); text-transform:uppercase; letter-spacing:0.05em;">Date Added</p>' +
                '<p style="font-size:15px; font-weight:600; color:#fff; margin-top:4px;">' + date + '</p>' +
                '</div>' +
                '</div>';

            openModal('viewModal');
        }

        // ========================================
        // Handle Add Number Form
        // ========================================
        function handleAddNumber(e) {
            e.preventDefault();
            closeModal('addModal');
            // In a real app, this would submit to a server
            alert('Number added successfully! (Demo)');
            e.target.reset();
        }

        // ========================================
        // Scroll Reveal Animation
        // ========================================
        var revealObserver = new IntersectionObserver(function(entries) {
            entries.forEach(function(entry) {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                }
            });
        }, { threshold: 0.1, rootMargin: '0px 0px -40px 0px' });

        document.querySelectorAll('.reveal').forEach(function(el) {
            revealObserver.observe(el);
        });

        // ========================================
        // Progress Bar Animation
        // ========================================
        var progressObserver = new IntersectionObserver(function(entries) {
            entries.forEach(function(entry) {
                if (entry.isIntersecting) {
                    var fills = entry.target.querySelectorAll('.progress-fill[data-width]');
                    fills.forEach(function(fill) {
                        var width = fill.dataset.width;
                        setTimeout(function() {
                            fill.style.width = width + '%';
                        }, 200);
                    });
                }
            });
        }, { threshold: 0.2 });

        document.querySelectorAll('.progress-track').forEach(function(track) {
            progressObserver.observe(track);
        });

        // ========================================
        // Set today's date as default for add form
        // ========================================
        var dateInput = document.getElementById('addDate');
        if (dateInput) {
            var today = new Date().toISOString().split('T')[0];
            dateInput.value = today;
        }
    </script>
    <script>
        async function loadDashboardStats(){

            const response = await fetch("../api/dashboard_stats.php");
            const stats = await response.json();

            updateStatCard("total", stats.total);
            updateStatCard("available", stats.available);
            updateStatCard("premium", stats.premium);
            updateStatCard("reserved", stats.reserved);

            document.getElementById("totalCount2").textContent=stats.total.count.toLocaleString("en-IN");
        }
        function updateStatCard(prefix, data) {

            document.getElementById(prefix + "Count").textContent = data.count;

            const percent = document.getElementById(prefix + "Percent");

            const trend = percent.parentElement;

            const icon = trend.querySelector("[data-lucide]");

            percent.textContent =
                (data.percent >= 0 ? "+" : "") + data.percent + "%";

            // Remove previous trend classes
            trend.classList.remove(
                "stat-trend--up",
                "stat-trend--down",
                "stat-trend--up-gold"
            );

            if (data.percent > 0) {

                
                trend.classList.add("stat-trend--up");
                

                icon.setAttribute("data-lucide", "trending-up");

            }
            else if (data.percent < 0) {

                trend.classList.add("stat-trend--down");

                icon.setAttribute("data-lucide", "trending-down");

            }
            else {

                // 0%
                trend.classList.add("stat-trend--neutral");

                icon.setAttribute("data-lucide","minus");

            }

            lucide.createIcons();
        }
    let numbers = [];

        function formatPrice(price){
            return "₹" + Number(price).toLocaleString("en-IN");
        }

        function renderTable(data){

            const tbody = document.getElementById("tableBody");

            tbody.innerHTML = "";

            data.forEach(function(n){

                let badgeClass = "";

                switch(n.status){

                    case "Available":
                        badgeClass="badge-available";
                        break;

                    case "Sold":
                        badgeClass="badge-sold";
                        break;

                    case "Reserved":
                        badgeClass="badge-reserved";
                        break;

                    default:
                        badgeClass="badge-premium";

                }

                tbody.innerHTML += `
                <tr
                    data-status="${n.status}"
                    data-number="${n.number}"
                    data-category="${n.category}"
                    data-price="${n.price}"
                    data-date="${n.date}"
                >

                    <td class="cell-number">${n.number}</td>

                    <td class="cell-category">${n.category}</td>

                    <td class="cell-price">${formatPrice(n.price)}</td>

                    <td>
                        <span class="badge ${badgeClass}">
                            <span class="badge-dot"></span>
                            ${n.status}
                        </span>
                    </td>

                    <td class="cell-date">${n.date}</td>

                    <td>

                        <div class="action-buttons">

                            <button
                                class="action-btn"
                                onclick="viewNumber(this)">
                                <i data-lucide="eye"></i>
                            </button>

                            <a
                                href="update-number.php?id=${n.id}"
                                class="action-btn">
                                <i data-lucide="edit-3"></i>
                            </a>

                            <a
                                href="../api/delete_number.php?id=${n.id}"
                                class="action-btn action-btn--danger"
                                onclick="return confirm('Delete this number?')">
                                <i data-lucide="trash-2"></i>
                            </a>

                        </div>

                    </td>

                </tr>
                `;

            });

            document.getElementById("showingCount").innerText=data.length;

            lucide.createIcons();

        }
        async function loadRecentNumbers(){

            try{

                const response = await fetch("../api/dashboard_numbers.php");

                const data = await response.json();

                if(data.success){

                    numbers = data.numbers;

                    renderTable(numbers);

                }

            }catch(error){

                console.error(error);

            }

        }
    loadDashboardStats();
    loadRecentNumbers();
    </script>
    <script>
        const monthlyAddedChart = new Chart(
document.getElementById("monthlyAddedChart"),
{
    type:"line",
    data:{
        labels:[],
        datasets:[{
            label:"Numbers Added",
            data:[],
            borderColor:"#D4AF37",
            backgroundColor:"rgba(212,175,55,.08)",
            fill:true,
            tension:.4
        }]
    },
    options:{
        responsive:true,
        maintainAspectRatio:false
    }
});
const monthlySoldChart = new Chart(
document.getElementById("monthlySoldChart"),
{
    type:"bar",
    data:{
        labels:[],
        datasets:[{
            label:"Numbers Sold",
            data:[],
            backgroundColor:"rgba(74,157,255,.6)",
            borderColor:"#4A9DFF",
            borderWidth:1
        }]
    },
    options:{
        responsive:true,
        maintainAspectRatio:false
    }
});
const statusChart=new Chart(document.getElementById("statusDonutChart"),{

    type:"doughnut",

    data:{
        labels:["Available","Sold","Reserved"],
        datasets:[{
            data:[],
            backgroundColor:[
                "#4ADE80",
                "#F87171",
                "#60B5FF"
            ]
        }]
    },

    options:{
        responsive:true,
        maintainAspectRatio:false,
        cutout:"72%"
    }

});
const categoryChart=new Chart(document.getElementById("categoryDonutChart"),{

    type:"doughnut",

    data:{
        labels:[],
        datasets:[{

            data:[],

            backgroundColor:[
                "#D4AF37",
                "#4A9DFF",
                "#A78BFA",
                "#F472B6",
                "#4ADE80"
            ]

        }]
    },

    options:{
        responsive:true,
        maintainAspectRatio:false,
        cutout:"72%"
    }

});
const comparisonChart=new Chart(document.getElementById("comparisonChart"),{

    type:"bar",

    data:{

        labels:[],

        datasets:[

            {

                label:"Available",

                data:[],

                backgroundColor:"rgba(74,157,255,.5)",

                borderColor:"#4A9DFF"

            },

            {

                label:"Sold",

                data:[],

                backgroundColor:"rgba(212,175,55,.5)",

                borderColor:"#D4AF37"

            }

        ]

    },

    options:{
        responsive:true,
        maintainAspectRatio:false
    }

});
async function loadDistribution(){

    const res=await fetch("../api/dashboard_distribution.php");

    const data=await res.json();

    // Status

    statusChart.data.datasets[0].data=[

        data.status.Available,
        data.status.Sold,
        data.status.Reserved

    ];

    statusChart.update();

    // Category

    categoryChart.data.labels=data.category.labels;

    categoryChart.data.datasets[0].data=data.category.data;

    categoryChart.update();

    // Comparison

    comparisonChart.data.labels=data.comparison.months;

    comparisonChart.data.datasets[0].data=data.comparison.available;

    comparisonChart.data.datasets[1].data=data.comparison.sold;

    comparisonChart.update();

}
async function loadInventory() {

    try {

        const response = await fetch("../api/dashboard_inventory.php");
        const data = await response.json();

        console.log(data);

        // Available
        
        document.getElementById("availableCounts").textContent = data.available.count;
        document.getElementById("availablePercents").textContent = data.available.percent + "% of total inventory";
        document.getElementById("availableBars").style.width = data.available.percent + "%";

        // Sold
        
        document.getElementById("soldCounts").textContent = data.sold.count;
        document.getElementById("soldPercents").textContent = data.sold.percent + "% of total inventory";
        document.getElementById("soldBars").style.width = data.sold.percent + "%";

        // Premium
        

        document.getElementById("premiumCounts").textContent = data.premium.count;
        document.getElementById("premiumPercents").textContent = data.premium.percent + "% of total inventory";
        document.getElementById("premiumBars").style.width = data.premium.percent + "%";

        // Reserved
        

        document.getElementById("reservedCounts").textContent = data.reserved.count;
        document.getElementById("reservedPercents").textContent = data.reserved.percent + "% of total inventory";
        document.getElementById("reservedBars").style.width = data.reserved.percent + "%";

    } catch (e) {
        console.error(e);
    }

}
async function loadCharts(){

    const res = await fetch("../api/dashboard_charts.php");

    const data = await res.json();

    monthlyAddedChart.data.labels = data.months;
    monthlyAddedChart.data.datasets[0].data = data.added;
    monthlyAddedChart.update();

    monthlySoldChart.data.labels = data.months;
    monthlySoldChart.data.datasets[0].data = data.sold;
    monthlySoldChart.update();

}

loadDashboardStats();
loadRecentNumbers();
loadCharts();
loadDistribution();
loadInventory();
    </script>
    <script>
    async function loadActivity(){

    try{

        const response=await fetch("../api/dashboard_activity.php");

        const activities=await response.json();

        const container=document.getElementById("activityList");

        container.innerHTML="";

        activities.forEach(activity=>{

            let color="timeline-dot--blue";

            switch(activity.color){

                case "green":
                    color="timeline-dot--green";
                    break;

                case "red":
                    color="timeline-dot--red";
                    break;

                case "purple":
                    color="timeline-dot--purple";
                    break;

                case "blue":
                    color="timeline-dot--blue";
                    break;

                default:
                    color="timeline-dot--gold";

            }

            container.innerHTML+=`

                <div class="timeline-item">

                    <div class="timeline-dot ${color}"></div>

                    <div>

                        <p class="timeline-title">
                            ${activity.title}
                        </p>

                        <p class="timeline-description">
                            ${activity.description}
                        </p>

                        <p class="timeline-time">
                            ${timeAgo(activity.created_at)}
                        </p>

                    </div>

                </div>

            `;

        });

    }catch(err){

        console.error(err);

    }

}
function timeAgo(date){

    const seconds=Math.floor((new Date()-new Date(date))/1000);

    const intervals=[
        {label:"year",seconds:31536000},
        {label:"month",seconds:2592000},
        {label:"day",seconds:86400},
        {label:"hour",seconds:3600},
        {label:"minute",seconds:60}
    ];

    for(const interval of intervals){

        const count=Math.floor(seconds/interval.seconds);

        if(count>=1){

            return count+" "+interval.label+(count>1?"s":"")+" ago";

        }

    }

    return "Just now";

}
loadActivity();
    </script>
</html>