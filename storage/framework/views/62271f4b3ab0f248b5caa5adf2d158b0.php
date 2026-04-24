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

    
    <?php if(session('success')): ?>
        <div class="mb-4 p-4 bg-green-100 border border-green-300 text-green-800 rounded-lg flex items-center gap-2">
            <i class="fas fa-check-circle"></i>
            <span><?php echo e(session('success')); ?></span>
        </div>
    <?php endif; ?>

    
    <div id="rejectModal" class="fixed inset-0 z-50 hidden items-center justify-center bg-black bg-opacity-50">
        <div class="bg-white rounded-xl shadow-xl w-full max-w-md mx-4">
            <div class="p-6 border-b border-gray-200">
                <h3 class="text-lg font-bold text-gray-900">Tolak Pendaftaran Santri</h3>
                <p class="text-sm text-gray-500 mt-1">Masukkan alasan penolakan untuk santri ini.</p>
            </div>
            <form id="rejectForm" method="POST">
                <?php echo csrf_field(); ?>
                <div class="p-6">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Alasan Penolakan <span
                            class="text-red-500">*</span></label>
                    <textarea name="alasan_penolakan" rows="4" required minlength="10"
                        class="w-full border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:border-indigo-500 resize-none"
                        placeholder="Tuliskan alasan penolakan..."></textarea>
                </div>
                <div class="p-6 border-t border-gray-200 flex justify-end gap-3">
                    <button type="button" onclick="closeRejectModal()"
                        class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-100 hover:bg-gray-200 rounded-lg transition">
                        Batal
                    </button>
                    <button type="submit"
                        class="px-4 py-2 text-sm font-medium text-white bg-red-600 hover:bg-red-700 rounded-lg transition">
                        <i class="fas fa-times mr-1"></i> Tolak Santri
                    </button>
                </div>
            </form>
        </div>
    </div>

    
    <div id="acceptModal" class="fixed inset-0 z-50 hidden items-center justify-center bg-black bg-opacity-50">
        <div class="bg-white rounded-xl shadow-xl w-full max-w-md mx-4">
            <div class="p-6 border-b border-gray-200">
                <h3 class="text-lg font-bold text-gray-900">Terima Santri</h3>
                <p class="text-sm text-gray-500 mt-1">Yakin ingin menerima pendaftaran santri ini?</p>
            </div>

            <form id="acceptForm" method="POST">
                <?php echo csrf_field(); ?>
                <div class="p-6 border-t border-gray-200 flex justify-end gap-3">
                    <button type="button" onclick="closeAcceptModal()"
                        class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-100 hover:bg-gray-200 rounded-lg transition">
                        Batal
                    </button>

                    <button type="submit"
                        class="px-4 py-2 text-sm font-medium text-white bg-green-600 hover:bg-green-700 rounded-lg transition">
                        <i class="fas fa-check mr-1"></i> Terima
                    </button>
                </div>
            </form>
        </div>
    </div>

    

    <div id="deleteModal" class="fixed inset-0 z-50 hidden items-center justify-center bg-black bg-opacity-50">
        <div class="bg-white rounded-xl shadow-xl w-full max-w-md mx-4">

            <div class="p-6 border-b border-gray-200">
                <h3 class="text-lg font-bold text-gray-900">Hapus Data</h3>
                <p class="text-sm text-gray-500 mt-1">
                    Yakin ingin menghapus data ini? Tindakan ini tidak bisa dibatalkan.
                </p>
            </div>

            <div class="p-6 border-t border-gray-200 flex justify-end gap-3">
                <button type="button" onclick="closeDeleteModal()"
                    class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-100 hover:bg-gray-200 rounded-lg transition">
                    Batal
                </button>

                <button type="button" onclick="submitDelete()"
                    class="px-4 py-2 text-sm font-medium text-white bg-red-600 hover:bg-red-700 rounded-lg transition">
                    <i class="fas fa-trash mr-1"></i> Hapus
                </button>
            </div>
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
                        class="border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-indigo-500 text-sm">
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
                        <th class="px-4 py-3 text-left w-10">
                            <input type="checkbox" class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                        </th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Nama
                            Lengkap</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">NISN
                        </th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Asal
                            Sekolah</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">No.
                            Wali</th>
                        <th class="px-4 py-3 text-center text-xs font-semibold text-gray-500 uppercase tracking-wider">
                            Dokumen</th>
                        <th class="px-4 py-3 text-center text-xs font-semibold text-gray-500 uppercase tracking-wider">
                            Status</th>
                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Tanggal
                        </th>
                        <th class="px-4 py-3 text-center text-xs font-semibold text-gray-500 uppercase tracking-wider">Aksi
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200" id="santriTable">
                    <?php $__empty_1 = true; $__currentLoopData = $santri; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-4 py-4">
                                <input type="checkbox"
                                    class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                            </td>

                            
                            <td class="px-4 py-4">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="w-9 h-9 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-700 font-bold text-sm shrink-0">
                                        <?php echo e(strtoupper(substr($item->nama_lengkap, 0, 2))); ?>

                                    </div>
                                    <div>
                                        <p class="text-sm font-semibold text-gray-900 leading-tight">
                                            <?php echo e($item->nama_lengkap); ?>

                                        </p>
                                        <p class="text-xs text-gray-400 mt-0.5"><?php echo e($item->email ?? '-'); ?></p>
                                    </div>
                                </div>
                            </td>

                            
                            <td class="px-4 py-4 text-sm text-gray-600"><?php echo e($item->nisn ?? '-'); ?></td>

                            
                            <td class="px-4 py-4 text-sm text-gray-600"><?php echo e($item->asal_sekolah); ?></td>

                            
                            <td class="px-4 py-4 text-sm text-gray-600"><?php echo e($item->no_wali); ?></td>

                            
                            <td class="px-4 py-4">
                                <div class="flex items-center justify-center gap-1.5">
                                    
                                    <?php if($item->kk): ?>
                                        <a href="<?php echo e(asset('storage/' . $item->kk)); ?>" target="_blank"
                                            title="Kartu Keluarga"
                                            class="inline-flex items-center gap-1 px-2 py-1 rounded-md bg-green-50 text-green-700 text-xs font-medium border border-green-200 hover:bg-green-100 transition">
                                            <i class="fas fa-file-alt text-xs"></i> KK
                                        </a>
                                    <?php else: ?>
                                        <span title="KK belum diupload"
                                            class="inline-flex items-center gap-1 px-2 py-1 rounded-md bg-gray-100 text-gray-400 text-xs font-medium border border-gray-200">
                                            <i class="fas fa-file-alt text-xs"></i> KK
                                        </span>
                                    <?php endif; ?>

                                    
                                    <?php if($item->foto): ?>
                                        <a href="<?php echo e(asset('storage/' . $item->foto)); ?>" target="_blank"
                                            title="Foto/ Akta Kelahiran"
                                            class="inline-flex items-center gap-1 px-2 py-1 rounded-md bg-green-50 text-green-700 text-xs font-medium border border-green-200 hover:bg-green-100 transition">
                                            <i class="fas fa-file-alt text-xs"></i> Foto
                                        </a>
                                    <?php else: ?>
                                        <span title="Foto belum diupload"
                                            class="inline-flex items-center gap-1 px-2 py-1 rounded-md bg-gray-100 text-gray-400 text-xs font-medium border border-gray-200">
                                            <i class="fas fa-file-alt text-xs"></i> Foto
                                        </span>
                                    <?php endif; ?>
                                </div>
                            </td>

                            
                            <td class="px-4 py-4 text-center">
                                <?php if($item->status == 'pending'): ?>
                                    <span
                                        class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                        <span class="w-1.5 h-1.5 rounded-full bg-yellow-500 mr-1.5"></span>Pending
                                    </span>
                                <?php elseif($item->status == 'diterima'): ?>
                                    <span
                                        class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                        <span class="w-1.5 h-1.5 rounded-full bg-green-500 mr-1.5"></span>Diterima
                                    </span>
                                <?php else: ?>
                                    <span
                                        class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                        <span class="w-1.5 h-1.5 rounded-full bg-red-500 mr-1.5"></span>Ditolak
                                    </span>
                                <?php endif; ?>
                            </td>

                            
                            <td class="px-4 py-4 text-sm text-gray-500 whitespace-nowrap">
                                <?php echo e($item->created_at->format('d M Y')); ?>

                            </td>

                            
                            <td class="px-4 py-4">
                                <div class="flex items-center justify-center gap-1">

                                    
                                    <a href="<?php echo e(route('admin.santri.show', $item->id)); ?>"
                                        class="p-1.5 rounded-lg text-indigo-600 hover:bg-indigo-50 transition"
                                        title="Lihat Detail">
                                        <i class="fas fa-eye text-sm"></i>
                                    </a>

                                    
                                    <a href="<?php echo e(route('admin.santri.edit', $item->id)); ?>"
                                        class="p-1.5 rounded-lg text-blue-600 hover:bg-blue-50 transition" title="Edit">
                                        <i class="fas fa-edit text-sm"></i>
                                    </a>

                                    
                                    <?php if($item->status != 'diterima'): ?>
                                        <button type="button" onclick="openAcceptModal(<?php echo e($item->id); ?>)"
                                            class="p-1.5 rounded-lg text-green-600 hover:bg-green-50 transition"
                                            title="Terima">
                                            <i class="fas fa-check text-sm"></i>
                                        </button>
                                    <?php endif; ?>

                                    
                                    <?php if($item->status != 'ditolak'): ?>
                                        <button type="button" onclick="openRejectModal(<?php echo e($item->id); ?>)"
                                            class="p-1.5 rounded-lg text-orange-500 hover:bg-orange-50 transition"
                                            title="Tolak">
                                            <i class="fas fa-times text-sm"></i>
                                        </button>
                                    <?php endif; ?>

                                    
                                    <form id="deleteForm-<?php echo e($item->id); ?>"
                                        action="<?php echo e(route('admin.santri.destroy', $item->id)); ?>" method="POST"
                                        class="inline">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="button" onclick="openDeleteModal(<?php echo e($item->id); ?>)"
                                            class="p-1.5 rounded-lg text-red-600 hover:bg-red-50 transition"
                                            title="Hapus">
                                            <i class="fas fa-trash text-sm"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="9" class="px-6 py-12 text-center">
                                <i class="fas fa-inbox text-4xl text-gray-300 mb-3 block"></i>
                                <p class="text-gray-500 font-medium">Belum ada data santri</p>
                                <p class="text-gray-400 text-sm mt-1">Tambahkan data santri baru untuk memulai</p>
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
        document.getElementById('searchInput').addEventListener('keyup', function() {
            const term = this.value.toLowerCase();
            document.querySelectorAll('#santriTable tr').forEach(row => {
                row.style.display = row.textContent.toLowerCase().includes(term) ? '' : 'none';
            });
        });

        document.getElementById('statusFilter').addEventListener('change', function() {
            const status = this.value.toLowerCase();
            document.querySelectorAll('#santriTable tr').forEach(row => {
                if (!status) {
                    row.style.display = '';
                    return;
                }
                const badge = row.querySelector('span[class*="rounded-full"]');
                if (badge) {
                    row.style.display = badge.textContent.trim().toLowerCase() === status ? '' : 'none';
                }
            });
        });

        function openAcceptModal(id) {
            const form = document.getElementById('acceptForm');
            form.action = `/admin/santri/${id}/verify`;

            document.getElementById('acceptModal').classList.remove('hidden');
            document.getElementById('acceptModal').classList.add('flex');
        }

        function closeAcceptModal() {
            document.getElementById('acceptModal').classList.add('hidden');
            document.getElementById('acceptModal').classList.remove('flex');
        }

        document.getElementById('acceptModal').addEventListener('click', function(e) {
            if (e.target === this) closeAcceptModal();
        });

        function openRejectModal(id) {
            const form = document.getElementById('rejectForm');
            form.action = `/admin/santri/${id}/reject`;
            document.getElementById('rejectModal').classList.remove('hidden');
            document.getElementById('rejectModal').classList.add('flex');
        }

        function closeRejectModal() {
            document.getElementById('rejectModal').classList.add('hidden');
            document.getElementById('rejectModal').classList.remove('flex');
        }

        document.getElementById('rejectModal').addEventListener('click', function(e) {
            if (e.target === this) closeRejectModal();
        });

        let deleteId = null;

        function openDeleteModal(id) {
            deleteId = id;

            const modal = document.getElementById('deleteModal');
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }

        function closeDeleteModal() {
            const modal = document.getElementById('deleteModal');
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        }

        function submitDelete() {
            if (deleteId) {
                document.getElementById('deleteForm-' + deleteId).submit();
            }
        }

        // klik luar modal = close
        document.getElementById('deleteModal').addEventListener('click', function(e) {
            if (e.target === this) closeDeleteModal();
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\ponpes-main\resources\views/admin/santri/index.blade.php ENDPATH**/ ?>