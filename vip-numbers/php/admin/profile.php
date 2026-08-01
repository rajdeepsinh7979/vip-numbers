<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile — VIP Number Admin</title>
    <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700;900&family=DM+Sans:ital,opsz,wght@0,9..40,300;0,9..40,400;0,9..40,500;0,9..40,600;0,9..40,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../public/css/profile.css">
</head>
<body>
    <!-- Gold top accent line -->
    <div class="gold-line"></div>

    <!-- Toast container -->
    <div class="toast-container" id="toastContainer"></div>

    <!-- Mobile sidebar overlay -->
    <div class="sidebar-overlay" id="sidebarOverlay" onclick="toggleSidebar()"></div>

    <!-- Sidebar -->
    <aside class="sidebar" id="sidebar">
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

        <nav class="sidebar-nav" aria-label="Main navigation">
            <p class="nav-section-label">Main</p>
            <a href="dashboard.php" class="sidebar-link" data-section="stats">
                <i data-lucide="layout-dashboard"></i> Dashboard
            </a>
            <a href="add-numbers.php" class="sidebar-link" data-section="numbers">
                <i data-lucide="phone"></i> Add Numbers
            </a>
            <a href="numbers.php" class="sidebar-link" data-section="numberStatus">
                <i data-lucide="check-circle"></i> Number List &amp; Status
            </a>
            <p class="nav-section-label nav-section-label--spaced">Settings</p>
            <a href="profile.php" class="sidebar-link active" data-section="profile">
                <i data-lucide="user"></i> Profile
            </a>
            <a href="logout.php" class="sidebar-link">
                <i data-lucide="log-out"></i> Logout
            </a>
        </nav>

        <div class="sidebar-footer">
            <div class="glass-card glass-card--static sidebar-health-card">
                <p class="sidebar-health-title">Inventory Health</p>
                <p class="sidebar-health-text">8,432 numbers available across 5 categories</p>
                <div class="progress-track progress-track--compact" style="margin-top:12px;">
                    <div class="progress-fill progress-fill--gold" style="width:65%"></div>
                </div>
            </div>
        </div>
    </aside>

    <!-- Main content wrapper -->
    <div class="main-wrapper" id="mainWrapper">
        <!-- Dashboard header -->
        <header class="dashboard-header">
            <div class="header-inner">
                <div class="header-left">
                    <button class="menu-toggle" onclick="toggleSidebar()" aria-label="Toggle menu">
                        <i data-lucide="menu"></i>
                    </button>
                    <div>
                        <h2 class="page-title">My Profile</h2>
                        <p class="page-subtitle">Manage your account settings</p>
                    </div>
                </div>

                <div class="header-right">
                    <!-- Notification -->
                    <div class="notification-wrapper">
                        <button class="notification-btn" onclick="toggleDropdown('notifDropdown')" aria-label="Notifications">
                            <i data-lucide="bell"></i>
                            <span class="notification-badge pulse-dot">3</span>
                        </button>
                        <div class="dropdown dropdown--wide" id="notifDropdown">
                            <p class="notif-dropdown-label">Notifications</p>
                            <div class="notif-item">
                                <div class="notif-item-icon notif-item-icon--green">
                                    <i data-lucide="plus-circle"></i>
                                </div>
                                <div>
                                    <p class="notif-item-title">New number added</p>
                                    <p class="notif-item-time">2 minutes ago</p>
                                </div>
                            </div>
                            <div class="notif-item">
                                <div class="notif-item-icon notif-item-icon--gold">
                                    <i data-lucide="star"></i>
                                </div>
                                <div>
                                    <p class="notif-item-title">Premium number tagged</p>
                                    <p class="notif-item-time">15 minutes ago</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Profile -->
                    <div class="profile-wrapper">
                        <button class="profile-btn" onclick="toggleDropdown('profileDropdown')" aria-label="Profile menu">
                            <div class="profile-avatar">
                                <span id="headerAvatarInitials">A</span>
                            </div>
                            <span class="profile-name" id="headerProfileName">Admin</span>
                            <i data-lucide="chevron-down" class="profile-chevron"></i>
                        </button>
                        <div class="dropdown" id="profileDropdown">
                            <div class="dropdown-header">
                                <p class="dropdown-header-name" id="headerDropdownName">Admin User</p>
                                <p class="dropdown-header-email" id="headerDropdownEmail">admin@vipnumbers.com</p>
                            </div>
                            <a href="profile.php" class="dropdown-item">
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

        <!-- Page content -->
        <main class="dashboard-content">
            <div class="profile-layout">

                <!-- Profile Header Card -->
                <section class="glass-card glass-card--static profile-hero-card reveal">
                    <div class="profile-header-inner">
                        <div class="profile-avatar-wrapper">
                            <div class="avatar-ring">
                                <div class="avatar-inner">
                                    <span class="avatar-initials" id="avatarInitials">—</span>
                                </div>
                            </div>
                            <div class="online-dot pulse-green"></div>
                        </div>

                        <div class="profile-header-info">
                            <h1 class="profile-display-name" id="displayName">Loading…</h1>
                            <div class="profile-badges">
                                <span class="badge badge-admin"><i data-lucide="shield-check"></i> Administrator</span>
                                <span class="badge badge-online"><span class="badge-dot-inline"></span> Online</span>
                                <span class="badge badge-active"><i data-lucide="check-circle"></i> Active</span>
                            </div>
                            <p class="profile-handle">@<span id="displayUsername">—</span></p>
                            <div class="profile-contact-row">
                                <span class="profile-contact-item">
                                    <i data-lucide="mail"></i>
                                    <span id="displayEmail">—</span>
                                </span>
                                <span class="profile-contact-item">
                                    <i data-lucide="phone"></i>
                                    <span id="displayPhone">—</span>
                                </span>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Personal Information -->
                <section class="glass-card glass-card--static profile-section-card reveal">
                    <div class="section-header-row">
                        <div class="section-divider">
                            <div class="icon-wrap icon-wrap--gold"><i data-lucide="user-circle"></i></div>
                            <h3>Personal Information</h3>
                            <div class="line"></div>
                        </div>
                        <button type="button" class="btn-gold btn-sm section-edit-btn" onclick="openModal('profileModal')">
                            <i data-lucide="pencil"></i>
                            Edit Personal Information
                        </button>
                    </div>

                    <div class="info-grid">
                        <div class="info-row">
                            <span class="info-label">Full Name</span>
                            <span class="info-value" id="infoFullName">—</span>
                        </div>
                        <div class="info-row">
                            <span class="info-label">Username</span>
                            <span class="info-value" id="infoUsername">—</span>
                        </div>
                        <div class="info-row info-row--full">
                            <span class="info-label">Email Address</span>
                            <span class="info-value" id="infoEmail">—</span>
                        </div>
                        <div class="info-row info-row--full">
                            <span class="info-label">Mobile Number</span>
                            <span class="info-value" id="infoPhone">—</span>
                        </div>
                    </div>
                </section>

                <!-- Account Security -->
                <section class="glass-card glass-card--static profile-section-card reveal">
                    <div class="section-divider">
                        <div class="icon-wrap icon-wrap--red"><i data-lucide="shield"></i></div>
                        <h3>Account Security</h3>
                        <div class="line"></div>
                    </div>

                    <div class="security-row">
                        <div class="security-row-info">
                            <div class="security-row-icon">
                                <i data-lucide="key-round"></i>
                            </div>
                            <div>
                                <p class="security-row-label">Password</p>
                                <p class="masked-password">************</p>
                            </div>
                        </div>
                        <button type="button" class="btn-outline btn-sm" onclick="openModal('passwordModal')">
                            <i data-lucide="lock"></i>
                            Change Password
                        </button>
                    </div>

                    <div class="security-hints">
                        <div class="security-hint security-hint--green">
                            <i data-lucide="shield-check"></i>
                            <span id="passwordUpdatedHint">Password last updated —</span>
                        </div>
                        <div class="security-hint security-hint--gold">
                            <i data-lucide="info"></i>
                            <span>Recommended: Change every 90 days</span>
                        </div>
                    </div>
                </section>

            </div>
        </main>
    </div>

    <!-- Modal: Edit Profile -->
    <div class="modal-overlay" id="profileModal" onclick="handleOverlayClick(event, 'profileModal')">
        <div class="modal-panel" role="dialog" aria-modal="true" aria-labelledby="profileModalTitle">
            <div class="modal-header">
                <div class="modal-header-row">
                    <div class="modal-header-info">
                        <div class="modal-header-icon modal-header-icon--gold">
                            <i data-lucide="user-pen"></i>
                        </div>
                        <div>
                            <h2 class="modal-title" id="profileModalTitle">Update Personal Information</h2>
                            <p class="modal-subtitle">Edit your profile details below</p>
                        </div>
                    </div>
                    <button type="button" class="modal-close" onclick="closeModal('profileModal')" aria-label="Close">
                        <i data-lucide="x"></i>
                    </button>
                </div>
            </div>
            <div class="modal-body">
                <form id="profileForm" onsubmit="return false;" novalidate>
                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label" for="pFullName">Full Name <span class="required">*</span></label>
                            <input type="text" id="pFullName" class="input-field" placeholder="Enter full name" value="">
                            <p class="error-msg" id="pFullNameError">Full name is required</p>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="pUsername">Username <span class="required">*</span></label>
                            <input type="text" id="pUsername" class="input-field" placeholder="Enter username" value="">
                            <p class="error-msg" id="pUsernameError">Username is required</p>
                        </div>
                    </div>
                    <div class="form-group form-group--full">
                        <label class="form-label" for="pEmail">Email Address <span class="required">*</span></label>
                        <input type="email" id="pEmail" class="input-field" placeholder="Enter email address" value="">
                        <p class="error-msg" id="pEmailError">Please enter a valid email address</p>
                    </div>
                    <div class="form-group form-group--full">
                        <label class="form-label" for="pPhone">Mobile Number <span class="required">*</span></label>
                        <div class="phone-input-wrap">
                            <span class="phone-prefix">+91</span>
                            <input type="text" id="pPhone" class="input-field phone-input" placeholder="10-digit number" maxlength="10" value="" oninput="this.value=this.value.replace(/[^0-9]/g,'')">
                        </div>
                        <p class="error-msg" id="pPhoneError">Please enter a valid 10-digit mobile number</p>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn-secondary btn-sm" onclick="closeModal('profileModal')">
                    <i data-lucide="x"></i> Cancel
                </button>
                <button type="button" class="btn-primary btn-sm" id="profileSaveBtn" onclick="saveProfile()">
                    <i data-lucide="check"></i> Save Changes
                </button>
            </div>
        </div>
    </div>

    <!-- Modal: Change Password -->
    <div class="modal-overlay" id="passwordModal" onclick="handleOverlayClick(event, 'passwordModal')">
        <div class="modal-panel modal-panel--narrow" role="dialog" aria-modal="true" aria-labelledby="passwordModalTitle">
            <div class="modal-header">
                <div class="modal-header-row">
                    <div class="modal-header-info">
                        <div class="modal-header-icon modal-header-icon--red">
                            <i data-lucide="lock"></i>
                        </div>
                        <div>
                            <h2 class="modal-title" id="passwordModalTitle">Change Password</h2>
                            <p class="modal-subtitle">Update your account password</p>
                        </div>
                    </div>
                    <button type="button" class="modal-close" onclick="closeModal('passwordModal')" aria-label="Close">
                        <i data-lucide="x"></i>
                    </button>
                </div>
            </div>
            <div class="modal-body">
                <form id="passwordForm" onsubmit="return false;" novalidate>
                    <div class="form-group">
                        <label class="form-label" for="pwCurrent">Current Password <span class="required">*</span></label>
                        <div class="password-wrap">
                            <input type="password" id="pwCurrent" class="input-field" placeholder="Enter current password" autocomplete="current-password">
                            <button type="button" class="password-toggle" onclick="togglePasswordVisibility('pwCurrent', this)" aria-label="Toggle password visibility">
                                <i data-lucide="eye"></i>
                            </button>
                        </div>
                        <p class="error-msg" id="pwCurrentError">Current password is required</p>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="pwNew">New Password <span class="required">*</span></label>
                        <div class="password-wrap">
                            <input type="password" id="pwNew" class="input-field" placeholder="Enter new password" autocomplete="new-password" oninput="updatePasswordStrength()">
                            <button type="button" class="password-toggle" onclick="togglePasswordVisibility('pwNew', this)" aria-label="Toggle password visibility">
                                <i data-lucide="eye"></i>
                            </button>
                        </div>
                        <p class="error-msg" id="pwNewError">New password is required</p>
                        <p class="error-msg" id="pwNewSameError">New password must be different from current password</p>

                        <div class="strength-bar">
                            <div class="strength-segment" id="str1"></div>
                            <div class="strength-segment" id="str2"></div>
                            <div class="strength-segment" id="str3"></div>
                            <div class="strength-segment" id="str4"></div>
                        </div>
                        <p class="strength-label" id="strengthLabel">Enter a password to see strength</p>

                        <div class="strength-reqs">
                            <div class="strength-req" id="reqLength">
                                <span class="req-icon"><i data-lucide="check"></i></span>
                                <span>Minimum 8 characters</span>
                            </div>
                            <div class="strength-req" id="reqUpper">
                                <span class="req-icon"><i data-lucide="check"></i></span>
                                <span>Uppercase letter</span>
                            </div>
                            <div class="strength-req" id="reqLower">
                                <span class="req-icon"><i data-lucide="check"></i></span>
                                <span>Lowercase letter</span>
                            </div>
                            <div class="strength-req" id="reqNumber">
                                <span class="req-icon"><i data-lucide="check"></i></span>
                                <span>Number</span>
                            </div>
                            <div class="strength-req" id="reqSpecial">
                                <span class="req-icon"><i data-lucide="check"></i></span>
                                <span>Special character</span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group form-group--no-margin">
                        <label class="form-label" for="pwConfirm">Confirm New Password <span class="required">*</span></label>
                        <div class="password-wrap">
                            <input type="password" id="pwConfirm" class="input-field" placeholder="Confirm new password" autocomplete="new-password">
                            <button type="button" class="password-toggle" onclick="togglePasswordVisibility('pwConfirm', this)" aria-label="Toggle password visibility">
                                <i data-lucide="eye"></i>
                            </button>
                        </div>
                        <p class="error-msg" id="pwConfirmError">Please confirm your new password</p>
                        <p class="error-msg" id="pwMatchError">Passwords do not match</p>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn-secondary btn-sm" onclick="closeModal('passwordModal')">
                    <i data-lucide="x"></i> Cancel
                </button>
                <button type="button" class="btn-primary btn-sm" id="pwSaveBtn" onclick="savePassword()">
                    <i data-lucide="shield-check"></i> Update Password
                </button>
            </div>
        </div>
    </div>

    <script>
