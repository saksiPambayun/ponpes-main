<?php $__env->startSection('title', 'Data Pegawai'); ?>
<?php $__env->startSection('page-title', 'Manajemen Data Pegawai'); ?>

<?php $__env->startSection('content'); ?>
    <div class="max-w-7xl mx-auto">

        
        <?php if(session('success')): ?>
            <div
                class="mb-4 flex items-center gap-3 bg-[#eef3ec] border border-[#b7d3a8] text-[#0d4f14] px-5 py-4 rounded-xl shadow-sm">
                <i class="fas fa-check-circle text-[#4ca94d] text-lg"></i>
                <span class="text-sm font-medium"><?php echo e(session('success')); ?></span>
            </div>
        <?php endif; ?>

        
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-6">
            <div class="bg-white rounded-xl shadow-sm p-5 border-l-4 border-[#005F02]">
                <p class="text-xs text-gray-500 mb-1">Total Pegawai</p>
                <h3 class="text-2xl font-bold text-gray-800"><?php echo e($totalPegawai); ?></h3>
                <div class="mt-2 w-8 h-8 bg-[#eef3ec] rounded-lg flex items-center justify-center">
                    <i class="fas fa-users text-[#005F02] text-sm"></i>
                </div>
            </div>
            <div class="bg-white rounded-xl shadow-sm p-5 border-l-4 border-[#4ca94d]">
                <p class="text-xs text-gray-500 mb-1">Aktif</p>
                <h3 class="text-2xl font-bold text-gray-800"><?php echo e($pegawaiAktif); ?></h3>
                <div class="mt-2 w-8 h-8 bg-[#dbe6d4] rounded-lg flex items-center justify-center">
                    <i class="fas fa-user-check text-[#4ca94d] text-sm"></i>
                </div>
            </div>
            <div class="bg-white rounded-xl shadow-sm p-5 border-l-4 border-[#8cbf73]">
                <p class="text-xs text-gray-500 mb-1">Cuti</p>
                <h3 class="text-2xl font-bold text-gray-800"><?php echo e($pegawaiCuti); ?></h3>
                <div class="mt-2 w-8 h-8 bg-[#f2f4ef] rounded-lg flex items-center justify-center">
                    <i class="fas fa-clock text-[#8cbf73] text-sm"></i>
                </div>
            </div>
            <div class="bg-white rounded-xl shadow-sm p-5 border-l-4 border-[#0d4f14]">
                <p class="text-xs text-gray-500 mb-1">Non-Aktif</p>
                <h3 class="text-2xl font-bold text-gray-800"><?php echo e($pegawaiNonaktif); ?></h3>
                <div class="mt-2 w-8 h-8 bg-[#eef3ec] rounded-lg flex items-center justify-center">
                    <i class="fas fa-user-minus text-[#0d4f14] text-sm"></i>
                </div>
            </div>
        </div>

        
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-4">
            <div>
                <h2 class="text-xl font-bold text-gray-800">Data Pegawai</h2>
                <p class="text-xs text-gray-500 mt-0.5">Kelola data pegawai yayasan</p>
            </div>
            <a href="<?php echo e(route('admin.pegawai.create')); ?>"
                class="inline-flex items-center gap-2 bg-gradient-to-r from-[#005F02] to-[#4ca94d] text-white px-5 py-2.5 rounded-lg hover:from-[#0d4f14] hover:to-[#8cbf73] transition shadow-md text-sm font-medium">
                <i class="fas fa-plus-circle"></i>
                Tambah Pegawai
            </a>
        </div>

        
        <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden">

            
            <form method="GET" action="<?php echo e(route('admin.pegawai.index')); ?>"
                class="p-4 border-b border-gray-200 bg-[#f2f4ef]">
                <div class="flex flex-col md:flex-row gap-3">
                    <div class="flex-1 relative">
                        <i class="fas fa-search absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-sm"></i>
                        <input type="text" name="search" value="<?php echo e(request('search')); ?>"
                            placeholder="Cari nama, NIP, atau jabatan..."
                            class="w-full pl-9 pr-4 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-[#8cbf73] focus:border-[#4ca94d] transition">
                    </div>
                    <select name="status"
                        class="px-4 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-[#8cbf73] focus:border-[#4ca94d] bg-white">
                        <option value="">Semua Status</option>
                        <option value="aktif" <?php echo e(request('status') == 'aktif' ? 'selected' : ''); ?>>Aktif</option>
                        <option value="cuti" <?php echo e(request('status') == 'cuti' ? 'selected' : ''); ?>>Cuti</option>
                        <option value="nonaktif" <?php echo e(request('status') == 'nonaktif' ? 'selected' : ''); ?>>Non-Aktif</option>
                    </select>
                    <button type="submit"
                        class="px-5 py-2 bg-[#005F02] text-white rounded-lg text-sm hover:bg-[#0d4f14] transition font-medium">
                        <i class="fas fa-filter mr-1"></i> Filter
                    </button>
                    <?php if(request('search') || request('status')): ?>
                        <a href="<?php echo e(route('admin.pegawai.index')); ?>"
                            class="px-4 py-2 border border-gray-300 rounded-lg text-sm text-gray-600 hover:bg-[#eef3ec] transition">
                            <i class="fas fa-times mr-1"></i> Reset
                        </a>
                    <?php endif; ?>
                </div>
            </form>

            
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="bg-gradient-to-r from-[#eef3ec] to-[#dbe6d4] border-b-2 border-[#b7d3a8]">
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase">No</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase">NIP</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase">Nama Pegawai</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase">Jabatan</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase">Tipe</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase">Status</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        <?php $__empty_1 = true; $__currentLoopData = $pegawai; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr class="hover:bg-[#eef3ec] transition group">
                                <td class="px-6 py-4 text-sm text-gray-500">
                                    <?php echo e($pegawai->firstItem() + $index); ?>

                                </td>
                                <td class="px-6 py-4">
                                    <span class="text-sm font-mono text-gray-700 bg-[#f2f4ef] px-2 py-0.5 rounded">
                                        <?php echo e($p->nip ?? '-'); ?>

                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <div
                                            class="w-9 h-9 rounded-full bg-gradient-to-br from-[#005F02] to-[#4ca94d] flex items-center justify-center text-white text-xs font-bold">
                                            <?php echo e(strtoupper(substr($p->nama, 0, 2))); ?>

                                        </div>
                                        <div>
                                            <p class="font-medium text-gray-900 text-sm"><?php echo e($p->nama); ?></p>
                                            <p class="text-xs text-gray-400"><?php echo e($p->email ?? '-'); ?></p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-700"><?php echo e($p->jabatan ?? '-'); ?></td>

                                <td class="px-6 py-4">
                                    <span
                                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-[#eef3ec] text-[#0d4f14]">
                                        <?php echo e(ucfirst($p->tipe_pegawai ?? '-')); ?>

                                    </span>
                                </td>

                                <td class="px-6 py-4">
                                    <?php if($p->status == 'aktif'): ?>
                                        <span
                                            class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-medium bg-[#dbe6d4] text-[#0d4f14]">
                                            <span class="w-1.5 h-1.5 rounded-full bg-[#4ca94d]"></span> Aktif
                                        </span>
                                    <?php elseif($p->status == 'cuti'): ?>
                                        <span
                                            class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-medium bg-[#f2f4ef] text-[#2e6b37]">
                                            <span class="w-1.5 h-1.5 rounded-full bg-[#8cbf73]"></span> Cuti
                                        </span>
                                    <?php else: ?>
                                        <span
                                            class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-medium bg-[#eef3ec] text-[#0d4f14]">
                                            <span class="w-1.5 h-1.5 rounded-full bg-[#0d4f14]"></span> Non-Aktif
                                        </span>
                                    <?php endif; ?>
                                </td>

                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-1">
                                        <a href="<?php echo e(route('admin.pegawai.show', $p->id)); ?>"
                                            class="p-2 text-[#005F02] hover:bg-[#eef3ec] rounded-lg transition">
                                            <i class="fas fa-eye text-sm"></i>
                                        </a>
                                        <a href="<?php echo e(route('admin.pegawai.edit', $p->id)); ?>"
                                            class="p-2 text-[#4ca94d] hover:bg-[#dbe6d4] rounded-lg transition">
                                            <i class="fas fa-edit text-sm"></i>
                                        </a>
                                        <form action="<?php echo e(route('admin.pegawai.destroy', $p->id)); ?>" method="POST"
                                            class="inline">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit"
                                                class="p-2 text-[#0d4f14] hover:bg-[#eef3ec] rounded-lg transition">
                                                <i class="fas fa-trash text-sm"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="7" class="px-6 py-20 text-center">
                                    <h3 class="text-base font-medium text-gray-600 mb-1">Tidak ada data pegawai</h3>
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

            
            <?php if($pegawai->hasPages()): ?>
                <div
                    class="px-6 py-4 border-t border-gray-100 bg-gray-50 flex flex-col md:flex-row md:items-center md:justify-between gap-3">
                    <p class="text-xs text-gray-500">
                        Menampilkan <span class="font-medium text-gray-700"><?php echo e($pegawai->firstItem()); ?></span>–<span
                            class="font-medium text-gray-700"><?php echo e($pegawai->lastItem()); ?></span>
                        dari <span class="font-medium text-gray-700"><?php echo e($pegawai->total()); ?></span> data
                    </p>
                    <?php echo e($pegawai->links('pagination::tailwind')); ?>

                </div>
            <?php endif; ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\ponpes-main\resources\views/admin/pegawai/index.blade.php ENDPATH**/ ?>