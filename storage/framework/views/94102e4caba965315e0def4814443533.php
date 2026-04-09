<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulir Pendaftaran</title>

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
    .hero-pendaftaran {
        height: 650px;
        background-image: url('/images/hero.png');
        background-size: cover;
        background-position: center;
        position: relative;
        font-family: 'Cabin', sans-serif;
    }

    .hero-overlay {
        height: 100%;
        width: 100%;
        background: rgba(22, 101, 52, 0.45);
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
        padding: 20px;
    }

    .hero-content h1 {
        font-size: 64px;
        color: white;
        font-weight: 700;
        margin-bottom: 15px;
        text-shadow: 0 4px 12px rgba(0, 0, 0, 0.4);
    }

    .hero-content h2 {
        font-size: 36px;
        color: white;
        font-weight: 500;
        text-shadow: 0 4px 12px rgba(0, 0, 0, 0.4);
    }

    .pendaftaran-section {
        padding: 100px 0 120px;
    }

    .container {
        max-width: 1200px;
        margin: auto;
        padding: 0 60px;
    }

    .grid-pendaftaran {
        display: grid;
        grid-template-columns: 1.7fr 1fr;
        gap: 70px;
        align-items: start;
    }

    .title-section {
        font-size: 36px;
        font-weight: 700;
        color: #166534;
        margin-bottom: 35px;
    }

    .mt {
        margin-top: 60px;
    }

    .alur {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .step-item {
        text-align: center;
        min-width: 90px;
    }

    .step-circle {
        width: 60px;
        height: 60px;
        background: #166534;
        color: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        font-size: 18px;
        margin: auto;
        margin-bottom: 10px;
    }

    .step-line {
        flex: 1;
        height: 4px;
        margin-bottom: 50px;
        background: #166534;
    }

    .syarat-card {
        background: #dfead8;
        padding: 40px 45px;
        border-radius: 22px;
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 10px 40px;
    }

    .syarat-list p {
        margin-bottom: 14px;
        display: flex;
        gap: 10px;
        align-items: center;
        font-size: 18px;
    }

    .syarat-list i {
        color: #166534;
        font-size: 20px;
    }

    .info-pendaftaran {
        background: #d7e6cf;
        border-radius: 25px;
        overflow: hidden;
    }

    .header-info {
        background: #166534;
        color: white;
        text-align: center;
        padding: 22px;
        font-size: 22px;
        font-weight: 600;
    }

    .gelombang-wrapper {
        display: flex;
        gap: 18px;
        padding: 25px;
    }

    .gelombang-box {
        background: #ffffff;
        flex: 1;
        padding: 22px;
        border-radius: 14px;
        text-align: center;
    }

    .gelombang-box h4 {
        font-size: 18px;
        margin-bottom: 6px;
        color: #166534;
    }

    .biaya-card {
        background: #ffffff;
        margin: 0 25px 25px;
        padding: 25px;
        border-radius: 14px;
    }

    .biaya-card h4 {
        margin-bottom: 15px;
        color: #166534;
    }

    .row-biaya {
        display: flex;
        justify-content: space-between;
        padding: 10px 0;
        border-bottom: 1px solid #ddd;
    }

    .row-biaya:last-child {
        border-bottom: none;
    }

    .cta-daftar {
        text-align: center;
        margin-top: 70px;
    }

    .btn-daftar {
        background: linear-gradient(to right, #2c7a2c, #cde5a3);
        padding: 18px 55px;
        border-radius: 50px;
        padding: 18px 50px;
        color: white;
        text-decoration: none;
        font-weight: 600;
        font-size: 22px;
        display: inline-block;
        transition: 0.3s;
    }

    .btn-daftar:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
    }


    .form-section {
        padding: 80px 0;
        background: #f5f7f4;
        font-family: 'Cabin', sans-serif;
    }

    .container-form {
        max-width: 1000px;
        margin: auto;
        background: white;
        padding: 40px;
        border-radius: 15px;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
    }

    .form-title {
        font-size: 22px;
        font-weight: 700;
        color: #166534;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .form-sub {
        font-size: 14px;
        margin-bottom: 30px;
        color: #555;
    }

    .form-group-section {
        margin-top: 30px;
        padding-top: 25px;
        border-top: 1px solid #e5e5e5;
    }

    .section-title {
        font-size: 18px;
        color: #166534;
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 8px;
        margin-bottom: 20px;
    }

    .grid-form {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
    }

    .form-control {
        display: flex;
        flex-direction: column;
    }

    .form-control label {
        font-size: 14px;
        margin-bottom: 6px;
        color: #166534;
    }

    .form-control input,
    .form-control textarea {
        padding: 10px;
        border: 2px solid #9ec49f;
        border-radius: 6px;
        outline: none;
    }

    .form-control input:focus,
    .form-control textarea:focus {
        border-color: #166534;
    }

    .radio-group {
        margin-top: 15px;
    }

    .radio-option {
        display: flex;
        gap: 20px;
        margin-top: 5px;
    }

    .upload-grid {
        display: grid;
        grid-template-columns: 1fr 1fr 1fr;
        gap: 20px;
    }

    .upload-box {
        border: 2px solid #9ec49f;
        padding: 25px;
        border-radius: 8px;
        text-align: center;

        cursor: pointer;
        transition: 0.2s;
        display: flex;
        flex-direction: column;
        gap: 5px;
    }

    .upload-box i {
        font-size: 28px;
        color: #166534;
    }

    .upload-box span {
        font-weight: 600;
        color: #166534;
    }

    .upload-box small {
        font-size: 12px;
        color: #666;
    }

    .upload-box:hover {
        background: #f0f6f0;
    }

    .checkbox-form {
        margin-top: 25px;
        font-size: 14px;
        display: flex;
        gap: 8px;
        align-items: center;
    }

    .submit-form {
        text-align: center;
        margin-top: 30px;
    }

    .btn-kirim {
        background: linear-gradient(90deg, #166534, #c6e38c);
        border: none;
        padding: 14px 50px;
        border-radius: 30px;
        color: white;
        font-weight: 600;
        font-size: 16px;
        cursor: pointer;
    }

    .btn-kirim:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
    }
</style>

<body>
    <?php echo $__env->make('components.navbar', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <section class="form-section">
        <div class="container-form">
            <h2 class="form-title">
                <i class="bi bi-journal-text"></i>
                Formulir Pendaftaran Santri Baru
            </h2>
            <p class="form-sub">Lengkapilah data berikut dengan benar!</p>

            <form>
                <div class="form-group-section">
                    <h3 class="section-title">
                        <i class="bi bi-person-lines-fill"></i>
                        Data Santri
                    </h3>

                    <div class="grid-form">
                        <div class="form-control">
                            <label>Nama Lengkap</label>
                            <input type="text" placeholder="Nama sesuai akta kelahiran">
                        </div>

                        <div class="form-control">
                            <label>Asal Sekolah</label>
                            <input type="text" placeholder="Nama sekolah terakhir">
                        </div>

                        <div class="form-control">
                            <label>Tempat Tanggal Lahir</label>
                            <input type="text" placeholder="Tempat dan Tanggal lahir">
                        </div>

                        <div class="form-control">
                            <label>Alamat</label>
                            <textarea rows="3" placeholder="Alamat lengkap"></textarea>
                        </div>
                    </div>

                    <div class="radio-group">
                        <label>Jenis Kelamin</label>

                        <div class="radio-option">
                            <input type="radio" name="jk"> Laki - Laki
                            <input type="radio" name="jk"> Perempuan
                        </div>
                    </div>
                </div>

                <div class="form-group-section">
                    <h3 class="section-title">
                        <i class="bi bi-people-fill"></i>
                        Data Orang Tua
                    </h3>

                    <div class="grid-form">
                        <div class="form-control">
                            <label>Nama Ayah</label>
                            <input type="text" placeholder="Nama Ayah">
                        </div>

                        <div class="form-control">
                            <label>Nama Ibu</label>
                            <input type="text" placeholder="Nama Ibu">
                        </div>

                        <div class="form-control">
                            <label>Pekerjaan</label>
                            <input type="text" placeholder="Pekerjaan">
                        </div>

                        <div class="form-control">
                            <label>Pekerjaan</label>
                            <input type="text" placeholder="Pekerjaan">
                        </div>

                        <div class="form-control">
                            <label>No. Telepon</label>
                            <input type="text" placeholder="No. Telepon">
                        </div>

                        <div class="form-control">
                            <label>No. Telepon</label>
                            <input type="text" placeholder="No. Telepon">
                        </div>
                    </div>
                </div>

                <div class="form-group-section">
                    <h3 class="section-title">
                        <i class="bi bi-upload"></i>
                        Upload Dokumen
                    </h3>

                    <div class="upload-grid">
                        <label class="upload-box">
                            <i class="bi bi-upload"></i>
                            <span>Upload Kartu Keluarga</span>
                            <small>Format JPG / PDF (Maks 2MB)</small>
                            <input type="file" hidden>
                        </label>

                        <label class="upload-box">
                            <i class="bi bi-upload"></i>
                            <span>Upload Pas Foto</span>
                            <small>Format JPG / PDF (Maks 2MB)</small>
                            <input type="file" hidden>
                        </label>
                    </div>
                </div>

                <div class="checkbox-form">
                    <input type="checkbox">
                    <span>Saya menyatakan data yang diisi sudah benar.</span>
                </div>

                <div class="submit-form">
                    <button type="submit" class="btn-kirim">
                        Kirim Formulir
                    </button>
                </div>
            </form>
        </div>
    </section>
    <?php echo $__env->make('components.footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
</body>

</html>
<?php /**PATH C:\laragon\www\ponpes-main\resources\views/public/form.blade.php ENDPATH**/ ?>