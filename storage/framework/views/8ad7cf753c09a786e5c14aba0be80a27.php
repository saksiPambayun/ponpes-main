
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi OTP - Yayasan</title>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');

        :root {
            --primary-gradient: linear-gradient(135deg, #005F02 0%, #0a8f0a 100%);
            --bg-gradient: linear-gradient(135deg, #002d00 0%, #005F02 50%, #002d00 100%);
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

        .otp-container {
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

        .otp-card {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 1.5rem;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
            padding: 2rem;
        }

        .otp-inputs {
            display: flex;
            gap: 0.75rem;
            justify-content: center;
            margin: 2rem 0;
        }

        .otp-input {
            width: 3.5rem;
            height: 3.5rem;
            text-align: center;
            font-size: 1.5rem;
            font-weight: 600;
            border: 2px solid #e5e7eb;
            border-radius: 0.75rem;
            transition: all 0.3s ease;
        }

        .otp-input:focus {
            outline: none;
            border-color: #00a86b;
            box-shadow: 0 0 0 4px rgba(0, 168, 107, 0.1);
        }

        .btn-primary {
            background: var(--primary-gradient);
            color: white;
            border: none;
            padding: 0.875rem 1.5rem;
            border-radius: 0.75rem;
            font-weight: 600;
            font-size: 1rem;
            width: 100%;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px -5px rgba(0, 95, 2, 0.4);
        }

        .btn-primary:disabled {
            opacity: 0.6;
            cursor: not-allowed;
        }

        .timer {
            font-size: 0.875rem;
            color: #6b7280;
            text-align: center;
            margin-top: 1rem;
        }

        .resend-btn {
            background: none;
            border: none;
            color: #005F02;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .resend-btn:hover:not(:disabled) {
            text-decoration: underline;
        }

        .resend-btn:disabled {
            color: #9ca3af;
            cursor: not-allowed;
        }

        @media (max-width: 640px) {
            .otp-card {
                padding: 1.5rem;
            }

            .otp-input {
                width: 2.5rem;
                height: 2.5rem;
                font-size: 1.25rem;
            }
        }
    </style>
</head>

<body>
    <div class="otp-container">
        <div class="otp-card">
            <div class="text-center mb-6">
                <i class="fas fa-key text-5xl text-green-700 mb-3"></i>
                <h2 class="text-2xl font-bold text-gray-800">Verifikasi OTP</h2>
                <p class="text-gray-600 mt-2">
                    Kami telah mengirimkan kode verifikasi ke
                    <strong><?php echo e($identifier); ?></strong>
                </p>
                <p class="text-sm text-gray-500 mt-1">
                    via <?php echo e($type === 'email' ? 'Email' : 'WhatsApp'); ?>

                </p>
            </div>

            <div id="alertMessage"></div>

            <form action="<?php echo e(route('otp.verify')); ?>" method="POST" id="otpForm">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="identifier" value="<?php echo e($identifier); ?>">
                <input type="hidden" name="purpose" value="<?php echo e($purpose); ?>">

                <div class="otp-inputs" id="otpInputs">
                    <input type="text" maxlength="1" class="otp-input" id="otp1" name="otp1" autofocus>
                    <input type="text" maxlength="1" class="otp-input" id="otp2" name="otp2">
                    <input type="text" maxlength="1" class="otp-input" id="otp3" name="otp3">
                    <input type="text" maxlength="1" class="otp-input" id="otp4" name="otp4">
                    <input type="text" maxlength="1" class="otp-input" id="otp5" name="otp5">
                    <input type="text" maxlength="1" class="otp-input" id="otp6" name="otp6">
                </div>
                <input type="hidden" name="otp" id="otpValue">

                <button type="submit" class="btn-primary" id="verifyBtn">
                    <i class="fas fa-check-circle mr-2"></i>
                    Verifikasi
                </button>
            </form>

            <div class="timer" id="timerContainer">
                <span id="timerText"></span>
                <button type="button" id="resendBtn" class="resend-btn" onclick="resendOtp()" disabled>
                    Kirim Ulang OTP
                </button>
            </div>
        </div>
    </div>

    <script>
        // Ambil semua input OTP
        const inputs = document.querySelectorAll('.otp-input');
        const form = document.getElementById('otpForm');
        const verifyBtn = document.getElementById('verifyBtn');
        const otpValueInput = document.getElementById('otpValue');

        // Gabungkan nilai OTP dari 6 input
        function combineOtpValue() {
            let otpValue = '';
            inputs.forEach(input => {
                otpValue += input.value;
            });
            otpValueInput.value = otpValue;
            return otpValue;
        }

        // Auto-focus dan auto-combine
        inputs.forEach((input, index) => {
            input.addEventListener('input', function (e) {
                if (this.value.length === 1 && index < inputs.length - 1) {
                    inputs[index + 1].focus();
                }
                combineOtpValue();

                // Auto submit jika sudah 6 digit
                if (combineOtpValue().length === 6) {
                    submitForm();
                }
            });

            input.addEventListener('keydown', function (e) {
                if (e.key === 'Backspace' && this.value.length === 0 && index > 0) {
                    inputs[index - 1].focus();
                }
            });

            input.addEventListener('paste', function (e) {
                e.preventDefault();
                const paste = (e.clipboardData || window.clipboardData).getData('text');
                const otpDigits = paste.slice(0, 6).split('');

                inputs.forEach((input, idx) => {
                    if (otpDigits[idx]) {
                        input.value = otpDigits[idx];
                    }
                });

                combineOtpValue();

                if (combineOtpValue().length === 6) {
                    submitForm();
                }
            });
        });

        // Function untuk submit form via AJAX
        function submitForm() {
            const otpValue = combineOtpValue();

            if (otpValue.length !== 6) {
                showAlert('Masukkan 6 digit kode OTP', 'error');
                return;
            }

            // Disable button
            verifyBtn.disabled = true;
            verifyBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Memverifikasi...';

            // Debug log
            console.log('Verifying OTP:', otpValue);
            console.log('Identifier:', '<?php echo e($identifier); ?>');
            console.log('Purpose:', '<?php echo e($purpose); ?>');

            // Kirim request verifikasi
            fetch('<?php echo e(route("otp.verify")); ?>', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Accept': 'application/json'
                },
                body: JSON.stringify({
                    otp: otpValue,
                    identifier: '<?php echo e($identifier); ?>',
                    purpose: '<?php echo e($purpose); ?>'
                })
            })
                .then(response => response.json())
                .then(data => {
                    console.log('Response:', data);
                    if (data.success) {
                        window.location.href = data.redirect;
                    } else {
                        showAlert(data.message || 'Kode OTP tidak valid atau sudah kadaluarsa', 'error');
                        verifyBtn.disabled = false;
                        verifyBtn.innerHTML = '<i class="fas fa-check-circle mr-2"></i> Verifikasi';

                        // Clear OTP inputs
                        inputs.forEach(input => {
                            input.value = '';
                        });
                        inputs[0].focus();
                        combineOtpValue();
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    showAlert('Terjadi kesalahan. Silakan coba lagi.', 'error');
                    verifyBtn.disabled = false;
                    verifyBtn.innerHTML = '<i class="fas fa-check-circle mr-2"></i> Verifikasi';
                });
        }

        // Show alert message
        function showAlert(message, type) {
            const alertDiv = document.getElementById('alertMessage');
            const bgColor = type === 'error' ? 'bg-red-100 border-red-400 text-red-700' : 'bg-green-100 border-green-400 text-green-700';

            alertDiv.innerHTML = `
                <div class="${bgColor} border px-4 py-3 rounded-lg mb-4">
                    ${message}
                </div>
            `;

            setTimeout(() => {
                alertDiv.innerHTML = '';
            }, 5000);
        }

        // Timer function
        let timeLeft = 600;

        function updateTimer() {
            const minutes = Math.floor(timeLeft / 60);
            const seconds = timeLeft % 60;
            const timerText = document.getElementById('timerText');
            const resendBtn = document.getElementById('resendBtn');

            if (timeLeft > 0) {
                timerText.innerHTML = `Kode berlaku selama ${minutes}:${seconds.toString().padStart(2, '0')} `;
                timeLeft--;
                setTimeout(updateTimer, 1000);
            } else {
                timerText.innerHTML = 'Kode sudah kadaluarsa. ';
                resendBtn.disabled = false;
            }
        }

        updateTimer();

        // Resend OTP
        function resendOtp() {
            const btn = document.getElementById('resendBtn');
            btn.disabled = true;
            btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Mengirim...';

            fetch('<?php echo e(route("otp.send")); ?>', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({
                    identifier: '<?php echo e($identifier); ?>',
                    type: '<?php echo e($type); ?>',
                    purpose: '<?php echo e($purpose); ?>'
                })
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        timeLeft = 300;
                        updateTimer();
                        btn.innerHTML = 'Kirim Ulang OTP';
                        showAlert(data.message, 'success');

                        // Clear OTP inputs
                        inputs.forEach(input => {
                            input.value = '';
                        });
                        inputs[0].focus();
                        combineOtpValue();
                    } else {
                        showAlert(data.message, 'error');
                        btn.innerHTML = 'Kirim Ulang OTP';
                        btn.disabled = false;
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    showAlert('Gagal mengirim ulang OTP. Silakan coba lagi.', 'error');
                    btn.innerHTML = 'Kirim Ulang OTP';
                    btn.disabled = false;
                });
        }

        // Handle form submit (prevent default)
        form.addEventListener('submit', function (e) {
            e.preventDefault();
            submitForm();
        });
    </script>
</body>

</html><?php /**PATH D:\ponpes ifadah\resources\views/auth/otp-verify.blade.php ENDPATH**/ ?>