<?php require_once "../api/auth.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update VIP Number — Admin Dashboard</title>
    <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700;900&family=DM+Sans:ital,opsz,wght@0,9..40,300;0,9..40,400;0,9..40,500;0,9..40,600;0,9..40,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../public/css/update-number.css">
</head>
<body>
    <div class="gold-line"></div>
    <div class="toast-container" id="toastContainer"></div>
    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <!-- Sidebar -->
    <aside class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <div class="sidebar-brand">
                <div class="brand-logo"><span class="brand-logo-letter">V</span></div>
                <div>
                    <div class="brand-title">VIP Numbers</div>
                    <div class="brand-subtitle">Admin Panel</div>
                </div>
            </div>
        </div>
        <nav class="sidebar-nav" aria-label="Main navigation">
            <p class="nav-section-label">Main</p>
            <a href="dashboard.php" class="sidebar-link"><i data-lucide="layout-dashboard"></i> Dashboard</a>
            <a href="add-numbers.php" class="sidebar-link"><i data-lucide="phone"></i> Add Numbers</a>
            <a href="numbers.php" class="sidebar-link active"><i data-lucide="check-circle"></i> Number List & Status</a>
            <p class="nav-section-label nav-section-label--spaced">Settings</p>
            <a href="profile.php" class="sidebar-link"><i data-lucide="user"></i> Profile</a>
            <a href="../api/logout.php" class="sidebar-link"><i data-lucide="log-out"></i> Logout</a>
        </nav>
        <div class="sidebar-footer">
            <div class="sidebar-health-card">
                <p class="sidebar-health-title">Inventory Health</p>
                <p id="sidebarHealthText" class="sidebar-health-text">8,432 numbers available across 5 categories</p>
                <div class="progress-track progress-track--thin" style="margin-top:12px;"><div class="progress-fill" style="width:65%"></div></div>
            </div>
        </div>
    </aside>

    <!-- Main Content -->
    <div class="main-wrapper" id="mainWrapper">
        <header class="dashboard-header">
            <div class="header-inner">
                <div class="header-left">
                    <button class="menu-toggle" id="menuToggle" aria-label="Toggle menu"><i data-lucide="menu"></i></button>
                    <div class="header-title-area">
                        <h2 class="page-title">Update Number</h2>
                        <p class="page-subtitle" id="pageSubtitle">Loading record…</p>
                    </div>
                </div>
                <div class="header-right">
                    <div style="position:relative;">
                        <button class="notif-btn" id="notifBtn" aria-label="Notifications"><i data-lucide="bell"></i><span class="notif-badge">3</span></button>
                        <div class="dropdown dropdown--wide" id="notifDropdown">
                            <p class="dropdown-title">Notifications</p>
                            <a href="#" class="dropdown-item"><div class="dropdown-item-icon dropdown-item-icon--green"><i data-lucide="plus-circle"></i></div><div class="dropdown-item-content"><p class="dropdown-item-title">New number added</p><p class="dropdown-item-time">2 minutes ago</p></div></a>
                            <a href="#" class="dropdown-item"><div class="dropdown-item-icon dropdown-item-icon--gold"><i data-lucide="star"></i></div><div class="dropdown-item-content"><p class="dropdown-item-title">Premium number tagged</p><p class="dropdown-item-time">15 minutes ago</p></div></a>
                            <a href="#" class="dropdown-item"><div class="dropdown-item-icon dropdown-item-icon--red"><i data-lucide="alert-circle"></i></div><div class="dropdown-item-content"><p class="dropdown-item-title">Duplicate number detected</p><p class="dropdown-item-time">1 hour ago</p></div></a>
                        </div>
                    </div>
                    <div style="position:relative;">
                        <button class="profile-btn" id="profileBtn" aria-label="Profile menu">
                            <div class="profile-avatar"><span>A</span></div>
                            <span class="profile-name"><?php echo htmlspecialchars($_SESSION['username'] ?? ''); ?></span>
                            <span class="profile-chevron"><i data-lucide="chevron-down"></i></span>
                        </button>
                        <div class="dropdown" id="profileDropdown">
                            <div class="dropdown-header"><p class="dropdown-user-name"><?php echo htmlspecialchars($_SESSION['full_name'] ?? ''); ?></p><p class="dropdown-header-email"><?php echo htmlspecialchars($_SESSION['email'] ?? ''); ?></p></div>
                            <a href="profile.php" class="dropdown-item"><i data-lucide="user"></i> My Profile</a>
                            <div class="dropdown-divider"></div>
                            <a href="../api/logout.php" class="dropdown-item dropdown-item--danger"><i data-lucide="log-out"></i> Logout</a>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <main class="dashboard-content">
            <form method="POST" action="" id="updateForm">
                <input type="hidden" name="id" id="recordIdInput" value="">
                <input type="hidden" name="status" id="statusInput" value="Available">
                <input type="hidden" name="sum1" id="sum1Input" value="">
                <input type="hidden" name="sum2" id="sum2Input" value="">
                <input type="hidden" name="sum3" id="sum3Input" value="">
                <input type="hidden" name="highlight_ranges" id="highlightRangesInput" value="">

                <div class="page-layout">
                    <div class="form-area">
                        <div class="page-top reveal">
                            <a href="numbers.php" class="btn-back"><i data-lucide="arrow-left"></i> Back to Numbers</a>
                            <div class="badge badge--blue"><i data-lucide="fingerprint" style="width:14px;height:14px;"></i> Record ID: <span id="recordIdDisplay">—</span></div>
                        </div>

                        <section class="glass-card glass-card--static reveal">
                            <div class="form-section">
                                <div class="section-header">
                                    <div class="icon-box icon-box--gold"><i data-lucide="info"></i></div>
                                    <h3 class="section-title">Basic Information</h3>
                                    <div class="section-line"></div>
                                </div>
                                <div class="form-grid">
                                    <div class="form-group form-group--full">
                                        <label class="form-label" for="mobileNumber"><span class="form-label-icon"><i data-lucide="smartphone"></i></span> Mobile Number</label>
                                        <div class="input-wrapper">
                                            <span class="input-prefix">+91</span>
                                            <input type="text" id="mobileNumber" name="mobile_number" class="input-field input-field--prefixed" placeholder="Enter Mobile Number" maxlength="10" value="" aria-describedby="numberError">
                                        </div>
                                        <p class="error-msg" id="numberError">Please enter a valid 10-digit mobile number</p>
                                        <p class="error-msg" id="duplicateError">This number already exists in the system</p>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="category"><span class="form-label-icon"><i data-lucide="tag"></i></span> Category</label>
                                        <select id="category" name="category" class="input-field">
                                            <option value="">Select Category</option>
                                            <option value="VIP">VIP</option>
                                            <option value="Premium">Premium</option>
                                            <option value="Fancy">Fancy</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label"><span class="form-label-icon"><i data-lucide="activity"></i></span> Status</label>
                                        <div class="segment-group" role="radiogroup" aria-label="Number status">
                                            <button type="button" class="segment-btn is-active" role="radio" aria-checked="true" data-value="Available">Available</button>
                                            <button type="button" class="segment-btn" role="radio" aria-checked="false" data-value="Sold">Sold</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>

                        <section class="glass-card glass-card--static reveal">
                            <div class="form-section">
                                <div class="section-header">
                                    <div class="icon-box icon-box--pink"><i data-lucide="sparkles"></i></div>
                                    <h3 class="section-title">Highlight Digits</h3>
                                    <div class="section-line"></div>
                                </div>
                                <div class="highlight-rows" id="highlightRows">
                                    <!-- rows are injected dynamically from the API response -->
                                </div>
                                <button type="button" class="add-range-btn" id="addHighlightBtn"><i data-lucide="plus"></i> Add Highlight Range</button>
                            </div>
                        </section>

                        <section class="glass-card glass-card--static reveal">
                            <div class="form-section">
                                <div class="section-header">
                                    <div class="icon-box icon-box--green"><i data-lucide="indian-rupee"></i></div>
                                    <h3 class="section-title">Pricing</h3>
                                    <div class="section-line"></div>
                                </div>
                                <div class="pricing-formula-bar">
                                    <i data-lucide="calculator"></i>
                                    <span class="pricing-formula-text" id="formulaText">Display Price = 0 × (1 + 0/100) = ₹0</span>
                                </div>
                                <div class="pricing-grid" style="margin-top:24px;">
                                    <div class="form-group">
                                        <label class="form-label" for="originalPrice"><span class="form-label-icon"><i data-lucide="banknote"></i></span> Original Price (₹)</label>
                                        <div class="input-wrapper">
                                            <span class="input-prefix" style="color:rgba(212,175,55,0.5);">₹</span>
                                            <input type="number" id="originalPrice" name="original_price" class="input-field input-field--currency" placeholder="0.00" min="0" step="1" value="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="discountPercent"><span class="form-label-icon"><i data-lucide="percent"></i></span> Discount (%)</label>
                                        <input type="number" id="discountPercent" name="discount" class="input-field input-field--centered" placeholder="0" min="0" max="100" step="1" value="">
                                    </div>
                                    <div class="form-group form-group--full">
                                        <label class="form-label" for="sellingPrice"><span class="form-label-icon"><i data-lucide="trending-up"></i></span> Selling Price (₹)</label>
                                        <div class="input-wrapper">
                                            <span class="input-prefix" style="color:rgba(212,175,55,0.5);">₹</span>
                                            <input type="number" id="sellingPrice" name="selling_price" class="input-field input-field--currency input-field--gold-readonly" placeholder="Auto-calculated" min="0" step="1" value="" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>

                        <div class="form-actions reveal">
                            <a href="numbers.php" class="btn-outline"><i data-lucide="x"></i> Cancel</a>
                            <button type="submit" class="btn-gold" id="submitBtn"><i data-lucide="save"></i> Update Number</button>
                        </div>
                    </div>

                    <div class="right-sidebar">
                        <div class="preview-card reveal">
                            <div class="preview-card-inner">
                                <div class="preview-header">
                                    <div class="preview-label"><i data-lucide="eye"></i><span class="preview-label-text">LIVE PREVIEW</span></div>
                                    <div class="preview-badges">
                                        <span class="badge badge--vip" id="previewCategoryBadge">—</span>
                                        <span class="badge badge--available" id="previewStatusBadge">Available</span>
                                    </div>
                                </div>
                                <div class="preview-number-area">
                                    <div class="preview-number" id="previewNumberDisplay">Loading…</div>
                                    <div class="preview-number-sum" id="previewDigitSum">Digit Sum: —</div>
                                </div>
                                <div class="preview-prices">
                                    <div class="price-block">
                                        <p class="price-label">ORIGINAL PRICE</p>
                                        <p class="price-original" id="previewOriginal">₹0</p>
                                        <p class="price-discount-value" id="previewDiscount" style="margin-top:2px;"></p>
                                    </div>
                                    <div class="price-block price-block--selling">
                                        <p class="price-label price-label--gold">SELLING PRICE</p>
                                        <p class="price-selling shimmer-text" id="previewSelling">₹0</p>
                                    </div>
                                </div>
                                <div class="preview-highlights">
                                    <p class="preview-highlights-label">HIGHLIGHTED RANGES</p>
                                    <div class="highlight-tags" id="previewHighlightTags">
                                        <span class="badge badge--default badge--sm">No highlights</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="glass-card glass-card--static reveal">
                            <div class="form-section">
                                <div class="card-header"><div class="icon-box icon-box--blue"><i data-lucide="file-text"></i></div><h4 class="card-title">Record Details</h4></div>
                                <div class="detail-row"><span class="detail-label">Record ID</span><span class="detail-value detail-value-mono detail-value-gold" id="detailRecordId">—</span></div>
                                <div class="detail-row"><span class="detail-label">Created</span><span class="detail-value" id="detailCreated">—</span></div>
                                <div class="detail-row"><span class="detail-label">Last Updated</span><span class="detail-value" id="detailUpdated">—</span></div>
                                <div class="detail-row"><span class="detail-label">Views</span><span class="detail-value" id="detailViews">—</span></div>
                            </div>
                        </div>

                        <div class="glass-card glass-card--static tips-card reveal">
                            <div class="form-section">
                                <div class="tips-card-header"><i data-lucide="lightbulb"></i><h4 class="tips-card-title">Update Tips</h4></div>
                                <div class="tips-list">
                                    <div class="tip-item"><span class="tip-bullet"></span><p class="tip-text">Changing the mobile number will update all associated display previews automatically.</p></div>
                                    <div class="tip-item"><span class="tip-bullet"></span><p class="tip-text">Selling price is the amount you enter. The display price adds the discount on top to show a marked-up original.</p></div>
                                    <div class="tip-item"><span class="tip-bullet"></span><p class="tip-text">Highlight ranges use 1-based indexing. Position 1 is the first digit.</p></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </main>
    </div>

    <script>
        lucide.createIcons();

        // ---------- Sidebar Toggle ----------
        const sidebar = document.getElementById('sidebar');
        const sidebarOverlay = document.getElementById('sidebarOverlay');
        const menuToggle = document.getElementById('menuToggle');
        function openSidebar() { sidebar.classList.add('is-open'); sidebarOverlay.classList.add('is-open'); }
        function closeSidebar() { sidebar.classList.remove('is-open'); sidebarOverlay.classList.remove('is-open'); }
        menuToggle.addEventListener('click', openSidebar);
        sidebarOverlay.addEventListener('click', closeSidebar);

        // ---------- Dropdowns ----------
        const notifBtn = document.getElementById('notifBtn');
        const notifDropdown = document.getElementById('notifDropdown');
        const profileBtn = document.getElementById('profileBtn');
        const profileDropdown = document.getElementById('profileDropdown');
        notifBtn.addEventListener('click', (e) => { e.stopPropagation(); profileDropdown.classList.remove('show'); notifDropdown.classList.toggle('show'); });
        profileBtn.addEventListener('click', (e) => { e.stopPropagation(); notifDropdown.classList.remove('show'); profileDropdown.classList.toggle('show'); });
        document.addEventListener('click', () => { notifDropdown.classList.remove('show'); profileDropdown.classList.remove('show'); });
        notifDropdown.addEventListener('click', (e) => e.stopPropagation());
        profileDropdown.addEventListener('click', (e) => e.stopPropagation());

        // ---------- Status Segment ----------
        const segmentBtns = document.querySelectorAll('.segment-btn');
        const statusInput = document.getElementById('statusInput');
        const previewStatusBadge = document.getElementById('previewStatusBadge');
        function setStatus(val) {
            segmentBtns.forEach(b => {
                const active = b.getAttribute('data-value') === val;
                b.classList.toggle('is-active', active);
                b.setAttribute('aria-checked', active ? 'true' : 'false');
            });
            statusInput.value = val;
            if (val === 'Available') { previewStatusBadge.className = 'badge badge--available'; previewStatusBadge.textContent = 'Available'; }
            else { previewStatusBadge.className = 'badge badge--sold'; previewStatusBadge.textContent = 'Sold'; }
        }
        segmentBtns.forEach(btn => btn.addEventListener('click', () => setStatus(btn.getAttribute('data-value'))));

        // ---------- Highlight Rows ----------
        const highlightRowsContainer = document.getElementById('highlightRows');
        let rowCount = 0;

        function getMobileNumber() { return document.getElementById('mobileNumber').value || ''; }

        function rowTemplate(rowNum, startVal, endVal) {
            const s = startVal !== undefined && startVal !== null ? startVal : '';
            const e = endVal !== undefined && endVal !== null ? endVal : '';
            return `<div class="highlight-row-grid">
                <div><p class="range-label">Start Position</p><input type="number" class="highlight-input" name="highlight_start[]" min="1" max="10" value="${s}" placeholder="From"></div>
                <div><p class="range-label">End Position</p><input type="number" class="highlight-input" name="highlight_end[]" min="1" max="10" value="${e}" placeholder="To"></div>
                <div class="range-preview-col"><p class="range-label">Preview</p><div class="range-preview" id="rangePreview${rowNum}"><span class="range-preview--empty">Set positions</span></div><p class="range-error" id="rangeError${rowNum}">Start must be less than or equal to end</p></div>
                <div class="delete-col"><button type="button" class="delete-row-btn" onclick="removeHighlightRow(this)" aria-label="Remove highlight"><i data-lucide="trash-2"></i></button></div>
            </div>`;
        }

        function addHighlightRow(startVal, endVal) {
            rowCount++;
            const row = document.createElement('div');
            row.className = 'highlight-row';
            row.setAttribute('data-row', rowCount);
            row.innerHTML = rowTemplate(rowCount, startVal, endVal);
            highlightRowsContainer.appendChild(row);
            lucide.createIcons({ nodes: row.querySelectorAll('[data-lucide]') });
            const inputs = row.querySelectorAll('.highlight-input');
            inputs.forEach(input => input.addEventListener('input', () => { updateRangePreview(row, inputs[0].value, inputs[1].value); updateMainPreview(); }));
            updateRangePreview(row, inputs[0].value, inputs[1].value);
            return row;
        }

        function updateRangePreview(rowEl, start, end) {
            const number = getMobileNumber();
            const previewEl = rowEl.querySelector('.range-preview');
            if (!previewEl) return;
            if (!number || !start || !end || start > end) {
                if (!number) previewEl.innerHTML = '<span class="range-preview--empty">Enter a number first</span>';
                else if (start && end && start > end) previewEl.innerHTML = '<span style="color:#F87171;font-family:var(--font-body);font-size:12px;font-weight:500;letter-spacing:0;">Invalid range</span>';
                else previewEl.innerHTML = '<span class="range-preview--empty">Set positions</span>';
                return;
            }
            const s = parseInt(start) - 1, e = parseInt(end) - 1;
            let html = '';
            for (let i = 0; i < number.length; i++) {
                html += (i >= s && i <= e) ? '<span class="highlight-gold">' + number[i] + '</span>' : number[i];
            }
            previewEl.innerHTML = html;
        }

        function updateAllRangePreviews() {
            document.querySelectorAll('#highlightRows .highlight-row').forEach(row => {
                const inputs = row.querySelectorAll('.highlight-input');
                if (inputs.length >= 2) updateRangePreview(row, inputs[0].value, inputs[1].value);
            });
        }

        document.getElementById('addHighlightBtn').addEventListener('click', () => addHighlightRow());

        function removeHighlightRow(btn) {
            const row = btn.closest('.highlight-row');
            if (highlightRowsContainer.children.length <= 1) { showToast('At least one highlight range is required', 'error'); return; }
            row.classList.add('is-removing');
            setTimeout(() => { row.remove(); updateMainPreview(); }, 300);
        }

        // Parses "1-5,9-10" -> [{start:1,end:5},{start:9,end:10}]
        function parseHighlightRanges(str) {
            if (!str) return [];
            return str.split(',').map(part => part.trim()).filter(Boolean).map(part => {
                const [start, end] = part.split('-').map(n => parseInt(n, 10));
                return { start, end };
            }).filter(r => r.start && r.end);
        }

        // Builds "1-5,9-10" from the current rows
        function serializeHighlightRanges() {
            const ranges = [];
            document.querySelectorAll('#highlightRows .highlight-row').forEach(row => {
                const inputs = row.querySelectorAll('.highlight-input');
                const s = parseInt(inputs[0].value), e = parseInt(inputs[1].value);
                if (s && e && s <= e) ranges.push(`${s}-${e}`);
            });
            return ranges.join(',');
        }

        // ---------- Pricing ----------
        const originalPriceInput = document.getElementById('originalPrice');
        const discountInput = document.getElementById('discountPercent');
        const sellingPriceInput = document.getElementById('sellingPrice');
        const formulaText = document.getElementById('formulaText');

        function calculateSellingPrice() {
            const original = parseFloat(originalPriceInput.value) || 0;
            const discount = parseFloat(discountInput.value) || 0;
            const displayPrice = Math.round(original * (1 + discount / 100));
            sellingPriceInput.value = displayPrice > 0 ? displayPrice : '';
            formulaText.textContent = `Display Price = ${original.toLocaleString('en-IN')} \u00D7 (1 + ${discount}/100) = \u20B9${displayPrice.toLocaleString('en-IN')}`;
            document.getElementById('previewOriginal').textContent = '\u20B9' + displayPrice.toLocaleString('en-IN');
            document.getElementById('previewDiscount').textContent = discount > 0 ? `-${discount}%` : '';
            document.getElementById('previewSelling').textContent = '\u20B9' + original.toLocaleString('en-IN');
        }
        originalPriceInput.addEventListener('input', calculateSellingPrice);
        discountInput.addEventListener('input', calculateSellingPrice);

        // ---------- Digit Sum (also feeds sum1/sum2/sum3 hidden fields for the API) ----------
        function getDigitSums(numberStr) {
            if (!numberStr) return { total: 0, single: 0, root: 0, text: 'Digit Sum: \u2014' };
            let total = 0;
            for (let i = 0; i < numberStr.length; i++) { total += parseInt(numberStr[i]) || 0; }
            let singleSum = total;
            while (singleSum >= 10) {
                let s = 0, temp = singleSum;
                while (temp > 0) { s += temp % 10; temp = Math.floor(temp / 10); }
                singleSum = s;
            }
            const root = singleSum;
            return { total, single: singleSum, root, text: `Digit Sum: ${total} - ${String(singleSum).padStart(2, '0')} - ${root}` };
        }

        function updateMainPreview() {
            const number = document.getElementById('mobileNumber').value;
            const display = document.getElementById('previewNumberDisplay');
            const sumEl = document.getElementById('previewDigitSum');
            const tagsEl = document.getElementById('previewHighlightTags');
            const categorySelect = document.getElementById('category');
            const categoryBadge = document.getElementById('previewCategoryBadge');
            const cat = categorySelect.value;
            const catBadgeMap = { 'VIP': 'badge--vip', 'Premium': 'badge--premium', 'Fancy': 'badge--fancy' };
            categoryBadge.className = 'badge ' + (catBadgeMap[cat] || 'badge--default');
            categoryBadge.textContent = cat || 'Uncategorized';

            if (!number) {
                display.innerHTML = '<span style="color:rgba(255,255,255,0.12);font-family:var(--font-body);font-size:16px;font-weight:500;letter-spacing:0;">Enter a number to preview</span>';
                sumEl.textContent = 'Digit Sum: \u2014';
                tagsEl.innerHTML = '<span class="badge badge--default badge--sm">No highlights</span>';
                document.getElementById('sum1Input').value = '';
                document.getElementById('sum2Input').value = '';
                document.getElementById('sum3Input').value = '';
                document.getElementById('highlightRangesInput').value = '';
                return;
            }

            const highlightRanges = [];
            document.querySelectorAll('#highlightRows .highlight-row').forEach(row => {
                const inputs = row.querySelectorAll('.highlight-input');
                if (inputs.length >= 2) {
                    const s = parseInt(inputs[0].value), e = parseInt(inputs[1].value);
                    if (s && e && s <= e) highlightRanges.push({ start: s - 1, end: e - 1 });
                }
            });

            let html = '';
            for (let i = 0; i < number.length; i++) {
                const isHighlighted = highlightRanges.some(r => i >= r.start && i <= r.end);
                html += isHighlighted ? '<span class="highlight-gold">' + number[i] + '</span>' : number[i];
            }
            display.innerHTML = html;

            const sums = getDigitSums(number);
            sumEl.textContent = sums.text;
            document.getElementById('sum1Input').value = sums.total;
            document.getElementById('sum2Input').value = sums.single;
            document.getElementById('sum3Input').value = sums.root;
            document.getElementById('highlightRangesInput').value = serializeHighlightRanges();

            if (highlightRanges.length === 0) {
                tagsEl.innerHTML = '<span class="badge badge--default badge--sm">No highlights</span>';
            } else {
                let tagsHtml = '';
                highlightRanges.forEach(r => {
                    const digits = number.substring(r.start, r.end + 1);
                    tagsHtml += '<span class="badge badge--premium badge--sm">Pos ' + (r.start + 1) + '\u2013' + (r.end + 1) + ': ' + digits + '</span>';
                });
                tagsEl.innerHTML = tagsHtml;
            }
        }

        document.getElementById('mobileNumber').addEventListener('input', () => { updateAllRangePreviews(); updateMainPreview(); });
        document.getElementById('category').addEventListener('change', updateMainPreview);

        // ---------- Form Validation ----------
        const updateForm = document.getElementById('updateForm');
        const mobileInput = document.getElementById('mobileNumber');
        const numberError = document.getElementById('numberError');
        function validateForm() {
            let isValid = true;
            const number = mobileInput.value.trim();
            if (!number || !/^\d{10}$/.test(number)) { mobileInput.classList.add('has-error'); numberError.classList.add('is-visible'); isValid = false; }
            else { mobileInput.classList.remove('has-error'); numberError.classList.remove('is-visible'); }
            document.querySelectorAll('#highlightRows .highlight-row').forEach(row => {
                const inputs = row.querySelectorAll('.highlight-input');
                const errorEl = row.querySelector('.range-error');
                if (inputs.length >= 2 && errorEl) {
                    const s = parseInt(inputs[0].value), e = parseInt(inputs[1].value);
                    if (s && e && s > e) { inputs[0].classList.add('has-error'); inputs[1].classList.add('has-error'); row.classList.add('has-error'); errorEl.classList.add('is-visible'); isValid = false; }
                    else { inputs[0].classList.remove('has-error'); inputs[1].classList.remove('has-error'); row.classList.remove('has-error'); errorEl.classList.remove('is-visible'); }
                }
            });
            return isValid;
        }
        mobileInput.addEventListener('input', () => { if (mobileInput.classList.contains('has-error') && /^\d{10}$/.test(mobileInput.value.trim())) { mobileInput.classList.remove('has-error'); numberError.classList.remove('is-visible'); } });

        // ---------- Toasts ----------
        function showToast(message, type = 'info') {
            const container = document.getElementById('toastContainer');
            const toast = document.createElement('div');
            toast.className = `toast ${type}`;
            const iconMap = { success: 'check-circle', error: 'alert-circle', info: 'info' };
            const colorMap = { success: '#4ADE80', error: '#F87171', info: '#60B5FF' };
            toast.innerHTML = `<i data-lucide="${iconMap[type] || 'info'}" style="width:18px;height:18px;color:${colorMap[type]};flex-shrink:0;"></i><span>${message}</span>`;
            container.appendChild(toast);
            lucide.createIcons({ nodes: toast.querySelectorAll('[data-lucide]') });
            requestAnimationFrame(() => { toast.classList.add('show'); });
            setTimeout(() => { toast.classList.remove('show'); setTimeout(() => toast.remove(), 400); }, 3500);
        }

        // ---------- Scroll Reveal ----------
        const revealElements = document.querySelectorAll('.reveal');
        const revealObserver = new IntersectionObserver((entries) => {
            entries.forEach((entry, index) => { if (entry.isIntersecting) { setTimeout(() => { entry.target.classList.add('is-visible'); }, index * 80); revealObserver.unobserve(entry.target); } });
        }, { threshold: 0.1, rootMargin: '0px 0px -40px 0px' });
        revealElements.forEach(el => revealObserver.observe(el));

        // ---------- Load record from the API using ?id= from the URL ----------
        const params = new URLSearchParams(window.location.search);
        const recordId = params.get('id');

        function formatDate(str) {
            if (!str) return '—';
            const d = new Date(str.replace(' ', 'T'));
            if (isNaN(d)) return str;
            return d.toLocaleString('en-IN', { day: 'numeric', month: 'short', year: 'numeric', hour: '2-digit', minute: '2-digit' });
        }

        async function loadRecord() {
            if (!recordId) {
                showToast('No record id in the URL', 'error');
                document.getElementById('pageSubtitle').textContent = 'No record selected';
                return;
            }
            try {
                const res = await fetch(`../api/get_number.php?id=${encodeURIComponent(recordId)}`);
                const data = await res.json();
                if (!data.success || !data.number) {
                    showToast(data.message || 'Could not load this number', 'error');
                    document.getElementById('pageSubtitle').textContent = 'Record not found';
                    return;
                }
                populateForm(data.number);
            } catch (err) {
                showToast('Failed to reach the server', 'error');
                document.getElementById('pageSubtitle').textContent = 'Failed to load';
            }
        }

        function populateForm(num) {
            document.getElementById('recordIdInput').value = num.id;
            document.getElementById('recordIdDisplay').textContent = 'VN-' + String(num.id).padStart(6, '0');
            document.getElementById('detailRecordId').textContent = 'VN-' + String(num.id).padStart(6, '0');
            document.getElementById('pageSubtitle').textContent = `Editing record VN-${String(num.id).padStart(6, '0')}`;

            mobileInput.value = num.mobile_number || '';
            document.getElementById('category').value = num.category || '';
            setStatus(num.status === 'Sold' ? 'Sold' : 'Available');

            originalPriceInput.value = num.original_price || '';
            discountInput.value = num.discount || '';

            document.getElementById('detailCreated').textContent = formatDate(num.created_at);
            document.getElementById('detailUpdated').textContent = formatDate(num.updated_at);
            document.getElementById('detailViews').textContent = num.views ?? '0';

            // Rebuild highlight rows from "highlight_ranges" e.g. "1-5" or "1-5,9-10"
            highlightRowsContainer.innerHTML = '';
            rowCount = 0;
            const ranges = parseHighlightRanges(num.highlight_ranges);
            if (ranges.length === 0) addHighlightRow();
            else ranges.forEach(r => addHighlightRow(r.start, r.end));

            calculateSellingPrice();
            updateAllRangePreviews();
            updateMainPreview();
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
        // ---------- Submit via fetch to update_number.php ----------
        updateForm.addEventListener('submit', async (e) => {
            e.preventDefault();
            if (!validateForm()) { showToast('Please fix the errors before updating', 'error'); return; }
            if (!recordId) { showToast('No record id in the URL', 'error'); return; }

            updateMainPreview(); // make sure sum1/sum2/sum3 and highlight_ranges hidden fields are current

            const submitBtn = document.getElementById('submitBtn');
            submitBtn.disabled = true;
            submitBtn.classList.add('is-loading');

            const formData = new FormData(updateForm);

            try {
                const res = await fetch('../api/update_number.php', { method: 'POST', body: formData });
                const data = await res.json();
                if (data.success) {
                    try {
                        const phone = mobileInput.value.trim();
                        await addActivity("Number Updated", `${phone} updated`, "blue");
                    } catch (err) {
                        alert("Failed to log activity: " + err.message);
                        console.error(err);
                    }
                    showToast(data.message || 'Number updated', 'success');
                    window.location.href = "dashboard.php";
                } else {
                    showToast(data.message || 'Update failed', 'error');
                }
            } catch (err) {
                showToast('Failed to reach the server', 'error');
            } finally {
                submitBtn.disabled = false;
                submitBtn.classList.remove('is-loading');
            }
        });

        // ---------- Init ----------
        loadRecord();
        const s = JSON.parse(localStorage.getItem("dashboardStats"));
        document.getElementById("sidebarHealthText").textContent=s.total.count.toLocaleString("en-IN")+" numbers available across 5 categories";
    </script>
</body>
</html>