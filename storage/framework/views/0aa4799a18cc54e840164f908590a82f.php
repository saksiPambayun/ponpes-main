<?php $__env->startSection('title', 'Data Program'); ?>

<?php $__env->startSection('content'); ?>
    <div class="page-wrapper" style="background: #f4f4f4; min-height: 100vh; padding: 2rem;">
        
        <div class="page-header"
            style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 2rem; flex-wrap: wrap; gap: 1rem;">
            <div class="page-header-left" style="display: flex; align-items: center; gap: 1rem;">
                <div class="page-icon"
                    style="width: 48px; height: 48px; background: linear-gradient(135deg, #005F02, #0f4d1c); border-radius: 14px; display: flex; align-items: center; justify-content: center;">
                    <i class="fas fa-calendar-alt" style="color: #fff; font-size: 1.1rem;"></i>
                </div>
                <div>
                    <h1 style="font-size: 1.35rem; font-weight: 700; color: #222; margin: 0;">Data Program</h1>
                    <p style="font-size: 0.8rem; color: #2d2d2d; margin: 0;">Kelola program kegiatan pesantren</p>
                </div>
            </div>
            <a href="<?php echo e(route('admin.program.create')); ?>" class="btn-primary-action"
                style="display: inline-flex; align-items: center; gap: 0.5rem; background: linear-gradient(135deg, #005F02, #0f4d1c); color: #fff; padding: 0.6rem 1.2rem; border-radius: 10px; text-decoration: none;">
                <i class="fas fa-plus"></i> Tambah Program
            </a>
        </div>

        
        <div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 1rem; margin-bottom: 1.5rem;">
            <div class="stats-card"
                style="background: #fff; padding: 1rem; border-radius: 16px; border-left: 4px solid #005F02; box-shadow: 0 2px 20px rgba(0,0,0,0.06);">
                <p style="font-size: 0.75rem; color: #2d2d2d; margin-bottom: 0.25rem;">Total Program</p>
                <p style="font-size: 1.5rem; font-weight: 700; margin: 0; color: #222;"><?php echo e($stats['total'] ?? 0); ?></p>
            </div>
            <div class="stats-card"
                style="background: #fff; padding: 1rem; border-radius: 16px; border-left: 4px solid #005F02; box-shadow: 0 2px 20px rgba(0,0,0,0.06);">
                <p style="font-size: 0.75rem; color: #2d2d2d; margin-bottom: 0.25rem;">Aktif</p>
                <p style="font-size: 1.5rem; font-weight: 700; color: #4ca94d; margin: 0;"><?php echo e($stats['aktif'] ?? 0); ?></p>
            </div>
            <div class="stats-card"
                style="background: #fff; padding: 1rem; border-radius: 16px; border-left: 4px solid #005F02; box-shadow: 0 2px 20px rgba(0,0,0,0.06);">
                <p style="font-size: 0.75rem; color: #2d2d2d; margin-bottom: 0.25rem;">Selesai</p>
                <p style="font-size: 1.5rem; font-weight: 700; color: #2e6b37; margin: 0;"><?php echo e($stats['selesai'] ?? 0); ?></p>
            </div>
            <div class="stats-card"
                style="background: #fff; padding: 1rem; border-radius: 16px; border-left: 4px solid #005F02; box-shadow: 0 2px 20px rgba(0,0,0,0.06);">
                <p style="font-size: 0.75rem; color: #2d2d2d; margin-bottom: 0.25rem;">Ditunda</p>
                <p style="font-size: 1.5rem; font-weight: 700; color: #0d4f14; margin: 0;"><?php echo e($stats['dinunda'] ?? 0); ?></p>
            </div>
        </div>

        
        <?php if(session('success')): ?>
            <div class="alert-success-box"
                style="display: flex; align-items: center; gap: 0.75rem; background: #eef3ec; border-left: 4px solid #005F02; padding: 0.75rem 1rem; border-radius: 10px; margin-bottom: 1rem;">
                <i class="fas fa-check-circle" style="color: #005F02;"></i>
                <span style="color: #0d4f14;"><?php echo e(session('success')); ?></span>
            </div>
        <?php endif; ?>

        
        <div
            style="background: #fff; border-radius: 20px; overflow: hidden; box-shadow: 0 2px 20px rgba(0,0,0,0.06); border: 1px solid #dfe8d8;">
            <div class="p-4 border-b border-gray-200"
                style="padding: 1rem 1.5rem; border-bottom: 1px solid #dfe8d8; background: #eef3ec;">
                <div class="flex flex-col md:flex-row gap-4">
                    <div class="flex-1">
                        <div class="relative">
                            <input type="text" id="searchInput" placeholder="Cari nama program..."
                                class="w-full pl-10 pr-4 py-2 border rounded-lg focus:outline-none"
                                style="border-color: #dfe8d8; border-radius: 10px; background: #fff;"
                                onfocus="this.style.borderColor='#005F02'; this.style.boxShadow='0 0 0 3px rgba(0,95,2,0.12)'"
                                onblur="this.style.borderColor='#dfe8d8'; this.style.boxShadow='none'">
                            <i class="fas fa-search absolute left-3 top-3 text-gray-400" style="color: #8cbf73;"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200" style="width: 100%; border-collapse: collapse;">
                    <thead class="bg-gray-50" style="background: #f4f4f4;">
                        <tr>
                            <th class="px-4 py-3 text-left text-xs font-semibold uppercase"
                                style="color: #2d2d2d; padding: 12px 16px;">Nama Program</th>
                            <th class="px-4 py-3 text-left text-xs font-semibold uppercase"
                                style="color: #2d2d2d; padding: 12px 16px;">Kategori</th>
                            <th class="px-4 py-3 text-left text-xs font-semibold uppercase"
                                style="color: #2d2d2d; padding: 12px 16px;">Tanggal Mulai</th>
                            <th class="px-4 py-3 text-left text-xs font-semibold uppercase"
                                style="color: #2d2d2d; padding: 12px 16px;">Tanggal Selesai</th>
                            <th class="px-4 py-3 text-center text-xs font-semibold uppercase"
                                style="color: #2d2d2d; padding: 12px 16px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200" id="programTable" style="border-color: #dfe8d8;">
                        <?php $__empty_1 = true; $__currentLoopData = $programs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr class="hover:bg-gray-50" style="border-bottom: 1px solid #dfe8d8;"
                                onmouseover="this.style.background='#eef3ec'" onmouseout="this.style.background='transparent'">
                                <td class="px-4 py-4" style="padding: 14px 16px;">
                                    <div class="flex items-center gap-3">
                                        <div class="w-9 h-9 rounded-full flex items-center justify-center font-bold text-sm"
                                            style="background: #eef3ec; color: #005F02;">
                                            <?php echo e(strtoupper(substr($item->nama_program, 0, 2))); ?>

                                        </div>
                                        <p class="text-sm font-semibold" style="color: #222;"><?php echo e($item->nama_program); ?></p>
                                    </div>
                                </td>
                                <td class="px-4 py-4 text-sm" style="color: #333; padding: 14px 16px;">
                                    <?php echo e($item->kategori ?? '-'); ?>

                                </td>
                                <td class="px-4 py-4 text-sm whitespace-nowrap" style="color: #333; padding: 14px 16px;">
                                    <?php echo e($item->tanggal_mulai ? \Carbon\Carbon::parse($item->tanggal_mulai)->format('d M Y') : '-'); ?>

                                </td>
                                <td class="px-4 py-4 text-sm whitespace-nowrap" style="color: #333; padding: 14px 16px;">
                                    <?php echo e($item->tanggal_selesai ? \Carbon\Carbon::parse($item->tanggal_selesai)->format('d M Y') : '-'); ?>

                                </td>
                                <td class="px-4 py-4 text-center" style="padding: 14px 16px;">
                                    <div class="flex items-center justify-center gap-1">
                                        <a href="<?php echo e(route('admin.program.show', $item->id)); ?>" class="p-1.5 rounded-lg"
                                            style="color: #005F02;" title="Detail" onmouseover="this.style.background='#eef3ec'"
                                            onmouseout="this.style.background='transparent'">
                                            <i class="fas fa-eye text-sm"></i>
                                        </a>
                                        <a href="<?php echo e(route('admin.program.edit', $item->id)); ?>" class="p-1.5 rounded-lg"
                                            style="color: #2e6b37;" title="Edit" onmouseover="this.style.background='#eef3ec'"
                                            onmouseout="this.style.background='transparent'">
                                            <i class="fas fa-edit text-sm"></i>
                                        </a>
                                        <form action="<?php echo e(route('admin.program.destroy', $item->id)); ?>" method="POST"
                                            class="inline" onsubmit="return confirm('Yakin ingin menghapus program ini?')">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" class="p-1.5 rounded-lg" style="color: #dc2626;" title="Hapus"
                                                onmouseover="this.style.background='#fef2f2'"
                                                onmouseout="this.style.background='transparent'">
                                                <i class="fas fa-trash text-sm"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="5" class="px-6 py-12 text-center">
                                    <i class="fas fa-inbox text-4xl mb-3 block" style="color: #8cbf73;"></i>
                                    <p class="font-medium" style="color: #222;">Belum ada data program</p>
                                    <p class="text-sm mt-1" style="color: #2d2d2d;">Tambahkan program baru untuk memulai</p>
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

            <?php if($programs->hasPages()): ?>
                <div class="p-4 border-t" style="padding: 16px 24px; border-top: 1px solid #dfe8d8; background: #eef3ec;">
                    <?php echo e($programs->links()); ?>

                </div>
            <?php endif; ?>
        </div>
    </div>

    <style>
        /* Pagination Styling */
        .pagination {
            margin: 0;
            display: flex;
            gap: 4px;
        }

        .pagination .page-link {
            border: 1px solid #dfe8d8;
            color: #2d2d2d;
            padding: 6px 12px;
            border-radius: 8px;
            font-size: 0.82rem;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.15s;
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
            opacity: 0.45;
            pointer-events: none;
        }

        .flex {
            display: flex;
        }

        .flex-col {
            flex-direction: column;
        }

        .gap-4 {
            gap: 1rem;
        }

        .flex-1 {
            flex: 1;
        }

        .relative {
            position: relative;
        }

        .absolute {
            position: absolute;
        }

        .left-3 {
            left: 12px;
        }

        .top-3 {
            top: 12px;
        }

        .w-full {
            width: 100%;
        }

        .pl-10 {
            padding-left: 40px;
        }

        .pr-4 {
            padding-right: 16px;
        }

        .py-2 {
            padding-top: 8px;
            padding-bottom: 8px;
        }

        .rounded-lg {
            border-radius: 10px;
        }

        .focus\:outline-none:focus {
            outline: none;
        }

        .whitespace-nowrap {
            white-space: nowrap;
        }

        .text-center {
            text-align: center;
        }

        .text-left {
            text-align: left;
        }

        .text-sm {
            font-size: 0.875rem;
        }

        .text-xs {
            font-size: 0.75rem;
        }

        .font-semibold {
            font-weight: 600;
        }

        .font-bold {
            font-weight: 700;
        }

        .inline {
            display: inline;
        }

        .p-1\.5 {
            padding: 6px;
        }

        .gap-1 {
            gap: 4px;
        }

        .gap-3 {
            gap: 12px;
        }

        .items-center {
            align-items: center;
        }

        .justify-center {
            justify-content: center;
        }

        .w-9 {
            width: 36px;
        }

        .h-9 {
            height: 36px;
        }

        .rounded-full {
            border-radius: 50%;
        }

        .mb-3 {
            margin-bottom: 12px;
        }

        .mt-1 {
            margin-top: 4px;
        }

        .px-6 {
            padding-left: 24px;
            padding-right: 24px;
        }

        .py-12 {
            padding-top: 48px;
            padding-bottom: 48px;
        }

        .text-4xl {
            font-size: 2.25rem;
        }

        .divide-y> :not([hidden])~ :not([hidden]) {
            border-top-width: 1px;
            border-bottom-width: 0;
        }

        /* === ANIMATION GLOBAL === */
        * {
            transition: all 0.25s ease;
        }

        /* === CARD STATS === */
        .stats-card:hover {
            transform: translateY(-5px) scale(1.02);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        /* === BUTTON === */
        .btn-primary-action:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(0, 95, 2, 0.3);
        }

        /* === ICON HEADER === */
        .page-icon:hover {
            transform: rotate(8deg) scale(1.05);
        }

        /* === TABLE ROW === */
        #programTable tr {
            transition: all 0.2s ease;
        }

        #programTable tr:hover {
            transform: scale(1.01);
            background: #eef3ec !important;
        }

        /* === ACTION BUTTON (ICON) === */
        #programTable a,
        #programTable button {
            transition: all 0.2s ease;
        }

        #programTable a:hover {
            transform: scale(1.2);
        }

        #programTable button:hover {
            transform: scale(1.2);
        }

        /* === SEARCH INPUT === */
        #searchInput:focus {
            transform: scale(1.02);
        }

        @media (min-width: 768px) {
            .md\:flex-row {
                flex-direction: row;
            }
        }
    </style>
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