<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add VIP Number — Admin Dashboard</title>
    <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700;900&family=DM+Sans:ital,opsz,wght@0,9..40,300;0,9..40,400;0,9..40,500;0,9..40,600;0,9..40,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../public/css/add-numbers.css">
</head>
<body>
    <div class="gold-line"></div>
    <div class="sidebar-overlay" id="sidebarOverlay" onclick="toggleSidebar()"></div>

    <!-- Sidebar -->
    <aside class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <div class="sidebar-brand">
                <div class="brand-logo">
                    <span class="brand-logo-letter">V</span>
                </div>
                <div>
                    <h1 class="brand-title">VIP Numbers</h1>
                    <p class="brand-subtitle">Admin Panel</p>
                </div>
            </div>
        </div>
        <nav class="sidebar-nav" aria-label="Main navigation">
            <p class="nav-section-label">Main</p>
            <a href="dashboard.php" class="sidebar-link">
                <i data-lucide="layout-dashboard"></i> Dashboard
            </a>
            <a href="add-numbers.php" class="sidebar-link active">
                <i data-lucide="phone"></i> Add Numbers
            </a>
            <a href="numbers.php" class="sidebar-link">
                <i data-lucide="check-circle"></i> Number List
            </a>
            <p class="nav-section-label nav-section-label--spaced">Settings</p>
            <a href="profile.php" class="sidebar-link">
                <i data-lucide="user"></i> Profile
            </a>
            <a href="logout.php" class="sidebar-link">
                <i data-lucide="log-out"></i> Logout
            </a>
        </nav>
        <div class="sidebar-footer">
            <div class="glass-card sidebar-health-card">
                <p class="sidebar-health-title">Inventory Health</p>
                <p class="sidebar-health-text">8,432 numbers available across 5 categories</p>
                <div class="progress-track progress-track--thin" style="margin-top:12px;">
                    <div class="progress-fill" style="width:65%"></div>
                </div>
            </div>
        </div>
    </aside>

    <!-- Main Content -->
    <div class="main-wrapper" id="mainWrapper">
        <!-- Top Header -->
        <header class="dashboard-header">
            <div class="header-inner">
                <div class="header-left">
                    <button type="button" class="menu-toggle" onclick="toggleSidebar()" aria-label="Toggle menu">
                        <i data-lucide="menu"></i>
                    </button>
                    <div class="header-title-area">
                        <h2 class="page-title">Add New Number</h2>
                        <p class="page-subtitle">Create a new VIP number record</p>
                    </div>
                </div>
                <div class="header-right">
                    <!-- Notification -->
                    <div style="position:relative;">
                        <button type="button" class="notif-btn" onclick="toggleDropdown('notifDropdown')" aria-label="Notifications">
                            <i data-lucide="bell"></i>
                            <span class="notif-badge pulse-dot">3</span>
                        </button>
                        <div class="dropdown dropdown--wide" id="notifDropdown">
                            <p class="dropdown-title">Notifications</p>
                            <div class="dropdown-item">
                                <div class="dropdown-item-icon dropdown-item-icon--green">
                                    <i data-lucide="plus-circle"></i>
                                </div>
                                <div class="dropdown-item-content">
                                    <div class="dropdown-item-title">New number added successfully</div>
                                    <div class="dropdown-item-time">2 minutes ago</div>
                                </div>
                            </div>
                            <div class="dropdown-item">
                                <div class="dropdown-item-icon dropdown-item-icon--gold">
                                    <i data-lucide="star"></i>
                                </div>
                                <div class="dropdown-item-content">
                                    <div class="dropdown-item-title">VIP number 9999XXXXXX sold</div>
                                    <div class="dropdown-item-time">1 hour ago</div>
                                </div>
                            </div>
                            <div class="dropdown-item">
                                <div class="dropdown-item-icon dropdown-item-icon--green">
                                    <i data-lucide="trending-up"></i>
                                </div>
                                <div class="dropdown-item-content">
                                    <div class="dropdown-item-title">Inventory crossed 8,000 mark</div>
                                    <div class="dropdown-item-time">3 hours ago</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Profile -->
                    <div style="position:relative;">
                        <button type="button" class="profile-btn" onclick="toggleDropdown('profileDropdown')" aria-label="Profile menu">
                            <div class="profile-avatar"><span>A</span></div>
                            <span class="profile-name">Admin</span>
                            <span class="profile-chevron"><i data-lucide="chevron-down"></i></span>
                        </button>
                        <div class="dropdown" id="profileDropdown">
                            <div class="dropdown-header">
                                <div class="dropdown-user-name">Admin User</div>
                                <div class="dropdown-header-email">admin@vipnumbers.com</div>
                            </div>
                            <div class="dropdown-item" onclick="window.location.href='profile.php'">
                                <i data-lucide="user"></i> My Profile
                            </div>
                            <div class="dropdown-item" onclick="window.location.href='dashboard.php'">
                                <i data-lucide="settings"></i> Settings
                            </div>
                            <div class="dropdown-divider"></div>
                            <div class="dropdown-item dropdown-item--danger" onclick="window.location.href='logout.php'">
                                <i data-lucide="log-out"></i> Logout
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Dashboard Content -->
        <div class="dashboard-content">
            <div class="page-layout">
                <!-- Form Area -->  
                <form id="addNumberForm" method="post">
                <div class="form-area">
                    <!-- Number Information -->
                    <section class="glass-card form-section reveal">
                        <div class="section-header">
                            <div class="icon-box icon-box--gold">
                                <i data-lucide="phone"></i>
                            </div>
                            <span class="section-title">Number Information</span>
                            <div class="section-line"></div>
                        </div>
                        <div class="form-grid">
                            <div class="form-group">
                                <label class="form-label" for="phoneNumber">
                                    <span class="form-label-icon"><i data-lucide="hash"></i></span>
                                    Phone Number
                                </label>
                                <div class="input-wrapper">
                                    <span class="input-prefix">+91</span>
                                    <input type="tel" name="mobile_number" id="phoneNumber" class="input-field input-field--prefixed" placeholder="Enter 10-digit number" maxlength="10" oninput="updatePreview()">
                                </div>
                                <p class="error-msg" id="phoneError">Please enter a valid 10-digit phone number</p>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="category">
                                    <span class="form-label-icon"><i data-lucide="tag"></i></span>
                                    Category
                                </label>
                                <select name="category" id="category" class="input-field" onchange="updatePreview()">
                                    <option value="">Select category</option>
                                    <option value="VIP">VIP</option>
                                    <option value="Premium">Premium</option>
                                    <option value="Fancy">Fancy</option>
                                    <option value="Golden">Golden</option>
                                    <option value="Platinum">Platinum</option>
                                </select>
                            </div>
                            
                        </div>
                    </section>

                    <!-- Highlight Ranges -->
                    <section class="glass-card form-section reveal">
                        <div class="section-header">
                            <div class="icon-box icon-box--green">
                                <i data-lucide="highlighter"></i>
                            </div>
                            <span class="section-title">Highlight Ranges</span>
                            <div class="section-line"></div>
                        </div>
                        <p class="section-description">Specify which digit positions to highlight in the preview (e.g., positions 5-8 for a repeating pattern)</p>
                        <div class="highlight-rows" id="highlightRows">
                            <div class="highlight-row" data-index="0">
                                <div class="highlight-row-grid">
                                    <div>
                                        <p class="range-label">Start Position</p>
                                        <input type="number" class="highlight-input" placeholder="1" min="1" max="10" oninput="updateRangePreview(0)">
                                        <p class="range-error" id="rangeError0">Invalid position</p>
                                    </div>
                                    <div>
                                        <p class="range-label">End Position</p>
                                        <input type="number" class="highlight-input" placeholder="10" min="1" max="10" oninput="updateRangePreview(0)">
                                    </div>
                                    <div>
                                        <p class="range-label">Preview</p>
                                        <div class="range-preview range-preview--empty" id="rangePreview0">Enter positions</div>
                                    </div>
                                    <div class="delete-col">
                                        <button type="button" class="delete-row-btn" onclick="removeHighlightRow(0)" aria-label="Remove range">
                                            <i data-lucide="trash-2"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="add-range-btn" onclick="addHighlightRow()">
                            <i data-lucide="plus"></i> Add Another Range
                        </button>
                    </section>

                    <!-- Pricing -->
                    <section class="glass-card form-section reveal">
                        <div class="section-header">
                            <div class="icon-box icon-box--blue">
                                <i data-lucide="indian-rupee"></i>
                            </div>
                            <span class="section-title">Pricing</span>
                            <div class="section-line"></div>
                        </div>
                        <div class="pricing-grid">
                            <div class="form-group">
                                <label class="form-label" for="originalPrice">
                                    <span class="form-label-icon"><i data-lucide="tag"></i></span>
                                    Original Price
                                </label>
                                <div class="input-wrapper">
                                    <span class="input-prefix" style="left:14px;">&#8377;</span>
                                    <input type="number" name="original_price" id="originalPrice" class="input-field input-field--currency" placeholder="0" oninput="updatePricing()">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="discount">
                                    <span class="form-label-icon"><i data-lucide="percent"></i></span>
                                    Discount (%)
                                </label>
                                <input type="number" name="discount" id="discount" class="input-field" placeholder="0" min="0" max="100" oninput="updatePricing()">
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="sellingPrice">
                                    <span class="form-label-icon"><i data-lucide="wallet"></i></span>
                                    Marked Price
                                </label>
                                <div class="input-wrapper">
                                    <span class="input-prefix" style="left:14px;">&#8377;</span>
                                    <input type="number" name="selling_price" id="sellingPrice" class="input-field input-field--currency input-field--gold-readonly" placeholder="Auto-calculated" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="pricing-formula-bar">
                            <i data-lucide="info"></i>
                            <span class="pricing-formula-text" id="formulaText">Marked Price = Original Price + (Original Price × Discount%)</span>                        </div>
                    </section>

                    <!-- Live Preview -->
                    <section class="preview-card reveal">
                        <div class="preview-card-inner">
                            <div class="preview-header">
                                <div class="preview-label">
                                    <i data-lucide="eye"></i>
                                    <span class="preview-label-text">Live Preview</span>
                                </div>
                                <div class="preview-badges" id="previewBadges">
                                    <span class="badge badge--available">Available</span>
                                    <span id="preview-category" 
      class="badge badge--default"
      style="
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 6px 14px;
        border-radius: 999px;
        background: rgba(222, 234, 90, 0.12);
        color: var(--accent);
        border: 1px solid var(--accent);
        font-size: 13px;
        font-weight: 600;
        letter-spacing: 0.2px;
        white-space: nowrap;
      ">
    Not Selected
