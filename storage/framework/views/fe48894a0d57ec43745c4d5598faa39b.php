

<?php $__env->startSection('title', 'Data Pendaftar'); ?>
<?php $__env->startSection('page-title', 'Data Pendaftar'); ?>

<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="card-headerd-flex justify-content-between align-items-center">
            <h5 class="mb-0">Data Pendaftar (Menunggu Verifikasi)</h5>
            <a href="<?php echo e(route('admin.santri.create')); ?>" class="btn btn-primary btn-sm">+ Tambah Pendaftar</a>
        </div>
        <div class="card-body">
            <?php if(session('success')): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?php echo e(session('success')); ?>

                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php endif; ?>

            <?php if(session('error')): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?php echo e(session('error')); ?>

                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php endif; ?>

            <!-- Filter -->
            <form method="GET" class="row g-3 mb-4">
                <div class="col-md-4">
                    <input type="text" name="search" class="form-control" placeholder="Cari nama, NISN, email..." value="<?php echo e(request('search')); ?>">
                </div>
                <div class="col-md-3">
                    <select name="gelombang" class="form-select">
                        <option value="">Semua Gelombang</option>
                        <?php $__currentLoopData = $gelombang; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $g): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($g->id); ?>" <?php echo e(request('gelombang') == $g->id ? 'selected' : ''); ?>>
                                <?php echo e($g->nama_gelombang); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary w-100">Cari</button>
                </div>
                <div class="col-md-2">
                    <a href="<?php echo e(route('admin.pendaftar.index')); ?>" class="btn btn-secondary w-100">Reset</a>
                </div>
            </form>

            <!-- Statistik -->
            <div class="row mb-4">
                <div class="col-md-4">
                    <div class="alert alert-info text-center">
                        <h5>Menunggu Verifikasi</h5>
                        <h3><?php echo e($pendaftar->total()); ?></h3>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="alert alert-success text-center">
                        <h5>Gelombang Aktif</h5>
                        <h3><?php echo e($gelombang->where('is_active', true)->count()); ?></h3>
                    </div>
                </div>
            </div>

            <!-- Tabel -->
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Nama Lengkap</th>
                            <th>Jenis Kelamin</th>
                            <th>Asal Sekolah</th>
                            <th>Gelombang</th>
                            <th>Nama Wali</th>
                            <th>No. Wali</th>
                            <th>Tgl Daftar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $pendaftar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td><?php echo e($pendaftar->firstItem() + $index); ?></td>
                                <td><strong><?php echo e($p->nama_lengkap); ?></strong><?php if($p->nisn): ?><br><small class="text-muted">NISN: <?php echo e($p->nisn); ?></small><?php endif; ?></td>
                                <td><?php echo e($p->jenis_kelamin == 'L' ? 'Laki-laki' : ($p->jenis_kelamin == 'P' ? 'Perempuan' : '-')); ?></td>
                                <td><?php echo e($p->asal_sekolah ?? '-'); ?></td>
                                <td><span class="badge bg-info"><?php echo e($p->wave->nama_gelombang ?? '-'); ?></span></td>
                                <td><?php echo e($p->nama_wali ?? '-'); ?></td>
                                <td><?php echo e($p->no_wali ?? '-'); ?></td>
                                <td><?php echo e($p->created_at ? $p->created_at->format('d/m/Y') : '-'); ?></td>
                                <td>
                                    <a href="<?php echo e(route('admin.santri.show', $p->id)); ?>" class="btn btn-sm btn-info" title="Detail">📋</a>
                                    <button type="button" class="btn btn-sm btn-success" title="Terima" onclick="terimaPendaftar(<?php echo e($p->id); ?>, '<?php echo e($p->nama_lengkap); ?>')">✅</button>
                                    <button type="button" class="btn btn-sm btn-danger" title="Tolak" onclick="tolakPendaftar(<?php echo e($p->id); ?>)">❌</button>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="9" class="text-center py-5">
                                    <i class="fas fa-user-plus fa-3x text-muted mb-3 d-block"></i>
                                    <h5>Tidak ada pendaftar baru</h5>
                                    <p class="text-muted">Semua pendaftar sudah diverifikasi. Tidak ada yang menunggu saat ini.</p>
                                    <a href="<?php echo e(route('admin.santri.create')); ?>" class="btn btn-primary">+ Tambah Pendaftar Baru</a>
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

            <?php if($pendaftar->hasPages()): ?>
                <div class="d-flex justify-content-between align-items-center mt-3">
                    <div>Menampilkan <?php echo e($pendaftar->firstItem()); ?> - <?php echo e($pendaftar->lastItem()); ?> dari <?php echo e($pendaftar->total()); ?> pendaftar</div>
                    <div><?php echo e($pendaftar->links()); ?></div>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <!-- Form Tersembunyi -->
    <form id="terimaForm" method="POST" style="display: none;">
        <?php echo csrf_field(); ?>
    </form>

    <form id="tolakForm" method="POST" style="display: none;">
        <?php echo csrf_field(); ?>
        <input type="text" name="alasan" id="alasanTolak">
    </form>

    <script>
        function terimaPendaftar(id, nama) {
            if (confirm(`Terima pendaftar "${nama}"? Santri akan otomatis masuk ke Data Santri.`)) {
                let form = document.getElementById('terimaForm');
                form.action = `/admin/pendaftar/${id}/terima`;
                form.submit();
            }
        }

        function tolakPendaftar(id) {
            let alasan = prompt('Masukkan alasan penolakan (minimal 10 karakter):');
            if (alasan && alasan.trim().length >= 10) {
                let form = document.getElementById('tolakForm');
                form.action = `/admin/pendaftar/${id}/tolak`;
                document.getElementById('alasanTolak').value = alasan;
                form.submit();
            } else if (alasan && alasan.trim().length < 10) {
                alert('Alasan penolakan minimal 10 karakter!');
            }
        }
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\ponpes-main\resources\views/admin/santri/data-pendaftar.blade.php ENDPATH**/ ?>