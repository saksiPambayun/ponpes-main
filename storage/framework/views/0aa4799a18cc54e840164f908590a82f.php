<?php $__env->startSection('title', 'Data Program'); ?>

<?php $__env->startSection('content'); ?>
    <div class="page-wrapper" style="background: #f0f4f8; min-height: 100vh; padding: 2rem;">
        
        <div class="page-header"
            style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 2rem; flex-wrap: wrap; gap: 1rem;">
            <div class="page-header-left" style="display: flex; align-items: center; gap: 1rem;">
                <div class="page-icon"
                    style="width: 48px; height: 48px; background: linear-gradient(135deg, #4361ee, #7209b7); border-radius: 14px; display: flex; align-items: center; justify-content: center;">
                    <i class="fas fa-calendar-alt" style="color: #fff; font-size: 1.1rem;"></i>
                </div>
                <div>
                    <h1 style="font-size: 1.35rem; font-weight: 700; color: #1a1f36; margin: 0;">Data Program</h1>
                    <p style="font-size: 0.8rem; color: #8898aa; margin: 0;">Kelola program kegiatan pesantren</p>
                </div>
            </div>
            <a href="<?php echo e(route('admin.program.create')); ?>" class="btn-primary-action"
                style="display: inline-flex; align-items: center; gap: 0.5rem; background: linear-gradient(135deg, #4361ee, #7209b7); color: #fff; padding: 0.6rem 1.2rem; border-radius: 10px; text-decoration: none;">
                <i class="fas fa-plus"></i> Tambah Program
            </a>
        </div>

        
        <div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 1rem; margin-bottom: 1.5rem;">
            <div style="background: #fff; padding: 1rem; border-radius: 12px; border-left: 4px solid #4361ee;">
                <p style="font-size: 0.75rem; color: #64748b; margin-bottom: 0.25rem;">Total Program</p>
                <p style="font-size: 1.5rem; font-weight: 700; margin: 0;"><?php echo e($stats['total'] ?? 0); ?></p>
            </div>
            <div style="background: #fff; padding: 1rem; border-radius: 12px; border-left: 4px solid #10b981;">
                <p style="font-size: 0.75rem; color: #64748b; margin-bottom: 0.25rem;">Aktif</p>
                <p style="font-size: 1.5rem; font-weight: 700; color: #10b981; margin: 0;"><?php echo e($stats['aktif'] ?? 0); ?></p>
            </div>
            <div style="background: #fff; padding: 1rem; border-radius: 12px; border-left: 4px solid #3b82f6;">
                <p style="font-size: 0.75rem; color: #64748b; margin-bottom: 0.25rem;">Selesai</p>
                <p style="font-size: 1.5rem; font-weight: 700; color: #3b82f6; margin: 0;"><?php echo e($stats['selesai'] ?? 0); ?></p>
            </div>
            <div style="background: #fff; padding: 1rem; border-radius: 12px; border-left: 4px solid #f59e0b;">
                <p style="font-size: 0.75rem; color: #64748b; margin-bottom: 0.25rem;">Ditunda</p>
                <p style="font-size: 1.5rem; font-weight: 700; color: #f59e0b; margin: 0;"><?php echo e($stats['dinunda'] ?? 0); ?></p>
            </div>
        </div>

        
        <?php if(session('success')): ?>
            <div class="alert-success-box"
                style="display: flex; align-items: center; gap: 0.75rem; background: #f0fdf4; border-left: 4px solid #10b981; padding: 0.75rem 1rem; border-radius: 8px; margin-bottom: 1rem;">
                <i class="fas fa-check-circle" style="color: #10b981;"></i>
                <span><?php echo e(session('success')); ?></span>
            </div>
        <?php endif; ?>

        
        <div style="background: #fff; border-radius: 16px; overflow: hidden;">
            <div class="p-4 border-b border-gray-200">
                <div class="flex flex-col md:flex-row gap-4">
                    <div class="flex-1">
                        <div class="relative">
                            <input type="text" id="searchInput" placeholder="Cari nama program..."
                                class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                            <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-4 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Nama Program</th>
                            <th class="px-4 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Kategori</th>
                            <th class="px-4 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Tanggal Mulai</th>
                            <th class="px-4 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Tanggal Selesai
                            </th>
                            <th class="px-4 py-3 text-center text-xs font-semibold text-gray-500 uppercase">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200" id="programTable">
                        <?php $__empty_1 = true; $__currentLoopData = $programs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-4">
                                    <div class="flex items-center gap-3">
                                        <div
                                            class="w-9 h-9 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-700 font-bold text-sm">
                                            <?php echo e(strtoupper(substr($item->nama_program, 0, 2))); ?>

                                        </div>
                                        <p class="text-sm font-semibold text-gray-900"><?php echo e($item->nama_program); ?></p>
                                    </div>
                                </td>
                                <td class="px-4 py-4 text-sm text-gray-600"><?php echo e($item->kategori ?? '-'); ?></td>
                                <td class="px-4 py-4 text-sm text-gray-600 whitespace-nowrap">
                                    <?php echo e($item->tanggal_mulai ? \Carbon\Carbon::parse($item->tanggal_mulai)->format('d M Y') : '-'); ?>

                                </td>
                                <td class="px-4 py-4 text-sm text-gray-600 whitespace-nowrap">
                                    <?php echo e($item->tanggal_selesai ? \Carbon\Carbon::parse($item->tanggal_selesai)->format('d M Y') : '-'); ?>

                                </td>
                                <td class="px-4 py-4 text-center">
                                    <div class="flex items-center justify-center gap-1">
                                        <a href="<?php echo e(route('admin.program.show', $item->id)); ?>"
                                            class="p-1.5 rounded-lg text-blue-600 hover:bg-blue-50" title="Detail">
                                            <i class="fas fa-eye text-sm"></i>
                                        </a>
                                        <a href="<?php echo e(route('admin.program.edit', $item->id)); ?>"
                                            class="p-1.5 rounded-lg text-yellow-600 hover:bg-yellow-50" title="Edit">
                                            <i class="fas fa-edit text-sm"></i>
                                        </a>
                                        <form action="<?php echo e(route('admin.program.destroy', $item->id)); ?>" method="POST"
                                            class="inline" onsubmit="return confirm('Yakin ingin menghapus program ini?')">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" class="p-1.5 rounded-lg text-red-600 hover:bg-red-50"
                                                title="Hapus">
                                                <i class="fas fa-trash text-sm"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="5" class="px-6 py-12 text-center">
                                    <i class="fas fa-inbox text-4xl text-gray-300 mb-3 block"></i>
                                    <p class="text-gray-500 font-medium">Belum ada data program</p>
                                    <p class="text-gray-400 text-sm mt-1">Tambahkan program baru untuk memulai</p>
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

            <?php if($programs->hasPages()): ?>
                <div class="p-4 border-t border-gray-200">
                    <?php echo e($programs->links()); ?>

                </div>
            <?php endif; ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        document.getElementById('searchInput').addEventListener('keyup', function () {
            const term = this.value.toLowerCase();
            document.querySelectorAll('#programTable tr').forEach(row => {
                row.style.display = row.textContent.toLowerCase().includes(term) ? '' : 'none';
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\ponpes-main\resources\views/admin/data-master/program/index.blade.php ENDPATH**/ ?>