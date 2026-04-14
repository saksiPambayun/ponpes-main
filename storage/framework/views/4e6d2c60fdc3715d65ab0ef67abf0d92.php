<?php $__env->startSection('title', 'Data Fasilitas'); ?>
<?php $__env->startSection('page-title', 'Data Fasilitas'); ?>

<?php $__env->startSection('content'); ?>
    <div class="page-wrapper">

        
        <div class="page-header">
            <div class="header-left">
                <div class="header-icon">
                    <i class="fas fa-building"></i>
                </div>
                <div>
                    <h1 class="page-title">Data Fasilitas</h1>
                    <nav class="breadcrumb-nav">
                        <a href="<?php echo e(url('/admin/dashboard')); ?>" class="breadcrumb-link">
                            <i class="fas fa-home"></i> Dashboard
                        </a>
                        <i class="fas fa-chevron-right breadcrumb-sep"></i>
                        <span class="breadcrumb-current">Data Fasilitas</span>
                    </nav>
                </div>
            </div>
            <a href="<?php echo e(route('admin.data-master.fasilitas.create')); ?>" class="btn-primary-action">
                <i class="fas fa-plus"></i>
                Tambah Fasilitas
            </a>
        </div>

        
        <?php if(session('success')): ?>
            <div class="alert-success-box" role="alert">
                <i class="fas fa-check-circle"></i>
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>

        
        <div class="section-card">
            <div class="section-card-header">
                <div class="section-card-title">
                    <i class="fas fa-list"></i>
                    Daftar Fasilitas
                </div>
                <span class="total-badge"><?php echo e($fasilitas->count()); ?> fasilitas</span>
            </div>

            <div class="table-responsive">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th class="th-no">No</th>
                            <th class="th-foto">Foto</th>
                            <th>Nama Fasilitas</th>
                            <th>Kategori</th>
                            <th class="text-center">Jumlah</th>
                            <th>Kondisi</th>
                            <th>Lokasi</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $fasilitas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td class="td-no">
                                    <span class="row-number"><?php echo e($fasilitas->firstItem() + $index); ?></span>
                                </td>
                                <td>
                                    <?php if($item->foto): ?>
                                        <img src="<?php echo e(asset('storage/' . $item->foto)); ?>" class="foto-thumb"
                                            alt="<?php echo e($item->nama_fasilitas); ?>">
                                    <?php else: ?>
                                        <div class="foto-empty">
                                            <i class="fas fa-image"></i>
                                        </div>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <span class="nama-fasilitas"><?php echo e($item->nama_fasilitas); ?></span>
                                </td>
                                <td>
                                    <?php if($item->kategori): ?>
                                        <span class="kategori-badge"><?php echo e($item->kategori); ?></span>
                                    <?php else: ?>
                                        <span class="text-empty">-</span>
                                    <?php endif; ?>
                                </td>
                                <td class="text-center">
                                    <span class="jumlah-badge"><?php echo e($item->jumlah); ?></span>
                                </td>
                                <td><?php echo $item->kondisi_badge; ?></td>
                                <td>
                                    <?php if($item->lokasi): ?>
                                        <span class="lokasi-text">
                                            <i class="fas fa-map-marker-alt"></i>
                                            <?php echo e($item->lokasi); ?>

                                        </span>
                                    <?php else: ?>
                                        <span class="text-empty">-</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <div class="action-group">
                                        <a href="<?php echo e(route('admin.data-master.fasilitas.show', $item->id)); ?>"
                                            class="action-btn view" title="Lihat Detail">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="<?php echo e(route('admin.data-master.fasilitas.edit', $item->id)); ?>"
                                            class="action-btn edit" title="Edit">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                        <form action="<?php echo e(route('admin.data-master.fasilitas.destroy', $item->id)); ?>"
                                            method="POST" class="d-inline"
                                            onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" class="action-btn delete" title="Hapus">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="8">
                                    <div class="empty-state">
                                        <div class="empty-icon">
                                            <i class="fas fa-building"></i>
                                        </div>
                                        <h3 class="empty-title">Belum ada data fasilitas</h3>
                                        <p class="empty-desc">Mulai dengan menambahkan fasilitas pertama.</p>
                                        <a href="<?php echo e(route('admin.data-master.fasilitas.create')); ?>" class="btn-primary-action">
                                            <i class="fas fa-plus"></i> Tambah Fasilitas
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

            <?php if($fasilitas->hasPages()): ?>
                <div class="pagination-footer">
                    <p class="pagination-info">
                        Menampilkan
                        <strong><?php echo e($fasilitas->firstItem()); ?></strong>–<strong><?php echo e($fasilitas->lastItem()); ?></strong>
                        dari <strong><?php echo e($fasilitas->total()); ?></strong> fasilitas
                    </p>
                    <div class="pagination-links">
                        <?php echo e($fasilitas->links()); ?>

                    </div>
                </div>
            <?php endif; ?>
        </div>

    </div>

    <style>
        /* ===== BASE ===== */
        *,
        *::before,
        *::after {
            box-sizing: border-box;
        }

        .page-wrapper {
            padding: 28px 32px;
            background: #f4f4f4;
            min-height: 100vh;
            font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
        }

        /* ===== PAGE HEADER ===== */
        .page-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 24px;
            flex-wrap: wrap;
            gap: 16px;
        }

        .header-left {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .header-icon {
            width: 48px;
            height: 48px;
            background: linear-gradient(135deg, #005F02, #0f4d1c);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-size: 1.2rem;
            flex-shrink: 0;
        }

        .page-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: #222;
            margin: 0 0 4px;
            line-height: 1.2;
        }

        .breadcrumb-nav {
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: 0.8rem;
            color: #2d2d2d;
        }

        .breadcrumb-link {
            color: #2d2d2d;
            text-decoration: none;
        }

        .breadcrumb-link:hover {
            color: #005F02;
        }

        .breadcrumb-sep {
            font-size: 0.6rem;
            color: #8cbf73;
        }

        .breadcrumb-current {
            color: #005F02;
            font-weight: 600;
        }

        .btn-primary-action {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: linear-gradient(135deg, #005F02, #0f4d1c);
            color: #fff;
            border: none;
            border-radius: 10px;
            padding: 10px 20px;
            font-size: 0.875rem;
            font-weight: 600;
            text-decoration: none;
            cursor: pointer;
            transition: all 0.25s;
        }

        .btn-primary-action:hover {
            background: linear-gradient(135deg, #0d4f14, #0f4d1c);
            color: #fff;
            transform: translateY(-1px);
        }

        /* ===== ALERT ===== */
        .alert-success-box {
            display: flex;
            align-items: center;
            gap: 10px;
            background: #eef3ec;
            border: 1px solid #8cbf73;
            border-left: 4px solid #005F02;
            border-radius: 10px;
            padding: 12px 16px;
            margin-bottom: 20px;
            font-size: 0.875rem;
            color: #0d4f14;
            font-weight: 500;
        }

        /* ===== SECTION CARD ===== */
        .section-card {
            background: #fff;
            border-radius: 20px;
            border: 1px solid #dfe8d8;
            box-shadow: 0 2px 20px rgba(0, 0, 0, 0.06);
            overflow: hidden;
        }

        .section-card-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 18px 24px;
            border-bottom: 1px solid #dfe8d8;
            background: #eef3ec;
        }

        .section-card-title {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 0.9rem;
            font-weight: 700;
            color: #222;
        }

        .section-card-title i {
            color: #005F02;
        }

        .total-badge {
            font-size: 0.78rem;
            font-weight: 600;
            background: #fff;
            color: #005F02;
            border-radius: 20px;
            padding: 4px 12px;
            border: 1px solid #dfe8d8;
        }

        /* ===== TABLE ===== */
        .table-responsive {
            overflow-x: auto;
        }

        .data-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 0.875rem;
        }

        .data-table thead tr {
            background: #f4f4f4;
            border-bottom: 1px solid #dfe8d8;
        }

        .data-table th {
            padding: 12px 16px;
            font-size: 0.72rem;
            font-weight: 700;
            color: #2d2d2d;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            white-space: nowrap;
        }

        .data-table td {
            padding: 14px 16px;
            border-bottom: 1px solid #dfe8d8;
            color: #333;
            vertical-align: middle;
        }

        .data-table tbody tr:last-child td {
            border-bottom: none;
        }

        .data-table tbody tr:hover td {
            background: #eef3ec;
        }

        .th-no {
            width: 52px;
        }

        .th-foto {
            width: 80px;
        }

        .td-no {
            width: 52px;
        }

        .text-center {
            text-align: center;
        }

        .text-right {
            text-align: right;
        }

        /* ===== ROW NUMBER ===== */
        .row-number {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 32px;
            height: 32px;
            background: #eef3ec;
            color: #005F02;
            border-radius: 8px;
            font-size: 0.8rem;
            font-weight: 700;
        }

        /* ===== FOTO ===== */
        .foto-thumb {
            width: 52px;
            height: 52px;
            object-fit: cover;
            border-radius: 10px;
            border: 1px solid #dfe8d8;
            display: block;
        }

        .foto-empty {
            width: 52px;
            height: 52px;
            background: #eef3ec;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #8cbf73;
            font-size: 1.1rem;
        }

        /* ===== NAMA ===== */
        .nama-fasilitas {
            font-weight: 600;
            color: #222;
        }

        /* ===== KATEGORI BADGE ===== */
        .kategori-badge {
            display: inline-block;
            background: #eef3ec;
            color: #005F02;
            border-radius: 20px;
            padding: 3px 10px;
            font-size: 0.75rem;
            font-weight: 600;
        }

        /* ===== JUMLAH ===== */
        .jumlah-badge {
            display: inline-block;
            background: #eef3ec;
            color: #2d2d2d;
            border-radius: 8px;
            padding: 4px 12px;
            font-size: 0.85rem;
            font-weight: 700;
        }

        /* ===== LOKASI ===== */
        .lokasi-text {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            font-size: 0.82rem;
            color: #2d2d2d;
        }

        .lokasi-text i {
            font-size: 0.72rem;
            color: #8cbf73;
        }

        /* ===== EMPTY ===== */
        .text-empty {
            color: #8cbf73;
            font-size: 0.875rem;
        }

        .empty-state {
            text-align: center;
            padding: 64px 24px;
        }

        .empty-icon {
            width: 72px;
            height: 72px;
            background: #eef3ec;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 16px;
            font-size: 1.8rem;
            color: #8cbf73;
        }

        .empty-title {
            font-size: 1.05rem;
            font-weight: 700;
            color: #222;
            margin: 0 0 8px;
        }

        .empty-desc {
            font-size: 0.875rem;
            color: #2d2d2d;
            margin: 0 0 20px;
        }

        /* ===== ACTION BUTTONS ===== */
        .action-group {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
        }

        .action-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 32px;
            height: 32px;
            border-radius: 8px;
            border: none;
            cursor: pointer;
            font-size: 0.8rem;
            text-decoration: none;
            transition: all 0.25s;
            background: transparent;
        }

        .action-btn:hover {
            transform: translateY(-1px);
        }

        .action-btn.view {
            background: #eef3ec;
            color: #005F02;
        }

        .action-btn.edit {
            background: #dfe8d8;
            color: #0d4f14;
        }

        .action-btn.delete {
            background: #fef2f2;
            color: #dc2626;
        }

        .action-btn.view:hover {
            background: #dfe8d8;
        }

        .action-btn.edit:hover {
            background: #8cbf73;
            color: #fff;
        }

        .action-btn.delete:hover {
            background: #fecaca;
        }

        /* ===== PAGINATION ===== */
        .pagination-footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 12px;
            padding: 16px 24px;
            border-top: 1px solid #dfe8d8;
            background: #eef3ec;
        }

        .pagination-info {
            font-size: 0.82rem;
            color: #2d2d2d;
            margin: 0;
        }

        .pagination-info strong {
            color: #005F02;
        }

        .pagination {
            margin: 0;
        }

        .pagination .page-link {
            border: 1px solid #dfe8d8;
            color: #2d2d2d;
            padding: 6px 12px;
            border-radius: 8px;
            font-size: 0.82rem;
            font-weight: 600;
            margin: 0 2px;
            text-decoration: none;
            transition: all 0.25s;
        }

        .pagination .page-link:hover {
            background: #eef3ec;
            border-color: #8cbf73;
            color: #005F02;
        }

        .pagination .page-item.active .page-link {
            background: linear-gradient(135deg, #005F02, #0f4d1c);
            border-color: #005F02;
            color: #fff;
        }

        .pagination .page-item.disabled .page-link {
            opacity: 0.45;
            pointer-events: none;
        }

        /* ===== UTILITY ===== */
        .d-inline {
            display: inline;
        }

        @media (max-width: 640px) {
            .page-wrapper {
                padding: 20px 16px;
            }
        }
    </style>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\ponpes-main\resources\views/admin/data-master/fasilitas/index.blade.php ENDPATH**/ ?>