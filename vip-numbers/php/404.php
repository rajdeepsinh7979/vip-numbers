<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 — Page Not Found | Bhudev Sim Store</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800;900&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://code.iconify.design/3/3.1.0/iconify.min.js"></script>
    <style>
        * { box-sizing: border-box; }
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
            position: relative;
            overflow: hidden;
        }

        .gold-line {
            position: fixed;
            top: 0; left: 0; right: 0;
            height: 3px;
            background: linear-gradient(90deg, transparent, #D4AF37, transparent);
        }

        .grid-pattern {
            position: absolute;
            inset: 0;
            background-image:
                linear-gradient(rgba(212,175,55,0.04) 1px, transparent 1px),
                linear-gradient(90deg, rgba(212,175,55,0.04) 1px, transparent 1px);
            background-size: 48px 48px;
            pointer-events: none;
        }

        .glow {
            position: absolute;
            top: 50%; left: 50%;
            width: 600px; height: 600px;
            transform: translate(-50%, -50%);
            background: radial-gradient(circle, rgba(212,175,55,0.10) 0%, transparent 70%);
            pointer-events: none;
        }

        .content {
            position: relative;
            z-index: 1;
            max-width: 480px;
        }

        .code-404 {
            font-family: 'Outfit', sans-serif;
            font-size: clamp(88px, 18vw, 140px);
            font-weight: 800;
            line-height: 1;
            letter-spacing: -0.02em;
            background: linear-gradient(135deg, #D4AF37 0%, #F5E1A4 40%, #D4AF37 70%, #9C7A22 100%);
            background-size: 200% auto;
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
            animation: shimmer 4s linear infinite;
            margin: 0;
        }

        @keyframes shimmer {
            to { background-position: 200% center; }
        }

        .icon-wrap {
            width: 56px; height: 56px;
            border-radius: 50%;
            background: rgba(212,175,55,0.08);
            border: 1px solid rgba(212,175,55,0.25);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 8px auto 20px;
            font-size: 26px;
            color: #D4AF37;
        }

        h1 {
            font-family: 'Outfit', sans-serif;
            font-size: 24px;
            font-weight: 600;
            margin: 0 0 12px;
        }

        p {
            color: rgba(255,255,255,0.55);
            font-size: 15px;
            line-height: 1.7;
            margin: 0 0 32px;
        }

        .actions {
            display: flex;
            gap: 12px;
            justify-content: center;
            flex-wrap: wrap;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 12px 24px;
            border-radius: 10px;
            font-weight: 600;
            font-size: 14px;
            text-decoration: none;
            transition: transform 0.15s ease, opacity 0.15s ease;
        }

        .btn:hover { transform: translateY(-2px); }

        .btn--gold {
            background: linear-gradient(135deg, #D4AF37, #B8952C);
            color: #0a0a0f;
        }

        .btn--outline {
            background: transparent;
            color: rgba(255,255,255,0.8);
            border: 1px solid rgba(255,255,255,0.15);
        }

        .footer-note {
            margin-top: 40px;
            font-size: 12px;
            color: rgba(255,255,255,0.25);
            letter-spacing: 0.05em;
        }
    </style>
</head>
<body>
    <div class="gold-line"></div>
    <div class="grid-pattern"></div>
    <div class="glow"></div>

    <div class="content">
        <p class="code-404">404</p>

        <div class="icon-wrap">
            <span class="iconify" data-icon="mdi:compass-off-outline"></span>
        </div>

        <h1>This page doesn't exist</h1>
        <p>
            The page you're looking for may have been moved, renamed, or never
            existed in the first place. Let's get you back on track.
        </p>

        <div class="actions">
            <a href="/vip-numbers/vip-numbers/php/index.html" class="btn btn--gold">
                <span class="iconify" data-icon="mdi:home-outline"></span>
                Back to Home
            </a>
        </div>

        <p class="footer-note">BHUDEV SIM STORE — VIP NUMBER MANAGEMENT</p>
    </div>
</body>
</html>