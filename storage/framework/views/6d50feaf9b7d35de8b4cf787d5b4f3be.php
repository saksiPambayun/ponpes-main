<script>
    // Function untuk cek feedback baru setiap 30 detik
    let lastFeedbackCount = <?php echo e($unreadFeedbackCount ?? 0); ?>;

    function checkNewFeedback() {
        fetch('<?php echo e(route("admin.feedback.unread-count")); ?>')
            .then(response => response.json())
            .then(data => {
                if (data.count > lastFeedbackCount) {
                    // Ada feedback baru
                    const newCount = data.count - lastFeedbackCount;
                    showNewFeedbackNotification(newCount);

                    // Update badge di sidebar
                    const badge = document.querySelector('.sidebar-item[href*="feedback"] .rounded-full');
                    if (badge) {
                        badge.textContent = data.count;
                        if (data.count > 0) {
                            badge.classList.remove('hidden');
                        } else {
                            badge.classList.add('hidden');
                        }
                    }

                    lastFeedbackCount = data.count;
                }
            })
            .catch(error => console.error('Error:', error));
    }

    function showNewFeedbackNotification(count) {
        // Tampilkan notifikasi toast
        const toastContainer = document.createElement('div');
        toastContainer.id = 'toast-new-feedback';
        toastContainer.className = 'fixed bottom-5 right-5 z-50';
        toastContainer.innerHTML = `
        <div class="bg-blue-500 text-white px-6 py-3 rounded-lg shadow-lg flex items-center gap-3 min-w-[300px] animate-slide-in">
            <div class="w-8 h-8 rounded-full bg-white/20 flex items-center justify-center">
                <i class="fas fa-comment-dots text-white text-lg"></i>
            </div>
            <div class="flex-1">
                <p class="font-semibold text-sm">Feedback Baru!</p>
                <p class="text-xs opacity-90">${count} kritik/saran baru masuk</p>
            </div>
            <button onclick="closeToast('toast-new-feedback')" class="text-white hover:text-gray-200 transition">
                <i class="fas fa-times"></i>
            </button>
        </div>
    `;
        document.body.appendChild(toastContainer);

        setTimeout(() => {
            const toast = document.getElementById('toast-new-feedback');
            if (toast) {
                toast.style.opacity = '0';
                toast.style.transform = 'translateY(100px)';
                setTimeout(() => toast.remove(), 300);
            }
        }, 8000);
    }

    // Cek feedback baru setiap 30 detik (hanya di halaman admin)
    if (window.location.pathname.includes('/admin')) {
        setInterval(checkNewFeedback, 30000);
    }
</script>

<style>
    @keyframes slideIn {
        from {
            transform: translateX(100%);
            opacity: 0;
        }

        to {
            transform: translateX(0);
            opacity: 1;
        }
    }

    .animate-slide-in {
        animation: slideIn 0.3s ease-out;
    }
</style><?php /**PATH D:\laragon\www\pondok_gue\ponpes-main\resources\views/admin/partials/notification-badge.blade.php ENDPATH**/ ?>