/* =========================================
   Admin Data (loaded from the API)
======================================== */
var adminData = {
    id: null,
    fullName: '',
    username: '',
    email: '',
    phone: '',
    updatedAt: ''
};

/* =========================================
   Initialization
======================================== */
document.addEventListener('DOMContentLoaded', function() {
    lucide.createIcons();
    initScrollReveal();
    loadProfile();

    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeModal('profileModal');
            closeModal('passwordModal');
        }
        if (e.key === 'Enter' && !e.shiftKey) {
            var active = document.activeElement;
            if (!active || active.tagName === 'TEXTAREA') return;

            if (document.getElementById('profileModal').classList.contains('show')) {
                e.preventDefault();
                saveProfile();
            }
            if (document.getElementById('passwordModal').classList.contains('show')) {
                e.preventDefault();
                savePassword();
            }
        }
    });
});

/* =========================================
   Load profile from get_profile.php
======================================== */
function formatDate(str) {
    if (!str) return '—';
    var d = new Date(str.replace(' ', 'T'));
    if (isNaN(d)) return str;
    return d.toLocaleDateString('en-IN', { day: 'numeric', month: 'short', year: 'numeric' });
}

function loadProfile() {
    fetch('../api/get_profile.php')
        .then(function(res) { return res.json(); })
        .then(function(data) {
            if (!data.success || !data.user) {
                showToast(data.message || 'Could not load your profile', 'error');
                return;
            }
            var u = data.user;
            adminData.id = u.id;
            adminData.fullName = u.full_name;
            adminData.username = u.username;
            adminData.email = u.email;
            adminData.phone = u.mobile_number;
            adminData.updatedAt = u.updated_at;
            renderProfile();
        })
        .catch(function() {
            showToast('Failed to reach the server', 'error');
        });
}

