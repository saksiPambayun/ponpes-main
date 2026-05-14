<?php $__env->startSection('title', 'Gallery'); ?>

<?php $__env->startSection('content'); ?>
    <div class="page-wrapper">

        
        <div class="page-header">
            <div class="header-left">
                <div class="header-icon">
                    <i class="fas fa-images"></i>
                </div>
                <div>
                    <h1 class="page-title">Gallery</h1>
                    <nav class="breadcrumb-nav">
                        <a href="<?php echo e(url('/admin/dashboard')); ?>" class="breadcrumb-link">
                            <i class="fas fa-home"></i> Dashboard
                        </a>
                        <i class="fas fa-chevron-right breadcrumb-sep"></i>
                        <span class="breadcrumb-current">Gallery</span>
                    </nav>
                </div>
            </div>
            <div class="header-actions">
                <button onclick="window.print()" class="btn-secondary-action">
                    <i class="fas fa-print"></i> Print
                </button>
                <a href="<?php echo e(route('admin.data-master.gallery.create')); ?>" class="btn-primary-action">
                    <i class="fas fa-plus"></i> Tambah Gallery
                </a>
            </div>
        </div>

        
        <div class="stats-grid">
            <?php
                $stats = [
                    [
                        'label' => 'Total Gallery',
                        'val' => App\Models\Gallery::count(),
                        'icon' => 'fa-images',
                        'accent' => '#005F02',
                        'bg' => '#eef3ec',
                    ],
                    [
                        'label' => 'Kegiatan',
                        'val' => App\Models\Gallery::where('kategori', 'kegiatan')->count(),
                        'icon' => 'fa-calendar-check',
                        'accent' => '#4ca94d',
                        'bg' => '#eef3ec',
                    ],
                    [
                        'label' => 'Prestasi',
                        'val' => App\Models\Gallery::where('kategori', 'prestasi')->count(),
                        'icon' => 'fa-trophy',
                        'accent' => '#8cbf73',
                        'bg' => '#eef3ec',
                    ],
                    [
                        'label' => 'Umum',
                        'val' => App\Models\Gallery::where('kategori', 'umum')->count(),
                        'icon' => 'fa-folder',
                        'accent' => '#2e6b37',
                        'bg' => '#eef3ec',
                    ],
                ];
            ?>
            <?php $__currentLoopData = $stats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="stat-card">
                    <div class="stat-bar" style="background: <?php echo e($s['accent']); ?>;"></div>
                    <div class="stat-icon" style="background: <?php echo e($s['bg']); ?>; color: <?php echo e($s['accent']); ?>;">
                        <i class="fas <?php echo e($s['icon']); ?>"></i>
                    </div>
                    <div class="stat-content">
                        <span class="stat-label"><?php echo e($s['label']); ?></span>
                        <span class="stat-value"><?php echo e($s['val']); ?></span>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        
        <?php if(session('success')): ?>
            <div class="alert-success-box">
                <i class="fas fa-check-circle"></i>
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>

        
        <div class="section-card">
            <div class="section-card-header">
                <div class="section-card-title">
                    <i class="fas fa-filter"></i>
                    Filter Data
                </div>
            </div>
            <div class="section-card-body">
                <form action="<?php echo e(route('admin.data-master.gallery.index')); ?>" method="GET" class="filter-form" id="filterForm">
                <div class="filter-group">
                    <label class="filter-label">Cari</label>
                    <div class="input-icon-wrap">
                        <i class="fas fa-search input-icon"></i>
                        <input type="text" name="search" id="searchInput" class="form-input with-icon"
                            placeholder="Judul atau deskripsi..." value="<?php echo e(request('search')); ?>">
                    </div>
                </div>
                <div class="filter-group">
                    <label class="filter-label">Kategori</label>
                    <select name="kategori" id="kategoriSelect" class="form-select">
                        <option value="">Semua Kategori</option>
                        <option value="kegiatan" <?php echo e(request('kategori') == 'kegiatan' ? 'selected' : ''); ?>>Kegiatan</option>
                        <option value="prestasi" <?php echo e(request('kategori') == 'prestasi' ? 'selected' : ''); ?>>Prestasi</option>
                        <option value="umum" <?php echo e(request('kategori') == 'umum' ? 'selected' : ''); ?>>Umum</option>
                    </select>
                </div>
                <div class="filter-group filter-actions">
                    <label class="filter-label">&nbsp;</label>
                    <div style="display:flex; gap:8px;">
                        <button type="button" id="cariBtn" class="btn-filter">
                            <i class="fas fa-search"></i> Cari
                        </button>
                        <a href="<?php echo e(route('admin.data-master.gallery.index')); ?>" id="resetBtn" class="btn-reset">
                            <i class="fas fa-undo"></i> Reset
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Fungsi untuk submit filter
        function submitFilter() {
            var kategori = document.getElementById('kategoriSelect').value;
            var search = document.getElementById('searchInput').value;
            var url = '<?php echo e(route("admin.data-master.gallery.index")); ?>';
            var params = [];

            if (kategori) {
                params.push('kategori=' + encodeURIComponent(kategori));
            }
            if (search) {
                params.push('search=' + encodeURIComponent(search));
            }

            if (params.length > 0) {
                window.location.href = url + '?' + params.join('&');
            } else {
                window.location.href = url;
            }
        }

        // Event listener untuk tombol Cari
        document.getElementById('cariBtn').addEventListener('click', function(e) {
            e.preventDefault();
            submitFilter();
        });

        // Opsional: Filter otomatis ketika kategori berubah (langsung tanpa klik Cari)
        document.getElementById('kategoriSelect').addEventListener('change', function() {
            submitFilter();
        });

        // Opsional: Filter otomatis ketika user menekan Enter di input search
        document.getElementById('searchInput').addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                e.preventDefault();
                submitFilter();
            }
        });
    </script>


                
                <div class="section-card">
                    <div class="section-card-header">
                        <div class="section-card-title">
                            <i class="fas fa-list"></i>
                            Daftar Gallery
                        </div>
                        <span class="total-badge"><?php echo e($galleries->total()); ?> item</span>
                    </div>

                    <div class="table-responsive">
                        <table class="data-table">
                            <thead>
                                <tr>
                                    <th class="th-no">No</th>
                                    <th class="th-foto">Gambar</th>
                                    <th>Judul</th>
                                    <th>Kategori</th>
                                    <th>Tanggal</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $galleries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td class="td-no">
                                            <span class="row-number"><?php echo e($galleries->firstItem() + $index); ?></span>
                                        </td>
                                        <td>
                                            <?php if($item->gambar): ?>
                                                <img src="<?php echo e(asset('storage/' . $item->gambar)); ?>" alt="<?php echo e($item->judul); ?>"
                                                    class="foto-thumb" onclick="showImageModal('<?php echo e(asset('storage/' . $item->gambar)); ?>')"
                                                    style="cursor: pointer;">
                                            <?php else: ?>
                                                <div class="foto-empty">
                                                    <i class="fas fa-image"></i>
                                                </div>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <span class="item-title"><?php echo e($item->judul); ?></span>
                                        </td>
                                        <td>
                                            <?php
                                                $kategori = $item->kategori;
                                                if ($kategori == 'umum') {
                                                    $badgeStyle = 'background-color: #E8F5E9; color: #2E7D32; border: 1px solid #2E7D32;';
                                                    $badgeText = 'Umum';
                                                    $badgeIcon = '<i class="fas fa-folder" style="margin-right: 5px;"></i>';
                                                } elseif ($kategori == 'kegiatan') {
                                                    $badgeStyle = 'background-color: #E8F5E9; color: #388E3C; border: 1px solid #388E3C;';
                                                    $badgeText = 'Kegiatan';
                                                    $badgeIcon = '<i class="fas fa-calendar-check" style="margin-right: 5px;"></i>';
                                                } elseif ($kategori == 'prestasi') {
                                                    $badgeStyle = 'background-color: #E8F5E9; color: #1B5E20; border: 1px solid #1B5E20;';
                                                    $badgeText = 'Prestasi';
                                                    $badgeIcon = '<i class="fas fa-trophy" style="margin-right: 5px;"></i>';
                                                } else {
                                                    $badgeStyle = 'background-color: #f4f4f4; color: #666; border: 1px solid #ccc;';
                                                    $badgeText = ucfirst($kategori);
                                                    $badgeIcon = '<i class="fas fa-tag" style="margin-right: 5px;"></i>';
                                                }
                                            ?>
                                            <span
                                                style="display: inline-flex; align-items: center; padding: 5px 12px; border-radius: 20px; font-size: 0.75rem; font-weight: 600; <?php echo e($badgeStyle); ?>">
                                                <?php echo $badgeIcon; ?> <?php echo e($badgeText); ?>

                                            </span>
                                        </td>
                                        <td>
                                            <span class="date-text">
                                                <?php echo e($item->tanggal_kegiatan ? $item->tanggal_kegiatan->format('d/m/Y') : '-'); ?>

                                            </span>
                                        </td>
                                        <td>
                                            <div class="action-group">
                                                <a href="<?php echo e(route('admin.data-master.gallery.show', $item->id)); ?>"
                                                    class="action-btn view" title="Lihat Detail">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a href="<?php echo e(route('admin.data-master.gallery.edit', $item->id)); ?>"
                                                    class="action-btn edit" title="Edit">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>
                                                <button type="button" class="action-btn delete"
                                                    onclick="openDeleteModal('<?php echo e($item->id); ?>', '<?php echo e(addslashes($item->judul)); ?>')"
                                                    title="Hapus">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                                <form id="deleteForm<?php echo e($item->id); ?>"
                                                    action="<?php echo e(route('admin.data-master.gallery.destroy', $item->id)); ?>" method="POST"
                                                    style="display: none;">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('DELETE'); ?>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td colspan="6">
                                            <div class="empty-state">
                                                <div class="empty-icon">
                                                    <i class="fas fa-images"></i>
                                                </div>
                                                <h3 class="empty-title">Belum ada data gallery</h3>
                                                <p class="empty-desc">Mulai dengan menambahkan foto pertama ke gallery.</p>
                                                <a href="<?php echo e(route('admin.data-master.gallery.create')); ?>" class="btn-primary-action">
                                                    <i class="fas fa-plus"></i> Tambah Gallery
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>

                    <?php if($galleries->hasPages()): ?>
                        <div class="pagination-footer">
                            <p class="pagination-info">
                                Menampilkan
                                <strong><?php echo e($galleries->firstItem()); ?></strong>–<strong><?php echo e($galleries->lastItem()); ?></strong>
                                dari <strong><?php echo e($galleries->total()); ?></strong> item
                            </p>
                            <div class="pagination-links">
                                <?php echo e($galleries->links()); ?>

                            </div>
                        </div>
                    <?php endif; ?>
                </div>

                <!-- DELETE MODAL -->
                <div id="deleteModal" class="modal-overlay">
                    <div class="modal-box">
                        <div class="modal-icon">
                            <i class="fas fa-exclamation-triangle"></i>
                        </div>
                        <h3>Hapus Data</h3>
                        <p id="deleteText"></p>
                        <div class="modal-actions">
                            <button class="btn-cancel" onclick="closeDeleteModal()">Batal</button>
                            <button class="btn-delete" onclick="confirmDelete()">Hapus</button>
                        </div>
                    </div>
                </div>
            </div>

            
            <div id="imageModal" class="modal-overlay">
                <div class="modal-image-box">
                    <img id="modalImage" src="" alt="Preview" style="max-width: 100%; max-height: 80vh;">
                    <button onclick="closeImageModal()" class="btn-close-modal">&times;</button>
                </div>
            </div>

            <script>
                let selectedForm = null;

                function openDeleteModal(id, nama) {
                    selectedForm = document.getElementById('deleteForm' + id);
                    document.getElementById('deleteText').innerText = `Yakin ingin menghapus "${nama}"?`;
                    document.getElementById('deleteModal').classList.add('show');
                }

                function closeDeleteModal() {
                    document.getElementById('deleteModal').classList.remove('show');
                    selectedForm = null;
                }

                function confirmDelete() {
                    if (selectedForm) {
                        selectedForm.submit();
                    }
                }

                function showImageModal(src) {
                    document.getElementById('modalImage').src = src;
                    document.getElementById('imageModal').classList.add('show');
                }

                function closeImageModal() {
                    document.getElementById('imageModal').classList.remove('show');
                }

                window.onclick = function (e) {
                    const modal = document.getElementById('deleteModal');
                    const imageModal = document.getElementById('imageModal');
                    if (e.target === modal) {
                        closeDeleteModal();
                    }
                    if (e.target === imageModal) {
                        closeImageModal();
                    }
                }

                // ===== FITUR FILTER DENGAN JAVASCRIPT =====
                document.addEventListener('DOMContentLoaded', function () {
                    const cariButton = document.getElementById('cariButton');
                    const kategoriSelect = document.getElementById('kategoriSelect');
                    const searchInput = document.getElementById('searchInput');

                    if (cariButton) {
                        cariButton.addEventListener('click', function (e) {
                            e.preventDefault();

                            let url = '<?php echo e(route("admin.data-master.gallery.index")); ?>';
                            let params = [];

                            if (kategoriSelect && kategoriSelect.value) {
                                params.push('kategori=' + encodeURIComponent(kategoriSelect.value));
                            }

                            if (searchInput && searchInput.value) {
                                params.push('search=' + encodeURIComponent(searchInput.value));
                            }

                            if (params.length > 0) {
                                window.location.href = url + '?' + params.join('&');
                            } else {
                                window.location.href = url;
                            }
                        });
                    }
                });
                document.getElementById('filterForm').addEventListener('submit', function (e) {
                        console.log('Form submitted!');
                        var kategori = document.querySelector('select[name="kategori"]').value;
                        var search = document.querySelector('input[name="search"]').value;
                        console.log('Kategori:', kategori);
                        console.log('Search:', search);
                        // Biarkan form submit normal
                        return true;
                    });
                        function submitFilter() {
        var kategori = document.getElementById('kategoriSelect').value;
        var search = document.getElementById('searchInput').value;
        var url = '<?php echo e(route("admin.data-master.gallery.index")); ?>';
        var params = [];

        if (kategori) {
            params.push('kategori=' + encodeURIComponent(kategori));
        }
        if (search) {
            params.push('search=' + encodeURIComponent(search));
        }

        if (params.length > 0) {
            window.location.href = url + '?' + params.join('&');
        } else {
            window.location.href = url;
        }
    }

    // Event listener untuk tombol Cari
    document.getElementById('cariBtn').addEventListener('click', function(e) {
        e.preventDefault();
        submitFilter();
    });

    // Opsional: Filter otomatis ketika kategori berubah (langsung tanpa klik Cari)
    document.getElementById('kategoriSelect').addEventListener('change', function() {
        submitFilter();
    });

    // Opsional: Filter otomatis ketika user menekan Enter di input search
    document.getElementById('searchInput').addEventListener('keypress', function(e) {
        if (e.key === 'Enter') {
            e.preventDefault();
            submitFilter();
        }
    });

            </script>

            <style>
                .foto-thumb {
                    cursor: pointer;
                    transition: transform 0.2s;
                }

                .foto-thumb:hover {
                    transform: scale(1.05);
                }

                .modal-image-box {
                    position: relative;
                    background: #fff;
                    padding: 10px;
                    border-radius: 12px;
                    max-width: 90vw;
                    max-height: 90vh;
                }

                .btn-close-modal {
                    position: absolute;
                    top: -15px;
                    right: -15px;
                    background: red;
                    color: white;
                    border: none;
                    border-radius: 50%;
                    width: 30px;
                    height: 30px;
                    cursor: pointer;
                }

                .page-wrapper {
                    padding: 28px 32px;
                    background: #f4f4f4;
                    min-height: 100vh;
                    font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
                }

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

                .header-actions {
                    display: flex;
                    align-items: center;
                    gap: 10px;
                    flex-wrap: wrap;
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
                    transition: all 0.2s;
                }

                .btn-primary-action:hover {
                    background: linear-gradient(135deg, #0d4f14, #0f4d1c);
                    transform: translateY(-1px);
                }

                .btn-secondary-action {
                    display: inline-flex;
                    align-items: center;
                    gap: 8px;
                    background: #fff;
                    color: #2d2d2d;
                    border: 1px solid #dfe8d8;
                    border-radius: 10px;
                    padding: 10px 18px;
                    font-size: 0.875rem;
                    font-weight: 600;
                    text-decoration: none;
                    cursor: pointer;
                    transition: all 0.2s;
                }

                .btn-secondary-action:hover {
                    background: #eef3ec;
                    border-color: #8cbf73;
                }

                .stats-grid {
                    display: grid;
                    grid-template-columns: repeat(4, 1fr);
                    gap: 20px;
                    margin-bottom: 24px;
                }

                @media (max-width: 1024px) {
                    .stats-grid {
                        grid-template-columns: repeat(2, 1fr);
                    }
                }

                @media (max-width: 600px) {
                    .stats-grid {
                        grid-template-columns: 1fr;
                    }
                }

                .stat-card {
                    background: #fff;
                    border-radius: 20px;
                    padding: 20px;
                    display: flex;
                    align-items: center;
                    gap: 16px;
                    box-shadow: 0 2px 20px rgba(0, 0, 0, 0.06);
                    border: 1px solid #dfe8d8;
                    position: relative;
                    overflow: hidden;
                    transition: box-shadow 0.2s;
                }

                .stat-card:hover {
                    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
                    transform: translateY(-2px);
                }

                .stat-bar {
                    position: absolute;
                    left: 0;
                    top: 0;
                    bottom: 0;
                    width: 4px;
                    border-radius: 20px 0 0 20px;
                }

                .stat-icon {
                    width: 48px;
                    height: 48px;
                    border-radius: 12px;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    font-size: 1.2rem;
                    flex-shrink: 0;
                }

                .stat-content {
                    display: flex;
                    flex-direction: column;
                    gap: 2px;
                }

                .stat-label {
                    font-size: 0.72rem;
                    font-weight: 700;
                    color: #2d2d2d;
                    text-transform: uppercase;
                    letter-spacing: 0.05em;
                }

                .stat-value {
                    font-size: 1.75rem;
                    font-weight: 800;
                    color: #222;
                    line-height: 1;
                }

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

                .section-card {
                    background: #fff;
                    border-radius: 20px;
                    border: 1px solid #dfe8d8;
                    box-shadow: 0 2px 20px rgba(0, 0, 0, 0.06);
                    overflow: hidden;
                    margin-bottom: 24px;
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

                .section-card-body {
                    padding: 20px 24px;
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

                .badge-kategori {
                    display: inline-block;
                    padding: 4px 12px;
                    border-radius: 20px;
                    font-size: 0.75rem;
                    font-weight: 600;
                    background: #FFFFFF;
                    border: 1px solid;
                }

                .badge-kegiatan {
                    color: #005F02;
                    border-color: #005F02;
                }

                .badge-prestasi {
                    color: #0f4d1c;
                    border-color: #0f4d1c;
                }

                .badge-umum {
                    color: #2e6b37;
                    border-color: #2e6b37;
                }

                .filter-form {
                    display: flex;
                    gap: 16px;
                    flex-wrap: wrap;
                    align-items: flex-end;
                }

                .filter-group {
                    display: flex;
                    flex-direction: column;
                    gap: 6px;
                    flex: 1;
                    min-width: 180px;
                }

                .filter-label {
                    font-size: 0.72rem;
                    font-weight: 700;
                    color: #2d2d2d;
                    text-transform: uppercase;
                    letter-spacing: 0.04em;
                }

                .input-icon-wrap {
                    position: relative;
                }

                .input-icon {
                    position: absolute;
                    left: 12px;
                    top: 50%;
                    transform: translateY(-50%);
                    color: #8cbf73;
                    font-size: 0.8rem;
                    pointer-events: none;
                }

                .form-input,
                .form-select {
                    width: 100%;
                    padding: 9px 12px;
                    border: 1px solid #dfe8d8;
                    border-radius: 10px;
                    font-size: 0.875rem;
                    color: #333;
                    background: #fff;
                    outline: none;
                    transition: border-color 0.2s, box-shadow 0.2s;
                }

                .form-input.with-icon {
                    padding-left: 34px;
                }

                .form-input:focus,
                .form-select:focus {
                    border-color: #005F02;
                    box-shadow: 0 0 0 3px rgba(0, 95, 2, 0.12);
                }

                .btn-filter {
                    display: inline-flex;
                    align-items: center;
                    gap: 6px;
                    background: linear-gradient(135deg, #005F02, #0f4d1c);
                    color: #fff;
                    border: none;
                    border-radius: 10px;
                    padding: 9px 18px;
                    font-size: 0.875rem;
                    font-weight: 600;
                    cursor: pointer;
                    transition: all 0.2s;
                    white-space: nowrap;
                }

                .btn-filter:hover {
                    background: linear-gradient(135deg, #0d4f14, #0f4d1c);
                }

                .btn-reset {
                    display: inline-flex;
                    align-items: center;
                    gap: 6px;
                    background: #f4f4f4;
                    color: #2d2d2d;
                    border: 1px solid #dfe8d8;
                    border-radius: 10px;
                    padding: 9px 14px;
                    font-size: 0.875rem;
                    font-weight: 600;
                    text-decoration: none;
                    transition: all 0.2s;
                    white-space: nowrap;
                }

                .btn-reset:hover {
                    background: #eef3ec;
                    border-color: #8cbf73;
                    color: #005F02;
                }

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

                .item-title {
                    font-weight: 600;
                    color: #222;
                }

                .date-text {
                    font-size: 0.82rem;
                    color: #2d2d2d;
                }

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
                    transition: all 0.15s;
                    background: transparent;
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

                .action-btn:hover {
                    transform: translateY(-2px);
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
                    transition: all 0.15s;
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

                .modal-overlay {
                    position: fixed;
                    top: 0;
                    left: 0;
                    width: 100%;
                    height: 100%;
                    background: rgba(0, 0, 0, 0.45);
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    opacity: 0;
                    visibility: hidden;
                    transition: all 0.3s ease;
                    z-index: 999;
                }

                .modal-overlay.show {
                    opacity: 1;
                    visibility: visible;
                }

                .modal-box {
                    background: #fff;
                    padding: 24px;
                    border-radius: 16px;
                    width: 320px;
                    text-align: center;
                    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
                    transform: translateY(20px);
                    transition: all 0.3s ease;
                }

                .modal-overlay.show .modal-box {
                    transform: translateY(0);
                }

                .modal-icon {
                    font-size: 2rem;
                    color: #dc2626;
                    margin-bottom: 10px;
                }

                .modal-box h3 {
                    margin-bottom: 8px;
                    font-size: 1.2rem;
                    color: #222;
                }

                .modal-box p {
                    font-size: 0.9rem;
                    color: #555;
                    margin-bottom: 20px;
                }

                .modal-actions {
                    display: flex;
                    gap: 10px;
                    justify-content: center;
                }

                .btn-cancel {
                    padding: 8px 16px;
                    border-radius: 8px;
                    border: 1px solid #ccc;
                    background: #f4f4f4;
                    cursor: pointer;
                }

                .btn-delete {
                    padding: 8px 16px;
                    border-radius: 8px;
                    border: none;
                    background: #dc2626;
                    color: white;
                    cursor: pointer;
                }

                .btn-delete:hover {
                    background: #b91c1c;
                }

                @media (max-width: 640px) {
                    .page-wrapper {
                        padding: 20px 16px;
                    }
                }
            </style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/esolusi2/SubDomain/al-ifadah.esolusindo.com/resources/views/admin/data-master/gallery/index.blade.php ENDPATH**/ ?>