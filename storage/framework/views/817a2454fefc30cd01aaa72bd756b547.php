<?php $__env->startSection('title', 'Data Santri'); ?>
<?php $__env->startSection('page-title', 'Data Santri'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container mx-auto px-4">
        <!-- Header Section -->
        <div class="mb-6">
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-sm text-gray-500">Dashboard &gt; Data Santri</p>
                </div>
                <a href="<?php echo e(route('admin.santri.create')); ?>"
                    class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg transition duration-300 flex items-center gap-2">
                    <i class="fas fa-plus"></i>
                    <span>Tambah Santri</span>
                </a>
            </div>
        </div>

        <!-- Statistik Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
            <div class="bg-white rounded-xl shadow-sm p-6 border-l-4 border-green-500">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500 text-sm">TOTAL SANTRI</p>
                        <p class="text-2xl font-bold text-gray-800"><?php echo e($stats['total']); ?></p>
                    </div>
                    <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center">
                        <i class="fas fa-users text-green-600 text-xl"></i>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-sm p-6 border-l-4 border-blue-500">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500 text-sm">LAKI-LAKI</p>
                        <p class="text-2xl font-bold text-gray-800"><?php echo e($stats['laki_laki'] ?? 0); ?></p>
                    </div>
                    <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center">
                        <i class="fas fa-mars text-blue-600 text-xl"></i>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-sm p-6 border-l-4 border-pink-500">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-gray-500 text-sm">PEREMPUAN</p>
                        <p class="text-2xl font-bold text-gray-800"><?php echo e($stats['perempuan'] ?? 0); ?></p>
                    </div>
                    <div class="w-12 h-12 bg-pink-100 rounded-full flex items-center justify-center">
                        <i class="fas fa-venus text-pink-600 text-xl"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Filter Section -->
        <div class="bg-white rounded-xl shadow-sm mb-6">
            <div class="p-6 border-b border-gray-200">
                <h3 class="text-lg font-semibold text-gray-800">Filter Data</h3>
            </div>
            <div class="p-6">
                <form method="GET" action="<?php echo e(route('admin.data-santri.index')); ?>"
                    class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">CARI</label>
                        <input type="text" name="search" value="<?php echo e(request('search')); ?>"
                            placeholder="Nama / NISN / Asal sekolah..."
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">ANGKATAN</label>
                        <select name="angkatan" id="filter-angkatan"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
                            <option value="">Semua Angkatan</option>
                            <?php $__currentLoopData = $angkatanList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tahun): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($tahun); ?>" <?php echo e(request('angkatan') == $tahun ? 'selected' : ''); ?>>
                                    <?php echo e($tahun); ?>

                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    <div class="flex items-end gap-2">
                        <button type="submit"
                            class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg transition duration-300 text-sm">
                            <i class="fas fa-search mr-1"></i>Cari
                        </button>
                        <a href="<?php echo e(route('admin.data-santri.index')); ?>"
                            class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg transition duration-300 text-sm">
                            <i class="fas fa-undo mr-1"></i>Reset
                        </a>
                    </div>
                </form>
            </div>
        </div>

        <!-- Info Filter Aktif -->
        <?php if(request('angkatan') || request('search')): ?>
            <div class="bg-blue-50 border-l-4 border-blue-500 p-4 mb-6 rounded">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-blue-700">
                            <i class="fas fa-filter mr-2"></i>
                            Filter aktif:
                            <?php if(request('angkatan')): ?>
                                <span class="font-semibold">Angkatan <?php echo e(request('angkatan')); ?></span>
                            <?php endif; ?>
                            <?php if(request('search')): ?>
                                <?php if(request('angkatan')): ?> , <?php endif; ?>
                                <span class="font-semibold">Pencarian: "<?php echo e(request('search')); ?>"</span>
                            <?php endif; ?>
                        </p>
                    </div>
                    <a href="<?php echo e(route('admin.data-santri.index')); ?>" class="text-blue-600 hover:text-blue-800 text-sm">
                        <i class="fas fa-times"></i> Hapus filter
                    </a>
                </div>
            </div>
        <?php endif; ?>

        <!-- Table Section -->
        <div class="bg-white rounded-xl shadow-sm overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">NO
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">FOTO
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">NAMA
                                LENGKAP</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">NISN
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ASAL
                                SEKOLAH</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">JENIS
                                KELAMIN</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                ANGKATAN</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">AKSI
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <?php $__empty_1 = true; $__currentLoopData = $santriTetap; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $santri): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr class="hover:bg-gray-50 transition duration-200">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    <?php echo e($index + $santriTetap->firstItem()); ?>

                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <?php if($santri->foto): ?>
                                        <img src="<?php echo e(Storage::url($santri->foto)); ?>" class="w-10 h-10 rounded-full object-cover">
                                    <?php else: ?>
                                        <div
                                            class="w-10 h-10 rounded-full bg-gradient-to-br from-green-400 to-green-600 flex items-center justify-center">
                                            <i class="fas fa-user text-white text-sm"></i>
                                        </div>
                                    <?php endif; ?>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm font-medium text-gray-900"><?php echo e($santri->nama_lengkap); ?></div>
                                    <?php if($santri->email): ?>
                                        <div class="text-xs text-gray-500"><?php echo e($santri->email); ?></div>
                                    <?php endif; ?>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    <?php echo e($santri->nisn ?? '-'); ?>

                                </td>
                                <td class="px-6 py-4 text-sm text-gray-900">
                                    <?php echo e($santri->asal_sekolah); ?>

                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span
                                        class="px-2 py-1 text-xs rounded-full
                                                <?php echo e($santri->jenis_kelamin == 'Laki-laki' ? 'bg-blue-100 text-blue-700' : 'bg-pink-100 text-pink-700'); ?>">
                                        <?php echo e($santri->jenis_kelamin ?? '-'); ?>

                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 py-1 text-xs rounded-full bg-green-100 text-green-700">
                                        <?php echo e($santri->angkatan ?? date('Y', strtotime($santri->created_at))); ?>

                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <div class="flex gap-3">
                                        <a href="<?php echo e(route('admin.data-santri.show', $santri->id)); ?>"
                                            class="text-blue-600 hover:text-blue-900 transition" title="Detail">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="<?php echo e(route('admin.data-santri.edit', $santri->id)); ?>"
                                            class="text-yellow-600 hover:text-yellow-900 transition" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <button type="button"
                                            onclick="openDeleteModal(<?php echo e($santri->id); ?>, '<?php echo e($santri->nama_lengkap); ?>')"
                                            class="text-red-600 hover:text-red-900 transition" title="Hapus">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="8" class="px-6 py-12 text-center text-gray-500">
                                    <i class="fas fa-user-graduate text-5xl mb-3 block text-gray-300"></i>
                                    <p class="text-lg">Belum ada data santri</p>
                                    <p class="text-sm mt-1">Silakan tambah santri baru melalui tombol "Tambah Santri"</p>
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="px-6 py-4 border-t border-gray-200">
                <?php echo e($santriTetap->appends(request()->query())->links()); ?>

            </div>
        </div>
    </div>

    <!-- Delete Modal -->
    <div id="deleteModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden overflow-y-auto h-full w-full z-50">
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
            <div class="mt-3 text-center">
                <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-red-100">
                    <i class="fas fa-exclamation-triangle text-red-600"></i>
                </div>
                <h3 class="text-lg leading-6 font-medium text-gray-900 mt-4">Hapus Data Santri</h3>
                <div class="mt-2 px-7 py-3">
                    <p class="text-sm text-gray-500">
                        Apakah Anda yakin ingin menghapus data santri <span id="deleteName"
                            class="font-semibold text-gray-700"></span>?
                    </p>
                    <p class="text-xs text-red-500 mt-2">Tindakan ini tidak dapat dibatalkan!</p>
                </div>
                <div class="flex justify-center gap-3 mt-4">
                    <button onclick="closeDeleteModal()"
                        class="px-4 py-2 bg-gray-500 text-white text-base font-medium rounded-md shadow-sm hover:bg-gray-600 focus:outline-none">
                        Batal
                    </button>
                    <button id="confirmDeleteBtn"
                        class="px-4 py-2 bg-red-600 text-white text-base font-medium rounded-md shadow-sm hover:bg-red-700 focus:outline-none">
                        Hapus
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        let deleteId = null;

        function openDeleteModal(id, name) {
            deleteId = id;
            document.getElementById('deleteName').textContent = name;
            document.getElementById('deleteModal').classList.remove('hidden');
        }

        function closeDeleteModal() {
            document.getElementById('deleteModal').classList.add('hidden');
            deleteId = null;
        }

        document.getElementById('confirmDeleteBtn')?.addEventListener('click', function () {
            if (deleteId) {
                const form = document.getElementById('deleteForm' + deleteId);
                if (form) {
                    form.submit();
                }
            }
        });

        // Auto submit filter when select changes
        document.getElementById('filter-angkatan')?.addEventListener('change', function () {
            this.form.submit();
        });

        // Close modal when clicking outside
        window.onclick = function (event) {
            const modal = document.getElementById('deleteModal');
            if (event.target == modal) {
                closeDeleteModal();
            }
        }
    </script>

    <!-- Delete Forms -->
    <?php $__currentLoopData = $santriTetap; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $santri): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <form id="deleteForm<?php echo e($santri->id); ?>" action="<?php echo e(route('admin.data-santri.destroy', $santri->id)); ?>" method="POST"
            style="display: none;">
            <?php echo csrf_field(); ?>
            <?php echo method_field('DELETE'); ?>
        </form>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\ponpes ifadah\resources\views/admin/santri/data-santri.blade.php ENDPATH**/ ?>