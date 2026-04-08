<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Struktur</title>

    <link href="https://fonts.googleapis.com/css2?family=Cabin:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Archivo+Black&family=Cabin:wght@400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
</head>
<style>
    .struktur-section {
        padding: 80px 20px;
    }

    .struktur-title {
        text-align: center;
        font-size: 42px;
        font-weight: 700;
        color: #0f6b1d;
        margin-bottom: 40px;
    }

    .struktur-frame {
        background: #98c089;
        padding: 25px;
        border-radius: 15px;
        max-width: 1100px;
        margin: auto;
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.15);
    }

    .struktur-inner {
        background: white;
        border-radius: 10px;
        padding: 30px;
    }

    .struktur-img {
        width: 100%;
        height: auto;
        display: block;
    }
</style>

<body>
    @include('components.navbar')
    <section class="struktur-section">
        <div class="container">
            <h1 class="struktur-title">
                Struktur Organisasi
            </h1>
            <div class="struktur-frame">
                <div class="struktur-inner">
                    <img src="{{ asset('images/struktur1.png') }}" alt="Struktur Organisasi" class="struktur-img">
                </div>
            </div>
        </div>
    </section>
    @include('components.footer')
</body>

</html>
