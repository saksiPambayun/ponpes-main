<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?php echo e($title); ?></h1>
    
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Menu Data Master</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <div class="card bg-primary text-white">
                                <div class="card-body">
                                    <h5 class="card-title">Profil Yayasan</h5>
                                    <p class="card-text">Kelola informasi profil yayasan</p>
                                    <a href="<?php echo e(route('data-master.profil-yayasan')); ?>" class="btn btn-light">Kelola</a>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-4 mb-3">
                            <div class="card bg-success text-white">
                                <div class="card-body">
                                    <h5 class="card-title">Struktur Organisasi</h5>
                                    <p class="card-text">Kelola struktur organisasi yayasan</p>
                                    <a href="<?php echo e(route('data-master.struktur-organisasi')); ?>" class="btn btn-light">Kelola</a>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-4 mb-3">
                            <div class="card bg-info text-white">
                                <div class="card-body">
                                    <h5 class="card-title">Fasilitas</h5>
                                    <p class="card-text">Kelola data fasilitas yayasan</p>
                                    <a href="<?php echo e(route('data-master.fasilitas')); ?>" class="btn btn-light">Kelola</a>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-4 mb-3">
                            <div class="card bg-warning text-white">
                                <div class="card-body">
                                    <h5 class="card-title">Gallery</h5>
                                    <p class="card-text">Kelola foto kegiatan dan prestasi</p>
                                    <a href="<?php echo e(route('data-master.gallery')); ?>" class="btn btn-light">Kelola</a>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-4 mb-3">
                            <div class="card bg-danger text-white">
                                <div class="card-body">
                                    <h5 class="card-title">Program</h5>
                                    <p class="card-text">Kelola program yayasan</p>
                                    <a href="<?php echo e(route('data-master.program')); ?>" class="btn btn-light">Kelola</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\ponpes-main\resources\views\admin\data-master\index.blade.php ENDPATH**/ ?>