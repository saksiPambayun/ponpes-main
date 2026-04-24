<div class="card overflow-hidden">
    <div class="p-6 border-b border-gray-200">
        <div class="flex flex-col md:flex-row gap-4">
            <div class="flex-1">
                <div class="relative">
                    <input type="text" id="searchDiterima" placeholder="Cari nama santri..."
                        class="input-field w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg">
                    <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-4 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Nama</th>
                    <th class="px-4 py-3 text-left text-xs font-semibold text-gray-500 uppercase">NISN</th>
                    <th class="px-4 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Asal Sekolah</th>
                    <th class="px-4 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Gelombang</th>
                    <th class="px-4 py-3 text-left text-xs font-semibold text-gray-500 uppercase">No. Wali</th>
                    <th class="px-4 py-3 text-center text-xs font-semibold text-gray-500 uppercase">Dokumen</th>
                    <th class="px-4 py-3 text-center text-xs font-semibold text-gray-500 uppercase">Tgl Verifikasi</th>
                    <th class="px-4 py-3 text-center text-xs font-semibold text-gray-500 uppercase">Aksi</th>
                </tr>
            </thead>
            <tbody id="tableDiterima">
                <?php $__empty_1 = true; $__currentLoopData = $santri; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-4">
                            <div class="flex items-center gap-3">
                                <div
                                    class="w-9 h-9 rounded-full bg-green-100 flex items-center justify-center text-green-700 font-bold text-sm">
                                    <?php echo e(strtoupper(substr($item->nama_lengkap, 0, 2))); ?>

                                </div>
                                <div>
                                    <p class="text-sm font-semibold text-gray-900"><?php echo e($item->nama_lengkap); ?></p>
                                    <p class="text-xs text-gray-400"><?php echo e($item->email ?? '-'); ?></p>
                                </div>
                            </div>
                        </td>
                        <td class="px-4 py-4 text-sm text-gray-600"><?php echo e($item->nisn ?? '-'); ?></td>
                        <td class="px-4 py-4 text-sm text-gray-600"><?php echo e($item->asal_sekolah); ?></td>
                        <td class="px-4 py-4">
                            <span
                                class="px-2 py-1 bg-blue-100 text-blue-800 rounded-full text-xs"><?php echo e($item->wave->name ?? '-'); ?></span>
                        </td>
                        <td class="px-4 py-4 text-sm text-gray-600"><?php echo e($item->no_wali); ?></td>
                        <td class="px-4 py-4">
                            <div class="flex items-center justify-center gap-1.5">
                                <?php if($item->kk): ?>
                                    <a href="<?php echo e(asset('storage/' . $item->kk)); ?>" target="_blank"
                                        class="px-2 py-1 rounded-md bg-green-50 text-green-700 text-xs">
                                        <i class="fas fa-file-alt mr-1"></i>KK
                                    </a>
                                <?php endif; ?>
                                <?php if($item->foto): ?>
                                    <a href="<?php echo e(asset('storage/' . $item->foto)); ?>" target="_blank"
                                        class="px-2 py-1 rounded-md bg-green-50 text-green-700 text-xs">
                                        <i class="fas fa-camera mr-1"></i>Foto
                                    </a>
                                <?php endif; ?>
                            </div>
                        </td>
                        <td class="px-4 py-4 text-center">
                            <span
                                class="text-xs text-gray-500"><?php echo e($item->tanggal_verifikasi ? \Carbon\Carbon::parse($item->tanggal_verifikasi)->format('d/m/Y') : '-'); ?></span>
                        </td>
                        <td class="px-4 py-4">
                            <div class="flex items-center justify-center gap-1">
                                <a href="<?php echo e(route('admin.santri.show', $item->id)); ?>"
                                    class="p-1.5 rounded-lg text-blue-600 hover:bg-blue-50" title="Detail">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="<?php echo e(route('admin.santri.edit', $item->id)); ?>"
                                    class="p-1.5 rounded-lg text-green-600 hover:bg-green-50" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form id="deleteForm<?php echo e($item->id); ?>" action="<?php echo e(route('admin.santri.destroy', $item->id)); ?>"
                                    method="POST" class="inline">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="button"
                                        onclick="openDeleteModal(<?php echo e($item->id); ?>, '<?php echo e(addslashes($item->nama_lengkap)); ?>')"
                                        class="p-1.5 rounded-lg text-red-600 hover:bg-red-50" title="Hapus">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="8" class="px-6 py-12 text-center">
                            <i class="fas fa-user-check text-4xl text-gray-300 mb-3 block"></i>
                            <p class="text-gray-500 font-medium">Belum ada santri yang diterima</p>
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

<script>
    document.getElementById('searchDiterima')?.addEventListener('keyup', function () {
        const term = this.value.toLowerCase();
        document.querySelectorAll('#tableDiterima tr').forEach(row => {
            if (row.cells && row.cells.length > 0) {
                row.style.display = row.textContent.toLowerCase().includes(term) ? '' : 'none';
            }
        });
    });
</script>
<?php /**PATH D:\ponpes-main\resources\views/admin/santri/partials/table-diterima.blade.php ENDPATH**/ ?>