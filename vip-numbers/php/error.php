<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Link Error — Bhudev Sim Store</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800;900&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://code.iconify.design/3/3.1.0/iconify.min.js"></script>
    <style>
        body {
            margin: 0;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #0a0a0f;
            font-family: 'Inter', sans-serif;
            color: #fff;
            text-align: center;
            padding: 24px;
        }
        .error-icon {
            font-size: 56px;
            color: #F87171;
            margin-bottom: 16px;
        }
        h1 {
            font-family: 'Outfit', sans-serif;
            font-size: 26px;
            margin: 0 0 12px;
        }
        p {
            color: rgba(255,255,255,0.6);
            max-width: 420px;
            margin: 0 auto 28px;
            line-height: 1.6;
        }
        a.btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 12px 24px;
            border-radius: 10px;
            background: #D4AF37;
            color: #0a0a0f;
            font-weight: 600;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div>
        <div class="error-icon">
            <span class="iconify" data-icon="mdi:link-off"></span>
        </div>
        <h1 id="errorTitle">This link is invalid or has expired</h1>
        <p id="errorMessage">The password reset link you used is no longer valid. Request a new one from the login page.</p>
        <a href="login.php" class="btn">
            <span class="iconify" data-icon="mdi:arrow-left"></span>
            Back to Login
        </a>
    </div>

    <script>
        // Allow forgot-password.php to pass a specific reason via ?msg=
        var params = new URLSearchParams(window.location.search);
        var msg = params.get('msg');
        if (msg) {
            document.getElementById('errorMessage').textContent = msg;
        }
    </script>
</body>
</html>
