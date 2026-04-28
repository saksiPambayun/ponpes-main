<?php $__env->startSection('title', 'Data Santri'); ?>
<?php $__env->startSection('page-title', 'Data Pendaftaran Santri'); ?>

<?php $__env->startSection('content'); ?>
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 gap-4">
        <div>
            <h3 class="text-xl font-bold text-gray-900">Data Pendaftaran Santri</h3>
            <p class="text-gray-500 text-sm mt-1">Kelola pendaftaran dan verifikasi santri baru</p>
        </div>
        <div class="flex space-x-3">
            <a href="<?php echo e(route('admin.santri.create')); ?>"
                class="btn-primary px-6 py-2 rounded-lg text-white font-medium inline-flex items-center">
                <i class="fas fa-plus mr-2"></i>Tambah Data
            </a>
        </div>
    </div>

    <div class="card overflow-hidden">
        <div class="p-6 border-b border-gray-200">
            <div class="flex flex-col md:flex-row gap-4">
                <div class="flex-1">
                    <div class="relative">
                        <input type="text" id="searchInput" placeholder="Cari nama santri..."
                            class="input-field w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none">
                        <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                    </div>
                </div>
                <div class="flex gap-2">
                    <select id="statusFilter"
                        class="border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-indigo-500">
                        <option value="">Semua Status</option>
                        <option value="pending">Pending</option>
                        <option value="diterima">Diterima</option>
                        <option value="ditolak">Ditolak</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                            <input type="checkbox" class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                        </th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Nama
                            Lengkap</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">NISN
                        </th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Asal
                            Sekolah</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">No.
                            Wali</th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Status
                        </th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Tanggal
                        </th>
                        <th class="px-6 py-4 text-right text-xs font-semibold text-gray-500 uppercase tracking-wider">Aksi
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200" id="santriTable">
                    <?php $__empty_1 = true; $__currentLoopData = $santri; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr class="table-row">
                            <td class="px-6 py-4">
                                <input type="checkbox" class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                    <div
                                        class="w-10 h-10 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-600 font-bold mr-3">
                                        <?php echo e(substr($item->nama_lengkap, 0, 2)); ?>

                                    </div>
                                    <div>
                                        <p class="text-sm font-medium text-gray-900"><?php echo e($item->nama_lengkap); ?></p>
                                        <p class="text-xs text-gray-500"><?php echo e($item->email); ?></p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500"><?php echo e($item->nisn ?? '-'); ?></td>
                            <td class="px-6 py-4 text-sm text-gray-500"><?php echo e($item->asal_sekolah); ?></td>
                            <td class="px-6 py-4 text-sm text-gray-500"><?php echo e($item->no_wali); ?></td>
                            <td class="px-6 py-4">
                                <?php if($item->status == 'pending'): ?>
                                    <span class="badge badge-pending">Pending</span>
                                <?php elseif($item->status == 'diterima'): ?>
                                    <span class="badge badge-success">Diterima</span>
                                <?php else: ?>
                                    <span class="badge badge-danger">Ditolak</span>
                                <?php endif; ?>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500"><?php echo e($item->created_at->format('d M Y')); ?></td>
                            <td class="px-6 py-4 text-right">
                                <a href="<?php echo e(route('admin.santri.show', $item->id)); ?>"
                                    class="text-indigo-600 hover:text-indigo-900 mr-3" title="Detail">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="<?php echo e(route('admin.santri.edit', $item->id)); ?>"
                                    class="text-blue-600 hover:text-blue-900 mr-3" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <?php if($item->status == 'pending'): ?>
                                    <form action="<?php echo e(route('admin.santri.verify', $item->id)); ?>" method="POST" class="inline">
                                        <?php echo csrf_field(); ?>
                                        <button type="submit" class="text-green-600 hover:text-green-900 mr-3" title="Verifikasi">
                                            <i class="fas fa-check"></i>
                                        </button>
                                    </form>
                                <?php endif; ?>
                                <form action="<?php echo e(route('admin.santri.destroy', $item->id)); ?>" method="POST" class="inline"
                                    onsubmit="return confirmDelete()">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="text-red-600 hover:text-red-900" title="Hapus">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="8" class="px-6 py-8 text-center text-gray-500">
                                <i class="fas fa-inbox text-4xl mb-2 text-gray-300"></i>
                                <p>Belum ada data santri</p>
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
        <div class="p-6 border-t border-gray-200">
            <?php echo e($santri->links()); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script>
        // Search functionality
        document.getElementById('searchInput').addEventListener('keyup', function () {
            const searchTerm = this.value.toLowerCase();
            const rows = document.querySelectorAll('#santriTable tr');

            rows.forEach(row => {
                const text = row.textContent.toLowerCase();
                row.style.display = text.includes(searchTerm) ? '' : 'none';
            });
        });

        // Status filter
        document.getElementById('statusFilter').addEventListener('change', function () {
            const status = this.value;
            const rows = document.querySelectorAll('#santriTable tr');

            rows.forEach(row => {
                if (!status) {
                    row.style.display = '';
                    return;
                }

                const badge = row.querySelector('.badge');
                if (badge) {
                    const rowStatus = badge.textContent.toLowerCase();
                    row.style.display = rowStatus === status ? '' : 'none';
                }
            });
        });
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\ponpes-main\resources\views\admin\program\show.blade.php ENDPATH**/ ?>