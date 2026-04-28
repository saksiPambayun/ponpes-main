<?php $__env->startSection('title', 'Detail Program'); ?>

<?php $__env->startSection('content'); ?>
    <div class="page-wrapper" style="background: #f4f4f4; min-height: 100vh; padding: 2rem;">
        
        <div class="page-header"
            style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 2rem; flex-wrap: wrap; gap: 1rem;">
            <div class="page-header-left" style="display: flex; align-items: center; gap: 1rem;">
                <div class="page-icon"
                    style="width: 48px; height: 48px; background: linear-gradient(135deg, #005F02, #0f4d1c); border-radius: 14px; display: flex; align-items: center; justify-content: center;">
                    <i class="fas fa-info-circle" style="color: #fff; font-size: 1.1rem;"></i>
                </div>
                <div>
                    <h1 style="font-size: 1.35rem; font-weight: 700; color: #222; margin: 0;">Detail Program</h1>
                    <p style="font-size: 0.8rem; color: #2d2d2d; margin: 0;">Informasi lengkap program:
                        <?php echo e($program->nama_program); ?></p>
                </div>
            </div>
            <div class="action-buttons" style="display: flex; gap: 0.5rem;">
                <a href="<?php echo e(route('admin.program.edit', $program->id)); ?>" class="btn-edit"
                    style="display: inline-flex; align-items: center; gap: 0.45rem; padding: 0.55rem 1.1rem; background: linear-gradient(135deg, #005F02, #0f4d1c); border: none; border-radius: 10px; color: #fff; font-size: 0.82rem; font-weight: 600; text-decoration: none; transition: all 0.2s ease;">
                    <i class="fas fa-edit"></i> Edit
                </a>
                <a href="<?php echo e(route('admin.program.index')); ?>" class="btn-back"
                    style="display: inline-flex; align-items: center; gap: 0.45rem; padding: 0.55rem 1.1rem; background: #fff; border: 1.5px solid #dfe8d8; border-radius: 10px; color: #2d2d2d; font-size: 0.82rem; font-weight: 600; text-decoration: none; transition: all 0.2s ease;">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
            </div>
        </div>

        
        <div
            style="background: #fff; border-radius: 20px; border: 1px solid #dfe8d8; box-shadow: 0 2px 20px rgba(0,0,0,0.06); overflow: hidden;">
            <div class="detail-card-header"
                style="background: linear-gradient(135deg, #005F02, #0f4d1c); padding: 1.2rem 1.8rem; display: flex; align-items: center; gap: 0.75rem;">
                <i class="fas fa-clipboard-list" style="color: rgba(255,255,255,0.85); font-size: 1rem;"></i>
                <span style="color: #fff; font-size: 0.95rem; font-weight: 600;">Informasi Program</span>
            </div>

            <div class="detail-card-body" style="padding: 1.8rem;">
                <table style="width: 100%; border-collapse: collapse;">
                    <tr style="border-bottom: 1px solid #dfe8d8;">
                        <th
                            style="width: 35%; padding: 1rem 0; font-size: 0.82rem; font-weight: 600; color: #2d2d2d; text-align: left;">
                            Nama Program</th>
                        <td style="padding: 1rem 0; font-size: 0.87rem; color: #333; font-weight: 500;">
                            <?php echo e($program->nama_program); ?></td>
                    </tr>
                    <tr style="border-bottom: 1px solid #dfe8d8;">
                        <th
                            style="padding: 1rem 0; font-size: 0.82rem; font-weight: 600; color: #2d2d2d; text-align: left;">
                            Kategori</th>
                        <td style="padding: 1rem 0;">
                            <?php if($program->kategori == 'pendidikan'): ?>
                                <span
                                    style="display: inline-block; padding: 4px 12px; border-radius: 20px; font-size: 0.75rem; font-weight: 600; background: #eef3ec; color: #005F02;">📚
                                    Pendidikan</span>
                            <?php elseif($program->kategori == 'sosial'): ?>
                                <span
                                    style="display: inline-block; padding: 4px 12px; border-radius: 20px; font-size: 0.75rem; font-weight: 600; background: #dfe8d8; color: #0d4f14;">❤️
                                    Sosial</span>
                            <?php elseif($program->kategori == 'keagamaan'): ?>
                                <span
                                    style="display: inline-block; padding: 4px 12px; border-radius: 20px; font-size: 0.75rem; font-weight: 600; background: #8cbf73; color: #fff;">🕌
                                    Keagamaan</span>
                            <?php elseif($program->kategori == 'kesehatan'): ?>
                                <span
                                    style="display: inline-block; padding: 4px 12px; border-radius: 20px; font-size: 0.75rem; font-weight: 600; background: #fef2f2; color: #dc2626;">🏥
                                    Kesehatan</span>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr style="border-bottom: 1px solid #dfe8d8;">
                        <th
                            style="padding: 1rem 0; font-size: 0.82rem; font-weight: 600; color: #2d2d2d; text-align: left;">
                            Status</th>
                        <td style="padding: 1rem 0;">
                            <?php if($program->status == 'aktif'): ?>
                                <span
                                    style="display: inline-block; padding: 4px 12px; border-radius: 20px; font-size: 0.75rem; font-weight: 600; background: #eef3ec; color: #005F02;">Aktif</span>
                            <?php elseif($program->status == 'selesai'): ?>
                                <span
                                    style="display: inline-block; padding: 4px 12px; border-radius: 20px; font-size: 0.75rem; font-weight: 600; background: #dfe8d8; color: #2d2d2d;">Selesai</span>
                            <?php else: ?>
                                <span
                                    style="display: inline-block; padding: 4px 12px; border-radius: 20px; font-size: 0.75rem; font-weight: 600; background: #fef2f2; color: #dc2626;">Ditunda</span>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr style="border-bottom: 1px solid #dfe8d8;">
                        <th
                            style="padding: 1rem 0; font-size: 0.82rem; font-weight: 600; color: #2d2d2d; text-align: left;">
                            Tanggal Mulai</th>
                        <td style="padding: 1rem 0; font-size: 0.87rem; color: #333;">
                            <?php echo e($program->tanggal_mulai ? $program->tanggal_mulai->format('d F Y') : '-'); ?></td>
                    </tr>
                    <tr style="border-bottom: 1px solid #dfe8d8;">
                        <th
                            style="padding: 1rem 0; font-size: 0.82rem; font-weight: 600; color: #2d2d2d; text-align: left;">
                            Tanggal Selesai</th>
                        <td style="padding: 1rem 0; font-size: 0.87rem; color: #333;">
                            <?php echo e($program->tanggal_selesai ? $program->tanggal_selesai->format('d F Y') : '-'); ?></td>
                    </tr>
                    <tr style="border-bottom: 1px solid #dfe8d8;">
                        <th
                            style="padding: 1rem 0; font-size: 0.82rem; font-weight: 600; color: #2d2d2d; text-align: left;">
                            Deskripsi</th>
                        <td style="padding: 1rem 0; font-size: 0.87rem; color: #333; line-height: 1.6;">
                            <?php echo e($program->deskripsi); ?></td>
                    </tr>
                    <tr style="border-bottom: 1px solid #dfe8d8;">
                        <th
                            style="padding: 1rem 0; font-size: 0.82rem; font-weight: 600; color: #2d2d2d; text-align: left;">
                            Dibuat Pada</th>
                        <td style="padding: 1rem 0; font-size: 0.87rem; color: #333;">
                            <?php echo e($program->created_at->format('d F Y H:i')); ?></td>
                    </tr>
                    <tr>
                        <th
                            style="padding: 1rem 0; font-size: 0.82rem; font-weight: 600; color: #2d2d2d; text-align: left;">
                            Terakhir Update</th>
                        <td style="padding: 1rem 0; font-size: 0.87rem; color: #333;">
                            <?php echo e($program->updated_at->format('d F Y H:i')); ?></td>
                    </tr>
                </table>
            </div>
        </div>

        
        <div
            style="margin-top: 1.5rem; background: #fff; border-radius: 20px; border: 1px solid #dfe8d8; box-shadow: 0 2px 20px rgba(0,0,0,0.06); overflow: hidden;">
            <div class="detail-card-header"
                style="background: linear-gradient(135deg, #005F02, #0f4d1c); padding: 1.2rem 1.8rem; display: flex; align-items: center; gap: 0.75rem;">
                <i class="fas fa-bolt" style="color: rgba(255,255,255,0.85); font-size: 1rem;"></i>
                <span style="color: #fff; font-size: 0.95rem; font-weight: 600;">Aksi Cepat</span>
            </div>
            <div class="detail-card-body" style="padding: 1.8rem;">
                <div style="display: flex; gap: 0.75rem; flex-wrap: wrap;">
                    <a href="<?php echo e(route('admin.program.edit', $program->id)); ?>"
                        style="display: inline-flex; align-items: center; gap: 0.5rem; padding: 0.6rem 1.2rem; background: linear-gradient(135deg, #005F02, #0f4d1c); color: #fff; border-radius: 10px; text-decoration: none; font-size: 0.85rem; font-weight: 600; transition: all 0.2s ease;">
                        <i class="fas fa-edit"></i> Edit Program
                    </a>
                    <form action="<?php echo e(route('admin.program.destroy', $program->id)); ?>" method="POST"
                        onsubmit="return confirm('Yakin ingin menghapus program ini?')" style="display: inline;">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit"
                            style="display: inline-flex; align-items: center; gap: 0.5rem; padding: 0.6rem 1.2rem; background: #fef2f2; border: 1.5px solid #fecaca; border-radius: 10px; color: #dc2626; font-size: 0.85rem; font-weight: 600; cursor: pointer; transition: all 0.2s ease;">
                            <i class="fas fa-trash"></i> Hapus Program
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <style>
        .btn-edit:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(0, 95, 2, 0.3);
        }

        .btn-back:hover {
            background: #eef3ec;
            border-color: #8cbf73;
            color: #005F02;
        }

        .btn-edit,
        .btn-back {
            transition: all 0.2s ease;
        }

        .detail-card-body button:hover {
            background: #fee2e2;
            border-color: #f87171;
            color: #b91c1c;
        }
    </style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\ponpes-main\resources\views\admin\data-master\program\show.blade.php ENDPATH**/ ?>