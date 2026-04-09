<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('content'); ?>
    <div class="bg-white rounded-lg shadow p-6">
        <h1 class="text-2xl font-bold text-gray-800 mb-4">Dashboard User</h1>

        <div class="bg-indigo-50 border-l-4 border-indigo-500 p-4 rounded mb-6">
            <p class="text-indigo-800">Selamat datang, <strong><?php echo e($user->name); ?></strong>!</p>
            <p class="text-indigo-600 mt-1">Email: <?php echo e($user->email); ?></p>
            <p class="text-indigo-600">Status: <?php echo e(ucfirst($user->status)); ?></p>
        </div>

        <!-- Stat Cards -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
            <div class="bg-white border rounded-lg p-4 shadow-sm">
                <div class="text-yellow-500 mb-2">
                    <i class="fas fa-clock text-3xl"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-800"><?php echo e($pendingSantri); ?></h3>
                <p class="text-gray-600 text-sm">Santri Pending</p>
            </div>

            <div class="bg-white border rounded-lg p-4 shadow-sm">
                <div class="text-green-500 mb-2">
                    <i class="fas fa-check-circle text-3xl"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-800"><?php echo e($acceptedSantri); ?></h3>
                <p class="text-gray-600 text-sm">Santri Diterima</p>
            </div>

            <div class="bg-white border rounded-lg p-4 shadow-sm">
                <div class="text-red-500 mb-2">
                    <i class="fas fa-times-circle text-3xl"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-800"><?php echo e($rejectedSantri); ?></h3>
                <p class="text-gray-600 text-sm">Santri Ditolak</p>
            </div>

            <div class="bg-white border rounded-lg p-4 shadow-sm">
                <div class="text-indigo-500 mb-2">
                    <i class="fas fa-chalkboard-user text-3xl"></i>
                </div>
                <h3 class="text-2xl font-bold text-gray-800"><?php echo e(\App\Models\Program::count()); ?></h3>
                <p class="text-gray-600 text-sm">Total Program</p>
            </div>
        </div>

        <!-- Recent Santri -->
        <div class="bg-white rounded-lg shadow">
            <div class="px-6 py-4 border-b">
                <h2 class="text-lg font-semibold text-gray-800">Pendaftaran Santri Terbaru</h2>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">No</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nama Lengkap</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Asal Sekolah</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Tanggal Daftar</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        <?php $__empty_1 = true; $__currentLoopData = $recentSantri; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 text-sm text-gray-600"><?php echo e($key + 1); ?></td>
                                <td class="px-6 py-4 text-sm font-medium text-gray-800"><?php echo e($item->nama_lengkap); ?></td>
                                <td class="px-6 py-4 text-sm text-gray-600"><?php echo e($item->asal_sekolah ?? '-'); ?></td>
                                <td class="px-6 py-4 text-sm text-gray-600"><?php echo e($item->created_at->format('d/m/Y H:i')); ?></td>
                                <td class="px-6 py-4">
                                    <?php if($item->status == 'pending'): ?>
                                        <span class="px-2 py-1 text-xs rounded-full bg-yellow-100 text-yellow-800">Menunggu</span>
                                    <?php elseif($item->status == 'diterima'): ?>
                                        <span class="px-2 py-1 text-xs rounded-full bg-green-100 text-green-800">Diterima</span>
                                    <?php else: ?>
                                        <span class="px-2 py-1 text-xs rounded-full bg-red-100 text-red-800">Ditolak</span>
                                    <?php endif; ?>
                                </td>
                                <td class="px-6 py-4">
                                    <a href="<?php echo e(route('user.santri.show', $item->id)); ?>"
                                        class="text-indigo-600 hover:text-indigo-800">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="6" class="px-6 py-8 text-center text-gray-500">
                                    <i class="fas fa-inbox text-4xl mb-2 block"></i>
                                    Belum ada data pendaftaran santri
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
            <div class="px-6 py-4 border-t">
                <a href="<?php echo e(route('user.santri.index')); ?>" class="text-indigo-600 hover:text-indigo-800 text-sm">
                    Lihat Semua <i class="fas fa-arrow-right ml-1"></i>
                </a>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.user', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\ponpes-main\resources\views/user/dashboard.blade.php ENDPATH**/ ?>