function renderProfile() {
    var initials = (adminData.fullName || '')
        .split(' ')
        .filter(Boolean)
        .map(function(n) { return n[0]; })
        .join('')
        .substring(0, 2)
        .toUpperCase() || '—';
    var formattedPhone = adminData.phone ? '+91 ' + adminData.phone.replace(/(\d{5})(\d{5})/, '$1 $2') : '—';

    document.getElementById('avatarInitials').textContent = initials;
    document.getElementById('displayName').textContent = adminData.fullName || '—';
    document.getElementById('displayUsername').textContent = adminData.username || '—';
    document.getElementById('displayEmail').textContent = adminData.email || '—';
    document.getElementById('displayPhone').textContent = formattedPhone;

    document.getElementById('infoFullName').textContent = adminData.fullName || '—';
    document.getElementById('infoUsername').textContent = adminData.username || '—';
    document.getElementById('infoEmail').textContent = adminData.email || '—';
    document.getElementById('infoPhone').textContent = formattedPhone;

    document.getElementById('headerAvatarInitials').textContent = initials.charAt(0) || 'A';
    document.getElementById('headerProfileName').textContent = adminData.fullName || 'Admin';
    document.getElementById('headerDropdownName').textContent = adminData.fullName || 'Admin User';
    document.getElementById('headerDropdownEmail').textContent = adminData.email || '';

    document.getElementById('passwordUpdatedHint').textContent = 'Password last updated ' + formatDate(adminData.updatedAt);
}

