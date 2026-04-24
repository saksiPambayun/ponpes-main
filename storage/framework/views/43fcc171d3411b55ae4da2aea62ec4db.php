<?php if(session('success')): ?>
    <div id="toast-success"
        class="fixed bottom-5 right-5 z-50 transition-all duration-300 transform translate-y-0 opacity-100">
        <div class="bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg flex items-center gap-3 min-w-[300px]">
            <div class="w-8 h-8 rounded-full bg-white/20 flex items-center justify-center">
                <i class="fas fa-check-circle text-white text-lg"></i>
            </div>
            <div class="flex-1">
                <p class="font-semibold text-sm">Berhasil!</p>
                <p class="text-xs opacity-90"><?php echo e(session('success')); ?></p>
            </div>
            <button onclick="closeToast('toast-success')" class="text-white hover:text-gray-200 transition">
                <i class="fas fa-times"></i>
            </button>
        </div>
    </div>
<?php endif; ?>

<?php if(session('error')): ?>
    <div id="toast-error"
        class="fixed bottom-5 right-5 z-50 transition-all duration-300 transform translate-y-0 opacity-100">
        <div class="bg-red-500 text-white px-6 py-3 rounded-lg shadow-lg flex items-center gap-3 min-w-[300px]">
            <div class="w-8 h-8 rounded-full bg-white/20 flex items-center justify-center">
                <i class="fas fa-exclamation-triangle text-white text-lg"></i>
            </div>
            <div class="flex-1">
                <p class="font-semibold text-sm">Gagal!</p>
                <p class="text-xs opacity-90"><?php echo e(session('error')); ?></p>
            </div>
            <button onclick="closeToast('toast-error')" class="text-white hover:text-gray-200 transition">
                <i class="fas fa-times"></i>
            </button>
        </div>
    </div>
<?php endif; ?>

<?php if(session('info')): ?>
    <div id="toast-info"
        class="fixed bottom-5 right-5 z-50 transition-all duration-300 transform translate-y-0 opacity-100">
        <div class="bg-blue-500 text-white px-6 py-3 rounded-lg shadow-lg flex items-center gap-3 min-w-[300px]">
            <div class="w-8 h-8 rounded-full bg-white/20 flex items-center justify-center">
                <i class="fas fa-info-circle text-white text-lg"></i>
            </div>
            <div class="flex-1">
                <p class="font-semibold text-sm">Informasi</p>
                <p class="text-xs opacity-90"><?php echo e(session('info')); ?></p>
            </div>
            <button onclick="closeToast('toast-info')" class="text-white hover:text-gray-200 transition">
                <i class="fas fa-times"></i>
            </button>
        </div>
    </div>
<?php endif; ?>

<?php if(session('warning')): ?>
    <div id="toast-warning"
        class="fixed bottom-5 right-5 z-50 transition-all duration-300 transform translate-y-0 opacity-100">
        <div class="bg-yellow-500 text-white px-6 py-3 rounded-lg shadow-lg flex items-center gap-3 min-w-[300px]">
            <div class="w-8 h-8 rounded-full bg-white/20 flex items-center justify-center">
                <i class="fas fa-exclamation-circle text-white text-lg"></i>
            </div>
            <div class="flex-1">
                <p class="font-semibold text-sm">Peringatan</p>
                <p class="text-xs opacity-90"><?php echo e(session('warning')); ?></p>
            </div>
            <button onclick="closeToast('toast-warning')" class="text-white hover:text-gray-200 transition">
                <i class="fas fa-times"></i>
            </button>
        </div>
    </div>
<?php endif; ?>

<script>
    function closeToast(toastId) {
        const toast = document.getElementById(toastId);
        if (toast) {
            toast.style.opacity = '0';
            toast.style.transform = 'translateY(100px)';
            setTimeout(() => {
                if (toast) toast.remove();
            }, 300);
        }
    }

    // Auto close after 5 seconds
    setTimeout(() => {
        const toasts = document.querySelectorAll('[id^="toast-"]');
        toasts.forEach(toast => {
            setTimeout(() => {
                if (toast) {
                    toast.style.opacity = '0';
                    toast.style.transform = 'translateY(100px)';
                    setTimeout(() => {
                        if (toast) toast.remove();
                    }, 300);
                }
            }, 4000);
        });
    }, 100);
</script>

<style>
    @keyframes slideInRight {
        from {
            transform: translateX(100%);
            opacity: 0;
        }

        to {
            transform: translateX(0);
            opacity: 1;
        }
    }

    [id^="toast-"] {
        animation: slideInRight 0.3s ease-out;
    }
</style><?php /**PATH D:\ponpes-main\resources\views/admin/partials/toast.blade.php ENDPATH**/ ?>