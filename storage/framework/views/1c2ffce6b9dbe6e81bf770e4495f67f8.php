<?php $__env->startSection('title', 'Pengumuman'); ?><?php $__env->startSection('content'); ?><div class="container">
        <div class="alert alert-warning">
            <h4><i class="fas fa-exclamation-triangle"></i> Fitur Pengumuman Dinonaktifkan</h4>
            <p>Fitur pengumuman telah dihapus dari sistem. Silakan gunakan menu lain untuk mengelola pendaftaran.</p>
            <a href="<?php echo e(route('admin.pendaftaran.waves.index')); ?>" class="btn btn-primary">
                Kembali ke Kelola Gelombang
            </a>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\ponpes-main\resources\views\admin\pendaftaran\announcement\index.blade.php ENDPATH**/ ?>