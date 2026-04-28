<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Admin Yayasan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');

        :root {
            --primary-gradient: linear-gradient(135deg, #005F02 0%, #0a8f0a 100%);
            --register-gradient: linear-gradient(135deg, #004401 0%, #00a86b 100%);
            --register-hover: linear-gradient(135deg, #006400 0%, #00c853 100%);
            --bg-gradient: linear-gradient(135deg, #002d00 0%, #005F02 50%, #002d00 100%);

            --shadow-primary: 0 4px 12px rgba(0, 95, 2, 0.4);
            --shadow-register: 0 4px 6px -1px rgba(0, 68, 1, 0.3);
            --shadow-register-hover: 0 6px 15px -3px rgba(0, 68, 1, 0.5);

            --border-radius-card: 1.5rem;
            --border-radius-button: 0.75rem;
            --border-radius-register: 3rem;
            --transition-default: all 0.3s ease;
        }

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
        }

        .login-container {
            width: 100%;
            max-width: 28rem;
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
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.2);
            border: 4px solid rgba(255, 255, 255, 0.2);
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
        }

        .logo-subtitle {
            color: #c7d2fe;
            font-size: 0.875rem;
        }

        .login-card {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 1.5rem;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
            padding: 2rem;
        }

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
        }

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
        }

        .input-field {
            width: 100%;
            padding: 0.75rem 1rem 0.75rem 3rem;
            border: 2px solid #e5e7eb;
            border-radius: 0.75rem;
            font-size: 0.875rem;
            transition: all 0.3s ease;
            background: white;
            color: #1f2937;
        }

        .input-field:focus {
            outline: none;
            border-color: #00a86b;
            box-shadow: 0 0 0 4px rgba(230, 255, 232, 0.15);
        }

        .btn-primary {
            background: var(--primary-gradient);
            color: white;
            border: none;
            padding: 0.875rem 1.5rem;
            border-radius: 0.75rem;
            font-weight: 600;
            font-size: 1.125rem;
            width: 100%;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: var(--shadow-register);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-register-hover);
        }

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
            border-bottom: 2px solid #E7EBE5;
        }

        .divider span {
            padding: 0 1rem;
            color: #6b7280;
            font-size: 0.875rem;
        }

        .btn-register {
            background: var(--primary-gradient);
            color: white;
            border: none;
            padding: 0.875rem 1.5rem;
            border-radius: 0.75rem;
            font-weight: 600;
            font-size: 1.125rem;
            width: 100%;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: var(--shadow-register);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }

        .btn-register:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-register-hover);
        }

        .demo-credentials {
            background: linear-gradient(135deg, #eef2ff 0%, #e0e7ff 100%);
            border: 2px solid #c7d2fe;
            border-radius: 1rem;
            padding: 1.25rem;
            margin-top: 2rem;
        }

        .demo-header {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 1rem;
        }

        .demo-icon {
            background: rgba(79, 70, 229, 0.2);
            border-radius: 0.5rem;
            padding: 0.375rem;
        }

        .demo-icon i {
            color: #4338ca;
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

        .footer {
            text-align: center;
            margin-top: 2rem;
            color: #c7d2fe;
            font-size: 0.875rem;
        }

        @media (max-width: 640px) {
            .login-card {
                padding: 1.5rem;
            }

            .logo-title {
                font-size: 1.5rem;
            }
        }
    </style>
</head>

<body>
    <div class="login-container">
        <div class="logo-wrapper">
            <div class="logo-image">
                <img src="<?php echo e(asset('gallery/logoo.jpeg')); ?>" alt="Logo Yayasan">
            </div>
            <h1 class="logo-title">Admin Yayasan</h1>
            <p class="logo-subtitle">Silakan login untuk melanjutkan</p>
        </div>

        <div class="login-card">
            <?php if(session('error')): ?>
                <div class="alert-error" role="alert">
                    <i class="fas fa-exclamation-circle"></i>
                    <?php echo e(session('error')); ?>

                </div>
            <?php endif; ?>

            <?php if($errors->any()): ?>
                <div class="alert-error" role="alert">
                    <i class="fas fa-exclamation-circle"></i>
                    <?php echo e($errors->first()); ?>

                </div>
            <?php endif; ?>

            <form action="<?php echo e(route('login.post')); ?>" method="POST" id="loginForm">
                <?php echo csrf_field(); ?>

                <div class="form-group">
                    <label class="form-label">Email Address</label>
                    <div class="input-wrapper">
                        <i class="fas fa-envelope input-icon"></i>
                        <input type="email" name="email" value="<?php echo e(old('email')); ?>" class="input-field"
                            placeholder="admin@yayasan.com" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">Password</label>
                    <div class="input-wrapper">
                        <i class="fas fa-lock input-icon"></i>
                        <input type="password" name="password" class="input-field" placeholder="••••••••" required>
                    </div>
                </div>

                <button type="submit" class="btn-primary">
                    <i class="fas fa-sign-in-alt"></i>
                    Login
                </button>
            </form>

            <div class="divider">
                <span>Belum punya akun?</span>
            </div>

            <div style="text-align: center;">
                <a href="<?php echo e(route('register')); ?>" class="btn-register">
                    <i class="fas fa-user-plus"></i>
                    Daftar Akun Baru
                    <i class="fas fa-arrow-right"></i>
                </a>
            </div>

        <p class="footer">
            <i class="far fa-copyright"></i>
            <?php echo e(date('Y')); ?> Yayasan Management System. All rights reserved.
        </p>
    </div>
</body>

</html>
<?php /**PATH D:\laragon\www\pondok_gue\ponpes-main\resources\views/auth/login.blade.php ENDPATH**/ ?>