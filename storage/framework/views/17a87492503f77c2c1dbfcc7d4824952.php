<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Yayasan</title>
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

        .register-container {
            width: 100%;
            max-width: 32rem;
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
            width: 5rem;
            height: 5rem;
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
            font-size: 1.5rem;
            font-weight: 700;
            color: white;
            margin-bottom: 0.5rem;
        }

        .logo-subtitle {
            color: #c7d2fe;
            font-size: 0.875rem;
        }

        .register-card {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 1.5rem;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
            padding: 2rem;
            max-height: 85vh;
            overflow-y: auto;
        }

        .register-card::-webkit-scrollbar {
            width: 6px;
        }

        .register-card::-webkit-scrollbar-track {
            background: #e5e7eb;
            border-radius: 3px;
        }

        .register-card::-webkit-scrollbar-thumb {
            background: #006400;
            border-radius: 3px;
        }

        .alert-success {
            background: linear-gradient(135deg, #dcfce7 0%, #bbf7d0 100%);
            border: 1px solid #4ade80;
            color: #166534;
            padding: 0.75rem 1rem;
            border-radius: 0.75rem;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.875rem;
        }

        .form-group {
            margin-bottom: 1.25rem;
        }

        .form-label {
            display: block;
            font-size: 0.875rem;
            font-weight: 500;
            color: #374151;
            margin-bottom: 0.5rem;
        }

        .form-label .required {
            color: #ef4444;
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
            box-shadow: var(--shadow-primary);
        }

        .input-field.error {
            border-color: #ef4444;
        }

        textarea.input-field {
            padding-top: 0.75rem;
            resize: vertical;
        }

        textarea.input-field+.input-icon {
            top: 1rem;
            transform: none;
        }

        .error-message {
            color: #ef4444;
            font-size: 0.75rem;
            margin-top: 0.25rem;
            display: flex;
            align-items: center;
            gap: 0.25rem;
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
            border-bottom: 2px solid #e5e7eb;
        }

        .divider span {
            padding: 0 1rem;
            color: #6b7280;
            font-size: 0.875rem;
        }

        .btn-login {
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

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-register-hover);
        }

        .footer {
            text-align: center;
            margin-top: 2rem;
            color: #c7d2fe;
            font-size: 0.875rem;
        }

        @media (max-width: 640px) {
            .register-card {
                padding: 1.5rem;
            }

            .logo-title {
                font-size: 1.25rem;
            }
        }
    </style>
</head>

<body>
    <div class="register-container">
        <div class="logo-wrapper">
            <div class="logo-image">
                <img src="<?php echo e(asset('gallery/logoo.jpeg')); ?>" alt="Logo Yayasan">
            </div>
            <h1 class="logo-title">Daftar Akun Baru</h1>
            <p class="logo-subtitle">Silakan isi form di bawah ini</p>
        </div>

        <div class="register-card">
            <?php if(session('success')): ?>
                <div class="alert-success" role="alert">
                    <i class="fas fa-check-circle"></i>
                    <?php echo e(session('success')); ?>

                </div>
            <?php endif; ?>

            <form action="<?php echo e(route('register.process')); ?>" method="POST">
                <?php echo csrf_field(); ?>

                <div class="form-group">
                    <label class="form-label">
                        Nama Lengkap <span class="required">*</span>
                    </label>
                    <div class="input-wrapper">
                        <i class="fas fa-user input-icon"></i>
                        <input type="text" name="name" value="<?php echo e(old('name')); ?>"
                            class="input-field <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Masukkan nama lengkap"
                            required>
                    </div>
                    <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="error-message"><i class="fas fa-exclamation-circle"></i> <?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="form-group">
                    <label class="form-label">
                        Username <span class="required">*</span>
                    </label>
                    <div class="input-wrapper">
                        <i class="fas fa-at input-icon"></i>
                        <input type="text" name="username" value="<?php echo e(old('username')); ?>"
                            class="input-field <?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Masukkan username"
                            required>
                    </div>
                    <?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="error-message"><i class="fas fa-exclamation-circle"></i> <?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="form-group">
                    <label class="form-label">
                        Email <span class="required">*</span>
                    </label>
                    <div class="input-wrapper">
                        <i class="fas fa-envelope input-icon"></i>
                        <input type="email" name="email" value="<?php echo e(old('email')); ?>"
                            class="input-field <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="contoh@email.com" required>
                    </div>
                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="error-message"><i class="fas fa-exclamation-circle"></i> <?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="form-group">
                    <label class="form-label">
                        Password <span class="required">*</span>
                    </label>
                    <div class="input-wrapper">
                        <i class="fas fa-lock input-icon"></i>
                        <input type="password" name="password" class="input-field <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                            placeholder="Minimal 6 karakter" required>
                    </div>
                    <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="error-message"><i class="fas fa-exclamation-circle"></i> <?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="form-group">
                    <label class="form-label">
                        Konfirmasi Password <span class="required">*</span>
                    </label>
                    <div class="input-wrapper">
                        <i class="fas fa-lock input-icon"></i>
                        <input type="password" name="password_confirmation" class="input-field"
                            placeholder="Ulangi password" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">
                        No Telepon <span class="text-gray-400 text-xs">(Opsional)</span>
                    </label>
                    <div class="input-wrapper">
                        <i class="fas fa-phone input-icon"></i>
                        <input type="tel" name="phone" value="<?php echo e(old('phone')); ?>"
                            class="input-field <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="0812-3456-7890">
                    </div>
                    <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="error-message"><i class="fas fa-exclamation-circle"></i> <?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="form-group">
                    <label class="form-label">
                        Alamat <span class="text-gray-400 text-xs">(Opsional)</span>
                    </label>
                    <div class="input-wrapper">
                        <i class="fas fa-map-marker-alt input-icon"></i>
                        <textarea name="address" class="input-field <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                            placeholder="Masukkan alamat lengkap" rows="2"><?php echo e(old('address')); ?></textarea>
                    </div>
                    <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="error-message"><i class="fas fa-exclamation-circle"></i> <?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <button type="submit" class="btn-primary">
                    <i class="fas fa-user-plus"></i>
                    Daftar Sekarang
                </button>
            </form>

            <div class="divider">
                <span>Sudah punya akun?</span>
            </div>

            <div style="text-align: center;">
                <a href="<?php echo e(route('login')); ?>" class="btn-login">
                    <i class="fas fa-sign-in-alt"></i>
                    Login Sekarang
                </a>
            </div>
        </div>

        <p class="footer">
            <i class="far fa-copyright"></i>
            <?php echo e(date('Y')); ?> Yayasan Management System. All rights reserved.
        </p>
    </div>
</body>

</html>
<?php /**PATH D:\laragon\www\pondok_gue\ponpes-main\resources\views/auth/register.blade.php ENDPATH**/ ?>