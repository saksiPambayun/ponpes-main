<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hubungi Kami</title>

    <link href="https://fonts.googleapis.com/css2?family=Cabin:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Archivo+Black&family=Cabin:wght@400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('css/navbar.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/footer.css')); ?>">
</head>
<style>
    .hubungi-section {
        background: #fafafa;
        padding: 80px 120px;
    }

    .hubungi-title {
        text-align: center;
        font-size: 42px;
        font-weight: 700;
        color: #0c6b1c;
        margin-bottom: 60px;
    }

    .hubungi-container {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 60px;
        align-items: start;
    }

    .contact-card {
        display: flex;
        align-items: center;
        gap: 18px;
        background: #c7d9b7;
        padding: 18px 22px;
        border-radius: 14px;
        margin-bottom: 20px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: 0.3s;
    }

    .contact-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 20px rgba(0, 0, 0, 0.25);
    }

    .contact-card i {
        font-size: 28px;
        color: #0c6b1c;
    }

    .contact-card h3 {
        font-size: 18px;
        color: #0c6b1c;
        margin: 0;
    }

    .contact-card p {
        font-size: 14px;
        margin: 3px 0 0 0;
    }

    .contact-card a {
        color: #000000;
        text-decoration: none;
    }

    .hubungi-form {
        background: white;
        padding: 30px;
        border-radius: 14px;
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.15);
    }

    .hubungi-form form {
        display: flex;
        flex-direction: column;
        gap: 15px;
    }

    .hubungi-form input,
    .hubungi-form textarea {
        background: #d9e6b7;
        border: none;
        padding: 14px 16px;
        border-radius: 8px;
        font-size: 14px;
    }

    .hubungi-form textarea {
        height: 100px;
        resize: none;
    }

    .hubungi-form button {
        border: none;
        padding: 14px;
        border-radius: 8px;
        color: white;
        font-weight: 600;
        background: linear-gradient(90deg, #2f6f3c, #cfe39a);
        cursor: pointer;
        transition: 0.3s;
    }

    .hubungi-form button:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
    }
</style>

<body>
    <?php echo $__env->make('components.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

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
    <?php echo $__env->make('components.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
</body>

</html><?php /**PATH D:\ponpes-main\resources\views/public/hubungi.blade.php ENDPATH**/ ?>