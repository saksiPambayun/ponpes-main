<?php $__env->startSection('title', $title); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">

    
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="mb-1 fw-bold">Manajemen Program</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="<?php echo e(url('/admin/dashboard')); ?>">Dashboard</a></li>
                    <li class="breadcrumb-item active">Program</li>
                </ol>
            </nav>
        </div>
        <a href="<?php echo e(route('program.create')); ?>" class="btn btn-primary">
            <i class="fas fa-plus me-1"></i> Tambah Program
        </a>
    </div>

    
    <?php if(session('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle me-2"></i><?php echo e(session('success')); ?>

            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    
    <div class="row g-3 mb-4">
        <div class="col-6 col-md-3">
            <div class="card border-0 shadow-sm text-center py-3">
                <h3 class="fw-bold text-primary mb-0"><?php echo e($stats['total']); ?></h3>
                <small class="text-muted">Total Program</small>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="card border-0 shadow-sm text-center py-3">
                <h3 class="fw-bold text-success mb-0"><?php echo e($stats['aktif']); ?></h3>
                <small class="text-muted">Aktif</small>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="card border-0 shadow-sm text-center py-3">
                <h3 class="fw-bold text-info mb-0"><?php echo e($stats['selesai']); ?></h3>
                <small class="text-muted">Selesai</small>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="card border-0 shadow-sm text-center py-3">
                <h3 class="fw-bold text-warning mb-0"><?php echo e($stats['dinunda']); ?></h3>
                <small class="text-muted">Ditunda</small>
            </div>
        </div>
    </div>

    
    <div class="card border-0 shadow-sm mb-4">
        <div class="card-body">
            <form action="<?php echo e(route('program.index')); ?>" method="GET" class="row g-2">
                <div class="col-md-5">
                    <input type="text" name="search" class="form-control"
                        placeholder="Cari nama program..."
                        value="<?php echo e(request('search')); ?>">
                </div>
                <div class="col-md-3">
                    <select name="kategori" class="form-select">
                        <option value="">Semua Kategori</option>
                        <option value="pendidikan" <?php echo e(request('kategori') == 'pendidikan' ? 'selected' : ''); ?>>Pendidikan</option>
                        <option value="sosial"     <?php echo e(request('kategori') == 'sosial'     ? 'selected' : ''); ?>>Sosial</option>
                        <option value="keagamaan"  <?php echo e(request('kategori') == 'keagamaan'  ? 'selected' : ''); ?>>Keagamaan</option>
                        <option value="kesehatan"  <?php echo e(request('kategori') == 'kesehatan'  ? 'selected' : ''); ?>>Kesehatan</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <select name="status" class="form-select">
                        <option value="">Semua Status</option>
                        <option value="aktif"   <?php echo e(request('status') == 'aktif'   ? 'selected' : ''); ?>>Aktif</option>
                        <option value="selesai" <?php echo e(request('status') == 'selesai' ? 'selected' : ''); ?>>Selesai</option>
                        <option value="dinunda" <?php echo e(request('status') == 'dinunda' ? 'selected' : ''); ?>>Ditunda</option>
                    </select>
                </div>
                <div class="col-md-2 d-flex gap-2">
                    <button type="submit" class="btn btn-primary w-100">
                        <i class="fas fa-search"></i>
                    </button>
                    <a href="<?php echo e(route('program.index')); ?>" class="btn btn-secondary w-100">
                        <i class="fas fa-undo"></i>
                    </a>
                </div>
            </form>
        </div>
    </div>

    
    <div class="card border-0 shadow-sm">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th width="50">#</th>
                            <th>Nama Program</th>
                            <th>Kategori</th>
                            <th>Status</th>
                            <th>Tanggal Mulai</th>
                            <th>Tanggal Selesai</th>
                            <th width="130" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $programs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $program): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td><?php echo e($programs->firstItem() + $i); ?></td>
                            <td>
                                <div class="fw-semibold"><?php echo e($program->nama_program); ?></div>
                                <small class="text-muted"><?php echo e(Str::limit($program->deskripsi, 60)); ?></small>
                            </td>
                            <td>
                                <?php
                                    $kategoriColor = [
                                        'pendidikan' => 'primary',
                                        'sosial'     => 'info',
                                        'keagamaan'  => 'warning',
                                        'kesehatan'  => 'success',
                                    ];
                                ?>
                                <span class="badge bg-<?php echo e($kategoriColor[$program->kategori] ?? 'secondary'); ?>">
                                    <?php echo e(ucfirst($program->kategori)); ?>

                                </span>
                            </td>
                            <td>
                                <?php
                                    $statusColor = [
                                        'aktif'   => 'success',
                                        'selesai' => 'secondary',
                                        'dinunda' => 'warning',
                                    ];
                                ?>
                                <span class="badge bg-<?php echo e($statusColor[$program->status] ?? 'secondary'); ?>">
                                    <?php echo e(ucfirst($program->status)); ?>

                                </span>
                            </td>
                            <td><?php echo e($program->tanggal_mulai ? $program->tanggal_mulai->format('d M Y') : '-'); ?></td>
                            <td><?php echo e($program->tanggal_selesai ? $program->tanggal_selesai->format('d M Y') : '-'); ?></td>
                            <td class="text-center">
                                <div class="d-flex gap-1 justify-content-center">
                                    <a href="<?php echo e(route('program.show', $program)); ?>"
                                       class="btn btn-sm btn-info text-white" title="Detail">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="<?php echo e(route('program.edit', $program)); ?>"
                                       class="btn btn-sm btn-warning" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="<?php echo e(route('program.destroy', $program)); ?>" method="POST"
                                          onsubmit="return confirm('Yakin ingin menghapus program ini?')">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit" class="btn btn-sm btn-danger" title="Hapus">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="7" class="text-center py-5 text-muted">
                                <i class="fas fa-inbox fa-2x mb-2 d-block"></i>
                                Belum ada data program.
                            </td>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <?php if($programs->hasPages()): ?>
        <div class="card-footer bg-white d-flex justify-content-between align-items-center">
            <small class="text-muted">
                Menampilkan <?php echo e($programs->firstItem()); ?> - <?php echo e($programs->lastItem()); ?>

                dari <?php echo e($programs->total()); ?> data
            </small>
            <?php echo e($programs->links()); ?>

        </div>
        <?php endif; ?>
    </div>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\ponpes-main\resources\views\admin\program\index.blade.php ENDPATH**/ ?>