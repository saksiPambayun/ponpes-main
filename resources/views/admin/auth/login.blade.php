<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Admin Yayasan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    {{-- CSS Terpisah untuk Login --}}
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');

        /* CSS Variables untuk memudahkan maintenance */
        :root {
            --primary-gradient: linear-gradient(135deg, #4f46e5 0%, #313294 100%);
            --register-gradient: linear-gradient(135deg, #0e096f 0%, #6366f1 100%);
            --register-hover: linear-gradient(135deg, #4f46e5 0%, #313294 100%);
            --bg-gradient: linear-gradient(135deg, #1e1b4b 0%, #581c87 50%, #1e1b4b 100%);
            --shadow-primary: 0 4px 12px rgba(79, 70, 229, 0.4);
            --shadow-register: 0 4px 6px -1px rgba(14, 9, 111, 0.3);
            --shadow-register-hover: 0 6px 15px -3px rgba(14, 9, 111, 0.5);
            --border-radius-card: 1.5rem;
            --border-radius-button: 0.75rem;
            --border-radius-register: 3rem;
            --transition-default: all 0.3s ease;
        }

        /* Reset & Base Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--bg-gradient);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1rem;
            position: relative;
            overflow-x: hidden;
        }

        /* Animated Background Effect */
        body::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 50%);
            animation: rotate 30s linear infinite;
            pointer-events: none;
        }

        @keyframes rotate {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        /* Container Animasi */
        .login-container {
            width: 100%;
            max-width: 28rem;
            position: relative;
            z-index: 10;
            animation: fadeInUp 0.8s ease-out;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Logo Styles */
        .logo-wrapper {
            text-align: center;
            margin-bottom: 2rem;
        }

        .logo-image {
            width: 6rem;
            height: 6rem;
            border-radius: 1rem;
            overflow: hidden;
            margin: 0 auto 1rem;
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.2), 0 10px 10px -5px rgba(0, 0, 0, 0.1);
            border: 4px solid rgba(255, 255, 255, 0.2);
            transition: var(--transition-default);
        }

        .logo-image:hover {
            transform: scale(1.05);
            border-color: rgba(255, 255, 255, 0.4);
        }

        .logo-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .logo-title {
            font-size: 1.875rem;
            font-weight: 700;
            color: white;
            margin-bottom: 0.5rem;
            text-shadow: 0 2px 4px rgba(0,0,0,0.2);
        }

        .logo-subtitle {
            color: #c7d2fe;
            font-size: 0.875rem;
        }

        /* Card Styles */
        .login-card {
            background: white;
            border-radius: var(--border-radius-card);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
            padding: 2rem;
            transition: var(--transition-default);
            border: 1px solid rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            background: rgba(255, 255, 255, 0.95);
        }

        .login-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 30px 60px -15px rgba(0, 0, 0, 0.6);
        }

        /* Alert Styles */
        .alert-error {
            background: linear-gradient(135deg, #fee2e2 0%, #fecaca 100%);
            border: 1px solid #f87171;
            color: #b91c1c;
            padding: 0.75rem 1rem;
            border-radius: 0.75rem;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.875rem;
            animation: shake 0.5s ease-in-out;
        }

        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-5px); }
            75% { transform: translateX(5px); }
        }

        .alert-error i {
            font-size: 1rem;
        }

        /* Form Styles */
        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-label {
            display: block;
            font-size: 0.875rem;
            font-weight: 500;
            color: #374151;
            margin-bottom: 0.5rem;
        }

        .input-wrapper {
            position: relative;
        }

        .input-icon {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: #9ca3af;
            transition: var(--transition-default);
            z-index: 10;
        }

        .input-field {
            width: 100%;
            padding: 0.75rem 1rem 0.75rem 3rem;
            border: 2px solid #e5e7eb;
            border-radius: 0.75rem;
            font-size: 0.875rem;
            transition: var(--transition-default);
            background: white;
            color: #1f2937;
        }

        .input-field:focus {
            outline: none;
            border-color: #4f46e5;
            box-shadow: 0 0 0 4px rgba(79, 70, 229, 0.15);
            transform: scale(1.02);
        }

        .input-field::placeholder {
            color: #9ca3af;
            font-size: 0.875rem;
        }

        .input-field.error {
            border-color: #ef4444;
        }

        .error-message {
            color: #ef4444;
            font-size: 0.75rem;
            margin-top: 0.25rem;
            display: flex;
            align-items: center;
            gap: 0.25rem;
        }

        .error-message i {
            font-size: 0.75rem;
        }

        /* Checkbox Styles */
        .checkbox-wrapper {
            display: flex;
            align-items: center;
            cursor: pointer;
            margin-bottom: 2rem;
        }

        .checkbox-wrapper input[type="checkbox"] {
            width: 1rem;
            height: 1rem;
            border-radius: 0.25rem;
            border: 2px solid #d1d5db;
            cursor: pointer;
            transition: var(--transition-default);
        }

        .checkbox-wrapper input[type="checkbox"]:checked {
            background-color: #4f46e5;
            border-color: #4f46e5;
        }

        .checkbox-wrapper input[type="checkbox"]:focus {
            ring: 2px solid #4f46e5;
            ring-offset: 2px;
        }

        .checkbox-label {
            margin-left: 0.5rem;
            font-size: 0.875rem;
            color: #4b5563;
            transition: var(--transition-default);
        }

        .checkbox-wrapper:hover .checkbox-label {
            color: #1f2937;
        }

        /* Button Primary (Login) */
        .btn-primary {
            background: var(--primary-gradient);
            color: white;
            border: none;
            padding: 0.875rem 1.5rem;
            border-radius: var(--border-radius-button);
            font-weight: 600;
            font-size: 1.125rem;
            width: 100%;
            cursor: pointer;
            transition: var(--transition-default);
            box-shadow: var(--shadow-primary);
            position: relative;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }

        .btn-primary::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.2);
            transform: translate(-50%, -50%);
            transition: width 0.6s, height 0.6s;
        }

        .btn-primary:hover::before {
            width: 300px;
            height: 300px;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(79, 70, 229, 0.5);
        }

        .btn-primary:active {
            transform: translateY(0);
        }

        .btn-primary i {
            font-size: 1rem;
            transition: var(--transition-default);
        }

        .btn-primary:hover i {
            transform: translateX(-3px);
        }

        /* Divider */
        .divider {
            display: flex;
            align-items: center;
            text-align: center;
            margin: 1.5rem 0;
        }

        .divider::before,
        .divider::after {
            content: '';
            flex: 1;
            border-bottom: 2px solid #e5e7eb;
        }

        .divider span {
            padding: 0 1rem;
            color: #6b7280;
            font-size: 0.875rem;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        /* Button Register */
        .btn-register {
            background: var(--register-gradient);
            color: white;
            border: none;
            padding: 0.875rem 1.5rem;
            border-radius: var(--border-radius-register);
            font-weight: 600;
            font-size: 1rem;
            width: 100%;
            cursor: pointer;
            transition: var(--transition-default);
            box-shadow: var(--shadow-register);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.75rem;
            text-decoration: none;
            letter-spacing: 0.3px;
            position: relative;
            overflow: hidden;
        }

        .btn-register::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s;
        }

        .btn-register:hover::before {
            left: 100%;
        }

        .btn-register:hover {
            background: var(--register-hover);
            transform: translateY(-2px);
            box-shadow: var(--shadow-register-hover);
        }

        .btn-register:active {
            transform: translateY(0);
        }

        .btn-register i {
            font-size: 1rem;
            transition: var(--transition-default);
        }

        .btn-register:hover i:first-child {
            transform: scale(1.1);
        }

        .btn-register:hover i:last-child {
            transform: translateX(3px);
        }

        /* Demo Credentials */
        .demo-credentials {
            background: linear-gradient(135deg, #eef2ff 0%, #e0e7ff 100%);
            border: 2px solid #c7d2fe;
            border-radius: 1rem;
            padding: 1.25rem;
            margin-top: 2rem;
            transition: var(--transition-default);
            position: relative;
            overflow: hidden;
        }

        .demo-credentials::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.3) 0%, transparent 60%);
            animation: rotate 20s linear infinite;
            pointer-events: none;
        }

        .demo-credentials:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px -5px rgba(79, 70, 229, 0.3);
        }

        .demo-header {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 1rem;
            position: relative;
            z-index: 1;
        }

        .demo-icon {
            background: rgba(79, 70, 229, 0.2);
            border-radius: 0.5rem;
            padding: 0.375rem;
        }

        .demo-icon i {
            color: #4338ca;
            font-size: 0.75rem;
        }

        .demo-title {
            font-size: 0.875rem;
            font-weight: 600;
            color: #312e81;
        }

        .demo-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            background: rgba(255, 255, 255, 0.6);
            border-radius: 0.5rem;
            padding: 0.5rem;
            margin-bottom: 0.5rem;
            transition: var(--transition-default);
            position: relative;
            z-index: 1;
        }

        .demo-item:hover {
            background: rgba(255, 255, 255, 0.9);
            transform: translateX(3px);
        }

        .demo-item i {
            color: #4f46e5;
            width: 1.25rem;
        }

        .demo-label {
            color: #312e81;
            font-size: 0.875rem;
            min-width: 3.5rem;
        }

        .demo-code {
            background: #e0e7ff;
            padding: 0.125rem 0.5rem;
            border-radius: 0.25rem;
            color: #312e81;
            font-family: monospace;
            font-size: 0.875rem;
            flex: 1;
        }

        /* Footer */
        .footer {
            text-align: center;
            margin-top: 2rem;
            color: #c7d2fe;
            font-size: 0.875rem;
        }

        .footer i {
            margin-right: 0.25rem;
        }

        /* Loading State */
        .btn-loading {
            position: relative;
            pointer-events: none;
            opacity: 0.8;
        }

        .btn-loading i.fa-sign-in-alt {
            display: none;
        }

        .btn-loading::after {
            content: '';
            position: absolute;
            width: 1.25rem;
            height: 1.25rem;
            border: 2px solid white;
            border-top-color: transparent;
            border-radius: 50%;
            animation: spin 0.8s linear infinite;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        /* Responsive Design */
        @media (max-width: 640px) {
            .login-card {
                padding: 1.5rem;
            }

            .logo-title {
                font-size: 1.5rem;
            }

            .logo-image {
                width: 5rem;
                height: 5rem;
            }

            .btn-primary, .btn-register {
                padding: 0.75rem 1rem;
                font-size: 0.875rem;
            }
        }

        /* Animasi untuk elemen form */
        .form-group {
            animation: slideIn 0.5s ease-out forwards;
            opacity: 0;
        }

        .form-group:nth-child(1) { animation-delay: 0.1s; }
        .form-group:nth-child(2) { animation-delay: 0.2s; }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateX(-20px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        /* Hover effect untuk card */
        .login-card {
            position: relative;
            isolation: isolate;
        }

        .login-card::after {
            content: '';
            position: absolute;
            inset: 0;
            border-radius: inherit;
            padding: 2px;
            background: linear-gradient(135deg, #4f46e5, #6366f1);
            -webkit-mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
            mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
            -webkit-mask-composite: xor;
            mask-composite: exclude;
            pointer-events: none;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .login-card:hover::after {
            opacity: 1;
        }

        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb {
            background: linear-gradient(135deg, #4f46e5, #6366f1);
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(135deg, #4338ca, #4f46e5);
        }

        /* Tooltip untuk demo credentials */
        .demo-code {
            position: relative;
            cursor: pointer;
        }

        .demo-code:hover::after {
            content: 'Klik untuk menyalin';
            position: absolute;
            bottom: 100%;
            left: 50%;
            transform: translateX(-50%);
            background: #1f2937;
            color: white;
            padding: 0.25rem 0.5rem;
            border-radius: 0.25rem;
            font-size: 0.75rem;
            white-space: nowrap;
            z-index: 20;
        }

        /* Focus visible untuk accessibility */
        :focus-visible {
            outline: 2px solid #4f46e5;
            outline-offset: 2px;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <!-- Logo -->
        <div class="logo-wrapper">
            <div class="logo-image">
                <img src="{{ asset('gallery/logoo.jpeg') }}" alt="Logo Yayasan">
            </div>
            <h1 class="logo-title">Admin Yayasan</h1>
            <p class="logo-subtitle">Silakan login untuk melanjutkan</p>
        </div>

        <!-- Login Card -->
        <div class="login-card">
            @if(session('error'))
                <div class="alert-error" role="alert">
                    <i class="fas fa-exclamation-circle"></i>
                    {{ session('error') }}
                </div>
            @endif

            <form action="{{ route('login.post') }}" method="POST" id="loginForm">
                @csrf

                <!-- Email -->
                <div class="form-group">
                    <label class="form-label">Email Address</label>
                    <div class="input-wrapper">
                        <i class="fas fa-envelope input-icon"></i>
                        <input type="email" 
                               name="email" 
                               value="{{ old('email') }}"
                               class="input-field @error('email') error @enderror" 
                               placeholder="admin@yayasan.com" 
                               required>
                    </div>
                    @error('email')
                        <p class="error-message">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <!-- Password -->
                <div class="form-group">
                    <label class="form-label">Password</label>
                    <div class="input-wrapper">
                        <i class="fas fa-lock input-icon"></i>
                        <input type="password" 
                               name="password"
                               class="input-field @error('password') error @enderror" 
                               placeholder="••••••••" 
                               required>
                    </div>
                    @error('password')
                        <p class="error-message">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn-primary" id="loginButton">
                    <i class="fas fa-sign-in-alt"></i>
                    Login
                </button>
            </form>
            
            <!-- Divider -->
            <div class="divider">
                <span>Belum punya akun?</span>
            </div>

            <!-- Register Button -->
            <div style="text-align: center;">
                <a href="{{ route('register') }}" class="btn-register">
                    <i class="fas fa-user-plus"></i>
                    Daftar Akun Baru
                    <i class="fas fa-arrow-right"></i>
                </a>
            </div>

            <!-- Demo Credentials -->
            <div class="demo-credentials">
                <div class="demo-header">
                    <div class="demo-icon">
                        <i class="fas fa-key"></i>
                    </div>
                    <p class="demo-title">Akun Demo</p>
                </div>
                <div class="demo-item">
                    <i class="fas fa-envelope"></i>
                    <span class="demo-label">Email:</span>
                    <code class="demo-code" onclick="copyToClipboard('admin@yayasan.com')">admin@yayasan.com</code>
                </div>
                <div class="demo-item">
                    <i class="fas fa-lock"></i>
                    <span class="demo-label">Password:</span>
                    <code class="demo-code" onclick="copyToClipboard('password123')">password123</code>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <p class="footer">
            <i class="far fa-copyright"></i>
            {{ date('Y') }} Yayasan Management System. All rights reserved.
        </p>
    </div>

    {{-- JavaScript untuk fungsionalitas tambahan --}}
    <script>
        // Loading state pada form submit
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            const button = document.getElementById('loginButton');
            button.classList.add('btn-loading');
            button.innerHTML = '<i class="fas fa-sign-in-alt"></i> Loading...';
        });

        // Fungsi copy ke clipboard
        function copyToClipboard(text) {
            navigator.clipboard.writeText(text).then(function() {
                // Buat notifikasi sederhana
                const notification = document.createElement('div');
                notification.textContent = 'Teks berhasil disalin!';
                notification.style.cssText = `
                    position: fixed;
                    top: 20px;
                    right: 20px;
                    background: #10b981;
                    color: white;
                    padding: 10px 20px;
                    border-radius: 8px;
                    font-size: 14px;
                    z-index: 9999;
                    animation: slideIn 0.3s ease;
                `;
                document.body.appendChild(notification);
                
                setTimeout(() => {
                    notification.remove();
                }, 2000);
            }).catch(function(err) {
                console.error('Gagal menyalin teks: ', err);
            });
        }

        // Animasi input focus
        document.querySelectorAll('.input-field').forEach(input => {
            input.addEventListener('focus', function() {
                this.closest('.input-wrapper').querySelector('.input-icon').style.color = '#4f46e5';
            });
            
            input.addEventListener('blur', function() {
                this.closest('.input-wrapper').querySelector('.input-icon').style.color = '#9ca3af';
            });
        });

        // Prevent multiple form submission
        let formSubmitted = false;
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            if (formSubmitted) {
                e.preventDefault();
                return;
            }
            formSubmitted = true;
        });
    </script>
</body>

</html>