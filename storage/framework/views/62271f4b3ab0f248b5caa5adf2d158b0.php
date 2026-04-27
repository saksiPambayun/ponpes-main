<?php $__env->startSection('title', 'Data Santri'); ?>
<?php $__env->startSection('page-title', 'Data Santri'); ?>

<?php $__env->startSection('content'); ?>
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 gap-4">
        <div>
            <h3 class="text-xl font-bold text-gray-900">Data Santri</h3>
            <p class="text-gray-500 text-sm mt-1">Kelola data santri dan pendaftaran</p>
        </div>
        <div class="flex space-x-3">
            <a href="<?php echo e(route('admin.santri.create')); ?>"
                class="btn-primary px-6 py-2 rounded-lg text-white font-medium inline-flex items-center">
                <i class="fas fa-plus mr-2"></i>Tambah Data
            </a>
        </div>
    </div>

    
    <div class="mb-6 border-b border-gray-200">
        <ul class="flex flex-wrap -mb-px">
            <li class="mr-2">
                <button onclick="showTab('pendaftar')" id="tab-pendaftar-btn"
                    class="tab-btn inline-block py-2 px-4 text-sm font-medium text-center border-b-2 rounded-t-lg active">
                    <i class="fas fa-user-plus mr-1"></i> Pendaftar
                    <span
                        class="bg-yellow-100 text-yellow-800 text-xs px-2 py-0.5 rounded-full ml-1"><?php echo e($stats['pending'] ?? 0); ?></span>
                </button>
            </li>
            <li class="mr-2">
                <button onclick="showTab('diterima')" id="tab-diterima-btn"
                    class="tab-btn inline-block py-2 px-4 text-sm font-medium text-center border-b-2 rounded-t-lg">
                    <i class="fas fa-user-check mr-1"></i> Santri Diterima
                    <span
                        class="bg-green-100 text-green-800 text-xs px-2 py-0.5 rounded-full ml-1"><?php echo e($stats['diterima'] ?? 0); ?></span>
                </button>
            </li>
            <li class="mr-2">
                <button onclick="showTab('ditolak')" id="tab-ditolak-btn"
                    class="tab-btn inline-block py-2 px-4 text-sm font-medium text-center border-b-2 rounded-t-lg">
                    <i class="fas fa-user-times mr-1"></i> Santri Ditolak
                    <span
                        class="bg-red-100 text-red-800 text-xs px-2 py-0.5 rounded-full ml-1"><?php echo e($stats['ditolak'] ?? 0); ?></span>
                </button>
            </li>
        </ul>
    </div>

    
    <div id="tab-pendaftar" class="tab-content">
        <?php echo $__env->make('admin.santri.partials.table-pendaftar', ['santri' => $santriPending], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    </div>

    
    <div id="tab-diterima" class="tab-content hidden">
        <?php echo $__env->make('admin.santri.partials.table-diterima', ['santri' => $santriDiterima], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    </div>

    
    <div id="tab-ditolak" class="tab-content hidden">
        <?php echo $__env->make('admin.santri.partials.table-ditolak', ['santri' => $santriDitolak], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    </div>

    <script>
        function showTab(tab) {
            // Sembunyikan semua tab content
            document.querySelectorAll('.tab-content').forEach(el => el.classList.add('hidden'));

            // Tampilkan tab yang dipilih
            document.getElementById(`tab-${tab}`).classList.remove('hidden');

            // Update active state pada button
            document.querySelectorAll('.tab-btn').forEach(btn => {
                btn.classList.remove('border-green-500', 'text-green-600');
                btn.classList.add('border-transparent', 'text-gray-500');
            });

            document.getElementById(`tab-${tab}-btn`).classList.remove('border-transparent', 'text-gray-500');
            document.getElementById(`tab-${tab}-btn`).classList.add('border-green-500', 'text-green-600');
        }
    </script>

    <style>
        .tab-btn {
            transition: all 0.3s ease;
        }

        .tab-btn.active {
            border-color: #005F02;
            color: #005F02;
        }

        .hidden {
            display: none;
        }
    </style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\ponpes-main\resources\views/admin/santri/index.blade.php ENDPATH**/ ?>