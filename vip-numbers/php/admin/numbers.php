<?php require_once "../api/auth.php"; ?>
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
            <a href="dashboard.php" class="sidebar-link">
                <i data-lucide="layout-dashboard"></i> Dashboard
            </a>
            <a href="add-numbers.php" class="sidebar-link">
                <i data-lucide="phone"></i>Add Numbers
            </a>
            <a href="numbers.php" class="sidebar-link active">
                <i data-lucide="check-circle"></i> Number List & Status
            </a>
            <p class="sidebar-nav-label">Settings</p>
            <a href="profile.php" class="sidebar-link">
                <i data-lucide="user"></i> Profile
            </a>
            <a href="../api/logout.php" class="sidebar-link">
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
                    <form action="#" class="header-search-box" id="headerSearchForm">
                        <i data-lucide="search" class="header-search-icon"></i>
                        <input type="text" name="search" id="headerSearchInput" placeholder="Quick search..." class="header-search-input">
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
                            <a href="profile.php" class="dropdown-item"><i data-lucide="user"></i> My Profile</a>
                            <a href="../api/logout.php" class="dropdown-item"><i data-lucide="log-out"></i> Logout</a>
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
                            <p class="stat-value" id="statTotalCount">—</p>
                            <div class="stat-trend" id="statTotalTrend"></div>
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
                            <p class="stat-value" id="statAvailableCount">—</p>
                            <div class="stat-trend" id="statAvailableTrend"></div>
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
                            <p class="stat-value" id="statSoldCount">—</p>
                            <div class="stat-trend" id="statSoldTrend"></div>
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
                            <p class="stat-value" id="statPremiumCount">—</p>
                            <div class="stat-trend" id="statPremiumTrend"></div>
                        </div>
                        <div class="stat-icon" style="background:rgba(212,175,55,0.1);">
                            <i data-lucide="crown" style="color:var(--accent);"></i>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Filters Section -->
            <section class="glass-card glass-card--static filter-section reveal" id="filterPanel">
                <form action="#" id="filterForm">
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
                <button type="button" class="bulk-btn gold" id="bulkAvailableBtn">Mark Available</button>
                <button type="button" class="bulk-btn" id="bulkSoldBtn">Mark Sold</button>
                <button type="button" class="bulk-btn red" id="bulkDeleteBtn">Delete</button>
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
                        <tbody id="numbersTableBody">
                            <!-- rows injected dynamically from get_all_numbers.php -->
                        </tbody>
                    </table>

                    <!-- Empty State -->
                    <div class="empty-state" id="emptyState" style="display:none;">
                        <div class="empty-icon">
                            <i data-lucide="search-x"></i>
                        </div>
                        <h3 class="empty-title">No VIP numbers found</h3>
                        <p class="empty-description">Try adjusting your search or filter criteria</p>
                        <button type="button" class="btn-gold" id="resetFiltersBtn">
                            <i data-lucide="rotate-ccw"></i> Reset Filters
                        </button>
                    </div>
                </div>

                <!-- Result Count Bar -->
                <div class="result-count-bar">
                    <span class="result-text" id="resultCountText">Loading…</span>
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

    <!-- Toast container -->
    <div class="toast-container" id="toastContainer"></div>

    <script>
        /* =============================================
           Config
        ============================================= */
        var STATS_API   = '../api/dashboard_stats.php';
        var LIST_API    = '../api/get_all_numbers.php';
        var DELETE_API  = '../api/delete_number.php';
        var EDIT_PAGE   = 'update-number.php';
        var MARK_AVAILABLE_API = '../api/mark_available.php';
        var MARK_SOLD_API      = '../api/mark_sold.php';
        var BULK_DELETE_API    = '../api/delete_numbers.php';

        /* =============================================
           Initialize
        ============================================= */
        document.addEventListener('DOMContentLoaded', function() {
            lucide.createIcons();
            initScrollReveal();
            initEventListeners();
            initTableDelegation();
            loadStats();
            loadNumbers();
        });

        /* =============================================
           Event Listener Setup
        ============================================= */
        function initEventListeners() {
            var menuToggle = document.getElementById('menuToggle');
            var sidebarOverlay = document.getElementById('sidebarOverlay');
            if (menuToggle) menuToggle.addEventListener('click', toggleSidebar);
            if (sidebarOverlay) sidebarOverlay.addEventListener('click', toggleSidebar);

            var selectAllCb = document.getElementById('selectAllCheckbox');
            if (selectAllCb) selectAllCb.addEventListener('click', toggleSelectAll);

            var bulkCancelBtn = document.getElementById('bulkCancelBtn');
            if (bulkCancelBtn) bulkCancelBtn.addEventListener('click', clearSelection);

            var bulkAvailableBtn = document.getElementById('bulkAvailableBtn');
            var bulkSoldBtn = document.getElementById('bulkSoldBtn');
            var bulkDeleteBtn = document.getElementById('bulkDeleteBtn');
            if (bulkAvailableBtn) bulkAvailableBtn.addEventListener('click', function() { performBulkAction('available'); });
            if (bulkSoldBtn) bulkSoldBtn.addEventListener('click', function() { performBulkAction('sold'); });
            if (bulkDeleteBtn) bulkDeleteBtn.addEventListener('click', function() { performBulkAction('delete'); });

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

            document.addEventListener('click', function(e) {
                if (!e.target.closest('.dropdown-trigger')) {
                    document.querySelectorAll('.dropdown').forEach(function(d) {
                        d.classList.remove('visible');
                    });
                }
            });

            var filterToggleBtn = document.getElementById('filterToggleBtn');
            if (filterToggleBtn) filterToggleBtn.addEventListener('click', toggleFilterPanel);

            var refreshBtn = document.getElementById('refreshBtn');
            if (refreshBtn) refreshBtn.addEventListener('click', function() {
                loadStats();
                loadNumbers();
            });

            var viewModalClose = document.getElementById('viewModalClose');
            if (viewModalClose) viewModalClose.addEventListener('click', function() {
                closeModal('viewModal');
            });

            var viewModal = document.getElementById('viewModal');
            if (viewModal) viewModal.addEventListener('click', function(e) {
                if (e.target === this) closeModal('viewModal');
            });

            var tableScrollWrapper = document.getElementById('tableScrollWrapper');
            if (tableScrollWrapper) {
                tableScrollWrapper.addEventListener('scroll', handleTableScroll);
            }

            var scrollToTopBtn = document.getElementById('scrollToTopBtn');
            if (scrollToTopBtn) {
                scrollToTopBtn.addEventListener('click', function() {
                    document.getElementById('tableScrollWrapper').scrollTo({ top: 0, behavior: 'smooth' });
                });
            }

            var resetFiltersBtn = document.getElementById('resetFiltersBtn');
            if (resetFiltersBtn) resetFiltersBtn.addEventListener('click', resetFilters);

            var filterForm = document.getElementById('filterForm');
            if (filterForm) filterForm.addEventListener('submit', function(e) {
                e.preventDefault();
                document.getElementById('headerSearchInput').value = document.getElementById('filterSearch').value;
                loadNumbers();
            });

            var headerSearchForm = document.getElementById('headerSearchForm');
            if (headerSearchForm) headerSearchForm.addEventListener('submit', function(e) {
                e.preventDefault();
                document.getElementById('filterSearch').value = document.getElementById('headerSearchInput').value;
                loadNumbers();
            });

            updateProfileVisibility();
            window.addEventListener('resize', updateProfileVisibility);
        }

        function updateProfileVisibility() {
            var username = document.querySelector('.profile-username');
            if (username) {
                username.style.display = window.innerWidth >= 640 ? 'inline' : 'none';
            }
        }

        function resetFilters() {
            document.getElementById('filterSearch').value = '';
            document.getElementById('filterCategory').value = 'all';
            document.getElementById('filterStatus').value = 'all';
            document.getElementById('filterSort').value = 'latest';
            document.getElementById('headerSearchInput').value = '';
            loadNumbers();
        }

        /* =============================================
           Sidebar / Dropdowns / Filter Panel
        ============================================= */
        function toggleSidebar() {
            document.getElementById('sidebar').classList.toggle('open');
            document.getElementById('sidebarOverlay').classList.toggle('visible');
        }

        function toggleDropdown(id) {
            var dd = document.getElementById(id);
            var isOpen = dd.classList.contains('visible');
            document.querySelectorAll('.dropdown').forEach(function(d) {
                d.classList.remove('visible');
            });
            if (!isOpen) dd.classList.add('visible');
        }

        var filterPanelVisible = true;
        function toggleFilterPanel() {
            var panel = document.getElementById('filterPanel');
            filterPanelVisible = !filterPanelVisible;
            panel.style.display = filterPanelVisible ? 'block' : 'none';
        }

        /* =============================================
           Stats Cards
        ============================================= */
        function renderTrend(elId, percent) {
            var el = document.getElementById(elId);
            if (!el) return;
            var p = Number(percent) || 0;
            var icon = p > 0 ? 'trending-up' : (p < 0 ? 'trending-down' : 'minus');
            var color = p > 0 ? 'var(--green)' : (p < 0 ? 'var(--red)' : 'rgba(255,255,255,0.4)');
            var sign = p > 0 ? '+' : '';
            el.innerHTML =
                '<i data-lucide="' + icon + '" style="color:' + color + ';"></i>' +
                '<span class="stat-trend-value" style="color:' + color + ';">' + sign + p + '%</span>' +
                '<span class="stat-trend-period">vs last month</span>';
        }

        function loadStats() {
            fetch(STATS_API, { cache: 'no-store' })
                .then(function(res) { return res.json(); })
                .then(function(data) {
                    if (!data || !data.total) return;
                    document.getElementById('statTotalCount').textContent = data.total.count;
                    document.getElementById('statAvailableCount').textContent = data.available.count;
                    document.getElementById('statSoldCount').textContent = data.reserved.count;
                    document.getElementById('statPremiumCount').textContent = data.premium.count;

                    renderTrend('statTotalTrend', data.total.percent);
                    renderTrend('statAvailableTrend', data.available.percent);
                    renderTrend('statSoldTrend', data.reserved.percent);
                    renderTrend('statPremiumTrend', data.premium.percent);
                    lucide.createIcons();
                })
                .catch(function() {
                    showToast('Failed to load dashboard stats', 'error');
                });
        }

        /* =============================================
           Table: load + render
        ============================================= */
        function formatMobile(num) {
            if (!num) return '';
            var digits = String(num).replace(/\D/g, '');
            if (digits.length !== 10) return digits;
            return digits.slice(0, 4) + ' ' + digits.slice(4, 8) + ' ' + digits.slice(8);
        }

        function formatCurrency(val) {
            var n = Number(val) || 0;
            return '\u20B9' + n.toLocaleString('en-IN');
        }

        function formatDateTime(str) {
            if (!str) return '—';
            var d = new Date(str.replace(' ', 'T'));
            if (isNaN(d)) return str;
            return d.toLocaleString('en-IN', { day: 'numeric', month: 'short', year: 'numeric' }) + ' ' +
                   d.toLocaleTimeString('en-IN', { hour: '2-digit', minute: '2-digit' });
        }

        function formatDateOnly(str) {
            if (!str) return '—';
            var d = new Date(str.replace(' ', 'T'));
            if (isNaN(d)) return str;
            return d.toISOString().slice(0, 10);
        }

        function categoryBadgeClass(cat) {
            var map = { VIP: 'badge-vip', Premium: 'badge-premium', Fancy: 'badge-fancy' };
            return map[cat] || 'badge-fancy';
        }

        function buildQueryParams() {
            var params = new URLSearchParams();
            var search = document.getElementById('filterSearch').value.trim();
            var category = document.getElementById('filterCategory').value;
            var status = document.getElementById('filterStatus').value;
            var sort = document.getElementById('filterSort').value;
            if (search) params.set('search', search);
            if (category && category !== 'all') params.set('category', category);
            if (status && status !== 'all') params.set('status', status);
            if (sort) params.set('sort', sort);
            return params.toString();
        }

        function loadNumbers() {
            var qs = buildQueryParams();
            fetch(LIST_API + (qs ? '?' + qs : ''), { cache: 'no-store' })
                .then(function(res) { return res.json(); })
                .then(function(data) {
                    if (!data.success) {
                        showToast(data.message || 'Could not load numbers', 'error');
                        return;
                    }
                    renderTable(data.numbers);
                })
                .catch(function() {
                    showToast('Failed to reach the server', 'error');
                });
        }

        function renderTable(numbers) {
            var tbody = document.getElementById('numbersTableBody');
            var emptyState = document.getElementById('emptyState');
            var table = document.getElementById('numbersTable');
            var resultText = document.getElementById('resultCountText');

            tbody.innerHTML = '';

            if (!numbers || numbers.length === 0) {
                table.style.display = 'none';
                emptyState.style.display = 'flex';
                resultText.textContent = '0 numbers found';
                clearSelection();
                return;
            }

            table.style.display = '';
            emptyState.style.display = 'none';
            resultText.textContent = numbers.length + ' number' + (numbers.length === 1 ? '' : 's') + ' found';

            numbers.forEach(function(num) {
                var tr = document.createElement('tr');
                tr.setAttribute('data-id', num.id);

                var statusClass = num.status === 'Available' ? 'status-available' : 'status-sold';
                var badgeClass = num.status === 'Available' ? 'badge-available' : 'badge-sold';

                tr.innerHTML =
                    '<td><div class="custom-checkbox row-checkbox" data-id="' + num.id + '" role="checkbox" aria-checked="false" aria-label="Select row"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg></div></td>' +
                    '<td><span class="row-number">' + formatMobile(num.mobile_number) + '</span></td>' +
                    '<td><span class="badge ' + categoryBadgeClass(num.category) + '">' + (num.category || '—') + '</span></td>' +
                    '<td><span class="badge ' + badgeClass + '">' + num.status + '</span></td>' +
                    '<td>' + formatDateTime(num.updated_at) + '</td>' +
                    '<td>' +
                        '<select class="status-select ' + statusClass + '" data-id="' + num.id + '">' +
                            '<option value="Available"' + (num.status === 'Available' ? ' selected' : '') + '>Available</option>' +
                            '<option value="Sold"' + (num.status === 'Sold' ? ' selected' : '') + '>Sold</option>' +
                        '</select>' +
                    '</td>' +
                    '<td style="text-align:right;">' +
                        '<div class="action-btns">' +
                            '<button type="button" class="action-btn gold view-btn" data-id="' + num.id + '" title="View details"><i data-lucide="eye"></i></button>' +
                            '<a href="' + EDIT_PAGE + '?id=' + num.id + '" class="action-btn" title="Edit"><i data-lucide="pencil"></i></a>' +
                            '<button type="button" class="action-btn delete-btn" data-id="' + num.id + '" title="Delete"><i data-lucide="trash-2"></i></button>' +
                        '</div>' +
                    '</td>';

                // stash the raw record on the row for the view modal
                tr._record = num;
                tbody.appendChild(tr);
            });

            lucide.createIcons();
        }

        // Delegated listeners — attached ONCE to the tbody instead of per-row,
        // so re-rendering the table never leaves stale/duplicate handlers around.
        function initTableDelegation() {
            var tbody = document.getElementById('numbersTableBody');
            if (!tbody) return;

            tbody.addEventListener('click', function(e) {
                var checkboxEl = e.target.closest('.row-checkbox');
                if (checkboxEl) {
                    toggleRowSelect(checkboxEl);
                    return;
                }

                var viewBtn = e.target.closest('.view-btn');
                if (viewBtn) {
                    var tr = viewBtn.closest('tr');
                    openViewModal(tr._record);
                    return;
                }

                var deleteBtn = e.target.closest('.delete-btn');
                if (deleteBtn) {
                    var id = deleteBtn.getAttribute('data-id');
                    if (!confirm('Are you sure you want to delete this number?')) return;

                    deleteBtn.disabled = true;

                    fetch(DELETE_API + '?id=' + encodeURIComponent(id), { cache: 'no-store' })
                        .then(function(res) { return res.json(); })
                        .then(function(data) {
                            if (data.success) {
                                showToast(data.message || 'Number deleted', 'success');
                                var row = deleteBtn.closest('tr');
                                if (row) row.remove();
                                updateResultCountAfterRemoval();
                                loadStats();
                            } else {
                                showToast(data.message || 'Could not delete number', 'error');
                                deleteBtn.disabled = false;
                            }
                        })
                        .catch(function() {
                            showToast('Failed to reach the server', 'error');
                            deleteBtn.disabled = false;
                        });
                    return;
                }
            });

            tbody.addEventListener('change', function(e) {
                var sel = e.target.closest('.status-select');
                if (!sel) return;

                var id = sel.getAttribute('data-id');
                var newStatus = sel.value;
                var api = newStatus === 'Available' ? MARK_AVAILABLE_API : MARK_SOLD_API;
                var formData = new FormData();
                formData.append('ids[]', id);

                sel.disabled = true;

                fetch(api, { method: 'POST', body: formData })
                    .then(function(res) { return res.json(); })
                    .then(function(data) {
                        if (data.success) {
                            showToast(data.message || 'Status updated', 'success');
                            loadStats();
                            loadNumbers();
                        } else {
                            showToast(data.message || 'Could not update status', 'error');
                            loadNumbers();
                        }
                    })
                    .catch(function() {
                        showToast('Failed to reach the server', 'error');
                        sel.disabled = false;
                    });
            });
        }

        function updateResultCountAfterRemoval() {
            var tbody = document.getElementById('numbersTableBody');
            var remaining = tbody.querySelectorAll('tr').length;
            var resultText = document.getElementById('resultCountText');
            resultText.textContent = remaining + ' number' + (remaining === 1 ? '' : 's') + ' found';
            if (remaining === 0) {
                document.getElementById('numbersTable').style.display = 'none';
                document.getElementById('emptyState').style.display = 'flex';
            }
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
            if (selectAll) {
                selectAll.classList.remove('checked');
                selectAll.setAttribute('aria-checked', 'false');
            }
            document.querySelectorAll('.row-checkbox').forEach(function(cb) {
                cb.classList.remove('checked');
                cb.setAttribute('aria-checked', 'false');
                cb.closest('tr').classList.remove('selected-row');
            });
            updateBulkBar();
        }

        function getSelectedIds() {
            var ids = [];
            document.querySelectorAll('.row-checkbox.checked').forEach(function(cb) {
                ids.push(cb.dataset.id);
            });
            return ids;
        }

        function updateBulkBar() {
            var checked = getSelectedIds().length;
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
           Bulk Actions
        ============================================= */
        function performBulkAction(action) {
            var ids = getSelectedIds();
            if (ids.length === 0) {
                showToast('Select at least one number first', 'error');
                return;
            }

            var api, confirmMsg, successVerb;
            if (action === 'available') {
                api = MARK_AVAILABLE_API;
                confirmMsg = 'Mark ' + ids.length + ' number(s) as Available?';
            } else if (action === 'sold') {
                api = MARK_SOLD_API;
                confirmMsg = 'Mark ' + ids.length + ' number(s) as Sold?';
            } else if (action === 'delete') {
                api = BULK_DELETE_API;
                confirmMsg = 'Delete ' + ids.length + ' number(s)? This cannot be undone.';
            } else {
                return;
            }

            if (!confirm(confirmMsg)) return;

            var formData = new FormData();
            ids.forEach(function(id) { formData.append('ids[]', id); });

            fetch(api, { method: 'POST', body: formData })
                .then(function(res) { return res.json(); })
                .then(function(data) {
                    if (data.success) {
                        showToast(data.message || 'Done', 'success');
                        clearSelection();
                        loadStats();
                        loadNumbers();
                    } else {
                        showToast(data.message || 'Bulk action failed', 'error');
                    }
                })
                .catch(function() { showToast('Failed to reach the server', 'error'); });
        }

        /* =============================================
           View Modal
        ============================================= */
        function openViewModal(num) {
            var modal = document.getElementById('viewModal');
            var content = document.getElementById('viewModalContent');

            var badgeClass = categoryBadgeClass(num.category);
            var statusBadgeClass = num.status === 'Available' ? 'badge-available' : 'badge-sold';

            content.innerHTML =
                '<div class="modal-number-display">' + formatMobile(num.mobile_number) + '</div>' +
                '<div class="modal-details-grid">' +
                    '<div class="modal-detail-item">' +
                        '<span class="modal-detail-label">Category</span>' +
                        '<span class="badge ' + badgeClass + '">' + num.category + '</span>' +
                    '</div>' +
                    '<div class="modal-detail-item">' +
                        '<span class="modal-detail-label">Status</span>' +
                        '<span class="badge ' + statusBadgeClass + '">' + num.status + '</span>' +
                    '</div>' +
                    '<div class="modal-detail-item">' +
                        '<span class="modal-detail-label">Original Price</span>' +
                        '<span class="modal-detail-value">' + formatCurrency(num.original_price) + '</span>' +
                    '</div>' +
                    '<div class="modal-detail-item">' +
                        '<span class="modal-detail-label">Selling Price</span>' +
                        '<span class="modal-detail-value">' + formatCurrency(num.selling_price) + '</span>' +
                    '</div>' +
                    '<div class="modal-detail-item">' +
                        '<span class="modal-detail-label">Date Added</span>' +
                        '<span class="modal-detail-value">' + formatDateOnly(num.created_at) + '</span>' +
                    '</div>' +
                    '<div class="modal-detail-item">' +
                        '<span class="modal-detail-label">Last Updated</span>' +
                        '<span class="modal-detail-value">' + formatDateTime(num.updated_at) + '</span>' +
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
           Toasts
        ============================================= */
        function showToast(message, type) {
            type = type || 'info';
            var container = document.getElementById('toastContainer');
            var toast = document.createElement('div');
            toast.className = 'toast ' + type;
            var iconMap = { success: 'check-circle', error: 'x-circle', info: 'info' };
            toast.innerHTML = '<i data-lucide="' + iconMap[type] + '" style="width:18px;height:18px;flex-shrink:0;"></i><span>' + message + '</span>';
            container.appendChild(toast);
            lucide.createIcons();
            requestAnimationFrame(function() { toast.classList.add('show'); });
            setTimeout(function() {
                toast.classList.remove('show');
                setTimeout(function() { toast.remove(); }, 400);
            }, 3000);
        }

        /* =============================================
           Scroll Reveal Animation
        ============================================= */
        function initScrollReveal() {
            var observer = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('visible');
                        observer.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.1 });
            document.querySelectorAll('.reveal').forEach(function(el) { observer.observe(el); });
        }

        /* =============================================
           Mobile Dropdown Enhancements
        ============================================= */
        (function() {
            document.addEventListener('click', function(e) {
                if (!e.target.closest('.dropdown-trigger')) {
                    document.querySelectorAll('.dropdown.visible').forEach(function(d) {
                        d.classList.remove('visible');
                    });
                }
            });

            var menuToggle = document.getElementById('menuToggle');
            if (menuToggle) {
                menuToggle.addEventListener('click', function() {
                    document.querySelectorAll('.dropdown.visible').forEach(function(d) {
                        d.classList.remove('visible');
                    });
                });
            }

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