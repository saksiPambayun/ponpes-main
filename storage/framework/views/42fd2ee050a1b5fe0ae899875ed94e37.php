<?php $__env->startSection('title', 'Data Pegawai'); ?>
<?php $__env->startSection('page-title', 'Manajemen Data Pegawai'); ?>

<?php $__env->startSection('content'); ?>
    <div class="max-w-7xl mx-auto">

        
        <?php if(session('success')): ?>
            <div
                class="mb-4 flex items-center gap-3 bg-green-50 border border-green-200 text-green-800 px-5 py-4 rounded-xl shadow-sm">
                <i class="fas fa-check-circle text-green-500 text-lg"></i>
                <span class="text-sm font-medium"><?php echo e(session('success')); ?></span>
            </div>
        <?php endif; ?>

        
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-6">
            <div class="bg-white rounded-xl shadow-sm p-5 border-l-4 border-indigo-500">
                <p class="text-xs text-gray-500 mb-1">Total Pegawai</p>
                <h3 class="text-2xl font-bold text-gray-800"><?php echo e($totalPegawai); ?></h3>
                <div class="mt-2 w-8 h-8 bg-indigo-100 rounded-lg flex items-center justify-center">
                    <i class="fas fa-users text-indigo-600 text-sm"></i>
                </div>
            </div>
            <div class="bg-white rounded-xl shadow-sm p-5 border-l-4 border-green-500">
                <p class="text-xs text-gray-500 mb-1">Aktif</p>
                <h3 class="text-2xl font-bold text-gray-800"><?php echo e($pegawaiAktif); ?></h3>
                <div class="mt-2 w-8 h-8 bg-green-100 rounded-lg flex items-center justify-center">
                    <i class="fas fa-user-check text-green-600 text-sm"></i>
                </div>
            </div>
            <div class="bg-white rounded-xl shadow-sm p-5 border-l-4 border-yellow-500">
                <p class="text-xs text-gray-500 mb-1">Cuti</p>
                <h3 class="text-2xl font-bold text-gray-800"><?php echo e($pegawaiCuti); ?></h3>
                <div class="mt-2 w-8 h-8 bg-yellow-100 rounded-lg flex items-center justify-center">
                    <i class="fas fa-clock text-yellow-600 text-sm"></i>
                </div>
            </div>
            <div class="bg-white rounded-xl shadow-sm p-5 border-l-4 border-red-500">
                <p class="text-xs text-gray-500 mb-1">Non-Aktif</p>
                <h3 class="text-2xl font-bold text-gray-800"><?php echo e($pegawaiNonaktif); ?></h3>
                <div class="mt-2 w-8 h-8 bg-red-100 rounded-lg flex items-center justify-center">
                    <i class="fas fa-user-minus text-red-600 text-sm"></i>
                </div>
            </div>
        </div>

        
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-4">
            <div>
                <h2 class="text-xl font-bold text-gray-800">Data Pegawai</h2>
                <p class="text-xs text-gray-500 mt-0.5">Kelola data pegawai yayasan</p>
            </div>
            <a href="<?php echo e(route('admin.pegawai.create')); ?>"
                class="inline-flex items-center gap-2 bg-gradient-to-r from-indigo-600 to-purple-600 text-white px-5 py-2.5 rounded-lg hover:from-indigo-700 hover:to-purple-700 transition shadow-md text-sm font-medium">
                <i class="fas fa-plus-circle"></i>
                Tambah Pegawai
            </a>
        </div>

        
        <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden">

            
            <form method="GET" action="<?php echo e(route('admin.pegawai.index')); ?>" class="p-4 border-b border-gray-200 bg-gray-50">
                <div class="flex flex-col md:flex-row gap-3">
                    <div class="flex-1 relative">
                        <i class="fas fa-search absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-sm"></i>
                        <input type="text" name="search" value="<?php echo e(request('search')); ?>"
                            placeholder="Cari nama, NIP, atau jabatan..."
                            class="w-full pl-9 pr-4 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-indigo-200 focus:border-indigo-500 transition">
                    </div>
                    <select name="status"
                        class="px-4 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-indigo-200 focus:border-indigo-500 bg-white">
                        <option value="">Semua Status</option>
                        <option value="aktif" <?php echo e(request('status') == 'aktif' ? 'selected' : ''); ?>>Aktif</option>
                        <option value="cuti" <?php echo e(request('status') == 'cuti' ? 'selected' : ''); ?>>Cuti</option>
                        <option value="nonaktif" <?php echo e(request('status') == 'nonaktif' ? 'selected' : ''); ?>>Non-Aktif</option>
                    </select>
                    <button type="submit"
                        class="px-5 py-2 bg-indigo-600 text-white rounded-lg text-sm hover:bg-indigo-700 transition font-medium">
                        <i class="fas fa-filter mr-1"></i> Filter
                    </button>
                    <?php if(request('search') || request('status')): ?>
                        <a href="<?php echo e(route('admin.pegawai.index')); ?>"
                            class="px-4 py-2 border border-gray-300 rounded-lg text-sm text-gray-600 hover:bg-gray-100 transition">
                            <i class="fas fa-times mr-1"></i> Reset
                        </a>
                    <?php endif; ?>
                </div>
            </form>

            
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="bg-gradient-to-r from-indigo-50 to-purple-50 border-b-2 border-indigo-100">
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">No
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">NIP
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Nama Pegawai</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Jabatan</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Tipe</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Status</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        <?php $__empty_1 = true; $__currentLoopData = $pegawai; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr class="hover:bg-indigo-50/30 transition group">
                                <td class="px-6 py-4 text-sm text-gray-500">
                                    <?php echo e($pegawai->firstItem() + $index); ?>

                                </td>
                                <td class="px-6 py-4">
                                    <span
                                        class="text-sm font-mono text-gray-700 bg-gray-100 px-2 py-0.5 rounded"><?php echo e($p->nip ?? '-'); ?></span>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <div
                                            class="w-9 h-9 rounded-full bg-gradient-to-br from-indigo-500 to-purple-600 flex items-center justify-center text-white text-xs font-bold shrink-0">
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
                                    <?php
                                        $tipeColor = [
                                            'tetap' => 'bg-blue-100 text-blue-700',
                                            'kontrak' => 'bg-orange-100 text-orange-700',
                                            'magang' => 'bg-purple-100 text-purple-700',
                                            'honorer' => 'bg-teal-100 text-teal-700',
                                        ][$p->tipe_pegawai ?? ''] ?? 'bg-gray-100 text-gray-700';
                                    ?>
                                    <span
                                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium <?php echo e($tipeColor); ?>">
                                        <?php echo e(ucfirst($p->tipe_pegawai ?? '-')); ?>

                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    <?php if($p->status == 'aktif'): ?>
                                        <span
                                            class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                            <span class="w-1.5 h-1.5 rounded-full bg-green-500 animate-pulse"></span> Aktif
                                        </span>
                                    <?php elseif($p->status == 'cuti'): ?>
                                        <span
                                            class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                            <span class="w-1.5 h-1.5 rounded-full bg-yellow-500"></span> Cuti
                                        </span>
                                    <?php else: ?>
                                        <span
                                            class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                            <span class="w-1.5 h-1.5 rounded-full bg-red-500"></span> Non-Aktif
                                        </span>
                                    <?php endif; ?>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-1">
                                        <a href="<?php echo e(route('admin.pegawai.show', $p->id)); ?>"
                                            class="p-2 text-blue-600 hover:bg-blue-50 rounded-lg transition"
                                            title="Lihat Detail">
                                            <i class="fas fa-eye text-sm"></i>
                                        </a>
                                        <a href="<?php echo e(route('admin.pegawai.edit', $p->id)); ?>"
                                            class="p-2 text-amber-600 hover:bg-amber-50 rounded-lg transition"
                                            title="Edit Data">
                                            <i class="fas fa-edit text-sm"></i>
                                        </a>
                                        
                                        <form action="<?php echo e(route('admin.pegawai.destroy', $p->id)); ?>" method="POST" class="inline"
                                            onsubmit="return confirm('Hapus data pegawai <?php echo e(addslashes($p->nama)); ?>?')">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" class="p-2 text-red-600 hover:bg-red-50 rounded-lg transition"
                                                title="Hapus">
                                                <i class="fas fa-trash text-sm"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="7" class="px-6 py-20 text-center">
                                    <div class="flex flex-col items-center">
                                        <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mb-4">
                                            <i class="fas fa-users text-gray-300 text-3xl"></i>
                                        </div>
                                        <h3 class="text-base font-medium text-gray-600 mb-1">Tidak ada data pegawai</h3>
                                        <p class="text-sm text-gray-400 mb-4">
                                            <?php if(request('search') || request('status')): ?>
                                                Tidak ditemukan hasil yang cocok dengan filter.
                                            <?php else: ?>
                                                Mulai tambahkan data pegawai baru.
                                            <?php endif; ?>
                                        </p>
                                        <a href="<?php echo e(route('admin.pegawai.create')); ?>"
                                            class="bg-indigo-600 text-white px-5 py-2 rounded-lg hover:bg-indigo-700 transition text-sm inline-flex items-center gap-2">
                                            <i class="fas fa-plus-circle"></i> Tambah Pegawai
                                        </a>
                                    </div>
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
<?php echo $__env->make('admin.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\ponpes-main\resources\views/admin/pegawai/index.blade.php ENDPATH**/ ?>