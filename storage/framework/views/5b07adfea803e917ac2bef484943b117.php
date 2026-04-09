<?php $__env->startSection('title', 'Struktur Organisasi'); ?>

<?php $__env->startSection('content'); ?>
    <div class="page-wrapper" style="background: #f8fafc; min-height: 100vh; padding: 1.5rem;">

        <!-- Header -->
        <div style="margin-bottom: 1.5rem;">
            <h1 style="font-size: 1.5rem; font-weight: 600; color: #1e293b; margin: 0 0 0.25rem 0;">Struktur Organisasi</h1>
            <p style="font-size: 0.85rem; color: #64748b; margin: 0;">Kelola anggota struktur organisasi pesantren</p>
        </div>

        <!-- Tombol Tambah -->
        <div style="margin-bottom: 1.5rem;">
            <a href="<?php echo e(route('admin.data-master.struktur-organisasi.create')); ?>"
                style="display: inline-flex; align-items: center; gap: 0.5rem; background: #3b82f6; color: white; padding: 0.6rem 1.25rem; border-radius: 8px; text-decoration: none; font-size: 0.85rem; font-weight: 500; transition: all 0.2s; border: none; cursor: pointer;">
                <i class="fas fa-plus" style="font-size: 0.8rem;"></i>
                Tambah Anggota
            </a>
        </div>

        <!-- Statistik Cards -->
        <div
            style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1rem; margin-bottom: 1.5rem;">
            <!-- Total Anggota -->
            <div
                style="background: white; border-radius: 12px; padding: 1rem; box-shadow: 0 1px 3px rgba(0,0,0,0.05); border: 1px solid #e2e8f0;">
                <div style="display: flex; justify-content: space-between; align-items: center;">
                    <div>
                        <p
                            style="font-size: 0.7rem; font-weight: 500; color: #64748b; margin: 0 0 0.25rem 0; text-transform: uppercase;">
                            Total Anggota</p>
                        <h3 style="font-size: 1.75rem; font-weight: 700; color: #1e293b; margin: 0;">
                            <?php echo e($stats['total'] ?? 0); ?></h3>
                    </div>
                    <div
                        style="width: 40px; height: 40px; background: #eef2ff; border-radius: 10px; display: flex; align-items: center; justify-content: center;">
                        <i class="fas fa-users" style="color: #3b82f6; font-size: 1.2rem;"></i>
                    </div>
                </div>
            </div>

            <!-- Aktif -->
            <div
                style="background: white; border-radius: 12px; padding: 1rem; box-shadow: 0 1px 3px rgba(0,0,0,0.05); border: 1px solid #e2e8f0;">
                <div style="display: flex; justify-content: space-between; align-items: center;">
                    <div>
                        <p
                            style="font-size: 0.7rem; font-weight: 500; color: #64748b; margin: 0 0 0.25rem 0; text-transform: uppercase;">
                            Aktif</p>
                        <h3 style="font-size: 1.75rem; font-weight: 700; color: #1e293b; margin: 0;">
                            <?php echo e($stats['aktif'] ?? 0); ?></h3>
                    </div>
                    <div
                        style="width: 40px; height: 40px; background: #dcfce7; border-radius: 10px; display: flex; align-items: center; justify-content: center;">
                        <i class="fas fa-user-check" style="color: #22c55e; font-size: 1.2rem;"></i>
                    </div>
                </div>
            </div>

            <!-- Pengurus -->
            <div
                style="background: white; border-radius: 12px; padding: 1rem; box-shadow: 0 1px 3px rgba(0,0,0,0.05); border: 1px solid #e2e8f0;">
                <div style="display: flex; justify-content: space-between; align-items: center;">
                    <div>
                        <p
                            style="font-size: 0.7rem; font-weight: 500; color: #64748b; margin: 0 0 0.25rem 0; text-transform: uppercase;">
                            Pengurus</p>
                        <h3 style="font-size: 1.75rem; font-weight: 700; color: #1e293b; margin: 0;">
                            <?php echo e($stats['pengurus'] ?? 0); ?></h3>
                    </div>
                    <div
                        style="width: 40px; height: 40px; background: #fef3c7; border-radius: 10px; display: flex; align-items: center; justify-content: center;">
                        <i class="fas fa-crown" style="color: #f59e0b; font-size: 1.2rem;"></i>
                    </div>
                </div>
            </div>

            <!-- Pengawas -->
            <div
                style="background: white; border-radius: 12px; padding: 1rem; box-shadow: 0 1px 3px rgba(0,0,0,0.05); border: 1px solid #e2e8f0;">
                <div style="display: flex; justify-content: space-between; align-items: center;">
                    <div>
                        <p
                            style="font-size: 0.7rem; font-weight: 500; color: #64748b; margin: 0 0 0.25rem 0; text-transform: uppercase;">
                            Pengawas</p>
                        <h3 style="font-size: 1.75rem; font-weight: 700; color: #1e293b; margin: 0;">
                            <?php echo e($stats['pengawas'] ?? 0); ?></h3>
                    </div>
                    <div
                        style="width: 40px; height: 40px; background: #fce7f3; border-radius: 10px; display: flex; align-items: center; justify-content: center;">
                        <i class="fas fa-shield-alt" style="color: #ec489a; font-size: 1.2rem;"></i>
                    </div>
                </div>
            </div>

            <!-- Pelaksana -->
            <div
                style="background: white; border-radius: 12px; padding: 1rem; box-shadow: 0 1px 3px rgba(0,0,0,0.05); border: 1px solid #e2e8f0;">
                <div style="display: flex; justify-content: space-between; align-items: center;">
                    <div>
                        <p
                            style="font-size: 0.7rem; font-weight: 500; color: #64748b; margin: 0 0 0.25rem 0; text-transform: uppercase;">
                            Pelaksana</p>
                        <h3 style="font-size: 1.75rem; font-weight: 700; color: #1e293b; margin: 0;">
                            <?php echo e($stats['pelaksana'] ?? 0); ?></h3>
                    </div>
                    <div
                        style="width: 40px; height: 40px; background: #e0e7ff; border-radius: 10px; display: flex; align-items: center; justify-content: center;">
                        <i class="fas fa-tasks" style="color: #6366f1; font-size: 1.2rem;"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Filter Bar -->
        <div
            style="background: white; border-radius: 12px; padding: 0.75rem 1rem; margin-bottom: 1.5rem; border: 1px solid #e2e8f0; display: flex; gap: 1rem; flex-wrap: wrap; align-items: flex-end;">
            <div style="min-width: 150px;">
                <label
                    style="font-size: 0.7rem; font-weight: 500; color: #64748b; display: block; margin-bottom: 0.25rem;">Divisi</label>
                <select id="filterDivisi"
                    style="width: 100%; padding: 0.5rem 0.75rem; border: 1px solid #e2e8f0; border-radius: 8px; font-size: 0.85rem; background: white;">
                    <option value="">Semua Divisi</option>
                    <option value="pengurus" <?php echo e(request('divisi') == 'pengurus' ? 'selected' : ''); ?>>Pengurus</option>
                    <option value="pengawas" <?php echo e(request('divisi') == 'pengawas' ? 'selected' : ''); ?>>Pengawas</option>
                    <option value="pelaksana" <?php echo e(request('divisi') == 'pelaksana' ? 'selected' : ''); ?>>Pelaksana</option>
                </select>
            </div>
            <div style="min-width: 130px;">
                <label
                    style="font-size: 0.7rem; font-weight: 500; color: #64748b; display: block; margin-bottom: 0.25rem;">Status</label>
                <select id="filterStatus"
                    style="width: 100%; padding: 0.5rem 0.75rem; border: 1px solid #e2e8f0; border-radius: 8px; font-size: 0.85rem; background: white;">
                    <option value="">Semua Status</option>
                    <option value="aktif" <?php echo e(request('status') == 'aktif' ? 'selected' : ''); ?>>Aktif</option>
                    <option value="nonaktif" <?php echo e(request('status') == 'nonaktif' ? 'selected' : ''); ?>>Nonaktif</option>
                </select>
            </div>
            <div style="flex: 1; min-width: 200px;">
                <label
                    style="font-size: 0.7rem; font-weight: 500; color: #64748b; display: block; margin-bottom: 0.25rem;">Cari</label>
                <input type="text" id="searchInput" placeholder="Cari nama atau jabatan..." value="<?php echo e(request('search')); ?>"
                    style="width: 100%; padding: 0.5rem 0.75rem; border: 1px solid #e2e8f0; border-radius: 8px; font-size: 0.85rem;">
            </div>
        </div>

        <!-- Notifikasi Sukses -->
        <?php if(session('success')): ?>
            <div
                style="background: #dcfce7; border-left: 4px solid #22c55e; border-radius: 8px; padding: 0.75rem 1rem; margin-bottom: 1.5rem; display: flex; align-items: center; gap: 0.5rem;">
                <i class="fas fa-check-circle" style="color: #22c55e;"></i>
                <span style="color: #166534; font-size: 0.85rem;"><?php echo e(session('success')); ?></span>
                <button onclick="this.parentElement.remove()"
                    style="margin-left: auto; background: none; border: none; cursor: pointer; color: #22c55e;">&times;</button>
            </div>
        <?php endif; ?>

        <!-- Tabel Data -->
        <div style="background: white; border-radius: 12px; border: 1px solid #e2e8f0; overflow: hidden;">
            <div style="overflow-x: auto;">
                <table style="width: 100%; border-collapse: collapse;">
                    <thead>
                        <tr style="background: #f8fafc; border-bottom: 1px solid #e2e8f0;">
                            <th style="text-align: left; padding: 0.9rem 1rem; font-size: 0.75rem; font-weight: 600; color: #64748b;">NO</th>
                            <th style="text-align: left; padding: 0.9rem 1rem; font-size: 0.75rem; font-weight: 600; color: #64748b;">FOTO</th>
                            <th style="text-align: left; padding: 0.9rem 1rem; font-size: 0.75rem; font-weight: 600; color: #64748b;">NAMA</th>
                            <th style="text-align: left; padding: 0.9rem 1rem; font-size: 0.75rem; font-weight: 600; color: #64748b;">JABATAN</th>
                            <th style="text-align: left; padding: 0.9rem 1rem; font-size: 0.75rem; font-weight: 600; color: #64748b;">DIVISI</th>
                            <th style="text-align: left; padding: 0.9rem 1rem; font-size: 0.75rem; font-weight: 600; color: #64748b;">STATUS</th>
                            <th style="text-align: center; padding: 0.9rem 1rem; font-size: 0.75rem; font-weight: 600; color: #64748b;">AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $anggota; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr style="border-bottom: 1px solid #f1f5f9;">
                                <td style="padding: 0.9rem 1rem; font-size: 0.85rem; color: #475569;">
                                    <?php echo e($key + $anggota->firstItem()); ?>

                                </td>
                                <td style="padding: 0.9rem 1rem;">
                                    <?php if($item->foto): ?>
                                        <img src="<?php echo e(Storage::url($item->foto)); ?>"
                                            style="width: 36px; height: 36px; object-fit: cover; border-radius: 50%;">
                                    <?php else: ?>
                                        <div style="width: 36px; height: 36px; background: #f1f5f9; border-radius: 50%; display: flex; align-items: center; justify-content: center;">
                                            <i class="fas fa-user" style="color: #94a3b8; font-size: 0.9rem;"></i>
                                        </div>
                                    <?php endif; ?>
                                </td>
                                <td style="padding: 0.9rem 1rem; font-weight: 500; color: #1e293b; font-size: 0.85rem;">
                                    <?php echo e($item->nama); ?>

                                </td>
                                <td style="padding: 0.9rem 1rem; color: #475569; font-size: 0.85rem;"><?php echo e($item->jabatan); ?></td>
                                <td style="padding: 0.9rem 1rem;">
                                    <span style="display: inline-block; padding: 0.2rem 0.5rem; border-radius: 20px; font-size: 0.7rem; font-weight: 500;
                                        <?php if($item->divisi == 'pengurus'): ?> background: #eef2ff; color: #3b82f6;
                                        <?php elseif($item->divisi == 'pengawas'): ?> background: #fce7f3; color: #ec489a;
                                        <?php else: ?> background: #dcfce7; color: #22c55e; <?php endif; ?>">
                                        <?php echo e(ucfirst($item->divisi)); ?>

                                    </span>
                                </td>
                                <td style="padding: 0.9rem 1rem;">
                                    <span style="display: inline-block; padding: 0.2rem 0.5rem; border-radius: 20px; font-size: 0.7rem; font-weight: 500;
                                        <?php if($item->status == 'aktif'): ?> background: #dcfce7; color: #166534;
                                        <?php else: ?> background: #fef3c7; color: #92400e; <?php endif; ?>">
                                        <?php echo e(ucfirst($item->status)); ?>

                                    </span>
                                </td>
                                <td style="padding: 0.9rem 1rem; text-align: center;">
                                    <div style="display: flex; gap: 0.5rem; justify-content: center;">
                                        <!-- Tombol SHOW (Detail) -->
                                        <a href="<?php echo e(route('admin.data-master.struktur-organisasi.show', $item->id)); ?>"
                                            style="background: none; padding: 0.3rem 0.6rem; border-radius: 6px; text-decoration: none; color: #10b981; font-size: 0.75rem; transition: all 0.2s;"
                                            onmouseover="this.style.background='#d1fae5'"
                                            onmouseout="this.style.background='none'">
                                            <i class="fas fa-eye"></i> Detail
                                        </a>
                                        <!-- Tombol EDIT -->
                                        <a href="<?php echo e(route('admin.data-master.struktur-organisasi.edit', $item->id)); ?>"
                                            style="background: none; padding: 0.3rem 0.6rem; border-radius: 6px; text-decoration: none; color: #3b82f6; font-size: 0.75rem; transition: all 0.2s;"
                                            onmouseover="this.style.background='#eef2ff'"
                                            onmouseout="this.style.background='none'">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
                                        <!-- Tombol HAPUS -->
                                        <form action="<?php echo e(route('admin.data-master.struktur-organisasi.destroy', $item->id)); ?>"
                                            method="POST" style="display: inline-block;"
                                            onsubmit="return confirm('Yakin hapus <?php echo e($item->nama); ?>?')">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit"
                                                style="background: none; padding: 0.3rem 0.6rem; border-radius: 6px; color: #ef4444; border: none; cursor: pointer; font-size: 0.75rem; transition: all 0.2s;"
                                                onmouseover="this.style.background='#fef2f2'"
                                                onmouseout="this.style.background='none'">
                                                <i class="fas fa-trash"></i> Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="7" style="padding: 3rem; text-align: center;">
                                    <i class="fas fa-users"
                                        style="font-size: 2.5rem; color: #cbd5e1; margin-bottom: 0.75rem; display: block;"></i>
                                    <p style="color: #64748b; margin: 0;">Belum ada data anggota</p>
                                    <a href="<?php echo e(route('admin.data-master.struktur-organisasi.create')); ?>"
                                        style="display: inline-block; margin-top: 0.75rem; color: #3b82f6; text-decoration: none; font-size: 0.85rem;">
                                        <i class="fas fa-plus"></i> Tambah anggota pertama
                                    </a>
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <?php if($anggota->hasPages()): ?>
                <div style="padding: 0.9rem 1rem; border-top: 1px solid #e2e8f0; background: #f8fafc;">
                    <?php echo e($anggota->links()); ?>

                </div>
            <?php endif; ?>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const filterDivisi = document.getElementById('filterDivisi');
            const filterStatus = document.getElementById('filterStatus');
            const searchInput = document.getElementById('searchInput');

            function applyFilters() {
                let url = new URL(window.location.href);
                if (filterDivisi.value) url.searchParams.set('divisi', filterDivisi.value);
                else url.searchParams.delete('divisi');

                if (filterStatus.value) url.searchParams.set('status', filterStatus.value);
                else url.searchParams.delete('status');

                if (searchInput.value) url.searchParams.set('search', searchInput.value);
                else url.searchParams.delete('search');

                url.searchParams.set('page', '1');
                window.location.href = url.toString();
            }

            if (filterDivisi) filterDivisi.addEventListener('change', applyFilters);
            if (filterStatus) filterStatus.addEventListener('change', applyFilters);

            let typingTimer;
            if (searchInput) {
                searchInput.addEventListener('keyup', function () {
                    clearTimeout(typingTimer);
                    typingTimer = setTimeout(applyFilters, 500);
                });
            }
        });
    </script>

    <style>
        @media (max-width: 640px) {
            .page-wrapper {
                padding: 1rem !important;
            }
            .stats-container {
                grid-template-columns: repeat(2, 1fr) !important;
            }
            .filter-bar {
                flex-direction: column;
                align-items: stretch !important;
            }
            .filter-bar>div {
                width: 100% !important;
            }
            table {
                font-size: 0.7rem;
            }
            td, th {
                padding: 0.6rem 0.5rem !important;
            }
        }
    </style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\ponpes-main\resources\views/admin/data-master/struktur-organisasi/index.blade.php ENDPATH**/ ?>