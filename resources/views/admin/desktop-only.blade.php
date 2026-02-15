<!DOCTYPE html>
<html lang="ro">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desktop Only</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #1e293b 0%, #0f172a 100%);
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            color: #e2e8f0;
            padding: 24px;
        }

        .card {
            text-align: center;
            max-width: 420px;
            background: rgba(255, 255, 255, 0.06);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            padding: 48px 32px;
            backdrop-filter: blur(12px);
        }

        .icon {
            font-size: 56px;
            margin-bottom: 20px;
        }

        h1 {
            font-size: 22px;
            font-weight: 700;
            margin-bottom: 12px;
            color: #f8fafc;
        }

        p {
            font-size: 15px;
            line-height: 1.6;
            color: #94a3b8;
        }

        .back-link {
            display: inline-block;
            margin-top: 28px;
            padding: 10px 28px;
            background: rgba(99, 102, 241, 0.25);
            color: #a5b4fc;
            border-radius: 10px;
            text-decoration: none;
            font-weight: 600;
            font-size: 14px;
            transition: background 0.2s;
        }

        .back-link:hover {
            background: rgba(99, 102, 241, 0.4);
        }
    </style>
</head>

<body>
    <div class="card">
        <div class="icon">🖥️</div>
        <h1>Disponibil doar pe desktop</h1>
        <p>Panoul de administrare poate fi accesat doar de pe un computer desktop sau laptop. Vă rugăm să accesați
            această pagină de pe un dispozitiv desktop.</p>
        <a href="{{ url('/') }}" class="back-link">← Înapoi la site</a>
    </div>
</body>

</html>