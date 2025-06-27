<!-- filepath: c:\xampp\htdocs\Test\resources\views\auth\versment.blade.php -->
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إجراء تحويل</title>
    <style>
        :root {
            --bg: #232526;
            --container-bg: #23272b;
            --text: #f1f1f1;
            --input-bg: #181c20;
            --input-border: #444;
            --label: #bdbdbd;
            --primary: #007bff;
            --primary-dark: #0056b3;
            --link: #7abaff;
            --link-hover: #a3d8ff;
        }
        body.light {
            --bg: #f4f6f8;
            --container-bg: #fff;
            --text: #232526;
            --input-bg: #f4f6f8;
            --input-border: #bbb;
            --label: #232526;
            --primary: #007bff;
            --primary-dark: #0056b3;
            --link: #007bff;
            --link-hover: #0056b3;
        }
        body {
            background: linear-gradient(120deg, var(--bg) 0%, #414345 100%);
            font-family: 'Segoe UI', Arial, sans-serif;
            color: var(--text);
            margin: 0;
            min-height: 100vh;
            transition: background 0.3s, color 0.3s;
        }
        .mode-bar {
            width: 100%;
            display: flex;
            justify-content: flex-start;
            align-items: center;
            padding: 24px 0 0 0;
            position: absolute;
            top: 0;
            left: 0;
            z-index: 20;
        }
        .toggle-mode {
            background: var(--container-bg);
            color: var(--text);
            border: 1px solid #bbb;
            border-radius: 50%;
            width: 44px;
            height: 44px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            cursor: pointer;
            transition: background 0.3s, color 0.3s, border 0.3s;
            margin-left: 40px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.07);
        }
        .toggle-mode:hover {
            background: var(--primary);
            color: #fff;
            border: 1px solid var(--primary-dark);
        }
        .toggle-mode svg {
            width: 26px;
            height: 26px;
            display: block;
        }
        .container {
            max-width: 420px;
            margin: 100px auto 0 auto;
            background: var(--container-bg);
            border-radius: 18px;
            box-shadow: 0 6px 32px rgba(0,0,0,0.18);
            padding: 44px 36px 32px 36px;
            direction: rtl;
            transition: background 0.3s, color 0.3s;
        }
        h2 {
            text-align: center;
            margin-bottom: 32px;
            color: var(--primary);
            font-weight: 700;
            letter-spacing: 1px;
        }
        label {
            margin-bottom: 6px;
            color: var(--label);
            font-weight: 600;
            text-align: right;
            letter-spacing: 0.5px;
        }
        input[type="text"], input[type="number"] {
            width: 100%;
            padding: 10px 8px;
            margin-bottom: 18px;
            border: 1px solid var(--input-border);
            border-radius: 8px;
            font-size: 15px;
            background: var(--input-bg);
            color: var(--text);
            transition: border 0.2s, background 0.3s, color 0.3s;
        }
        input[type="text"]:focus, input[type="number"]:focus {
            border: 1.5px solid var(--primary);
            outline: none;
        }
        button[type="submit"] {
            width: 100%;
            padding: 12px;
            background: linear-gradient(90deg, var(--primary) 60%, var(--primary-dark) 100%);
            color: #fff;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            margin-top: 10px;
            transition: background 0.2s, transform 0.1s;
        }
        button[type="submit"]:hover {
            background: linear-gradient(90deg, var(--primary-dark) 60%, var(--primary) 100%);
            transform: translateY(-2px) scale(1.01);
        }
        .links {
            margin-top: 28px;
            text-align: center;
        }
        .links a {
            color: var(--link);
            text-decoration: none;
            font-size: 1.1rem;
            margin: 0 12px;
            transition: color 0.2s;
        }
        .links a:hover {
            color: var(--link-hover);
            text-decoration: underline;
        }
        @media (max-width: 600px) {
            .container {
                margin: 40px 8px 0 8px;
                padding: 28px 10px 18px 10px;
            }
            .mode-bar {
                padding: 10px 0 0 0;
            }
            .toggle-mode {
                margin-left: 10px;
            }
        }
    </style>
</head>
<body>
    <div class="mode-bar">
        <button class="toggle-mode" id="toggleModeBtn" onclick="toggleMode()" aria-label="الوضع الليلي/النهاري"></button>
    </div>
    <div class="container">
        <h2>إجراء تحويل</h2>
        @if(session('success'))
            <div style="background:#eaffea;color:#42a944;border:1px solid #42a944;padding:10px 12px;border-radius:7px;margin-bottom:18px;text-align:right;">
                {{ session('success') }}
            </div>
        @endif
        @if($errors->any())
            <div style="background:#ffeaea;color:#a94442;border:1px solid #a94442;padding:10px 12px;border-radius:7px;margin-bottom:18px;text-align:right;">
                @foreach($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif
        <form method="POST" action="{{route('versment.store') }}">
            @csrf
            <label for="account">رقم الحساب المستفيد</label>
            <input type="text" id="account" name="account" required placeholder="أدخل رقم الحساب">

            <!-- Beispiel für das Feld im Formular -->
<label for="montant">المبلغ</label>
<input type="number" id="montant" name="montant" min="1" required placeholder="أدخل المبلغ">
             <!-- Beispiel für das Feld im Formular -->


            <button type="submit">تحويل</button>
        </form>
        <div class="links">
            <a href="{{ route('dashboard') }}">لوحة التحكم</a>
            <a href="{{ route('register') }}">تسجيل مستخدم جديد</a>
            <a href="{{ route('logout') }}"
               onclick="event.preventDefault();document.getElementById('logout-form').submit();">تسجيل الخروج</a>
        </div>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
            @csrf
        </form>
    </div>
    <script>
        // Icon SVGs
        const moon = `<svg viewBox="0 0 24 24" fill="none"><path d="M21 12.79A9 9 0 0111.21 3a7 7 0 100 18A9 9 0 0021 12.79z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>`;
        const sun = `<svg viewBox="0 0 24 24" fill="none"><circle cx="12" cy="12" r="5" stroke="currentColor" stroke-width="2"/><path d="M12 1v2M12 21v2M4.22 4.22l1.42 1.42M18.36 18.36l1.42 1.42M1 12h2M21 12h2M4.22 19.78l1.42-1.42M18.36 5.64l1.42-1.42" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>`;

        function setIcon() {
            document.getElementById('toggleModeBtn').innerHTML = document.body.classList.contains('light') ? sun : moon;
        }
        function toggleMode() {
            document.body.classList.toggle('light');
            localStorage.setItem('versmentMode', document.body.classList.contains('light') ? 'light' : 'dark');
            setIcon();
        }
        (function() {
            if(localStorage.getItem('versmentMode') === 'light') {
                document.body.classList.add('light');
            }
            setIcon();
        })();
    </script>
</body>
</html>