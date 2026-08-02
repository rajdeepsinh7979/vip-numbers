<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Login to your Bhudev Sim Store account to access premium VIP mobile numbers.">
    <title>Login — Bhudev Sim Store</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800;900&family=Poppins:wght@300;400;500;600;700;800&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://code.iconify.design/3/3.1.0/iconify.min.js"></script>
    <link rel="stylesheet" href="public/css/login.css">
</head>
<body>

    <!-- ========== LOGIN HERO (Background Stage) ========== -->
    <section class="login-hero">
        <div class="hero__bg">
            <span class="hero__particle" style="--x:6%;--d:0s;--dur:13s;--s:2px;"></span>
            <span class="hero__particle" style="--x:22%;--d:2.5s;--dur:15s;--s:2.5px;"></span>
            <span class="hero__particle" style="--x:45%;--d:4s;--dur:11s;--s:2px;"></span>
            <span class="hero__particle" style="--x:65%;--d:1.5s;--dur:14s;--s:3px;"></span>
            <span class="hero__particle" style="--x:82%;--d:3.5s;--dur:12s;--s:2px;"></span>
            <span class="hero__particle" style="--x:94%;--d:5.5s;--dur:16s;--s:2.5px;"></span>
        </div>
        <div class="hero__grid-pattern"></div>

        <!-- Geometric decorations visible around the container -->
        <div class="login-hero__geo login-hero__geo--1" aria-hidden="true"></div>
        <div class="login-hero__geo login-hero__geo--2" aria-hidden="true"></div>
        <div class="login-hero__geo login-hero__geo--3" aria-hidden="true"></div>

        <!-- ========== GLASSMORPHISM CONTAINER ========== -->
        <div class="login-glass-container">
            <div class="login-hero__inner">

                <!-- LEFT: Logo Showcase -->
                <div class="login-hero__logo-col">
                    <div class="login-hero__logo-card">
                        <div class="login-hero__logo-glow"></div>
                        <div class="login-hero__logo-border"></div>
                        <div class="login-hero__logo-content">
                            <img src="logo.png" alt="Bhudev Sim Store" class="login-hero__logo-img" onerror="this.style.display='none'">
                            <div class="login-hero__logo-text">
                                <span class="login-hero__logo-name">Bhudev <span class="gold-text">Sim Store</span></span>
                                <span class="login-hero__logo-tagline">Premium VIP Numbers</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- RIGHT: Login Form -->
                <div class="login-hero__form-col">
                    <span class="login-hero__label">
                        <span class="iconify" data-icon="mdi:lock-open"></span>
                        Welcome Back
                    </span>
                    <h1 class="login-hero__title">
                        Sign in to your <span class="gold-shimmer">Account</span>
                    </h1>
                    <p class="login-hero__subtitle">
                        Login to access your dashboard, track orders, and manage your premium VIP mobile number collection.
                    </p>

                    <!-- Login Form (Transparent inside the glass container) -->
                    <form class="login-card" id="loginForm" novalidate>

                        <!-- Email / Phone -->
                        <div class="form-group">
                            <label class="form-label" for="loginIdentifier">
                                <span class="iconify" data-icon="mdi:account-outline"></span>
                                Email or Mobile Number
                            </label>
                            <div class="input-wrap" id="identifierWrap">
                                <span class="input-wrap__icon">
                                    <span class="iconify" data-icon="mdi:account-circle-outline"></span>
                                </span>
                                <input
                                    type="text"
                                    id="loginIdentifier"
                                    name="identifier"
                                    class="form-input"
                                    placeholder="you@example.com or +91 98765 43210"
                                    autocomplete="username"
                                    required
                                >
                            </div>
                            <div class="form-error" id="identifierError">
                                <span class="iconify" data-icon="mdi:alert-circle-outline"></span>
                                <span id="identifierErrorText">Please enter a valid email or mobile number.</span>
                            </div>
                        </div>

                        <!-- Password with show/hide -->
                        <div class="form-group">
                            <label class="form-label" for="loginPassword">
                                <span class="iconify" data-icon="mdi:shield-key-outline"></span>
                                Password
                            </label>
                            <div class="input-wrap" id="passwordWrap">
                                <span class="input-wrap__icon">
                                    <span class="iconify" data-icon="mdi:lock-outline"></span>
                                </span>
                                <input
                                    type="password"
                                    id="loginPassword"
                                    name="password"
                                    class="form-input"
                                    placeholder="Enter your password"
                                    autocomplete="current-password"
                                    required
                                >
                                <button
                                    type="button"
                                    class="pwd-toggle"
                                    id="pwdToggle"
                                    aria-label="Show password"
                                    aria-pressed="false"
                                >
                                    <span class="iconify" data-icon="mdi:eye-outline" id="pwdToggleIcon"></span>
                                </button>
                            </div>
                            <div class="form-error" id="passwordError">
                                <span class="iconify" data-icon="mdi:alert-circle-outline"></span>
                                <span>Password must be at least 6 characters.</span>
                            </div>
                        </div>

                        <!-- Forgot password link -->
                        <div class="form-row">
                            <a href="#" id="forgotPasswordLink" class="forgot-link">Forgot password?</a>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn--gold btn--lg btn--flex" id="loginBtn">
                            <span class="iconify" data-icon="mdi:login"></span>
                            Sign In
                        </button>

                    </form>

                    <a href="index.php" class="back-home">
                        <span class="iconify" data-icon="mdi:arrow-left"></span>
                        Back to home
                    </a>
                </div>

            </div>
        </div>
    </section>

    <script>
        /* ============================================
           FORGOT PASSWORD — hit the API, then 60s cooldown
           ============================================ */
        const forgotLink = document.getElementById('forgotPasswordLink');
        const FORGOT_API = 'api/forgot_password.php';
        const FORGOT_DEFAULT_TEXT = forgotLink.textContent;
        let forgotCooldownInterval = null;

        forgotLink.addEventListener('click', function(e) {
            e.preventDefault();
            if (forgotLink.classList.contains('is-disabled')) return;

            forgotLink.classList.add('is-disabled');
            forgotLink.style.pointerEvents = 'none';
            forgotLink.textContent = 'Sending...';

            fetch(FORGOT_API, { method: 'POST', cache: 'no-store' })
                .then(function(res) { return res.json(); })
                .then(function(data) {
                    if (data.success) {
                        startForgotCooldown();
                    } else {
                        forgotLink.textContent = data.message || 'Could not send reset link';
                        forgotLink.classList.remove('is-disabled');
                        forgotLink.style.pointerEvents = '';
                        setTimeout(function() { forgotLink.textContent = FORGOT_DEFAULT_TEXT; }, 3000);
                    }
                })
                .catch(function() {
                    forgotLink.textContent = 'Failed to reach the server';
                    forgotLink.classList.remove('is-disabled');
                    forgotLink.style.pointerEvents = '';
                    setTimeout(function() { forgotLink.textContent = FORGOT_DEFAULT_TEXT; }, 3000);
                });
        });

        function startForgotCooldown() {
            let secondsLeft = 60;
            forgotLink.textContent = 'Resend in ' + secondsLeft + 's';

            forgotCooldownInterval = setInterval(function() {
                secondsLeft--;
                if (secondsLeft <= 0) {
                    clearInterval(forgotCooldownInterval);
                    forgotLink.textContent = FORGOT_DEFAULT_TEXT;
                    forgotLink.classList.remove('is-disabled');
                    forgotLink.style.pointerEvents = '';
                } else {
                    forgotLink.textContent = 'Resend in ' + secondsLeft + 's';
                }
            }, 1000);
        }

        /* ============================================
           PASSWORD SHOW / HIDE TOGGLE
           ============================================ */
        const pwdInput   = document.getElementById('loginPassword');
        const pwdToggle  = document.getElementById('pwdToggle');
        const pwdIcon    = document.getElementById('pwdToggleIcon');

        pwdToggle.addEventListener('click', () => {
            const isHidden = pwdInput.type === 'password';
            pwdInput.type = isHidden ? 'text' : 'password';
            pwdToggle.setAttribute('aria-label', isHidden ? 'Hide password' : 'Show password');
            pwdToggle.setAttribute('aria-pressed', String(isHidden));
            pwdIcon.setAttribute('data-icon', isHidden ? 'mdi:eye-off-outline' : 'mdi:eye-outline');
        });

        /* ============================================
           FORM VALIDATION + SUBMIT
           ============================================ */
        const form              = document.getElementById('loginForm');
        const identifier        = document.getElementById('loginIdentifier');
        const password          = document.getElementById('loginPassword');
        const identifierWrap    = document.getElementById('identifierWrap');
        const passwordWrap      = document.getElementById('passwordWrap');
        const identifierError   = document.getElementById('identifierError');
        const identifierErrorText = document.getElementById('identifierErrorText');
        const passwordError     = document.getElementById('passwordError');
        const loginBtn          = document.getElementById('loginBtn');

        const LOGIN_API = 'api/login.php';
        const DEFAULT_IDENTIFIER_ERROR = 'Please enter a valid email or mobile number.';

        function clearErrors() {
            identifierError.classList.remove('is-visible');
            passwordError.classList.remove('is-visible');
            identifierWrap.classList.remove('input-wrap--error');
            passwordWrap.classList.remove('input-wrap--error');
            identifierErrorText.textContent = DEFAULT_IDENTIFIER_ERROR;
        }

        identifier.addEventListener('input', clearErrors);
        password.addEventListener('input', clearErrors);

        form.addEventListener('submit', (e) => {
            e.preventDefault();
            clearErrors();

            let valid = true;
            const idVal    = identifier.value.trim();
            const pwdVal   = password.value;

            // Validate identifier (email or 10-digit mobile)
            const emailRe  = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            const phoneRe  = /^(\+?91)?[\s-]?[6-9]\d{9}$/;
            if (!idVal || (!emailRe.test(idVal) && !phoneRe.test(idVal))) {
                identifierError.classList.add('is-visible');
                identifierWrap.classList.add('input-wrap--error');
                valid = false;
            }

            // Validate password
            if (!pwdVal || pwdVal.length < 6) {
                passwordError.classList.add('is-visible');
                passwordWrap.classList.add('input-wrap--error');
                valid = false;
            }

            if (!valid) return;

            const originalHTML = loginBtn.innerHTML;
            loginBtn.innerHTML = '<span class="iconify" data-icon="mdi:loading" style="animation: spin 1s linear infinite;"></span> Signing in...';
            loginBtn.disabled = true;

            const formData = new FormData();
            formData.append('identifier', idVal);
            formData.append('password', pwdVal);

            fetch(LOGIN_API, { method: 'POST', body: formData, cache: 'no-store' })
                .then(function(res) { return res.json(); })
                .then(function(data) {
                    if (data.success) {
                        window.location.href = data.redirect || 'admin/dashboard.php';
                        return; // leave the button disabled — the page is navigating away
                    }

                    identifierErrorText.textContent = data.message || 'Invalid email/mobile or password.';
                    identifierError.classList.add('is-visible');
                    identifierWrap.classList.add('input-wrap--error');
                    passwordWrap.classList.add('input-wrap--error');
                    loginBtn.innerHTML = originalHTML;
                    loginBtn.disabled = false;
                })
                .catch(function() {
                    identifierErrorText.textContent = 'Could not reach the server. Please try again.';
                    identifierError.classList.add('is-visible');
                    loginBtn.innerHTML = originalHTML;
                    loginBtn.disabled = false;
                });
        });
    </script>
</body>
</html>