/* =========================================
   Sidebar Toggle
======================================== */
function toggleSidebar() {
    document.getElementById('sidebar').classList.toggle('open');
    document.getElementById('sidebarOverlay').classList.toggle('show');
}

/* =========================================
   Dropdown Toggle
======================================== */
function toggleDropdown(id) {
    var dd = document.getElementById(id);
    var isShow = dd.classList.contains('show');
    document.querySelectorAll('.dropdown').forEach(function(d) {
        d.classList.remove('show');
    });
    if (!isShow) dd.classList.add('show');
}

document.addEventListener('click', function(e) {
    if (!e.target.closest('.notification-wrapper') && !e.target.closest('.profile-wrapper')) {
        document.querySelectorAll('.dropdown').forEach(function(d) {
            d.classList.remove('show');
        });
    }
});

/* =========================================
   Modal Management
======================================== */
function openModal(id) {
    var modal = document.getElementById(id);
    modal.classList.add('show');
    document.body.style.overflow = 'hidden';
    lucide.createIcons();

    if (id === 'profileModal') {
        document.getElementById('pFullName').value = adminData.fullName;
        document.getElementById('pUsername').value = adminData.username;
        document.getElementById('pEmail').value = adminData.email;
        document.getElementById('pPhone').value = adminData.phone;
        clearAllProfileErrors();
    }

    if (id === 'passwordModal') {
        document.getElementById('pwCurrent').value = '';
        document.getElementById('pwNew').value = '';
        document.getElementById('pwConfirm').value = '';
        clearAllPasswordErrors();
        resetPasswordStrength();
        document.querySelectorAll('#passwordModal .password-toggle i').forEach(function(ic) {
            ic.setAttribute('data-lucide', 'eye');
        });
        lucide.createIcons();
    }

    setTimeout(function() {
        var firstInput = modal.querySelector('input');
        if (firstInput) firstInput.focus();
    }, 100);
}

