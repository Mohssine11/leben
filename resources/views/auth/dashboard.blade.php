<!-- filepath: c:\xampp\htdocs\Test\resources\views\auth\dashboard.blade.php -->
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>لوحة التحكم</title>
    <style>
        :root {
            --bg: #f4f6f8;
            --container-bg: #fff;
            --text: #232526;
            --card-bg: #fff;
            --primary: #007bff;
            --primary-dark: #0056b3;
            --link: #007bff;
            --link-hover: #0056b3;
        }
        body.dark {
            --bg: #232526;
            --container-bg: #23272b;
            --text: #f1f1f1;
            --card-bg: #181c20;
            --primary: #007bff;
            --primary-dark: #0056b3;
            --link: #7abaff;
            --link-hover: #a3d8ff;
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
        .dashboard-container {
            max-width: 900px;
            margin: 100px auto 0 auto;
            background: var(--container-bg);
            border-radius: 18px;
            box-shadow: 0 6px 32px rgba(0,0,0,0.18);
            padding: 44px 36px 32px 36px;
            direction: rtl;
            transition: background 0.3s, color 0.3s;
        }
        .dashboard-header {
            text-align: center;
            margin-bottom: 32px;
        }
        .user-photo {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 18px;
        }
        .user-photo img {
            width: 90px;
            height: 90px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid var(--primary, #007bff);
            background: #fff;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        }
        .dashboard-header h1 {
            margin: 0;
            font-size: 2.2rem;
            color: var(--primary);
            font-weight: 900;
            letter-spacing: 1px;
        }
        .dashboard-header p {
            color: #aaa;
            margin-top: 10px;
            font-size: 1.1rem;
        }
        .dashboard-cards {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 24px;
    justify-content: center;      /* يجعل الشبكة في المنتصف */
    align-items: center;
    margin-bottom: 18px;
    width: 100%;
}
        @media (max-width: 700px) {
            .dashboard-container {
                margin: 40px 8px 0 8px;
                padding: 18px 6px 10px 6px;
            }
            .dashboard-cards {
                grid-template-columns: 1fr;
                gap: 12px;
            }
        }
        .dashboard-card {
            background: var(--card-bg);
            border-radius: 12px;
            box-shadow: 0 2px 12px rgba(0,0,0,0.08);
            padding: 28px 24px;
            min-width: 180px;
            max-width: 270px;
            text-align: center;
            margin-bottom: 0;
            transition: box-shadow 0.2s, transform 0.15s, background 0.2s, color 0.2s;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 14px;
        }
        .dashboard-card:hover {
            box-shadow: 0 6px 24px rgba(0,0,0,0.18);
            background: var(--primary, #007bff);
            color: #fff;
            transform: translateY(-4px) scale(1.03);
        }
        .dashboard-card:hover h2,
        .dashboard-card:hover .value {
            color: #fff;
        }
        .dashboard-card h2,
        .dashboard-card .value {
            font-size: 1rem;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            margin: 0;
            padding: 0;
            font-weight: normal;
            letter-spacing: 0;
        }
        .dashboard-links {
            margin-top: 32px;
            text-align: center;
        }
        .dashboard-links a {
            color: var(--link);
            text-decoration: none;
            font-size: 1.1rem;
            margin: 0 12px;
            transition: color 0.2s;
        }
        .dashboard-links a:hover {
            color: var(--link-hover);
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="mode-bar">
        <button class="toggle-mode" id="toggleModeBtn" onclick="toggleMode()" aria-label="الوضع الليلي/النهاري"></button>
    </div>
    <div class="dashboard-container">
        <div class="dashboard-header">
            <div class="user-photo">
                @if(auth()->user()->image)
                    <img src="{{ auth()->user()->image }}" alt="الصورة الشخصية" />
                @else
                    <img src="{{ asset('images/default-user.png') }}" alt="الصورة الشخصية" />
                @endif
            </div>
            <h1>مرحبا بك في لوحة التحكم kkk</h1>
            <p>هنا يمكنك مشاهدة معلومات حسابك وإدارة عملياتك</p>
        </div>
        <div class="dashboard-cards">
            <div class="dashboard-card">
                <h2>الاسم</h2>
                <div class="value">{{ auth()->user()->name ?? '---' }}</div>
            </div>
            <div class="dashboard-card">
                <h2>البريد الإلكتروني</h2>
                <div class="value">{{ auth()->user()->email ?? '---' }}</div>
            </div>
            <div class="dashboard-card">
                <h2>الرصيد الحالي</h2>
                <div class="value">{{ auth()->user()->solde ?? '---' }} د.ج</div>
            </div>
            <div class="dashboard-card">
                <h2>رقم الحساب</h2>
                <div class="value">{{ auth()->user()->account ?? '---' }}</div>
            </div>
        </div>
        <div class="dashboard-links">
            <a href="{{ route('logout') }}"
               onclick="event.preventDefault();document.getElementById('logout-form').submit();">تسجيل الخروج</a>
            <a href="{{ route('register') }}">تسجيل مستخدم جديد</a>
            <a href="{{ route('versment') }}">إجراء تحويل</a>
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
            document.getElementById('toggleModeBtn').innerHTML = document.body.classList.contains('dark') ? sun : moon;
        }
        function toggleMode() {
            document.body.classList.toggle('dark');
            localStorage.setItem('dashboardMode', document.body.classList.contains('dark') ? 'dark' : 'light');
            setIcon();
        }
        (function() {
            // Dark-Mode ist jetzt Standard!
            if(localStorage.getItem('dashboardMode') === 'light') {
                document.body.classList.remove('dark');
            } else {
                document.body.classList.add('dark');
            }
            setIcon();
        })();
    </script>
</body>
</html>