@extends('layouts.app')

@section('title', 'Profil Saya')
@section('page-title', 'Profil Saya')

@section('content')
    <style>
        :root {
            --primary: #005F02;
            --primary-light: #2e7d32;
            --primary-soft: #e8f5e9;
            --gray-50: #f9fafb;
            --gray-100: #f3f4f6;
            --gray-200: #e5e7eb;
            --gray-300: #d1d5db;
            --gray-400: #9ca3af;
            --gray-500: #6b7280;
            --gray-600: #4b5563;
            --gray-700: #374151;
            --gray-800: #1f2937;
            --gray-900: #111827;
        }

        .profile-container {
            max-width: 800px;
            margin: 0 auto;
            padding: 2rem 1rem;
        }

        /* Avatar Section */
        .avatar-section {
            text-align: center;
            margin-bottom: 2rem;
        }

        .avatar-wrapper {
            position: relative;
            display: inline-block;
        }

        .avatar-img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            border: 4px solid var(--primary);
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.2);
        }

        .avatar-placeholder {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-light) 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 3rem;
            font-weight: 600;
            color: white;
            border: 4px solid white;
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.2);
        }

        .upload-btn {
            position: absolute;
            bottom: 5px;
            right: 5px;
            background: var(--primary);
            border-radius: 50%;
            width: 36px;
            height: 36px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
            transition: all 0.2s;
            color: white;
        }

        .upload-btn:hover {
            transform: scale(1.1);
            background: var(--primary-light);
        }

        .user-name {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--gray-800);
            margin-top: 1rem;
            margin-bottom: 0.25rem;
        }

        .user-email {
            color: var(--gray-500);
            margin-bottom: 0.25rem;
        }

        .user-phone {
            color: var(--gray-500);
            font-size: 0.875rem;
            margin-bottom: 0.5rem;
        }

        .user-stats {
            display: flex;
            justify-content: center;
            gap: 1.5rem;
            margin-top: 1rem;
            padding-top: 1rem;
            border-top: 1px solid var(--gray-200);
        }

        .user-stat {
            text-align: center;
        }

        .user-stat-value {
            font-weight: 700;
            color: var(--gray-800);
        }

        .user-stat-label {
            font-size: 0.7rem;
            color: var(--gray-500);
        }

        .role-badge {
            display: inline-block;
            background: var(--primary-soft);
            padding: 0.25rem 1rem;
            border-radius: 100px;
            font-size: 0.75rem;
            font-weight: 500;
            color: var(--primary);
            margin-top: 0.75rem;
        }

        /* Form Card */
        .form-card {
            background: white;
            border-radius: 20px;
            border: 1px solid var(--gray-200);
            overflow: hidden;
            margin-bottom: 1.5rem;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
        }

        .form-header {
            padding: 1rem 1.5rem;
            background: var(--gray-50);
            border-bottom: 1px solid var(--gray-200);
        }

        .form-header h3 {
            margin: 0;
            font-size: 1rem;
            font-weight: 600;
            color: var(--gray-800);
        }

        .form-header h3 i {
            color: var(--primary);
            margin-right: 0.5rem;
        }

        .form-body {
            padding: 1.5rem;
        }

        .form-group {
            margin-bottom: 1.25rem;
        }

        .form-label {
            display: block;
            font-size: 0.875rem;
            font-weight: 500;
            color: var(--gray-700);
            margin-bottom: 0.5rem;
        }

        .form-label i {
            color: var(--primary);
            margin-right: 0.5rem;
            width: 20px;
        }

        .form-control {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 1px solid var(--gray-300);
            border-radius: 12px;
            font-size: 0.875rem;
            transition: all 0.2s;
            background: white;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(0, 95, 2, 0.1);
        }

        .form-control:disabled {
            background: var(--gray-100);
            cursor: not-allowed;
        }

        textarea.form-control {
            resize: vertical;
            min-height: 80px;
        }

        .btn-primary {
            background: var(--primary);
            border: none;
            padding: 0.75rem 1.5rem;
            border-radius: 12px;
            font-weight: 600;
            color: white;
            transition: all 0.2s;
            cursor: pointer;
            width: 100%;
        }

        .btn-primary:hover {
            background: var(--primary-light);
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(0, 95, 2, 0.3);
        }

        .btn-outline {
            background: transparent;
            border: 1px solid var(--gray-300);
            padding: 0.75rem 1rem;
            border-radius: 12px;
            font-weight: 500;
            transition: all 0.2s;
            cursor: pointer;
            width: 100%;
            color: var(--gray-700);
        }

        .btn-outline:hover {
            border-color: var(--primary);
            color: var(--primary);
        }

        /* Password Strength */
        .password-strength {
            height: 4px;
            background: var(--gray-200);
            border-radius: 2px;
            margin-top: 0.5rem;
            overflow: hidden;
        }

        .strength-bar {
            height: 100%;
            width: 0;
            transition: width 0.3s;
            border-radius: 2px;
        }

        .strength-weak {
            background: #ef4444;
            width: 33%;
        }

        .strength-medium {
            background: #f59e0b;
            width: 66%;
        }

        .strength-strong {
            background: #10b981;
            width: 100%;
        }

        .strength-text {
            font-size: 0.7rem;
            margin-top: 0.25rem;
        }

        /* Alerts */
        .alert {
            padding: 1rem;
            border-radius: 12px;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .alert-success {
            background: #ecfdf5;
            border: 1px solid #a7f3d0;
            color: #065f46;
        }

        .alert-error {
            background: #fef2f2;
            border: 1px solid #fecaca;
            color: #991b1b;
        }

        .close-alert {
            background: none;
            border: none;
            font-size: 1.25rem;
            cursor: pointer;
            color: inherit;
            opacity: 0.6;
        }

        .close-alert:hover {
            opacity: 1;
        }

        .text-muted {
            font-size: 0.7rem;
            color: var(--gray-500);
            margin-top: 0.25rem;
        }

        .text-danger {
            color: #ef4444;
            font-size: 0.75rem;
            margin-top: 0.25rem;
        }

        hr {
            margin: 1rem 0;
            border: none;
            border-top: 1px solid var(--gray-200);
        }

        /* Responsive */
        @media (max-width: 640px) {
            .form-body {
                padding: 1rem;
            }

            .user-stats {
                gap: 1rem;
            }
        }
    </style>

    <div class="profile-container">
        @php $user = auth()->user(); @endphp

        @if($user)
            <!-- Avatar & Info -->
            <div class="avatar-section">
                <div class="avatar-wrapper">
                    @if($user->avatar)
                        <img src="{{ asset('storage/' . $user->avatar) }}" alt="Avatar" class="avatar-img">
                    @else
                        <div class="avatar-placeholder">
                            {{ strtoupper(substr($user->name, 0, 2)) }}
                        </div>
                    @endif
                    <form action="{{ route('user.profile.upload-avatar') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <label class="upload-btn">
                            <i class="fas fa-camera" style="font-size: 0.875rem;"></i>
                            <input type="file" name="avatar" accept="image/*" hidden onchange="this.form.submit()">
                        </label>
                    </form>
                </div>
                <h2 class="user-name">{{ $user->name }}</h2>
                <div class="user-email">{{ $user->email }}</div>
                @if($user->phone)
                    <div class="user-phone"><i class="fab fa-whatsapp"></i> {{ $user->phone }}</div>
                @endif
                <div class="role-badge">
                    <i class="fas fa-user-graduate"></i> Santri Al-Ifadah
                </div>

                <div class="user-stats">
                    <div class="user-stat">
                        <div class="user-stat-value">{{ $user->created_at->format('d M Y') }}</div>
                        <div class="user-stat-label">Bergabung</div>
                    </div>
                    <div class="user-stat">
                        <div class="user-stat-value">{{ $user->updated_at->format('d M Y') }}</div>
                        <div class="user-stat-label">Aktivitas Terakhir</div>
                    </div>
                </div>
            </div>

            <!-- Alerts -->
            @if(session('success'))
                <div class="alert alert-success">
                    <span><i class="fas fa-check-circle"></i> {{ session('success') }}</span>
                    <button class="close-alert" onclick="this.parentElement.remove()">&times;</button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-error">
                    <span><i class="fas fa-exclamation-circle"></i> {{ session('error') }}</span>
                    <button class="close-alert" onclick="this.parentElement.remove()">&times;</button>
                </div>
            @endif

            <!-- Edit Profil -->
            <div class="form-card">
                <div class="form-header">
                    <h3><i class="fas fa-user-edit"></i> Edit Profil</h3>
                </div>
                <div class="form-body">
                    <form action="{{ route('user.profile.update') }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label class="form-label"><i class="fas fa-user"></i> Nama Lengkap</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}" required>
                            @error('name') <div class="text-danger">{{ $message }}</div> @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-label"><i class="fas fa-envelope"></i> Email</label>
                            <input type="email" class="form-control" value="{{ $user->email }}" disabled>
                            <div class="text-muted">Email tidak dapat diubah. Hubungi admin jika perlu perubahan.</div>
                        </div>

                        <div class="form-group">
                            <label class="form-label"><i class="fab fa-whatsapp"></i> Nomor WhatsApp</label>
                            <input type="text" name="phone" class="form-control" value="{{ old('phone', $user->phone) }}"
                                placeholder="081234567890">
                            @error('phone') <div class="text-danger">{{ $message }}</div> @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-label"><i class="fas fa-map-marker-alt"></i> Alamat</label>
                            <textarea name="address" class="form-control" rows="3"
                                placeholder="Alamat lengkap">{{ old('address', $user->address) }}</textarea>
                            @error('address') <div class="text-danger">{{ $message }}</div> @enderror
                        </div>

                        <button type="submit" class="btn-primary">
                            <i class="fas fa-save"></i> Simpan Perubahan
                        </button>
                    </form>
                </div>
            </div>

            <!-- Ganti Password -->
            <div class="form-card">
                <div class="form-header">
                    <h3><i class="fas fa-key"></i> Ganti Password</h3>
                </div>
                <div class="form-body">
                    <form action="{{ route('user.profile.change-password') }}" method="POST" id="passwordForm">
                        @csrf

                        <div class="form-group">
                            <label class="form-label"><i class="fas fa-lock"></i> Password Lama</label>
                            <input type="password" name="current_password" class="form-control" required>
                            @error('current_password')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-label"><i class="fas fa-key"></i> Password Baru</label>
                            <input type="password" name="new_password" id="new_password" class="form-control" required>
                            <div class="password-strength">
                                <div class="strength-bar" id="strengthBar"></div>
                            </div>
                            <div class="strength-text" id="strengthText"></div>
                            @error('new_password')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="form-label"><i class="fas fa-check-circle"></i> Konfirmasi Password Baru</label>
                            <input type="password" name="new_password_confirmation" id="confirm_password" class="form-control"
                                required>
                            <div class="text-danger" id="matchError" style="display: none;">Password tidak cocok!</div>
                        </div>

                        <button type="submit" class="btn-outline" style="border-color: var(--primary); color: var(--primary);">
                            <i class="fas fa-sync-alt"></i> Update Password
                        </button>
                    </form>
                </div>
            </div>
        @endif
    </div>

    <script>
        // Password strength checker
        const newPassword = document.getElementById('new_password');
        const confirmPassword = document.getElementById('confirm_password');
        const strengthBar = document.getElementById('strengthBar');
        const strengthText = document.getElementById('strengthText');
        const matchError = document.getElementById('matchError');

        if (newPassword) {
            newPassword.addEventListener('input', function () {
                const password = this.value;
                let strength = 0;
                let message = '';
                let className = '';

                if (password.length >= 6) strength++;
                if (password.match(/[a-z]+/)) strength++;
                if (password.match(/[A-Z]+/)) strength++;
                if (password.match(/[0-9]+/)) strength++;
                if (password.match(/[$@#&!]+/)) strength++;

                if (strength <= 2) {
                    className = 'strength-weak';
                    message = '🔴 Password lemah';
                } else if (strength <= 4) {
                    className = 'strength-medium';
                    message = '🟡 Password sedang';
                } else {
                    className = 'strength-strong';
                    message = '🟢 Password kuat';
                }

                strengthBar.className = 'strength-bar ' + className;
                strengthText.innerHTML = message;
                strengthText.style.color = className === 'strength-weak' ? '#ef4444' : (className === 'strength-medium' ? '#f59e0b' : '#10b981');
            });
        }

        if (confirmPassword) {
            confirmPassword.addEventListener('input', function () {
                if (newPassword && newPassword.value !== this.value) {
                    matchError.style.display = 'block';
                    this.style.borderColor = '#ef4444';
                } else if (confirmPassword) {
                    matchError.style.display = 'none';
                    this.style.borderColor = '#d1d5db';
                }
            });
        }

        // Auto close alerts after 3 seconds
        setTimeout(() => {
            document.querySelectorAll('.alert').forEach(el => {
                setTimeout(() => {
                    el.style.transition = 'opacity 0.5s';
                    el.style.opacity = '0';
                    setTimeout(() => el.remove(), 500);
                }, 3000);
            });
        }, 1000);
    </script>
@endsection