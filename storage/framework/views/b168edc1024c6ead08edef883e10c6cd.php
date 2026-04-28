<?php $__env->startSection('title', 'Cek Status Pendaftaran'); ?>

<?php $__env->startSection('content'); ?>
    <section class="cek-status-section">
        <div class="container">
            <div class="cek-status-card">
                <div class="card-header">
                    <h2><i class="bi bi-search"></i> Cek Status Pendaftaran</h2>
                    <p>Masukkan salah satu data berikut untuk mengecek status pendaftaran Anda</p>
                </div>

                <?php if(session('error')): ?>
                    <div class="alert alert-danger">
                        <i class="bi bi-exclamation-triangle"></i> <?php echo e(session('error')); ?>

                    </div>
                <?php endif; ?>

                <?php if(session('success')): ?>
                    <div class="alert alert-success">
                        <i class="bi bi-check-circle"></i> <?php echo e(session('success')); ?>

                    </div>
                <?php endif; ?>

                <form action="<?php echo e(route('user.pendaftaran.cek-status.post')); ?>" method="POST">
                    <?php echo csrf_field(); ?>

                    <div class="form-group">
                        <label>Cari Berdasarkan</label>
                        <div class="radio-group">
                            <label class="radio-label">
                                <input type="radio" name="search_type" value="nama" checked>
                                <i class="bi bi-person"></i> Nama Lengkap
                            </label>
                            <label class="radio-label">
                                <input type="radio" name="search_type" value="email">
                                <i class="bi bi-envelope"></i> Email
                            </label>
                            <label class="radio-label">
                                <input type="radio" name="search_type" value="no_wali">
                                <i class="bi bi-telephone"></i> No. Telepon Wali
                            </label>
                            <label class="radio-label">
                                <input type="radio" name="search_type" value="nisn">
                                <i class="bi bi-card-text"></i> NISN
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Masukkan Data <span class="required">*</span></label>
                        <input type="text" name="search_value" class="form-control"
                            placeholder="Masukkan data sesuai pilihan di atas" required>
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="btn-submit">
                            <i class="bi bi-search"></i> Cek Status
                        </button>
                        <a href="<?php echo e(route('user.pendaftaran.index')); ?>" class="btn-back">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <style>
        .cek-status-section {
            padding: 60px 0;
            background: linear-gradient(135deg, #f5f5f5 0%, #e8f5e9 100%);
            min-height: calc(100vh - 200px);
        }

        .cek-status-card {
            max-width: 550px;
            margin: 0 auto;
            background: white;
            border-radius: 20px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);
            overflow: hidden;
        }

        .card-header {
            background: linear-gradient(135deg, #005F02, #0f4d1c);
            color: white;
            padding: 30px;
            text-align: center;
        }

        .card-header h2 {
            margin: 0 0 10px 0;
            font-size: 1.8rem;
        }

        .card-header p {
            margin: 0;
            opacity: 0.9;
        }

        form {
            padding: 30px;
        }

        .form-group {
            margin-bottom: 25px;
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: 600;
            color: #333;
        }

        .required {
            color: #dc3545;
        }

        .radio-group {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
        }

        .radio-label {
            display: flex;
            align-items: center;
            gap: 8px;
            font-weight: normal;
            cursor: pointer;
            padding: 8px 15px;
            background: #f5f5f5;
            border-radius: 30px;
            transition: all 0.3s;
        }

        .radio-label:hover {
            background: #e8f5e9;
        }

        .radio-label input {
            margin: 0;
            cursor: pointer;
        }

        .form-control {
            width: 100%;
            padding: 14px 18px;
            border: 2px solid #e0e0e0;
            border-radius: 12px;
            font-size: 1rem;
            transition: all 0.3s;
        }

        .form-control:focus {
            outline: none;
            border-color: #005F02;
            box-shadow: 0 0 0 3px rgba(0, 95, 2, 0.1);
        }

        .form-actions {
            display: flex;
            gap: 15px;
            justify-content: center;
            margin-top: 30px;
        }

        .btn-submit {
            background: linear-gradient(135deg, #005F02, #0f4d1c);
            color: white;
            border: none;
            padding: 12px 28px;
            border-radius: 40px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 95, 2, 0.3);
        }

        .btn-back {
            background: #6c757d;
            color: white;
            padding: 12px 28px;
            border-radius: 40px;
            text-decoration: none;
            transition: all 0.3s;
        }

        .btn-back:hover {
            background: #5a6268;
            color: white;
        }

        .alert {
            padding: 15px 20px;
            margin: 20px 30px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .alert-danger {
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        .alert-success {
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        @media (max-width: 768px) {
            .radio-group {
                flex-direction: column;
                gap: 10px;
            }

            .form-actions {
                flex-direction: column;
            }

            .btn-submit,
            .btn-back {
                text-align: center;
            }
        }
    </style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\laragon\www\pondok_gue\ponpes-main\resources\views/user/pendaftaran/cek-status.blade.php ENDPATH**/ ?>