</span>  </div>
                                
                            </div>
                            <div class="preview-number-area">
                                <div class="preview-number" id="previewNumber">+91 XXXXXXXXXX</div>
                            </div>
                            <div class="preview-number-sum" id="previewNumberSum">Sum = --</div>
                            
                            <div class="preview-prices">
                                <div class="price-block">
                                    <p class="price-label">Original</p>
                                    <span class="price-original" id="previewOriginal">&#8377;0</span>
                                </div>
                                <div class="price-block">
                                    <p class="price-label">Discount</p>
                                    <span class="price-discount-value" id="previewDiscount">0%</span>
                                </div>
                                <div class="price-block price-block--selling">
                                    <p class="price-label price-label--gold">Selling Price</p>
                                    <span class="price-selling shimmer-text" id="previewSelling">&#8377;0</span>
                                </div>
                            </div>
                            <div class="preview-highlights" id="previewHighlights" style="display:none;">
                                <p class="preview-highlights-label">Highlighted Digits</p>
                                <div class="highlight-tags" id="highlightTags"></div>
                            </div>
                        </div>
                    </section>

                    <!-- Actions -->
                    <div class="form-actions reveal">
                        <button type="submit" class="btn-gold" onclick="saveNumber(event)">
                            <i data-lucide="save"></i> Save Number
                        </button>
                        <button type="button" class="btn-outline" onclick="resetForm()">
                            <i data-lucide="rotate-ccw"></i> Reset
                        </button>
                        <button type="button" class="btn-ghost" onclick="window.location.href='numbers.php'">
                            Cancel
                        </button>
                    </div>
                </div>
                </form>
                <!-- Right Sidebar -->
                <div class="right-sidebar">
                    <!-- Summary -->
                    <div class="glass-card form-section reveal">
                        <div class="card-header">
                            <div class="icon-box icon-box--gold">
                                <i data-lucide="bar-chart-3"></i>
                            </div>
                            <span class="card-title">Quick Summary</span>
                        </div>
                        <div class="summary-list">
                            <div class="summary-item">
                                <div class="summary-item-left">
                                    <div class="icon-box icon-box--green" style="width:28px;height:28px;">
                                        <i data-lucide="check-circle"></i>
                                    </div>
                                    <span class="summary-item-label">Available</span>
                                </div>
                                <span class="summary-item-value summary-item-value--green">8,432</span>
                            </div>
                            <div class="summary-item">
                                <div class="summary-item-left">
                                    <div class="icon-box icon-box--blue" style="width:28px;height:28px;">
                                        <i data-lucide="clock"></i>
                                    </div>
                                    <span class="summary-item-label">Reserved</span>
                                </div>
                                <span class="summary-item-value summary-item-value--white">234</span>
                            </div>
                            <div class="summary-item">
                                <div class="summary-item-left">
                                    <div class="icon-box icon-box--pink" style="width:28px;height:28px;">
                                        <i data-lucide="shopping-bag"></i>
                                    </div>
                                    <span class="summary-item-label">Sold Today</span>
                                </div>
                                <span class="summary-item-value summary-item-value--gold">18</span>
                            </div>
                        </div>
                    </div>

                    <!-- Recent Numbers -->
                    <div class="glass-card form-section reveal">
                        <div class="card-header">
                            <div class="icon-box icon-box--blue">
                                <i data-lucide="clock"></i>
                            </div>
                            <span class="card-title">Recently Added</span>
                        </div>
                        <div class="recent-list">
                            <div class="recent-item">
                                <span class="recent-item-number">98765 43210</span>
                                <div style="text-align:right;">
                                    <span class="badge badge--vip badge--sm">VIP</span>
                                    <p class="recent-item-meta">5 min ago</p>
                                </div>
                            </div>
                            <div class="recent-item">
                                <span class="recent-item-number">99999 88888</span>
                                <div style="text-align:right;">
                                    <span class="badge badge--premium badge--sm">Premium</span>
                                    <p class="recent-item-meta">22 min ago</p>
                                </div>
                            </div>
                            <div class="recent-item">
                                <span class="recent-item-number">88888 77777</span>
                                <div style="text-align:right;">
                                    <span class="badge badge--fancy badge--sm">Fancy</span>
                                    <p class="recent-item-meta">1 hr ago</p>
                                </div>
                            </div>
                            <div class="recent-item">
                                <span class="recent-item-number">77777 66666</span>
                                <div style="text-align:right;">
                                    <span class="badge badge--available badge--sm">Available</span>
                                    <p class="recent-item-meta">2 hr ago</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Tips -->
                    <div class="glass-card form-section tips-card reveal">
                        <div class="tips-card-header">
                            <i data-lucide="lightbulb"></i>
                            <span class="tips-card-title">Pro Tips</span>
                        </div>
                        <div class="tips-list">
                            <div class="tip-item">
                                <div class="tip-bullet"></div>
                                <p class="tip-text">Numbers with repeating digits (like 9999) sell 3x faster than random patterns.</p>
                            </div>
                            <div class="tip-item">
                                <div class="tip-bullet"></div>
                                <p class="tip-text">Golden series (786XXX) are highly sought after in specific regions.</p>
                            </div>
                            <div class="tip-item">
                                <div class="tip-bullet"></div>
                                <p class="tip-text">Set a 10-15% discount to attract buyers without undervaluing inventory.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // =============================================
        // Initialize Lucide Icons
        // =============================================
        lucide.createIcons();

        // =============================================
        // Sidebar Toggle
        // =============================================
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebarOverlay');
            sidebar.classList.toggle('is-open');
            overlay.classList.toggle('is-open');
            document.body.style.overflow = sidebar.classList.contains('is-open') ? 'hidden' : '';
        }

        // =============================================
        // Dropdown Toggle
        // =============================================
        function toggleDropdown(id) {
            const dropdown = document.getElementById(id);
            const allDropdowns = document.querySelectorAll('.dropdown');
            allDropdowns.forEach(d => {
                if (d.id !== id) d.classList.remove('show');
            });
            dropdown.classList.toggle('show');
        }

        // Close dropdowns on outside click
        document.addEventListener('click', function(e) {
            if (!e.target.closest('.notif-btn') && !e.target.closest('.profile-btn') && !e.target.closest('.dropdown')) {
                document.querySelectorAll('.dropdown').forEach(d => d.classList.remove('show'));
            }
        });

        // Close sidebar on resize to desktop
        window.addEventListener('resize', function() {
            if (window.innerWidth >= 1024) {
                const sidebar = document.getElementById('sidebar');
                const overlay = document.getElementById('sidebarOverlay');
                sidebar.classList.remove('is-open');
                overlay.classList.remove('is-open');
                document.body.style.overflow = '';
            }
        });

        // =============================================
        // Number Type Segment
        // =============================================
        function setNumberType(btn) {
            document.querySelectorAll('.segment-btn').forEach(b => b.classList.remove('is-active'));
            btn.classList.add('is-active');
            updatePreview();
        }

        // =============================================
        // Highlight Ranges
        // =============================================
        let highlightCount = 1;

        function addHighlightRow() {
            const container = document.getElementById('highlightRows');
            const index = highlightCount;
            const row = document.createElement('div');
            row.className = 'highlight-row';
            row.dataset.index = index;
            row.innerHTML = `
                <div class="highlight-row-grid">
                    <div>
                        <p class="range-label">Start Position</p>
                        <input type="number" class="highlight-input" placeholder="1" min="1" max="10" oninput="updateRangePreview(${index})">
                        <p class="range-error" id="rangeError${index}">Invalid position</p>
                    </div>
                    <div>
                        <p class="range-label">End Position</p>
                        <input type="number" class="highlight-input" placeholder="10" min="1" max="10" oninput="updateRangePreview(${index})">
                    </div>
                    <div>
                        <p class="range-label">Preview</p>
                        <div class="range-preview range-preview--empty" id="rangePreview${index}">Enter positions</div>
                    </div>
                    <div class="delete-col">
                        <button type="button" class="delete-row-btn" onclick="removeHighlightRow(${index})" aria-label="Remove range">
                            <i data-lucide="trash-2"></i>
                        </button>
                    </div>
                </div>
            `;
            container.appendChild(row);
            lucide.createIcons();
            highlightCount++;
        }

        function removeHighlightRow(index) {
            const row = document.querySelector(`.highlight-row[data-index="${index}"]`);
            if (document.querySelectorAll('.highlight-row').length <= 1) return;
            row.classList.add('is-removing');
            setTimeout(() => row.remove(), 300);
            setTimeout(() => updatePreview(), 350);
        }

        function updateRangePreview(index) {
            const row = document.querySelector(`.highlight-row[data-index="${index}"]`);
            if (!row) return;
            const inputs = row.querySelectorAll('.highlight-input');
            const start = parseInt(inputs[0].value);
            const end = parseInt(inputs[1].value);
            const preview = document.getElementById(`rangePreview${index}`);
            const error = document.getElementById(`rangeError${index}`);

            let valid = true;
            if (inputs[0].value && (start < 1 || start > 10)) valid = false;
            if (inputs[1].value && (end < 1 || end > 10)) valid = false;
            if (start && end && start > end) valid = false;

            inputs.forEach(inp => inp.classList.toggle('has-error', !valid));
            if (error) error.classList.toggle('is-visible', !valid);

            if (start && end && valid) {
                const phone = document.getElementById('phoneNumber').value || 'XXXXXXXXXX';
                let html = '';
                for (let i = 0; i < phone.length; i++) {
                    const pos = i + 1;
                    if (pos >= start && pos <= end) {
                        html += `<span class="highlight-gold">${phone[i]}</span>`;
                    } else {
                        html += phone[i];
                    }
                }
                preview.innerHTML = html;
                preview.classList.remove('range-preview--empty');
            } else {
                preview.textContent = 'Enter positions';
                preview.classList.add('range-preview--empty');
            }
            updatePreview();
        }

        // =============================================
        // Pricing
        // =============================================
        function updatePricing() {
            const original = parseFloat(document.getElementById('originalPrice').value) || 0;
            const discount = parseFloat(document.getElementById('discount').value) || 0;
            const marked = original + (original * discount / 100);
            document.getElementById('sellingPrice').value = marked > 0 ? marked.toFixed(0) : '';
            updatePreview();
        }   

        // =============================================
        // Preview Update
        // =============================================
        function updatePreview() {
            const phone = document.getElementById('phoneNumber').value;
            const category = document.getElementById('category').value;
            const original = parseFloat(document.getElementById('originalPrice').value) || 0;
            const discount = parseFloat(document.getElementById('discount').value) || 0;
            const selling = original - (original * discount / 100);
            const activeType = document.querySelector('.segment-btn.is-active');
            const numberType = activeType ? activeType.dataset.type : 'normal';

            // Build number display
            let displayNumber = '+91 ';
            if (phone) {
                // Collect all highlight ranges
                const ranges = [];
                document.querySelectorAll('.highlight-row').forEach(row => {
                    const inputs = row.querySelectorAll('.highlight-input');
                    const s = parseInt(inputs[0].value);
                    const e = parseInt(inputs[1].value);
                    if (s && e && s >= 1 && e <= 10 && s <= e) {
                        ranges.push({ start: s, end: e });
                    }
                });

                for (let i = 0; i < phone.length; i++) {
                    const pos = i + 1;
                    const isHighlighted = ranges.some(r => pos >= r.start && pos <= r.end);
                    if (isHighlighted) {
                        displayNumber += `<span class="highlight-gold">${phone[i]}</span>`;
                    } else {
                        displayNumber += phone[i];
                    }
                    if ((i + 1) % 5 === 0 && i < phone.length - 1) displayNumber += ' ';
                }
            } else {
                displayNumber += 'XXXXXXXXXX';
            }
            document.getElementById('previewNumber').innerHTML = displayNumber;

            
            // Prices
            // Prices — Selling = what user entered, Original = marked up total
            const marked = original + (original * discount / 100);
            document.getElementById('previewOriginal').innerHTML = `&#8377;${marked > 0 ? marked.toLocaleString('en-IN') : '0'}`;
            document.getElementById('previewDiscount').textContent = `${discount}%`;
            document.getElementById('previewSelling').innerHTML = `&#8377;${original > 0 ? original.toLocaleString('en-IN') : '0'}`;

            // Highlights section
            const ranges = [];
            document.querySelectorAll('.highlight-row').forEach(row => {
                const inputs = row.querySelectorAll('.highlight-input');
                const s = parseInt(inputs[0].value);
                const e = parseInt(inputs[1].value);
                if (s && e && s >= 1 && e <= 10 && s <= e) {
                    ranges.push({ start: s, end: e });
                }
            });
            const highlightSection = document.getElementById('previewHighlights');
            const highlightTags = document.getElementById('highlightTags');
            if (ranges.length > 0 && phone) {
                highlightSection.style.display = 'block';
                highlightTags.innerHTML = ranges.map(r => {
                    const digits = phone.slice(r.start - 1, r.end);
                    return `<span class="badge badge--premium">${digits} <span style="opacity:0.5;font-size:10px;">pos ${r.start}-${r.end}</span></span>`;
                }).join('');
            } else {
                highlightSection.style.display = 'none';
            }

            // Validate phone
            const phoneInput = document.getElementById('phoneNumber');
            const phoneError = document.getElementById('phoneError');
            if (phone && !/^\d{10}$/.test(phone)) {
                phoneInput.classList.add('has-error');
                phoneError.classList.add('is-visible');
            } else {
                phoneInput.classList.remove('has-error');
                phoneError.classList.remove('is-visible');
            }
            const categorySelect = document.getElementById('category');
const previewCategory = document.getElementById('preview-category');

if (categorySelect && previewCategory) {
    const categoryBadgeMap = {
        'VIP': 'badge--Vip',
        'Premium': 'badge--Premium',
        'Fancy': 'badge--Fancy',
        'Reserved': 'badge--Reserved',
        'Available': 'badge--Available',
        'Sold': 'badge--Sold'
    };y

    function updatePreviewCategory() {
        const val = categorySelect.value;
        previewCategory.textContent = val || 'Not Selected';
        previewCategory.className = ''; // clear all classes first
        if (val && categoryBadgeMap[val]) {
            previewCategory.classList.add('badge', categoryBadgeMap[val]);
        } else {
            previewCategory.classList.add('badge');
        }
    }

    categorySelect.addEventListener('change', updatePreviewCategory);
    updatePreviewCategory();
}
        }

        // =============================================
        // Form Actions
        // =============================================
       function saveNumber(event) {
        if (event) event.preventDefault();
        const phone = document.getElementById("phoneNumber").value.trim();
        const category = document.getElementById("category").value;
        const originalPrice = document.getElementById("originalPrice").value;
        const discount = document.getElementById("discount").value;

        if (!/^\d{10}$/.test(phone)) {
            showToast("Enter a valid 10 digit mobile number", "error");
            return;
        }

        if (category == "") {
            showToast("Please select category", "error");
            return;
        }

        if (originalPrice == "" || parseInt(originalPrice) <= 0) {
            showToast("Enter original price", "error");
            return;
        }

        // Build highlight ranges
        let ranges = [];

        document.querySelectorAll(".highlight-row").forEach(row => {

            const inputs = row.querySelectorAll(".highlight-input");

            const start = inputs[0].value;
            const end = inputs[1].value;

            if (start && end) {
                ranges.push(start + "-" + end);
            }

        });

        const sums = calculateNumberSumArray();

        let formData = new FormData();

        formData.append("mobile_number", phone);
        formData.append("category", category);
        formData.append("sum1", sums[0]);
        formData.append("sum2", sums[1]);
        formData.append("sum3", sums[2]);
        formData.append("highlight_ranges", ranges.join(","));
        formData.append("original_price", originalPrice);
        formData.append("discount", discount);
        formData.append("status", "Available");

        fetch("../api/add_number.php", {
            method: "POST",
            body: formData,
            action: "dashboard"
        })
        .then(res => res.json())
        .then(async (data) => {

            if (data.success) {
                await addActivity(
                    "New Number Added",
                    `${phone} added to ${category} category`,
                    "green"
                );

               window.location.href = "dashboard.php";
            }

            showToast(data.message, data.success ? "success" : "error");

        })
        .catch(err => {

            console.error(err);

            showToast("Server Error", "error");

        });
    }

        function resetForm() {
            document.getElementById('phoneNumber').value = '';
            document.getElementById('category').value = '';
            document.getElementById('status').value = 'available';
            document.getElementById('originalPrice').value = '';
            document.getElementById('discount').value = '';
            document.getElementById('sellingPrice').value = '';
            document.querySelectorAll('.segment-btn').forEach((b, i) => {
                b.classList.toggle('is-active', i === 0);
            });
            // Reset highlight rows
            const rows = document.querySelectorAll('.highlight-row');
            rows.forEach((row, i) => {
                if (i > 0) row.remove();
            });
            const firstRow = document.querySelector('.highlight-row');
            if (firstRow) {
                firstRow.querySelectorAll('.highlight-input').forEach(inp => {
                    inp.value = '';
                    inp.classList.remove('has-error');
                });
                const preview = document.getElementById('rangePreview0');
                if (preview) {
                    preview.textContent = 'Enter positions';
                    preview.classList.add('range-preview--empty');
                }
            }
            highlightCount = 1;
            document.querySelectorAll('.input-field').forEach(f => f.classList.remove('has-error'));
            document.querySelectorAll('.error-msg').forEach(e => e.classList.remove('is-visible'));
            updatePreview();
            showToast('Form has been reset', 'info');
        }

        // =============================================
        // Toast Notification
        // =============================================
        function showToast(message, type = 'info') {
            const existing = document.querySelector('.toast-notification');
            if (existing) existing.remove();

            const colors = {
                success: { bg: 'rgba(34, 197, 94, 0.15)', border: 'rgba(34, 197, 94, 0.3)', text: '#4ADE80', icon: 'check-circle' },
                error: { bg: 'rgba(239, 68, 68, 0.15)', border: 'rgba(239, 68, 68, 0.3)', text: '#F87171', icon: 'alert-circle' },
                info: { bg: 'rgba(74, 157, 255, 0.15)', border: 'rgba(74, 157, 255, 0.3)', text: '#60B5FF', icon: 'info' }
            };
            const c = colors[type] || colors.info;

            const toast = document.createElement('div');
            toast.className = 'toast-notification';
            toast.style.cssText = `
                position: fixed; bottom: 24px; left: 50%; transform: translateX(-50%) translateY(20px);
                background: ${c.bg}; border: 1px solid ${c.border}; color: ${c.text};
                padding: 14px 24px; border-radius: 14px; font-size: 14px; font-weight: 600;
                display: flex; align-items: center; gap: 10px; z-index: 1000;
                backdrop-filter: blur(20px); -webkit-backdrop-filter: blur(20px);
                box-shadow: 0 8px 32px rgba(0,0,0,0.4);
                opacity: 0; transition: all 0.35s cubic-bezier(0.4, 0, 0.2, 1);
                max-width: calc(100vw - 32px); white-space: nowrap; overflow: hidden; text-overflow: ellipsis;
            `;
            toast.innerHTML = `<i data-lucide="${c.icon}" style="width:18px;height:18px;flex-shrink:0;"></i> ${message}`;
            document.body.appendChild(toast);
            lucide.createIcons();

            requestAnimationFrame(() => {
                toast.style.opacity = '1';
                toast.style.transform = 'translateX(-50%) translateY(0)';
            });

            setTimeout(() => {
                toast.style.opacity = '0';
                toast.style.transform = 'translateX(-50%) translateY(20px)';
                setTimeout(() => toast.remove(), 350);
            }, 3000);
        }

        // =============================================
        // Scroll Reveal
        // =============================================
        const revealObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-visible');
                }
            });
        }, { threshold: 0.1 });

        document.querySelectorAll('.reveal').forEach(el => revealObserver.observe(el));

        // Initial preview
        updatePreview();
 // Number Sum calculation for Live Preview