function closeModal(id) {
    document.getElementById(id).classList.remove('show');
    document.body.style.overflow = '';
}

function handleOverlayClick(event, id) {
    if (event.target === event.currentTarget) {
        closeModal(id);
    }
}

/* =========================================
   Validation Helpers
======================================== */
function clearAllProfileErrors() {
    var fields = ['pFullName', 'pUsername', 'pEmail', 'pPhone'];
    for (var i = 0; i < fields.length; i++) {
        document.getElementById(fields[i]).classList.remove('error');
        document.getElementById(fields[i] + 'Error').classList.remove('show');
    }
}

function clearAllPasswordErrors() {
    var fields = ['pwCurrent', 'pwNew', 'pwConfirm'];
    var errors = ['pwCurrentError', 'pwNewError', 'pwNewSameError', 'pwConfirmError', 'pwMatchError'];
    for (var i = 0; i < fields.length; i++) {
        document.getElementById(fields[i]).classList.remove('error');
    }
    for (var j = 0; j < errors.length; j++) {
        document.getElementById(errors[j]).classList.remove('show');
    }
    document.getElementById('pwNewError').textContent = 'New password is required';
    document.getElementById('pwCurrentError').textContent = 'Current password is required';
}

/* =========================================
   Save Profile (POST to update_profile.php)
======================================== */
function saveProfile() {
    clearAllProfileErrors();
    var valid = true;

    var fullName = document.getElementById('pFullName').value.trim();
    var username = document.getElementById('pUsername').value.trim();
    var email = document.getElementById('pEmail').value.trim();
    var phone = document.getElementById('pPhone').value.trim();

    if (!fullName) {
        document.getElementById('pFullName').classList.add('error');
        document.getElementById('pFullNameError').classList.add('show');
        valid = false;
    }
    if (!username) {
        document.getElementById('pUsername').classList.add('error');
        document.getElementById('pUsernameError').classList.add('show');
        valid = false;
    }
    if (!email || !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
        document.getElementById('pEmail').classList.add('error');
        document.getElementById('pEmailError').classList.add('show');
        valid = false;
    }
    if (!phone || phone.length !== 10) {
        document.getElementById('pPhone').classList.add('error');
        document.getElementById('pPhoneError').classList.add('show');
        valid = false;
    }

    if (!valid) return;

    var btn = document.getElementById('profileSaveBtn');
    btn.disabled = true;

    var formData = new FormData();
    formData.append('full_name', fullName);
    formData.append('username', username);
    formData.append('email', email);
    formData.append('mobile_number', phone);

     fetch('../api/update_profile.php', { method: 'POST', body: formData })
        .then(function(res) { return res.json(); })
        .then(async function(data) {
            if (data.success) {
                adminData.fullName = fullName;
                adminData.username = username;
                adminData.email = email;
                adminData.phone = phone;
                renderProfile();
                closeModal('profileModal');
                await addActivity(
                    "Profile Updated",
                    fullName + " updated profile information",
                    "purple"
                );
                showToast(data.message || 'Profile updated successfully', 'success');
            } else {
                showToast(data.message || 'Could not update profile', 'error');
            }
        })
        .catch(function(err) {
            showToast('Failed to reach the server', 'error');

            
        })
        .finally(function() {
            btn.disabled = false;
        });
}

