<?php $__env->startSection('title', 'Detail Pegawai'); ?>
<?php $__env->startSection('page-title', 'Detail Data Pegawai'); ?>

<?php $__env->startSection('content'); ?>
<div class="max-w-5xl mx-auto">

    
    <?php if(session('success')): ?>
        <div class="mb-4 flex items-center gap-3 bg-[#eef3ec] border border-[#8cbf73] text-[#0d4f14] px-5 py-4 rounded-xl shadow-sm">
            <i class="fas fa-check-circle text-[#005F02]"></i>
            <span class="text-sm font-medium"><?php echo e(session('success')); ?></span>
        </div>
    <?php endif; ?>

    
    <a href="<?php echo e(route('admin.pegawai.index')); ?>"
       class="inline-flex items-center gap-2 text-sm text-gray-500 hover:text-[#005F02] mb-5 transition">
        <i class="fas fa-arrow-left"></i> Kembali ke Daftar Pegawai
    </a>

    
    <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden">

        
        <div class="bg-gradient-to-r from-[#005F02] to-[#4ca94d] px-8 py-8">
            <div class="flex items-center gap-5">

                
                <div class="w-20 h-20 rounded-2xl bg-white/20 backdrop-blur flex items-center justify-center text-white text-3xl font-bold border-2 border-white/40 shrink-0">
                    <?php echo e(strtoupper(substr($pegawai->nama ?? '??', 0, 2))); ?>

                </div>

                
                <div>
                    <h2 class="text-2xl font-bold text-white"><?php echo e($pegawai->nama ?? '-'); ?></h2>
                    <p class="text-green-200 text-sm mt-0.5">NIP: <?php echo e($pegawai->nip ?? '-'); ?></p>

                    <div class="flex flex-wrap gap-2 mt-2">

                        
                        <?php
                            $statusColor = match($pegawai->status) {
                                'aktif' => 'green',
                                'cuti' => 'yellow',
                                default => 'red'
                            };
                        ?>

                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-medium
                            bg-<?php echo e($statusColor); ?>-400/20 text-<?php echo e($statusColor); ?>-200 border border-<?php echo e($statusColor); ?>-400/30">
                            <span class="w-1.5 h-1.5 rounded-full bg-<?php echo e($statusColor); ?>-400 <?php echo e($pegawai->status == 'aktif' ? 'animate-pulse' : ''); ?>"></span>
                            <?php echo e(ucfirst($pegawai->status ?? 'nonaktif')); ?>

                        </span>

                        
                        <?php if($pegawai->tipe_pegawai): ?>
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-white/20 text-white border border-white/30">
                                <?php echo e(ucfirst($pegawai->tipe_pegawai)); ?>

                            </span>
                        <?php endif; ?>

                    </div>
                </div>
            </div>
        </div>

        <div class="p-8">

            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-8">

                <?php
                    $infoItems = [
                        ['icon'=>'fa-briefcase','label'=>'Jabatan','value'=>$pegawai->jabatan],
                        ['icon'=>'fa-sitemap','label'=>'Divisi','value'=>$pegawai->divisi],
                        ['icon'=>'fa-envelope','label'=>'Email','value'=>$pegawai->email],
                        ['icon'=>'fa-phone','label'=>'No. Telepon','value'=>$pegawai->no_telepon],
                        ['icon'=>'fa-map-marker-alt','label'=>'Tempat Lahir','value'=>$pegawai->tempat_lahir],
                        ['icon'=>'fa-birthday-cake','label'=>'Tanggal Lahir','value'=>$pegawai->tanggal_lahir?->format('d M Y')],
                        ['icon'=>'fa-venus-mars','label'=>'Jenis Kelamin','value'=>$pegawai->jenis_kelamin == 'L' ? 'Laki-laki' : ($pegawai->jenis_kelamin == 'P' ? 'Perempuan' : '-')],
                        ['icon'=>'fa-pray','label'=>'Agama','value'=>$pegawai->agama],
                        ['icon'=>'fa-calendar-check','label'=>'Tanggal Bergabung','value'=>$pegawai->tanggal_bergabung?->format('d M Y')],
                    ];
                ?>

                <?php $__currentLoopData = $infoItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="flex items-start gap-3 p-4 bg-gray-50 rounded-xl hover:shadow-sm transition">
                    <div class="w-8 h-8 bg-[#eef3ec] rounded-lg flex items-center justify-center shrink-0 mt-0.5">
                        <i class="fas <?php echo e($item['icon']); ?> text-[#005F02] text-xs"></i>
                    </div>
                    <div class="min-w-0">
                        <p class="text-xs text-gray-400 mb-0.5"><?php echo e($item['label']); ?></p>
                        <p class="text-sm font-medium text-gray-800 break-words">
                            <?php echo e($item['value'] ?? '-'); ?>

                        </p>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                
                <div class="md:col-span-2 flex items-start gap-3 p-4 bg-gray-50 rounded-xl hover:shadow-sm transition">
                    <div class="w-8 h-8 bg-[#eef3ec] rounded-lg flex items-center justify-center shrink-0 mt-0.5">
                        <i class="fas fa-home text-[#005F02] text-xs"></i>
                    </div>
                    <div>
                        <p class="text-xs text-gray-400 mb-0.5">Alamat</p>
                        <p class="text-sm font-medium text-gray-800 leading-relaxed">
                            <?php echo e($pegawai->alamat ?? '-'); ?>

                        </p>
                    </div>
                </div>

            </div>

            
            <div class="border-t border-gray-100 pt-6">
                <h3 class="text-base font-semibold text-gray-800 mb-4 flex items-center gap-2">
                    <i class="fas fa-file-alt text-[#005F02]"></i> Dokumen Pegawai
                </h3>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-5">

                    <?php $__currentLoopData = [
                        ['label'=>'KTP','file'=>$pegawai->foto_ktp,'icon'=>'fa-id-card'],
                        ['label'=>'NPWP','file'=>$pegawai->foto_npwp,'icon'=>'fa-file-invoice'],
                        ['label'=>'Ijazah','file'=>$pegawai->foto_ijazah,'icon'=>'fa-graduation-cap'],
                    ]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <div class="border border-gray-200 rounded-xl overflow-hidden">
                        <div class="px-4 py-2.5 bg-gray-50 border-b flex items-center gap-2">
                            <i class="fas <?php echo e($doc['icon']); ?> text-[#005F02] text-sm"></i>
                            <p class="text-sm font-medium text-gray-700"><?php echo e($doc['label']); ?></p>
                        </div>

                        <div class="p-3">
                            <?php if($doc['file']): ?>

                                <?php
                                    $ext = strtolower(pathinfo($doc['file'], PATHINFO_EXTENSION));
                                ?>

                                <?php if($ext === 'pdf'): ?>
                                    <div class="h-44 bg-red-50 rounded-lg flex flex-col items-center justify-center gap-2">
                                        <i class="fas fa-file-pdf text-red-400 text-3xl"></i>
                                        <a href="<?php echo e(asset('storage/'.$doc['file'])); ?>" target="_blank"
                                           class="text-xs text-red-600 hover:underline">
                                            Buka PDF
                                        </a>
                                    </div>
                                <?php else: ?>
                                    <a href="<?php echo e(asset('storage/'.$doc['file'])); ?>" target="_blank" class="block group">
                                        <img src="<?php echo e(asset('storage/'.$doc['file'])); ?>"
                                             class="w-full h-44 object-cover rounded-lg group-hover:opacity-90 transition">
                                        <p class="text-xs text-center text-[#005F02] mt-2 group-hover:underline">
                                            Buka full size
                                        </p>
                                    </a>
                                <?php endif; ?>

                            <?php else: ?>
                                <div class="h-44 bg-gray-100 rounded-lg flex flex-col items-center justify-center gap-2">
                                    <i class="fas <?php echo e($doc['icon']); ?> text-gray-300 text-3xl"></i>
                                    <p class="text-xs text-gray-400">Belum diupload</p>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </div>

                <p class="text-xs text-gray-400 mt-3 flex items-center gap-1">
                    <i class="fas fa-info-circle"></i>
                    Jalankan <code class="bg-gray-100 px-1 py-0.5 rounded">php artisan storage:link</code> jika gambar tidak tampil
                </p>
            </div>

            
            <div class="flex justify-between items-center pt-6 mt-6 border-t border-gray-100">
                <div class="text-xs text-gray-400">
                    Dibuat: <?php echo e($pegawai->created_at->format('d M Y H:i')); ?>

                    <?php if($pegawai->updated_at != $pegawai->created_at): ?>
                        • Update: <?php echo e($pegawai->updated_at->format('d M Y H:i')); ?>

                    <?php endif; ?>
                </div>

                <div class="flex gap-3">

                    <a href="<?php echo e(route('admin.pegawai.edit', $pegawai->id)); ?>"
                       class="px-5 py-2.5 bg-gradient-to-r from-[#a79c03] to-[#dbe556] text-white rounded-lg hover:scale-105 transition text-sm">
                        <i class="fas fa-edit"></i> Edit
                    </a>

                    <form action="<?php echo e(route('admin.pegawai.destroy', $pegawai->id)); ?>" method="POST"
                          onsubmit="return confirm('Yakin hapus <?php echo e(addslashes($pegawai->nama)); ?>?')">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit"
                                class="px-5 py-2.5 bg-red-500 text-white rounded-lg hover:bg-red-600 transition text-sm">
                            <i class="fas fa-trash"></i> Hapus
                        </button>
                    </form>

                </div>
            </div>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\ponpes-main\resources\views/admin/pegawai/show.blade.php ENDPATH**/ ?>