function calculateNumberSum(numStr) {
    if (!numStr || numStr.length === 0) return '--';
    var digits = numStr.replace(/\D/g, '').split('').map(Number);
    if (digits.length === 0) return '--';
    var sum = digits.reduce(function(a, b) { return a + b; }, 0);
    var chain = [sum];
    while (chain.length < 3) {
        if (sum < 10) {
            chain.push(sum);
        } else {
            sum = String(sum).split('').map(Number).reduce(function(a, b) { return a + b; }, 0);
            chain.push(sum);
        }
    }
    return chain.join(' - ');
}
function calculateNumberSumArray() {

    let phone = document.getElementById("phoneNumber").value;

    phone = phone.replace(/\D/g, "");

    let sum1 = 0;

    for (let i = 0; i < phone.length; i++) {

        sum1 += parseInt(phone[i]);

    }

    function reduce(num) {

        return String(num)
            .split("")
            .reduce((a, b) => a + parseInt(b), 0);

    }

    let sum2 = reduce(sum1);

    let sum3 = sum2;

    while (sum3 > 9) {

        sum3 = reduce(sum3);

    }

    return [sum1, sum2, sum3];

}
function updateNumberSum() {
    var display = document.getElementById('previewNumberSum');
    if (!display || !updateNumberSum._input) return;
var result = calculateNumberSum(updateNumberSum._input.value);
display.textContent = result === '--' ? '--' : 'Sum = ' + result;}

