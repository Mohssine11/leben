<!-- filepath: c:\xampp\htdocs\Test\resources\views\auth\register.blade.php -->
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إنشاء حساب جديد</title>
    <style>
        :root {
            --bg: #f4f6f8;
            --container-bg: #fff;
            --text: #232526;
            --card-bg: #fff;
            --input-bg: #f8fafc;
            --input-border: #d1d5db;
            --label: #232526;
            --primary: #007bff;
            --primary-dark: #0056b3;
        }
        body.dark {
            --bg: #232526;
            --container-bg: #23272b;
            --text: #f1f1f1;
            --card-bg: #181c20;
            --input-bg: #23272b;
            --input-border: #444;
            --label: #bdbdbd;
            --primary: #007bff;
            --primary-dark: #0056b3;
        }
        body {
            background: linear-gradient(120deg, var(--bg) 0%, #cfd9df 100%);
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
        .register-card {
            max-width: 520px;
            margin: 60px auto 0 auto;
            background: var(--card-bg);
            border-radius: 18px;
            box-shadow: 0 6px 32px rgba(0,0,0,0.10);
            padding: 38px 28px 28px 28px;
            direction: rtl;
            border: 1.5px solid var(--input-border);
            transition: background 0.3s, color 0.3s, border 0.3s;
        }
        .register-title {
            text-align: center;
            color: var(--primary);
            font-size: 1.6rem;
            font-weight: bold;
            margin-bottom: 28px;
            letter-spacing: 1px;
        }
        .form-row {
            display: flex;
            gap: 18px;
            margin-bottom: 0;
        }
        .form-group {
            flex: 1 1 0;
            min-width: 0;
            display: flex;
            flex-direction: column;
        }
        input[type="text"], input[type="email"], input[type="password"], input[type="number"] {
            width: 100%;
            box-sizing: border-box;
            margin-bottom: 14px;
            padding: 10px 12px;
            border-radius: 10px;
            border: 1.5px solid var(--input-border);
            font-size: 15px;
            background: var(--input-bg);
            color: var(--text);
            transition: border 0.2s, box-shadow 0.2s, background 0.3s, color 0.3s;
            outline: none;
        }
        input[type="file"] {
            margin-bottom: 14px;
            padding: 6px 0;
            border-radius: 10px;
            border: 1.5px solid var(--input-border);
            background: var(--input-bg);
            color: var(--text);
            font-size: 14px;
            transition: border 0.2s, box-shadow 0.2s, background 0.3s, color 0.3s;
        }
        input[type="text"]:focus, input[type="email"]:focus, input[type="password"]:focus, input[type="number"]:focus, input[type="file"]:focus {
            border: 1.5px solid var(--primary);
            box-shadow: 0 0 0 2px rgba(0,123,255,0.08);
            background: #fff;
        }
        label {
            margin-bottom: 5px;
            font-weight: 600;
            color: var(--label);
            text-align: right;
            font-size: 14px;
        }
        .button-row {
            display: flex;
            justify-content: center;
            margin-top: 18px;
        }
        button[type="submit"] {
            width: 30%;
            min-width: 110px;
            padding: 10px;
            background: linear-gradient(90deg, var(--primary) 60%, var(--primary-dark) 100%);
            color: #fff;
            border: none;
            border-radius: 8px;
            font-size: 15px;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.2s, transform 0.1s;
            box-shadow: 0 2px 8px rgba(0,123,255,0.08);
        }
        button[type="submit"]:hover {
            background: linear-gradient(90deg, var(--primary-dark) 60%, var(--primary) 100%);
            transform: translateY(-2px) scale(1.03);
        }
        .login-link-row {
            text-align: center;
            margin-top: 18px;
        }
        .login-link-row a {
            color: var(--primary);
            text-decoration: none;
            font-size: 1rem;
            transition: color 0.2s;
        }
        .login-link-row a:hover {
            color: var(--primary-dark);
            text-decoration: underline;
        }
        @media (max-width: 700px) {
            .register-card {
                padding: 18px 4px 10px 4px;
                margin: 24px 4px 0 4px;
            }
            .form-row {
                flex-direction: column;
                gap: 0;
            }
            button[type="submit"] {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="mode-bar">
        <button class="toggle-mode" id="toggleModeBtn" onclick="toggleMode()" aria-label="الوضع الليلي/النهاري"></button>
    </div>
    <div class="register-card">
        <form method="POST" action="{{ route('register.store') }}" enctype="multipart/form-data" autocomplete="off">
            @csrf
            <h2 class="register-title">إنشاء حساب جديد</h2>
            <div class="form-row">
                <div class="form-group">
                    <label for="name">الاسم الكامل</label>
                    <input type="text" id="name" name="name" required autocomplete="name" placeholder="أدخل اسمك الكامل" maxlength="50">
                </div>
                <div class="form-group">
                    <label for="email">البريد الإلكتروني</label>
                    <input type="email" id="email" name="email" required autocomplete="email" placeholder="example@email.com" maxlength="50">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="password">كلمة المرور</label>
                    <input type="password" id="password" name="password" required autocomplete="new-password" placeholder="********" minlength="6" maxlength="30">
                </div>
                <div class="form-group">
                    <label for="password_confirmation">تأكيد كلمة المرور</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" required autocomplete="new-password" placeholder="********" minlength="6" maxlength="30">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="solde">الرصيد الابتدائي</label>
                    <input type="number" id="solde" name="solde" min="0" required placeholder="0" step="0.01" max="1000000">
                </div>
                <div class="form-group">
                    <label for="account">رقم الحساب</label>
                    <input type="text" id="account" name="account" required placeholder="أدخل رقم الحساب" maxlength="24">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group" style="flex:1;">
                    <label for="image">الصورة الشخصية (اختياري)</label>
                    <input type="file" id="image" name="image" accept="image/*">
                </div>
                <div class="form-group" style="flex:1;">
                    <!-- Platzhalter für Ausrichtung, kann leer bleiben -->
                </div>
            </div>
            <div class="button-row">
                <button type="submit">تسجيل</button>
            </div>
            <div class="login-link-row">
                <a href="{{ route('login') }}">هل لديك حساب؟ تسجيل الدخول</a>
            </div>
        </form>
    </div>
    <script>
        // Icon SVGs
        const moon = `<svg viewBox="0 0 24 24" fill="none"><path d="M21 12.79A9 9 0 0111.21 3a7 7 0 100 18A9 9 0 0021 12.79z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>`;
        const sun = `<svg viewBox="0 0 24 24" fill="none"><circle cx="12" cy="12" r="5" stroke="currentColor" stroke-width="2"/><path d="M12 1v2M12 21v2M4.22 4.22l1.42 1.42M18.36 18.36l1.42 1.42M1 12h2M21 12h2M4.22 19.78l1.42-1.42M18.36 5.64l1.42-1.42" stroke="currentColor" stroke-width="2" stroke-linecap="round"/></svg>`;

        function setIcon() {
            document.getElementById('toggleModeBtn').innerHTML = document.body.classList.contains('dark') ? sun : moon;
        }
        function toggleMode() {
            document.body.classList.toggle('dark');
            localStorage.setItem('registerMode', document.body.classList.contains('dark') ? 'dark' : 'light');
            setIcon();
        }
        (function() {
            // Dark-Mode ist jetzt Standard!
            if(localStorage.getItem('registerMode') === 'light') {
                document.body.classList.remove('dark');
            } else {
                document.body.classList.add('dark');
            }
            setIcon();
        })();
    </script>
</body>
</html>