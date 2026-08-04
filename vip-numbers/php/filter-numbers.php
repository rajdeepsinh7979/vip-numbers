<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Search and filter premium VIP mobile numbers by digits, patterns, price, total, sum and category at Bhudev Sim Store.">
    <title>VIP Number Search & Filter | Bhudev Sim Store</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800;900&family=Poppins:wght@300;400;500;600;700;800&family=Inter:wght@300;400;500;600;700&family=Playfair+Display:wght@400;600;700;900&display=swap" rel="stylesheet">
    <script src="https://code.iconify.design/3/3.1.0/iconify.min.js"></script>
    <link rel="stylesheet" href="public/css/filter-numbers.css">
    <style>
        /* Self-contained states for loading / empty / error so we don't depend on filter-numbers.css having these */
        .grid-state { display: flex; flex-direction: column; align-items: center; justify-content: center; gap: 12px; padding: 60px 20px; text-align: center; color: rgba(255,255,255,0.65); grid-column: 1 / -1; }
        .grid-state .iconify { font-size: 42px; opacity: 0.6; }
        .grid-state--error { color: #f87171; }
        .spinner { width: 34px; height: 34px; border: 3px solid rgba(255,255,255,0.15); border-top-color: #d4af37; border-radius: 50%; animation: spin 0.8s linear infinite; }
        @keyframes spin { to { transform: rotate(360deg); } }
    </style>
<body>

    <!-- ========== NAVIGATION ========== -->
    <header class="navbar" data-js="navbar">
        <div class="container navbar__inner">
            <a href="index.php" class="navbar__brand">
                <span class="navbar__brand-icon"><img src="logo.png" alt="Bhudev Sim Store Logo" class="navbar__logo"></span>
                <span class="navbar__brand-text">Bhudev <span class="gold-text">Sim Store</span></span>
            </a>
            <nav class="navbar__menu">
                <a href="index.php" class="navbar__link">Home</a>
                <a href="premium-numbers.php" class="navbar__link">Premium Numbers</a>
                <a href="vip-number-filter.php" class="navbar__link navbar__link--active">Filter Numbers</a>
                <a href="about-us.php" class="navbar__link">About Us</a>
                <a href="contact-us.php" class="navbar__link">Contact Us</a>
            </nav>
            <div class="navbar__actions">
                <a href="premium-numbers.php" class="btn btn--gold btn--sm"><span class="iconify" data-icon="mdi:crown"></span> Browse Numbers</a>
                <button class="navbar__toggle" data-js="menu-open" aria-label="Open menu"><span class="iconify" data-icon="mdi:menu"></span></button>
            </div>
        </div>
    </header>
    <div class="menu-overlay" data-js="menu-overlay"></div>
    <aside class="mobile-menu" data-js="mobile-menu">
        <div class="mobile-menu__header">
            <span class="navbar__brand-text">Bhudev <span class="gold-text">Sim Store</span></span>
            <button class="mobile-menu__close" data-js="menu-close" aria-label="Close menu"><span class="iconify" data-icon="mdi:close"></span></button>
        </div>
        <nav class="mobile-menu__nav">
            <a href="index.php" class="mobile-menu__link"><span class="iconify" data-icon="mdi:home"></span> Home</a>
            <a href="premium-numbers.php" class="mobile-menu__link"><span class="iconify" data-icon="mdi:crown"></span> Premium Numbers</a>
            <a href="vip-number-filter.php" class="mobile-menu__link mobile-menu__link--active"><span class="iconify" data-icon="mdi:filter-variant"></span> Filter Numbers</a>
            <a href="about-us.php" class="mobile-menu__link"><span class="iconify" data-icon="mdi:information"></span> About Us</a>
            <a href="contact-us.php" class="mobile-menu__link"><span class="iconify" data-icon="mdi:email"></span> Contact Us</a>
        </nav>
    </aside>

    <!-- ========== PAGE HERO ========== -->
    <section class="page-hero">
        <div class="page-hero__grid-pattern"></div>
        <div class="container page-hero__content">
            <div class="hero__badge"><span class="iconify" data-icon="mdi:filter-variant"></span> Advanced Search</div>
            <h1 class="page-hero__title">Find Your Perfect <span class="gold-shimmer">VIP Number</span></h1>
            <p class="page-hero__desc">Use our powerful filters to search premium mobile numbers by digits, patterns, price, and numerology.</p>
        </div>
    </section>

    <!-- ========== MAIN FILTER SECTION ========== -->
    <section class="filter-section">
        <div class="container">
            <form class="filter-card" id="filterForm">
                <!-- Tabs -->
                <div class="search-tabs">
                    <div class="search-tab active" data-tab="global">Global Search</div>
                    <div class="search-tab" data-tab="premium">Premium Search</div>
                    <div class="search-tab" data-tab="advance">Advance Search</div>
                    <div class="search-tab" data-tab="family">Family / Quantity</div>
                </div>

                <!-- Global Search -->
                <div class="search-tab-content active" id="tab-global">
                    <div class="filter-row">
                        <div class="filter-group" style="flex: 3 1 300px;">
                            <label for="globalSearch">Search VIP Number</label>
                            <input type="text" id="globalSearch" class="input-field" placeholder="Enter digits (e.g. 9999)" inputmode="numeric">
                        </div>
                    </div>
                </div>

                <!-- Premium Search -->
                <div class="search-tab-content" id="tab-premium">
                    <div class="filter-row">
                        <div class="filter-group"><label for="premiumStart">Start With</label><input type="text" id="premiumStart" class="input-field" placeholder="e.g. 999" inputmode="numeric"></div>
                        <div class="filter-group"><label for="premiumAnywhere">Anywhere</label><input type="text" id="premiumAnywhere" class="input-field" placeholder="e.g. 999" inputmode="numeric"></div>
                        <div class="filter-group"><label for="premiumEnd">End With</label><input type="text" id="premiumEnd" class="input-field" placeholder="e.g. 999" inputmode="numeric"></div>
                    </div>
                </div>

                <!-- Advance Search -->
                <div class="search-tab-content" id="tab-advance">
                    <div class="filter-row">
                        <div class="filter-group"><label for="advanceStart">Start With</label><input type="text" id="advanceStart" class="input-field" placeholder="e.g. 98" inputmode="numeric"></div>
                        <div class="filter-group"><label for="advanceAnywhere">Anywhere</label><input type="text" id="advanceAnywhere" class="input-field" placeholder="e.g. 786" inputmode="numeric"></div>
                        <div class="filter-group"><label for="advanceEnd">End With</label><input type="text" id="advanceEnd" class="input-field" placeholder="e.g. 999" inputmode="numeric"></div>
                        <div class="filter-group"><label for="advanceMust">Must Contain</label><input type="text" id="advanceMust" class="input-field" placeholder="e.g. 1,5,9"><div class="input-helper">Digits that must appear</div></div>
                        <div class="filter-group"><label for="advanceNot">Not Contain</label><input type="text" id="advanceNot" class="input-field" placeholder="e.g. 2,4,8"><div class="input-helper">Digits that should not appear</div></div>
                    </div>
                </div>

                <!-- Family Search -->
                <div class="search-tab-content" id="tab-family">
                    <div class="filter-row">
                        <div class="filter-group" style="flex: 2 1 250px;">
                            <label for="filterQuantity">How many similar numbers do you need?</label>
                            <input type="number" id="filterQuantity" class="input-field" placeholder="e.g. 3" min="1">
                            <div class="input-helper">Find matching numbers for family or business</div>
                        </div>
                    </div>
                </div>

                <!-- Common Horizontal Filters -->
                <div class="filter-row" style="margin-top: 24px; border-top: 1px solid rgba(255,255,255,0.06); padding-top: 24px;">
                    <div class="filter-group"><label for="filterTotal">Total</label><input type="number" id="filterTotal" class="input-field" placeholder="e.g. 41"></div>
                    <div class="filter-group"><label for="filterSum">Sum (Root)</label><input type="number" id="filterSum" class="input-field" placeholder="e.g. 5" min="1" max="9"></div>
                    <div class="filter-group"><label for="minPrice">Min Price (₹)</label><input type="number" id="minPrice" class="input-field" placeholder="₹ 1,000"></div>
                    <div class="filter-group"><label for="maxPrice">Max Price (₹)</label><input type="number" id="maxPrice" class="input-field" placeholder="₹ 10,000"></div>
                    <div class="filter-group">
                        <label for="filterCategory">Category</label>
                        <select id="filterCategory" class="input-field">
                            <option value="">All Categories</option>
                            <option value="penta">Penta Numbers</option>
                            <option value="hexa">Hexa Numbers</option>
                            <option value="septa">Septa Numbers</option>
                            <option value="octa">Octa Numbers</option>
                            <option value="ending-aaaa">Ending AAAA</option>
                            <option value="ab-ab">AB AB</option>
                            <option value="abc-abc">ABC ABC</option>
                            <option value="mirror">Mirror Numbers</option>
                            <option value="786">786 Numbers</option>
                            <option value="doubling">Doubling Numbers</option>
                            <option value="ending-aaa">Ending AAA</option>
                            <option value="unique">Unique Numbers</option>
                        </select>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="filter-row" style="margin-top: 16px; justify-content: flex-end;">
                    <button type="button" id="resetFiltersBtn" class="btn btn--dark"><span class="iconify" data-icon="mdi:refresh"></span> Reset Filters</button>
                    <button type="submit" class="btn btn--gold btn--lg"><span class="iconify" data-icon="mdi:magnify"></span> Search VIP Numbers</button>
                </div>
            </form>

            <!-- Results Top Bar -->
            <div class="results-top-bar">
                <div class="results-info">
                    <h2 id="resultsHeading"><span id="resultsCount">0</span> VIP Numbers Found</h2>
                </div>
                <div class="results-controls">
                    <select class="input-field" id="sortSelect" style="width: auto; padding: 10px 36px 10px 16px;">
                        <option value="default">Sort By: Default</option>
                        <option value="price-low">Price: Low to High</option>
                        <option value="price-high">Price: High to Low</option>
                        <option value="number-low">Number: Low to High</option>
                        <option value="number-high">Number: High to Low</option>
                        <option value="newest">Newest</option>
                        <option value="popular">Popular</option>
                    </select>
                </div>
            </div>

            <!-- DYNAMIC NUMBER GRID (filled in by JS) -->
            <div class="vip-number-grid" id="vipNumberGrid">
                <div class="grid-state" id="gridLoading">
                    <div class="spinner"></div>
                    <p>Loading VIP numbers...</p>
                </div>
            </div>

        </div>
    </section>

    <!-- ========== FOOTER ========== -->
    <footer class="footer">
        <div class="container">
            <div class="footer__grid">
                <div>
                    <a href="index.php" class="navbar__brand">
                        <span class="navbar__brand-icon">
                            <img src="logo.png" alt="Bhudev Sim Store Logo" class="navbar__logo">
                        </span>
                        <span class="navbar__brand-text">Bhudev <span class="gold-text">Sim Store</span></span>
                    </a>
                    <p class="footer__brand-desc">Bhudev Sim Store specializes in premium VIP mobile numbers, including fancy, lucky, repeating, and business numbers. We help you find the perfect number that makes a lasting impression.</p>
                    <div class="footer__social">
                        <a href="#" class="footer__social-link" aria-label="Facebook"><span class="iconify" data-icon="mdi:facebook"></span></a>
                        <a href="#" class="footer__social-link" aria-label="Instagram"><span class="iconify" data-icon="mdi:instagram"></span></a>
                        <a href="#" class="footer__social-link" aria-label="WhatsApp"><span class="iconify" data-icon="mdi:whatsapp"></span></a>
                        <a href="#" class="footer__social-link" aria-label="YouTube"><span class="iconify" data-icon="mdi:youtube"></span></a>
                    </div>
                </div>
                <div>
                    <h4 class="footer__heading">Quick Links</h4>
                    <ul class="footer__list">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="premium-numbers.php">Premium Numbers</a></li>
                        <li><a href="filter-numbers.php">Filter Numbers</a></li>
                        <li><a href="about-us.php">About Us</a></li>
                        <li><a href="contact-us.php">Contact Us</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="footer__heading">Legal</h4>
                    <ul class="footer__list">
                        <li><a href="privacy-policy.php">Privacy Policy</a></li>
                        <li><a href="privacy-policy.php">Shipping & Delivery</a></li>
                        <li><a href="privacy-policy.php">Refund & Cancellation</a></li>
                        <li><a href="privacy-policy.php">Terms of Service</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="footer__heading">Contact Us</h4>
                    <ul class="footer__contact-list">
                        <li>
                            <span class="iconify" data-icon="mdi:map-marker"></span>
                            <span>Main Market, New Delhi, India</span>
                        </li>
                        <li>
                            <span class="iconify" data-icon="mdi:phone"></span>
                            <span>+91 98765 43210</span>
                            <small>Mon - Sat: 10am - 7pm</small>
                        </li>
                        <li>
                            <span class="iconify" data-icon="mdi:email"></span>
                            <span>support@bhudevsimstore.com</span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="footer__bottom"><p>&copy; 2026 Bhudev Sim Store. All Rights Reserved.</p></div>
        </div>
    </footer>

    <script>
    (function () {
        "use strict";

        // ================================================================
        // CONFIG
        // ================================================================
        // Adjust this if your API file lives somewhere else relative to
        // this page. Example: this page is at /php/filter-numbers.php and
        // the API is at /php/api/get-numbers.php -> "api/get-numbers.php"
        const API_URL = "api/get-numbers.php";
        const WHATSAPP_NUMBER = "919999999999";

        const CATEGORY_LABELS = {
            "penta": "Penta",
            "hexa": "Hexa",
            "septa": "Septa",
            "octa": "Octa",
            "ending-aaaa": "Ending AAAA",
            "ab-ab": "AB AB",
            "abc-abc": "ABC ABC",
            "mirror": "Mirror",
            "786": "786",
            "doubling": "Doubling",
            "ending-aaa": "Ending AAA",
            "unique": "Unique"
        };

        // Cosmetic badge colors per category, cycling through a small palette
        // (purely visual — adjust freely, doesn't affect filtering)
        const CATEGORY_COLORS = {
            "hexa": "background: rgba(155, 109, 255, 0.12); color: var(--purple-accent);",
            "ab-ab": "background: rgba(155, 109, 255, 0.12); color: var(--purple-accent);",
            "mirror": "background: rgba(155, 109, 255, 0.12); color: var(--purple-accent);",
            "abc-abc": "background: rgba(52, 211, 153, 0.12); color: var(--green-accent);",
            "doubling": "background: rgba(52, 211, 153, 0.12); color: var(--green-accent);",
            "786": "background: rgba(52, 211, 153, 0.12); color: var(--green-accent);"
        };

        // ================================================================
        // STATE
        // ================================================================
        let allNumbers = [];      // full dataset, fetched once
        let hasLoaded = false;

        // ================================================================
        // DOM REFS
        // ================================================================
        const el = {
            form: document.getElementById("filterForm"),
            grid: document.getElementById("vipNumberGrid"),
            resultsCount: document.getElementById("resultsCount"),
            sortSelect: document.getElementById("sortSelect"),
            resetBtn: document.getElementById("resetFiltersBtn"),
            globalSearch: document.getElementById("globalSearch"),
            premiumStart: document.getElementById("premiumStart"),
            premiumAnywhere: document.getElementById("premiumAnywhere"),
            premiumEnd: document.getElementById("premiumEnd"),
            advanceStart: document.getElementById("advanceStart"),
            advanceAnywhere: document.getElementById("advanceAnywhere"),
            advanceEnd: document.getElementById("advanceEnd"),
            advanceMust: document.getElementById("advanceMust"),
            advanceNot: document.getElementById("advanceNot"),
            filterQuantity: document.getElementById("filterQuantity"),
            filterTotal: document.getElementById("filterTotal"),
            filterSum: document.getElementById("filterSum"),
            minPrice: document.getElementById("minPrice"),
            maxPrice: document.getElementById("maxPrice"),
            filterCategory: document.getElementById("filterCategory")
        };

        // ================================================================
        // INIT
        // ================================================================
        document.addEventListener("DOMContentLoaded", init);

        async function init() {
            bindNavAndTabs();
            bindFilterEvents();
            applyURLParamsToForm();
            await loadAllNumbers();
            hasLoaded = true;
            runFilters(false); // false = don't re-push the URL we just read from
        }

        // ================================================================
        // NAV + TAB SWITCHING (unchanged UI behaviour)
        // ================================================================
        function bindNavAndTabs() {
            const navbar = document.querySelector('[data-js="navbar"]');
            const menuOpen = document.querySelector('[data-js="menu-open"]');
            const menuClose = document.querySelector('[data-js="menu-close"]');
            const menuOverlay = document.querySelector('[data-js="menu-overlay"]');
            const body = document.body;

            const toggleMenu = () => body.classList.toggle("menu-open");
            if (menuOpen) menuOpen.addEventListener("click", toggleMenu);
            if (menuClose) menuClose.addEventListener("click", toggleMenu);
            if (menuOverlay) menuOverlay.addEventListener("click", toggleMenu);

            window.addEventListener("scroll", () => {
                if (navbar) navbar.classList.toggle("navbar--scrolled", window.scrollY > 50);
            });

            document.querySelectorAll(".search-tab").forEach(tab => {
                tab.addEventListener("click", () => {
                    document.querySelectorAll(".search-tab").forEach(t => t.classList.remove("active"));
                    document.querySelectorAll(".search-tab-content").forEach(c => c.classList.remove("active"));
                    tab.classList.add("active");
                    document.getElementById(`tab-${tab.dataset.tab}`).classList.add("active");
                });
            });
        }

        // ================================================================
        // DATA LOADING (fetch once)
        // ================================================================
        async function loadAllNumbers() {
            showGridState("loading");
            try {
                const res = await fetch(API_URL);
                const data = await res.json();
                if (data && data.success) {
                    allNumbers = Array.isArray(data.numbers) ? data.numbers : [];
                } else {
                    allNumbers = [];
                    showGridState("error", (data && data.message) || "Failed to load VIP numbers.");
                }
            } catch (err) {
                allNumbers = [];
                showGridState("error", "Unable to reach the server. Please try again.");
            }
        }

        // ================================================================
        // URL <-> FORM
        // ================================================================
        function applyURLParamsToForm() {
            const params = new URLSearchParams(window.location.search);

            if (params.has("number")) el.globalSearch.value = params.get("number");

            if (params.has("price")) {
                const [min, max] = params.get("price").split("-");
                if (min) el.minPrice.value = min;
                if (max) el.maxPrice.value = max;
            }

            if (params.has("category")) el.filterCategory.value = params.get("category");
            if (params.has("start")) { el.premiumStart.value = params.get("start"); el.advanceStart.value = params.get("start"); }
            if (params.has("end")) { el.premiumEnd.value = params.get("end"); el.advanceEnd.value = params.get("end"); }
            if (params.has("anywhere")) { el.premiumAnywhere.value = params.get("anywhere"); el.advanceAnywhere.value = params.get("anywhere"); }
            if (params.has("contain")) el.advanceMust.value = params.get("contain");
            if (params.has("notcontain")) el.advanceNot.value = params.get("notcontain");
            if (params.has("total")) el.filterTotal.value = params.get("total");
            if (params.has("sum")) el.filterSum.value = params.get("sum");
            if (params.has("quantity")) el.filterQuantity.value = params.get("quantity");
            if (params.has("sort")) el.sortSelect.value = params.get("sort");
        }

        function updateURLFromFilters(f) {
            const params = new URLSearchParams();

            if (f.number) params.set("number", f.number);
            if (f.minPrice || f.maxPrice) params.set("price", `${f.minPrice || ""}-${f.maxPrice || ""}`);
            if (f.category) params.set("category", f.category);
            if (f.start) params.set("start", f.start);
            if (f.end) params.set("end", f.end);
            if (f.anywhere) params.set("anywhere", f.anywhere);
            if (f.mustContainRaw) params.set("contain", f.mustContainRaw);
            if (f.notContainRaw) params.set("notcontain", f.notContainRaw);
            if (f.total) params.set("total", f.total);
            if (f.sum) params.set("sum", f.sum);
            if (f.quantity) params.set("quantity", f.quantity);
            if (f.sort && f.sort !== "default") params.set("sort", f.sort);

            const qs = params.toString();
            const newUrl = window.location.pathname + (qs ? `?${qs}` : "");
            window.history.pushState({}, "", newUrl);
        }

        // ================================================================
        // READ FILTERS FROM FORM
        // ================================================================
        function readFilters() {
            const digitsOnly = v => (v || "").replace(/[^0-9]/g, "");

            return {
                number: digitsOnly(el.globalSearch.value),
                start: digitsOnly(el.premiumStart.value) || digitsOnly(el.advanceStart.value),
                anywhere: digitsOnly(el.premiumAnywhere.value) || digitsOnly(el.advanceAnywhere.value),
                end: digitsOnly(el.premiumEnd.value) || digitsOnly(el.advanceEnd.value),
                mustContainRaw: el.advanceMust.value.trim(),
                mustContain: el.advanceMust.value.split(",").map(s => s.trim()).filter(Boolean),
                notContainRaw: el.advanceNot.value.trim(),
                notContain: el.advanceNot.value.split(",").map(s => s.trim()).filter(Boolean),
                quantity: parseInt(el.filterQuantity.value, 10) || null,
                total: el.filterTotal.value.trim(),
                sum: el.filterSum.value.trim(),
                minPrice: el.minPrice.value.trim(),
                maxPrice: el.maxPrice.value.trim(),
                category: el.filterCategory.value,
                sort: el.sortSelect.value
            };
        }

        // ================================================================
        // FILTER + SORT + RENDER
        // ================================================================
        function runFilters(pushToURL = true) {
            if (!hasLoaded) return;

            const f = readFilters();

            let results = allNumbers.filter(num => {
                const digits = String(num.mobile_number || "");

                if (f.number && !digits.includes(f.number)) return false;
                if (f.start && !digits.startsWith(f.start)) return false;
                if (f.anywhere && !digits.includes(f.anywhere)) return false;
                if (f.end && !digits.endsWith(f.end)) return false;
                if (f.mustContain.length && !f.mustContain.every(d => digits.includes(d))) return false;
                if (f.notContain.length && f.notContain.some(d => digits.includes(d))) return false;
                if (f.total !== "" && Number(num.sum1) !== Number(f.total)) return false;
                if (f.sum !== "" && Number(num.sum3) !== Number(f.sum)) return false;
                if (f.minPrice !== "" && Number(num.selling_price) < Number(f.minPrice)) return false;
                if (f.maxPrice !== "" && Number(num.selling_price) > Number(f.maxPrice)) return false;
                if (f.category && num.category !== f.category) return false;

                return true;
            });

            // "Family / Quantity": keep numbers whose category has at least
            // `quantity` matches within the current result set.
            if (f.quantity && f.quantity > 1) {
                const counts = {};
                results.forEach(n => { counts[n.category] = (counts[n.category] || 0) + 1; });
                results = results.filter(n => counts[n.category] >= f.quantity);
            }

            results = sortResults(results, f.sort);

            renderGrid(results);
            updateResultsCount(results.length);

            if (pushToURL) updateURLFromFilters(f);
        }

        function sortResults(results, sort) {
            const copy = results.slice();
            switch (sort) {
                case "price-low":
                    return copy.sort((a, b) => Number(a.selling_price) - Number(b.selling_price));
                case "price-high":
                    return copy.sort((a, b) => Number(b.selling_price) - Number(a.selling_price));
                case "number-low":
                    return copy.sort((a, b) => String(a.mobile_number).localeCompare(String(b.mobile_number)));
                case "number-high":
                    return copy.sort((a, b) => String(b.mobile_number).localeCompare(String(a.mobile_number)));
                case "newest":
                    return copy.sort((a, b) => new Date(b.created_at) - new Date(a.created_at));
                case "popular":
                    return copy.sort((a, b) => Number(b.views || 0) - Number(a.views || 0));
                default:
                    return copy;
            }
        }

        function updateResultsCount(count) {
            el.resultsCount.textContent = count;
        }

        // ================================================================
        // RENDERING
        // ================================================================
        function renderGrid(numbers) {
            if (!numbers.length) {
                showGridState("empty");
                return;
            }
            el.grid.innerHTML = numbers.map(cardHTML).join("");
        }

        function showGridState(type, message) {
            if (type === "loading") {
                el.grid.innerHTML = `
                    <div class="grid-state" id="gridLoading">
                        <div class="spinner"></div>
                        <p>Loading VIP numbers...</p>
                    </div>`;
            } else if (type === "empty") {
                el.grid.innerHTML = `
                    <div class="grid-state">
                        <span class="iconify" data-icon="mdi:magnify-close"></span>
                        <p>No VIP numbers match your filters. Try widening your search.</p>
                    </div>`;
                updateResultsCount(0);
            } else if (type === "error") {
                el.grid.innerHTML = `
                    <div class="grid-state grid-state--error">
                        <span class="iconify" data-icon="mdi:alert-circle"></span>
                        <p>${escapeHTML(message || "Something went wrong.")}</p>
                    </div>`;
                updateResultsCount(0);
            }
        }

        function cardHTML(n) {
            const digits = String(n.mobile_number || "");
            const catKey = n.category || "";
            const catLabel = CATEGORY_LABELS[catKey] || catKey;
            const catStyle = CATEGORY_COLORS[catKey] ? ` style="${CATEGORY_COLORS[catKey]}"` : "";
            const isAvailable = String(n.status).toLowerCase() === "available";

            const numberHTML = formatNumberHTML(digits, n.highlight_ranges);
            const sumLine = (n.sum1 !== undefined && n.sum1 !== null)
                ? `Sum = ${n.sum1} - ${n.sum2} - ${n.sum3}`
                : "";

            const original = Number(n.original_price) || 0;
            const selling = Number(n.selling_price) || 0;
            const discount = n.discount !== undefined && n.discount !== null ? n.discount : "";

            const waMessage = encodeURIComponent(`Hello, I am interested in VIP number ${digits}.`);

            const actionHTML = isAvailable
                ? `<a href="https://wa.me/${WHATSAPP_NUMBER}?text=${waMessage}" target="_blank" class="btn btn--whatsapp btn--sm"><span class="iconify" data-icon="mdi:whatsapp"></span> Buy</a>`
                : `<button class="btn btn--disabled btn--sm" style="flex: 1; justify-content: center;"><span class="iconify" data-icon="mdi:lock"></span> Sold Out</button>`;

            return `
                <article class="vip-card">
                    <div class="vip-card__inner">
                        <div class="vip-card__top">
                            <span class="vip-card__badge"${catStyle}>${escapeHTML(catLabel)}</span>
                            <span class="vip-card__status vip-card__status--${isAvailable ? "available" : "sold"}">
                                <span class="iconify" data-icon="mdi:${isAvailable ? "check-circle" : "close-circle"}"></span> ${isAvailable ? "Available" : "Sold"}
                            </span>
                        </div>
                        <div class="vip-card__number-area">
                            <span class="vip-card__prefix">+91</span>
                            <h3 class="vip-card__number">${numberHTML}</h3>
                            ${sumLine ? `<span class="vip-card__sum">${escapeHTML(sumLine)}</span>` : ""}
                        </div>
                        <div class="vip-card__divider"></div>
                        <div class="vip-card__prices">
                            <div class="price-block--original">
                                <span class="price-original">₹${original.toLocaleString("en-IN")}</span>
                                ${discount !== "" ? `<span class="discount-badge">${discount}% OFF</span>` : ""}
                            </div>
                            <div class="price-block--selling">
                                <span class="price-selling">₹${selling.toLocaleString("en-IN")}</span>
                            </div>
                        </div>
                        <div class="vip-card__actions">
                            ${actionHTML}
                        </div>
                    </div>
                </article>`;
        }

        // Highlights a portion of the number in gold and groups digits in
        // 5s for readability. `highlightRange` is expected in the DB as a
        // 1-based "start-end" string, e.g. "6-10". Falls back to
        // highlighting the last 5 digits if not provided.
        function formatNumberHTML(digits, highlightRange) {
            let start = Math.max(digits.length - 5, 0);
            let end = digits.length;

            if (highlightRange && typeof highlightRange === "string" && highlightRange.includes("-")) {
                const parts = highlightRange.split("-").map(n => parseInt(n, 10));
                if (parts.length === 2 && !isNaN(parts[0]) && !isNaN(parts[1])) {
                    start = Math.max(parts[0] - 1, 0);
                    end = Math.min(parts[1], digits.length);
                }
            }

            let html = "";
            let spanOpen = false;
            for (let i = 0; i < digits.length; i++) {
                if (i > 0 && i % 5 === 0) html += " ";
                if (i === start && start < end) { html += '<span class="highlight-gold">'; spanOpen = true; }
                html += escapeHTML(digits[i]);
                if (i === end - 1 && spanOpen) { html += "</span>"; spanOpen = false; }
            }
            if (spanOpen) html += "</span>";
            return html;
        }

        function escapeHTML(str) {
            return String(str)
                .replace(/&/g, "&amp;")
                .replace(/</g, "&lt;")
                .replace(/>/g, "&gt;")
                .replace(/"/g, "&quot;");
        }

        // ================================================================
        // EVENTS
        // ================================================================
        function bindFilterEvents() {
            el.form.addEventListener("submit", e => {
                e.preventDefault();
                runFilters(true);
            });

            el.sortSelect.addEventListener("change", () => runFilters(true));

            el.resetBtn.addEventListener("click", () => {
                el.form.reset();
                window.history.pushState({}, "", window.location.pathname);
                runFilters(false);
            });

            // Live search as you type in the Global Search box (debounced)
            let debounceTimer;
            el.globalSearch.addEventListener("input", () => {
                clearTimeout(debounceTimer);
                debounceTimer = setTimeout(() => runFilters(true), 350);
            });
        }
    })();
    </script>
</body>
</html>