/* =========================================
   Save Password (POST to change_password.php)
======================================== */
function savePassword() {
    clearAllPasswordErrors();
    var valid = true;

    var current = document.getElementById('pwCurrent').value;
    var newPw = document.getElementById('pwNew').value;
    var confirm = document.getElementById('pwConfirm').value;

    if (!current) {
        document.getElementById('pwCurrent').classList.add('error');
        document.getElementById('pwCurrentError').classList.add('show');
        valid = false;
    }
    if (!newPw) {
        document.getElementById('pwNew').classList.add('error');
        document.getElementById('pwNewError').classList.add('show');
        valid = false;
    }
    if (newPw && current && newPw === current) {
        document.getElementById('pwNew').classList.add('error');
        document.getElementById('pwNewSameError').classList.add('show');
        valid = false;
    }
    if (!confirm) {
        document.getElementById('pwConfirm').classList.add('error');
        document.getElementById('pwConfirmError').classList.add('show');
        valid = false;
    }
    if (confirm && newPw && confirm !== newPw) {
        document.getElementById('pwConfirm').classList.add('error');
        document.getElementById('pwMatchError').classList.add('show');
        valid = false;
    }

    if (!valid) return;

    var strength = getPasswordStrength(newPw);
    if (strength < 5) {
        document.getElementById('pwNew').classList.add('error');
        document.getElementById('pwNewError').textContent = 'Password is too weak — meet all the requirements below';
        document.getElementById('pwNewError').classList.add('show');
        return;
    }

    var btn = document.getElementById('pwSaveBtn');
    btn.disabled = true;

    var formData = new FormData();
    formData.append('current_password', current);
    formData.append('new_password', newPw);
    formData.append('confirm_password', confirm);

    fetch('../api/change_password.php', { method: 'POST', body: formData })
        .then(function(res) { return res.json(); })
        .then(async function(data) {
            if (data.success) {
                closeModal('passwordModal');
                await addActivity(
                    "Password Changed",
                    "Account password was updated",
                    "purple"
                );
                showToast(data.message || 'Password updated successfully', 'success');
                loadProfile(); // refreshes the "last updated" hint
            } else {
                // Surface a wrong-current-password error inline rather than just a toast
                if (data.message && data.message.toLowerCase().indexOf('current password') !== -1) {
                    document.getElementById('pwCurrent').classList.add('error');
                    document.getElementById('pwCurrentError').textContent = data.message;
                    document.getElementById('pwCurrentError').classList.add('show');
                }
                showToast(data.message || 'Could not update password', 'error');
            }
        })
        .catch(function(err) {
            showToast('Failed to reach the server', 'error');
            console.error(err);
        })
        .finally(function() {
            btn.disabled = false;
        });
}