// Robustly find the mobile/VIP number input
var mobileInput = document.getElementById('mobileNumber')
    || document.getElementById('vipNumber')
    || document.getElementById('phoneNumber')
    || document.getElementById('number')
    || document.getElementById('vip_number')
    || document.getElementById('mobile_number');

// Fallback: find the prefixed input (+91) which is always the mobile field
if (!mobileInput) {
    var prefixedInputs = document.querySelectorAll('.input-field--prefixed');
    if (prefixedInputs.length > 0) {
        mobileInput = prefixedInputs[0];
    }
}

// Fallback: find input inside the first form section with a prefix wrapper
if (!mobileInput) {
    var prefixEl = document.querySelector('.input-prefix');
    if (prefixEl) {
        var wrapper = prefixEl.closest('.input-wrapper') || prefixEl.parentElement;
        if (wrapper) {
            mobileInput = wrapper.querySelector('input');
        }
    }
}

if (mobileInput) {
    updateNumberSum._input = mobileInput;
    mobileInput.addEventListener('input', updateNumberSum);
}

async function addActivity(title, description, color) {

    console.log("addActivity called", title, description, color);

    const formData = new FormData();
    formData.append("title", title);
    formData.append("description", description);
    formData.append("color", color);

    const response = await fetch("../api/add_activity.php", {
        method: "POST",
        body: formData
    });

    const result = await response.json();
    return result;
}
    </script>
</body>
</html>