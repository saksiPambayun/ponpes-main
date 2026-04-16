<?php $__env->startSection('title', 'Hubungi Kami'); ?>

<?php $__env->startSection('content'); ?>

    <section class="hubungi-section">
        <h1 class="hubungi-title">Hubungi</h1>

        <div class="hubungi-container">
            <div class="hubungi-left">
                <div class="contact-card">
                    <i class="bi bi-telephone-fill"></i>
                    <div>
                        <h3>Nomor Telepon</h3>
                        <p><?php echo e($profil->telepon ?? 'Belum diisi'); ?></p>
                    </div>
                </div>

                <div class="contact-card">
                    <i class="bi bi-envelope-fill"></i>
                    <div>
                        <h3>Email</h3>
                        <p><?php echo e($profil->email ?? 'Belum diisi'); ?></p>
                    </div>
                </div>

                <div class="contact-card">
                    <i class="bi bi-whatsapp"></i>
                    <div>
                        <h3>Whatsapp</h3>
                        <p>
                            <a href="https://wa.me/<?php echo e($profil->telepon); ?>">
                                <?php echo e($profil->telepon); ?>

                            </a>
                        </p>
                    </div>
                </div>

                <div class="contact-card">
                    <i class="bi bi-geo-alt-fill"></i>
                    <div>
                        <h3>Lokasi</h3>
                        <p><?php echo e($profil->alamat ?? 'Belum diisi'); ?></p>
                    </div>
                </div>
            </div>

            <div class="hubungi-form">
                <?php if(session('success')): ?>
                    <div
                        style="background-color: #d4edda; color: #155724; padding: 12px; border-radius: 8px; margin-bottom: 20px;">
                        <?php echo e(session('success')); ?>

                    </div>
                <?php endif; ?>

                <?php if($errors->any()): ?>
                    <div
                        style="background-color: #f8d7da; color: #721c24; padding: 12px; border-radius: 8px; margin-bottom: 20px;">
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <p style="margin: 0;"><?php echo e($error); ?></p>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                <?php endif; ?>

                <form action="<?php echo e(route('send.feedback')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <input type="text" name="name" placeholder="Nama Anda" value="<?php echo e(old('name')); ?>" required>
                    <input type="email" name="email" placeholder="Alamat Email Anda" value="<?php echo e(old('email')); ?>"
                        required>
                    <input type="text" name="phone" placeholder="No. Telepon" value="<?php echo e(old('phone')); ?>">
                    <textarea name="message" placeholder="Isi Saran dan Kritik Di sini"
                        required><?php echo e(old('message')); ?></textarea>
                    <button type="submit">
                        Kirim Saran dan Kritik
                    </button>
                </form>
            </div>
        </div>
    </section>

    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\ponpes-main\resources\views/public/hubungi.blade.php ENDPATH**/ ?>