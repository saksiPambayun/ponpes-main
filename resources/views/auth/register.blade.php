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

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #1e1b4b 0%, #581c87 50%, #1e1b4b 100%);
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
            background: #4f46e5;
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
            border-color: #4f46e5;
            box-shadow: 0 0 0 4px rgba(79, 70, 229, 0.15);
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
            background: linear-gradient(135deg, #4f46e5 0%, #313294 100%);
            color: white;
            border: none;
            padding: 0.875rem 1.5rem;
            border-radius: 0.75rem;
            font-weight: 600;
            font-size: 1rem;
            width: 100%;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 12px rgba(79, 70, 229, 0.4);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            margin-top: 1rem;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(79, 70, 229, 0.5);
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
            background: linear-gradient(135deg, #0e096f 0%, #6366f1 100%);
            color: white;
            border: none;
            padding: 0.875rem 1.5rem;
            border-radius: 3rem;
            font-weight: 600;
            font-size: 1rem;
            width: 100%;
            cursor: pointer;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.75rem;
            text-decoration: none;
        }

        .btn-login:hover {
            transform: translateY(-2px);
            background: linear-gradient(135deg, #4f46e5 0%, #313294 100%);
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
                <img src="{{ asset('gallery/logoo.jpeg') }}" alt="Logo Yayasan">
            </div>
            <h1 class="logo-title">Daftar Akun Baru</h1>
            <p class="logo-subtitle">Silakan isi form di bawah ini</p>
        </div>

        <div class="register-card">
            @if(session('success'))
                <div class="alert-success" role="alert">
                    <i class="fas fa-check-circle"></i>
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('register.process') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label class="form-label">
                        Nama Lengkap <span class="required">*</span>
                    </label>
                    <div class="input-wrapper">
                        <i class="fas fa-user input-icon"></i>
                        <input type="text" name="name" value="{{ old('name') }}"
                            class="input-field @error('name') error @enderror" placeholder="Masukkan nama lengkap"
                            required>
                    </div>
                    @error('name')
                        <p class="error-message"><i class="fas fa-exclamation-circle"></i> {{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="form-label">
                        Username <span class="required">*</span>
                    </label>
                    <div class="input-wrapper">
                        <i class="fas fa-at input-icon"></i>
                        <input type="text" name="username" value="{{ old('username') }}"
                            class="input-field @error('username') error @enderror" placeholder="Masukkan username"
                            required>
                    </div>
                    @error('username')
                        <p class="error-message"><i class="fas fa-exclamation-circle"></i> {{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="form-label">
                        Email <span class="required">*</span>
                    </label>
                    <div class="input-wrapper">
                        <i class="fas fa-envelope input-icon"></i>
                        <input type="email" name="email" value="{{ old('email') }}"
                            class="input-field @error('email') error @enderror" placeholder="contoh@email.com" required>
                    </div>
                    @error('email')
                        <p class="error-message"><i class="fas fa-exclamation-circle"></i> {{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="form-label">
                        Password <span class="required">*</span>
                    </label>
                    <div class="input-wrapper">
                        <i class="fas fa-lock input-icon"></i>
                        <input type="password" name="password" class="input-field @error('password') error @enderror"
                            placeholder="Minimal 6 karakter" required>
                    </div>
                    @error('password')
                        <p class="error-message"><i class="fas fa-exclamation-circle"></i> {{ $message }}</p>
                    @enderror
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
                        <input type="tel" name="phone" value="{{ old('phone') }}"
                            class="input-field @error('phone') error @enderror" placeholder="0812-3456-7890">
                    </div>
                    @error('phone')
                        <p class="error-message"><i class="fas fa-exclamation-circle"></i> {{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="form-label">
                        Alamat <span class="text-gray-400 text-xs">(Opsional)</span>
                    </label>
                    <div class="input-wrapper">
                        <i class="fas fa-map-marker-alt input-icon"></i>
                        <textarea name="address" class="input-field @error('address') error @enderror"
                            placeholder="Masukkan alamat lengkap" rows="2">{{ old('address') }}</textarea>
                    </div>
                    @error('address')
                        <p class="error-message"><i class="fas fa-exclamation-circle"></i> {{ $message }}</p>
                    @enderror
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
                <a href="{{ route('login') }}" class="btn-login">
                    <i class="fas fa-sign-in-alt"></i>
                    Login Sekarang
                </a>
            </div>
        </div>

        <p class="footer">
            <i class="far fa-copyright"></i>
            {{ date('Y') }} Yayasan Management System. All rights reserved.
        </p>
    </div>
</body>

</html>
