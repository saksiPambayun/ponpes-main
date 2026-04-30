<?php $__env->startSection('title', 'Dashboard'); ?>
<?php $__env->startSection('page-title', 'Ringkasan Sistem'); ?>

<?php $__env->startSection('content'); ?>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <!-- Card Santri Pending -->
        <div class="card p-6 border-l-4"
            style="border-left-color: #4ca94d; background: #fff; border-radius: 16px; box-shadow: 0 2px 20px rgba(0,0,0,0.06);">
            <div class="flex items-center">
                <div class="p-3 rounded-full mr-4" style="background: #eef3ec; color: #4ca94d;">
                    <i class="fas fa-user-clock text-2xl"></i>
                </div>
                <div>
                    <p class="text-sm text-gray-500 uppercase font-bold">Santri Pending</p>
                    <h3 class="text-2xl font-bold" style="color: #222;"><?php echo e($stats['santri_pending']); ?></h3>
                </div>
            </div>
        </div>

        <!-- Card Santri Diterima -->
        <div class="card p-6 border-l-4"
            style="border-left-color: #4ca94d; background: #fff; border-radius: 16px; box-shadow: 0 2px 20px rgba(0,0,0,0.06);">
            <div class="flex items-center">
                <div class="p-3 rounded-full mr-4" style="background: #eef3ec; color: #4ca94d;">
                    <i class="fas fa-user-check text-2xl"></i>
                </div>
                <div>
                    <p class="text-sm text-gray-500 uppercase font-bold">Santri Diterima</p>
                    <h3 class="text-2xl font-bold" style="color: #222;"><?php echo e($stats['santri_diterima']); ?></h3>
                </div>
            </div>
        </div>

        <!-- Card Pegawai Aktif -->
        <div class="card p-6 border-l-4"
            style="border-left-color: #4ca94d; background: #fff; border-radius: 16px; box-shadow: 0 2px 20px rgba(0,0,0,0.06);">
            <div class="flex items-center">
                <div class="p-3 rounded-full mr-4" style="background: #eef3ec; color: #4ca94d;">
                    <i class="fas fa-users text-2xl"></i>
                </div>
                <div>
                    <p class="text-sm text-gray-500 uppercase font-bold">Pegawai Aktif</p>
                    <h3 class="text-2xl font-bold" style="color: #222;"><?php echo e($stats['pegawai_total']); ?></h3>
                </div>
            </div>
        </div>

        <!-- Card Total SK -->
        <div class="card p-6 border-l-4"
            style="border-left-color: #4ca94d; background: #fff; border-radius: 16px; box-shadow: 0 2px 20px rgba(0,0,0,0.06);">
            <div class="flex items-center">
                <div class="p-3 rounded-full mr-4" style="background: #eef3ec; color: #4ca94d;">
                    <i class="fas fa-file-signature text-2xl"></i>
                </div>
                <div>
                    <p class="text-sm text-gray-500 uppercase font-bold">Total SK</p>
                    <h3 class="text-2xl font-bold" style="color: #222;"><?php echo e($stats['sk_total']); ?></h3>
                </div>
            </div>
        </div>

        <!-- Card Akta Yayasan -->
        <div class="card p-6 border-l-4"
            style="border-left-color: #4ca94d; background: #fff; border-radius: 16px; box-shadow: 0 2px 20px rgba(0,0,0,0.06);">
            <div class="flex items-center">
                <div class="p-3 rounded-full mr-4" style="background: #eef3ec; color: #4ca94d;">
                    <i class="fas fa-gavel text-2xl"></i>
                </div>
                <div>
                    <p class="text-sm text-gray-500 uppercase font-bold">Akta Yayasan</p>
                    <h3 class="text-2xl font-bold" style="color: #222;"><?php echo e($stats['akta_yayasan_total']); ?></h3>
                </div>
            </div>
        </div>
    </div>

    <!-- Tabel Pendaftaran Santri Terbaru -->
    <div class="card overflow-hidden"
        style="background: #fff; border-radius: 20px; border: 1px solid #dfe8d8; box-shadow: 0 2px 20px rgba(0,0,0,0.06);">
        <div class="p-6 border-b flex justify-between items-center"
            style="border-color: #dfe8d8; background: #eef3ec; border-radius: 20px 20px 0 0;">
            <h3 class="font-bold" style="color: #222;">Pendaftaran Santri Terbaru</h3>
            <a href="<?php echo e(route('admin.pendaftar.index')); ?>"
                style="color: #005F02; text-decoration: none; font-size: 0.8rem;">Lihat Semua</a>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y" style="border-color: #dfe8d8;">
                <thead style="background: #f4f4f4;">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider"
                            style="color: #2d2d2d;">No</th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider"
                            style="color: #2d2d2d;">Nama Lengkap</th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider"
                            style="color: #2d2d2d;">Asal Sekolah</th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider"
                            style="color: #2d2d2d;">Tanggal Daftar</th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider"
                            style="color: #2d2d2d;">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider"
                            style="color: #2d2d2d;">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y" style="border-color: #dfe8d8;">
                    <?php $__empty_1 = true; $__currentLoopData = $santri; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr class="hover:bg-gray-50" style="transition: background 0.2s;">
                            <td class="px-6 py-4 whitespace-nowrap text-sm" style="color: #333;">
                                <?php echo e($santri->firstItem() + $index); ?>

                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-medium" style="color: #222;"><?php echo e($item->nama_lengkap); ?></div>
                                        <div class="text-xs" style="color: #8cbf73;"><?php echo e($item->nisn ?? '-'); ?></div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm" style="color: #333;"><?php echo e($item->asal_sekolah); ?></div>
                                        <div class="text-xs" style="color: #8cbf73;"><?php echo e($item->jurusan ?? '-'); ?></div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm" style="color: #333;">
                                            <?php echo e($item->created_at ? $item->created_at->format('d/m/Y') : '-'); ?>

                                        </div>
                                        <div class="text-xs" style="color: #8cbf73;">
                                            <?php echo e($item->created_at ? $item->created_at->format('H:i') : ''); ?>

                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <?php
                                            $statusClass = [
                                                'pending' => 'bg-yellow-100 text-yellow-800',
                                                'diterima' => 'bg-green-100 text-green-800',
                                                'ditolak' => 'bg-red-100 text-red-800',
                                            ][$item->status] ?? 'bg-gray-100 text-gray-800';

                                            $statusText = [
                                                'pending' => 'Pending',
                                                'diterima' => 'Diterima',
                                                'ditolak' => 'Ditolak',
                                            ][$item->status] ?? ucfirst($item->status);
                                        ?>

                                        <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full <?php echo e($statusClass); ?>">
                                            <?php echo e($statusText); ?>

                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <div class="flex space-x-2">
                                            <!-- Tombol Detail -->
                                            <a href="<?php echo e(route('admin.pendaftar.show', $item->id)); ?>"
                                                style="color: #005F02; text-decoration: none;"
                                                title="Detail">
                                                <i class="fas fa-eye"></i>
                                            </a>

                                            <!-- Tombol Verifikasi (hanya untuk status pending) -->
                                            <?php if($item->status == 'pending'): ?>
                                                <button onclick="verifySantri(<?php echo e($item->id); ?>)"
                                                    style="color: #10b981; background: none; border: none; cursor: pointer;"
                                                    title="Terima Santri">
                                                    <i class="fas fa-check-circle"></i>
                                                </button>

                                                <!-- Tombol Tolak -->
                                                <button onclick="rejectSantri(<?php echo e($item->id); ?>)"
                                                    style="color: #ef4444; background: none; border: none; cursor: pointer;"
                                                    title="Tolak Santri">
                                                    <i class="fas fa-times-circle"></i>
                                                </button>
                                            <?php endif; ?>
                                        </div>
                                    </td>
                                </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="6" class="px-6 py-10 text-center" style="color: #2d2d2d;">
                                    <div class="flex flex-col items-center">
                                        <i class="fas fa-inbox text-4xl mb-3" style="color: #8cbf73;"></i>
                                        <p class="text-gray-500">Belum ada data pendaftaran santri.</p>
                                        <a href="<?php echo e(route('admin.santri.create')); ?>" class="mt-3 px-4 py-2 rounded-md text-sm"
                                            style="background: linear-gradient(135deg, #005F02, #0f4d1c); color: #fff; text-decoration: none;">
                                            Tambah Santri Baru
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

            <!-- Pagination dengan info lengkap -->
            <?php if($santri->hasPages()): ?>
                <div class="px-6 py-4 border-t" style="border-color: #dfe8d8; background: #f9fafb;">
                    <div class="flex flex-col sm:flex-row justify-between items-center gap-4">
                        <div class="text-sm text-gray-600">
                            Menampilkan <span class="font-semibold"><?php echo e($santri->firstItem()); ?></span>
                            sampai <span class="font-semibold"><?php echo e($santri->lastItem()); ?></span>
                            dari <span class="font-semibold"><?php echo e($santri->total()); ?></span> data
                        </div>
                        <div>
                            <?php echo e($santri->onEachSide(1)->links()); ?>

                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>

        <style>
            /* Pagination Styling yang rapi */
            .pagination {
                margin: 0;
                display: flex;
                gap: 4px;
                flex-wrap: wrap;
            }

            .pagination .page-item {
                list-style: none;
            }

            .pagination .page-link {
                border: 1px solid #dfe8d8;
                color: #2d2d2d;
                padding: 6px 12px;
                border-radius: 8px;
                font-size: 0.82rem;
                font-weight: 500;
                text-decoration: none;
                transition: all 0.15s;
                background: white;
                display: inline-block;
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
                opacity: 0.5;
                background: #f3f4f6;
                cursor: not-allowed;
                pointer-events: none;
            }

            /* Hover effect untuk row tabel */
            .hover\:bg-gray-50:hover {
                background: #eef3ec !important;
            }

            /* Responsive untuk pagination */
            @media (max-width: 640px) {
                .pagination .page-link {
                    padding: 4px 8px;
                    font-size: 0.75rem;
                }
            }
        </style>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        function verifySantri(id) {
            if (confirm('Apakah Anda yakin ingin menerima santri ini?')) {
                // Submit form verifikasi
                const form = document.getElementById('verify-form-' + id);
                if (form) {
                    form.submit();
                } else {
                    // Fallback dengan AJAX
                    fetch(`/admin/pendaftar/${id}/verify`, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>',
                            'Content-Type': 'application/json'
                        },
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            location.reload();
                        } else {
                            alert(data.message || 'Gagal memverifikasi santri');
                        }
                    });
                }
            }
        }

        function rejectSantri(id) {
            const alasan = prompt('Masukkan alasan penolakan:');
            if (alasan && alasan.trim().length >= 10) {
                const form = document.getElementById('reject-form-' + id);
                if (form) {
                    // Tambah input alasan ke form
                    let input = document.createElement('input');
                    input.type = 'hidden';
                    input.name = 'alasan_penolakan';
                    input.value = alasan;
                    form.appendChild(input);
                    form.submit();
                } else {
                    // Fallback dengan AJAX
                    fetch(`/admin/pendaftar/${id}/reject`, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>',
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({ alasan_penolakan: alasan })
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            location.reload();
                        } else {
                            alert(data.message || 'Gagal menolak santri');
                        }
                    });
                }
            } else if (alasan) {
                alert('Alasan penolakan minimal 10 karakter');
            }
        }
    </script>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('forms'); ?>
    <!-- Form tersembunyi untuk verifikasi dan penolakan -->
    <?php $__currentLoopData = $santri; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($item->status == 'pending'): ?>
            <form id="verify-form-<?php echo e($item->id); ?>"
                  action="<?php echo e(route('admin.pendaftar.verify', $item->id)); ?>"
                  method="POST" style="display: none;">
                <?php echo csrf_field(); ?>
            </form>

            <form id="reject-form-<?php echo e($item->id); ?>"
                  action="<?php echo e(route('admin.pendaftar.reject', $item->id)); ?>"
                  method="POST" style="display: none;">
                <?php echo csrf_field(); ?>
            </form>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\laragon\www\pondok_gue\ponpes-main\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>