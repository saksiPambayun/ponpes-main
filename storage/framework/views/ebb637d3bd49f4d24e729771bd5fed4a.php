<?php $__env->startSection('title', 'Data Pendaftaran Santri'); ?>

<?php $__env->startSection('content'); ?>
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="fw-bold mb-0">Pendaftaran Santri</h4>
            <small class="text-muted">Kelola data pendaftaran santri</small>
        </div>
        <a href="<?php echo e(route('user.santri.create')); ?>" class="btn btn-primary">
            <i class="fas fa-plus me-1"></i> Daftar Santri Baru
        </a>
    </div>

    
    <div class="card border-0 shadow-sm mb-4">
        <div class="card-body">
            <form method="GET" class="row g-2 align-items-end">
                <div class="col-md-5">
                    <label class="form-label small text-muted">Cari</label>
                    <input type="text" name="search" class="form-control" placeholder="Nama atau NISN..."
                        value="<?php echo e(request('search')); ?>">
                </div>
                <div class="col-md-3">
                    <label class="form-label small text-muted">Status</label>
                    <select name="status" class="form-select">
                        <option value="">Semua Status</option>
                        <option value="pending" <?php echo e(request('status') == 'pending' ? 'selected' : ''); ?>>Pending</option>
                        <option value="diterima" <?php echo e(request('status') == 'diterima' ? 'selected' : ''); ?>>Diterima</option>
                        <option value="ditolak" <?php echo e(request('status') == 'ditolak' ? 'selected' : ''); ?>>Ditolak</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary w-100">
                        <i class="fas fa-search me-1"></i> Cari
                    </button>
                </div>
                <div class="col-md-2">
                    <a href="<?php echo e(route('user.santri.index')); ?>" class="btn btn-outline-secondary w-100">
                        Reset
                    </a>
                </div>
            </form>
        </div>
    </div>

    
    <div class="card border-0 shadow-sm">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Nama Lengkap</th>
                            <th>NISN</th>
                            <th>Asal Sekolah</th>
                            <th>Nama Wali</th>
                            <th>Status</th>
                            <th>Tanggal Daftar</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $santri; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td><?php echo e($loop->iteration + ($santri->currentPage() - 1) * $santri->perPage()); ?></td>
                                <td class="fw-semibold"><?php echo e($item->nama_lengkap); ?></td>
                                <td><?php echo e($item->nisn ?? '-'); ?></td>
                                <td><?php echo e($item->asal_sekolah ?? '-'); ?></td>
                                <td><?php echo e($item->nama_wali ?? '-'); ?></td>
                                <td>
                                    <?php if($item->status === 'pending'): ?>
                                        <span class="badge bg-warning text-dark px-3 py-2">
                                            <i class="fas fa-clock me-1"></i>Menunggu
                                        </span>
                                    <?php elseif($item->status === 'diterima'): ?>
                                        <span class="badge bg-success px-3 py-2">
                                            <i class="fas fa-check-circle me-1"></i>Diterima
                                        </span>
                                    <?php else: ?>
                                        <span class="badge bg-danger px-3 py-2">
                                            <i class="fas fa-times-circle me-1"></i>Ditolak
                                        </span>
                                    <?php endif; ?>
                                </td>
                                <td><?php echo e($item->created_at->format('d M Y')); ?></td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <a href="<?php echo e(route('user.santri.show', $item->id)); ?>" class="btn btn-sm btn-outline-info"
                                            title="Lihat Detail">
                                            <i class="fas fa-eye"></i>
                                        </a>

                                        <?php if($item->status === 'pending'): ?>
                                            <a href="<?php echo e(route('user.santri.edit', $item->id)); ?>"
                                                class="btn btn-sm btn-outline-warning" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form method="POST" action="<?php echo e(route('user.santri.destroy', $item->id)); ?>"
                                                class="d-inline" onsubmit="return confirm('Hapus data ini?')">
                                                <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                                <button type="submit" class="btn btn-sm btn-outline-danger" title="Hapus">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        <?php endif; ?>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="8" class="text-center py-5 text-muted">
                                    <i class="fas fa-inbox fa-2x mb-2 d-block opacity-25"></i>
                                    Belum ada data santri.
                                    <a href="<?php echo e(route('user.santri.create')); ?>">Daftar sekarang</a>
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <?php if($santri->hasPages()): ?>
            <div class="card-footer bg-white">
                <?php echo e($santri->withQueryString()->links()); ?>

            </div>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\ponpes-main\resources\views/user/santri/index.blade.php ENDPATH**/ ?>