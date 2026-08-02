<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Reset your Bhudev Sim Store account password.">
    <title>Reset Password — Bhudev Sim Store</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800;900&family=Poppins:wght@300;400;500;600;700;800&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://code.iconify.design/3/3.1.0/iconify.min.js"></script>
    <link rel="stylesheet" href="public/css/forgot-password.css">
</head>
<body>

    <!-- ========== RESET HERO (Background Stage) ========== -->
    <section class="reset-hero">
        <div class="hero__bg">
            <span class="hero__particle" style="--x:6%;--d:0s;--dur:13s;--s:2px;"></span>
            <span class="hero__particle" style="--x:22%;--d:2.5s;--dur:15s;--s:2.5px;"></span>
            <span class="hero__particle" style="--x:45%;--d:4s;--dur:11s;--s:2px;"></span>
            <span class="hero__particle" style="--x:65%;--d:1.5s;--dur:14s;--s:3px;"></span>
            <span class="hero__particle" style="--x:82%;--d:3.5s;--dur:12s;--s:2px;"></span>
            <span class="hero__particle" style="--x:94%;--d:5.5s;--dur:16s;--s:2.5px;"></span>
        </div>
        <div class="hero__grid-pattern"></div>

        <div class="reset-hero__geo reset-hero__geo--1" aria-hidden="true"></div>
        <div class="reset-hero__geo reset-hero__geo--2" aria-hidden="true"></div>
        <div class="reset-hero__geo reset-hero__geo--3" aria-hidden="true"></div>

        <!-- ========== GLASSMORPHISM CONTAINER ========== -->
        <div class="reset-glass-container">
            <div class="reset-hero__inner">

                <!-- LEFT: Logo Showcase -->
                <div class="reset-hero__logo-col">
                    <div class="reset-hero__logo-card">
                        <div class="reset-hero__logo-glow"></div>
                        <div class="reset-hero__logo-border"></div>
                        <div class="reset-hero__logo-content">
                            <img src="logo.png" alt="Bhudev Sim Store" class="reset-hero__logo-img" onerror="this.style.display='none'">
                            <div class="reset-hero__logo-text">
                                <span class="reset-hero__logo-name">Bhudev <span class="gold-text">Sim Store</span></span>
                                <span class="reset-hero__logo-tagline">Premium VIP Numbers</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- RIGHT: Reset Password Form -->
                <div class="reset-hero__form-col">

                    <!-- Checking-code State (visible while we verify the link) -->
                    <div id="checkingState">
                        <span class="reset-hero__label">
                            <span class="iconify" data-icon="mdi:timer-sand"></span>
                            Checking your link...
                        </span>
                        <h1 class="reset-hero__title">
                            Verifying <span class="gold-shimmer">Reset Link</span>
                        </h1>
                        <p class="reset-hero__subtitle">
                            Hang tight while we confirm this reset link is still valid.
                        </p>
                    </div>

                    <!-- Form State (hidden until the code is verified) -->
                    <div id="formState" style="display:none;">
                        <span class="reset-hero__label">
                            <span class="iconify" data-icon="mdi:lock-reset"></span>
                            Reset Password
                        </span>
                        <h1 class="reset-hero__title">
                            Create a <span class="gold-shimmer">New Password</span>
                        </h1>
                        <p class="reset-hero__subtitle">
                            Choose a strong password to secure your account. Make sure it's something you can remember.
                        </p>

                        <!-- Reset Password Form -->
                        <form class="reset-card" id="resetForm" novalidate>

                            <!-- New Password -->
                            <div class="form-group">
                                <label class="form-label" for="newPassword">
                                    <span class="iconify" data-icon="mdi:shield-key-outline"></span>
                                    New Password
                                </label>
                                <div class="input-wrap" id="newPasswordWrap">
                                    <span class="input-wrap__icon">
                                        <span class="iconify" data-icon="mdi:lock-outline"></span>
                                    </span>
                                    <input
                                        type="password"
                                        id="newPassword"
                                        name="newPassword"
                                        class="form-input"
                                        placeholder="Enter new password"
                                        autocomplete="new-password"
                                        required
                                    >
                                    <button
                                        type="button"
                                        class="pwd-toggle"
                                        id="newPwdToggle"
                                        aria-label="Show new password"
                                        aria-pressed="false"
                                    >
                                        <span class="iconify" data-icon="mdi:eye-outline" id="newPwdToggleIcon"></span>
                                    </button>
                                </div>
                                <div class="form-error" id="newPasswordError">
                                    <span class="iconify" data-icon="mdi:alert-circle-outline"></span>
                                    <span id="newPasswordErrorText">Password must be at least 8 characters.</span>
                                </div>

                                <!-- Strength Meter -->
                                <div class="strength-meter" id="strengthMeter">
                                    <div class="strength-meter__bar" id="strBar1"></div>
                                    <div class="strength-meter__bar" id="strBar2"></div>
                                    <div class="strength-meter__bar" id="strBar3"></div>
                                    <div class="strength-meter__bar" id="strBar4"></div>
                                </div>
                                <div class="strength-label" id="strengthLabel"></div>

                                <!-- Password Requirements -->
                                <div class="pwd-requirements">
                                    <div class="pwd-req" id="reqLength">
                                        <span class="iconify" data-icon="mdi:close-circle-outline"></span>
                                        <span>8+ characters</span>
                                    </div>
                                    <div class="pwd-req" id="reqUpper">
                                        <span class="iconify" data-icon="mdi:close-circle-outline"></span>
                                        <span>Uppercase letter</span>
                                    </div>
                                    <div class="pwd-req" id="reqLower">
                                        <span class="iconify" data-icon="mdi:close-circle-outline"></span>
                                        <span>Lowercase letter</span>
                                    </div>
                                    <div class="pwd-req" id="reqNumber">
                                        <span class="iconify" data-icon="mdi:close-circle-outline"></span>
                                        <span>Number</span>
                                    </div>
                                    <div class="pwd-req" id="reqSpecial">
                                        <span class="iconify" data-icon="mdi:close-circle-outline"></span>
                                        <span>Special character</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Confirm Password -->
                            <div class="form-group">
                                <label class="form-label" for="confirmPassword">
                                    <span class="iconify" data-icon="mdi:check-decagram-outline"></span>
                                    Confirm Password
                                </label>
                                <div class="input-wrap" id="confirmPasswordWrap">
                                    <span class="input-wrap__icon">
                                        <span class="iconify" data-icon="mdi:lock-check-outline"></span>
                                    </span>
                                    <input
                                        type="password"
                                        id="confirmPassword"
                                        name="confirmPassword"
                                        class="form-input"
                                        placeholder="Re-enter new password"
                                        autocomplete="new-password"
                                        required
                                    >
                                    <button
                                        type="button"
                                        class="pwd-toggle"
                                        id="confirmPwdToggle"
                                        aria-label="Show confirm password"
                                        aria-pressed="false"
                                    >
                                        <span class="iconify" data-icon="mdi:eye-outline" id="confirmPwdToggleIcon"></span>
                                    </button>
                                </div>
                                <div class="form-error" id="confirmPasswordError">
                                    <span class="iconify" data-icon="mdi:alert-circle-outline"></span>
                                    <span id="confirmPasswordErrorText">Passwords do not match.</span>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <button type="submit" class="btn btn--gold btn--lg btn--flex" id="resetBtn">
                                <span class="iconify" data-icon="mdi:check-circle-outline"></span>
                                Reset Password
                            </button>

                        </form>

                        <a href="login.php" class="back-login">
                            <span class="iconify" data-icon="mdi:arrow-left"></span>
                            Back to login
                        </a>
                    </div>

                    <!-- Success State (hidden by default) -->
                    <div class="success-state" id="successState">
                        <div class="success-icon-wrap">
                            <span class="iconify" data-icon="mdi:check-circle"></span>
                        </div>
                        <h2 class="success-title">Password Updated!</h2>
                        <p class="success-desc">
                            Your password has been reset successfully. You can now sign in with your new credentials.
                        </p>
                        <a href="login.php" class="btn btn--gold btn--lg" style="margin-top: 8px;">
                            <span class="iconify" data-icon="mdi:login"></span>
                            Sign In Now
                        </a>
                    </div>

                </div>

            </div>
        </div>
    </section>

    <script>
        /* ============================================
           READ CODE FROM URL + VERIFY IT ON LOAD
           ============================================ */
        const VERIFY_API = 'api/verify_reset_code.php';
        const RESET_API  = 'api/reset_password.php';

        const params = new URLSearchParams(window.location.search);
        const resetCode = params.get('cod');

        const checkingState = document.getElementById('checkingState');
        const formState = document.getElementById('formState');

        if (!resetCode) {
            window.location.href = 'error.php?msg=' + encodeURIComponent('No reset code was provided in the link.');
        } else {
            fetch(VERIFY_API + '?code=' + encodeURIComponent(resetCode), { cache: 'no-store' })
                .then(function(res) { return res.json(); })
                .then(function(data) {
                    if (data.success) {
                        checkingState.style.display = 'none';
                        formState.style.display = '';
                    } else {
                        window.location.href = 'error.php?msg=' + encodeURIComponent(data.message || 'This reset link is invalid or has expired.');
                    }
                })
                .catch(function() {
                    window.location.href = 'error.php?msg=' + encodeURIComponent('Could not verify this reset link. Please try again.');
                });
        }

        /* ============================================
           PASSWORD SHOW / HIDE TOGGLES
           ============================================ */
        function setupPwdToggle(inputId, toggleId, iconId) {
            const input = document.getElementById(inputId);
            const toggle = document.getElementById(toggleId);
            const icon = document.getElementById(iconId);

            toggle.addEventListener('click', () => {
                const isHidden = input.type === 'password';
                input.type = isHidden ? 'text' : 'password';
                toggle.setAttribute('aria-label', isHidden ? 'Hide password' : 'Show password');
                toggle.setAttribute('aria-pressed', String(isHidden));
                icon.setAttribute('data-icon', isHidden ? 'mdi:eye-off-outline' : 'mdi:eye-outline');
            });
        }

        setupPwdToggle('newPassword', 'newPwdToggle', 'newPwdToggleIcon');
        setupPwdToggle('confirmPassword', 'confirmPwdToggle', 'confirmPwdToggleIcon');

        /* ============================================
           PASSWORD STRENGTH METER + REQUIREMENTS
           ============================================ */
        const newPasswordInput = document.getElementById('newPassword');
        const bars = [
            document.getElementById('strBar1'),
            document.getElementById('strBar2'),
            document.getElementById('strBar3'),
            document.getElementById('strBar4')
        ];
        const strengthLabel = document.getElementById('strengthLabel');

        const reqs = {
            length:  document.getElementById('reqLength'),
            upper:   document.getElementById('reqUpper'),
            lower:   document.getElementById('reqLower'),
            number:  document.getElementById('reqNumber'),
            special: document.getElementById('reqSpecial')
        };

        function updateReq(el, met) {
            if (met) {
                el.classList.add('pwd-req--met');
                el.querySelector('.iconify').setAttribute('data-icon', 'mdi:check-circle-outline');
            } else {
                el.classList.remove('pwd-req--met');
                el.querySelector('.iconify').setAttribute('data-icon', 'mdi:close-circle-outline');
            }
        }

        function getStrength(pwd) {
            let score = 0;
            const hasLength  = pwd.length >= 8;
            const hasUpper   = /[A-Z]/.test(pwd);
            const hasLower   = /[a-z]/.test(pwd);
            const hasNumber  = /[0-9]/.test(pwd);
            const hasSpecial = /[^A-Za-z0-9]/.test(pwd);

            if (hasLength)  score++;
            if (hasUpper)   score++;
            if (hasLower)   score++;
            if (hasNumber)  score++;
            if (hasSpecial) score++;

            updateReq(reqs.length,  hasLength);
            updateReq(reqs.upper,   hasUpper);
            updateReq(reqs.lower,   hasLower);
            updateReq(reqs.number,  hasNumber);
            updateReq(reqs.special, hasSpecial);

            return score;
        }

        newPasswordInput.addEventListener('input', () => {
            const pwd = newPasswordInput.value;
            const score = getStrength(pwd);

            bars.forEach(bar => {
                bar.className = 'strength-meter__bar';
            });
            strengthLabel.className = 'strength-label';
            strengthLabel.textContent = '';

            if (pwd.length === 0) return;

            let level, label, count;
            if (score <= 2) {
                level = 'weak'; label = 'Weak'; count = 1;
            } else if (score === 3) {
                level = 'fair'; label = 'Fair'; count = 2;
            } else if (score === 4) {
                level = 'good'; label = 'Good'; count = 3;
            } else {
                level = 'strong'; label = 'Strong'; count = 4;
            }

            for (let i = 0; i < count; i++) {
                bars[i].classList.add('strength-meter__bar--active', level);
            }
            strengthLabel.classList.add(level);
            strengthLabel.textContent = label;

            clearErrors();
        });

        /* ============================================
           FORM VALIDATION + SUBMIT (now hits reset_password.php)
           ============================================ */
        const form = document.getElementById('resetForm');
        const confirmPasswordInput = document.getElementById('confirmPassword');
        const newPasswordWrap = document.getElementById('newPasswordWrap');
        const confirmPasswordWrap = document.getElementById('confirmPasswordWrap');
        const newPasswordError = document.getElementById('newPasswordError');
        const newPasswordErrorText = document.getElementById('newPasswordErrorText');
        const confirmPasswordError = document.getElementById('confirmPasswordError');
        const confirmPasswordErrorText = document.getElementById('confirmPasswordErrorText');
        const resetBtn = document.getElementById('resetBtn');

        const DEFAULT_NEW_PWD_ERROR = 'Password must be at least 8 characters.';
        const DEFAULT_CONFIRM_ERROR = 'Passwords do not match.';

        function clearErrors() {
            newPasswordError.classList.remove('is-visible');
            confirmPasswordError.classList.remove('is-visible');
            newPasswordWrap.classList.remove('input-wrap--error');
            confirmPasswordWrap.classList.remove('input-wrap--error');
            newPasswordErrorText.textContent = DEFAULT_NEW_PWD_ERROR;
            confirmPasswordErrorText.textContent = DEFAULT_CONFIRM_ERROR;
        }

        confirmPasswordInput.addEventListener('input', clearErrors);

        form.addEventListener('submit', (e) => {
            e.preventDefault();
            clearErrors();

            let valid = true;
            const newPwd = newPasswordInput.value;
            const confirmPwd = confirmPasswordInput.value;

            if (!newPwd || newPwd.length < 8) {
                newPasswordError.classList.add('is-visible');
                newPasswordWrap.classList.add('input-wrap--error');
                valid = false;
            }

            if (!confirmPwd || newPwd !== confirmPwd) {
                confirmPasswordError.classList.add('is-visible');
                confirmPasswordWrap.classList.add('input-wrap--error');
                valid = false;
            }

            if (!valid) return;

            const originalHTML = resetBtn.innerHTML;
            resetBtn.innerHTML = '<span class="iconify" data-icon="mdi:loading" style="animation: spin 1s linear infinite;"></span> Resetting...';
            resetBtn.disabled = true;

            const formData = new FormData();
            formData.append('code', resetCode);
            formData.append('new_password', newPwd);
            formData.append('confirm_password', confirmPwd);

            fetch(RESET_API, { method: 'POST', body: formData, cache: 'no-store' })
                .then(function(res) { return res.json(); })
                .then(async function(data) {
                    if (data.success) {
                        await addActivity(
                            "Password Reset",
                            "Password changed using reset link",
                            "purple"
                        );
                        document.getElementById('formState').style.display = 'none';
                        document.getElementById('successState').classList.add('is-visible');
                        
                    } else {
                        newPasswordErrorText.textContent = data.message || 'Could not reset password.';
                        newPasswordError.classList.add('is-visible');
                        newPasswordWrap.classList.add('input-wrap--error');
                        resetBtn.innerHTML = originalHTML;
                        resetBtn.disabled = false;
                    }
                })
                .catch(function() {
                    newPasswordErrorText.textContent = 'Could not reach the server. Please try again.';
                    newPasswordError.classList.add('is-visible');
                    resetBtn.innerHTML = originalHTML;
                    resetBtn.disabled = false;
                });
        });
        async function addActivity(title, description, color) {

            console.log("addActivity called", title, description, color);

            const formData = new FormData();
            formData.append("title", title);
            formData.append("description", description);
            formData.append("color", color);

            const response = await fetch("api/add_activity.php", {
                method: "POST",
                body: formData
            });

            const result = await response.json();
            return result;
        }
    </script>
</body>
</html>