/* =========================================
   Password Visibility Toggle
======================================== */
function togglePasswordVisibility(inputId, btn) {
    var input = document.getElementById(inputId);
    var icon = btn.querySelector('i');
    if (input.type === 'password') {
        input.type = 'text';
        icon.setAttribute('data-lucide', 'eye-off');
    } else {
        input.type = 'password';
        icon.setAttribute('data-lucide', 'eye');
    }
    lucide.createIcons();
}

/* =========================================
   Password Strength
======================================== */
function getPasswordStrength(pw) {
    var score = 0;
    if (pw.length >= 8) score++;
    if (/[A-Z]/.test(pw)) score++;
    if (/[a-z]/.test(pw)) score++;
    if (/[0-9]/.test(pw)) score++;
    if (/[^A-Za-z0-9]/.test(pw)) score++;
    return score;
}

function updatePasswordStrength() {
    var pw = document.getElementById('pwNew').value;
    var score = getPasswordStrength(pw);

    var segments = ['str1', 'str2', 'str3', 'str4'];
    var colors = ['', '#EF4444', '#F59E0B', '#EAB308', '#22C55E'];
    var labels = ['Enter a password to see strength', 'Weak', 'Fair', 'Good', 'Strong'];
    var labelColors = ['rgba(255,255,255,0.2)', '#EF4444', '#F59E0B', '#EAB308', '#22C55E'];

    var mapped = pw.length === 0 ? 0 : Math.min(4, Math.max(1, Math.ceil(score * 4 / 5)));

    for (var i = 0; i < segments.length; i++) {
        document.getElementById(segments[i]).style.background = i < mapped ? colors[mapped] : 'rgba(255,255,255,0.06)';
    }

    var label = document.getElementById('strengthLabel');
    label.textContent = labels[mapped];
    label.style.color = labelColors[mapped];

    document.getElementById('reqLength').classList.toggle('met', pw.length >= 8);
    document.getElementById('reqUpper').classList.toggle('met', /[A-Z]/.test(pw));
    document.getElementById('reqLower').classList.toggle('met', /[a-z]/.test(pw));
    document.getElementById('reqNumber').classList.toggle('met', /[0-9]/.test(pw));
    document.getElementById('reqSpecial').classList.toggle('met', /[^A-Za-z0-9]/.test(pw));
}

function resetPasswordStrength() {
    var segments = ['str1', 'str2', 'str3', 'str4'];
    for (var i = 0; i < segments.length; i++) {
        document.getElementById(segments[i]).style.background = 'rgba(255,255,255,0.06)';
    }
    var label = document.getElementById('strengthLabel');
    label.textContent = 'Enter a password to see strength';
    label.style.color = 'rgba(255,255,255,0.2)';

    var reqs = ['reqLength', 'reqUpper', 'reqLower', 'reqNumber', 'reqSpecial'];
    for (var j = 0; j < reqs.length; j++) {
        document.getElementById(reqs[j]).classList.remove('met');
    }
}

/* =========================================
   Toast Notifications
======================================== */
function showToast(message, type) {
    type = type || 'info';
    var container = document.getElementById('toastContainer');
    var toast = document.createElement('div');
    toast.className = 'toast ' + type;

    var iconMap = { success: 'check-circle', error: 'x-circle', info: 'info' };
    toast.innerHTML = '<i data-lucide="' + iconMap[type] + '" style="width:18px;height:18px;flex-shrink:0;"></i><span>' + message + '</span>';
    container.appendChild(toast);
    lucide.createIcons();

    requestAnimationFrame(function() {
        toast.classList.add('show');
    });

    setTimeout(function() {
        toast.classList.remove('show');
        setTimeout(function() {
            toast.remove();
        }, 400);
    }, 3000);
}

/* =========================================
   Scroll Reveal
======================================== */
function initScrollReveal() {
    var observer = new IntersectionObserver(function(entries) {
        for (var i = 0; i < entries.length; i++) {
            if (entries[i].isIntersecting) {
                entries[i].target.classList.add('visible');
            }
        }
    }, { threshold: 0.1 });

    var reveals = document.querySelectorAll('.reveal');
    for (var i = 0; i < reveals.length; i++) {
        observer.observe(reveals[i]);
    }
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