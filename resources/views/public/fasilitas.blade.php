@extends('layouts.app')

@section('title', 'Fasilitas')

@section('content')

<section class="fasilitas-sectionn">

    <h1 class="fasilitas-title">Fasilitas</h1>

    <div class="fasilitas-grid">

        <div class="fasilitas-card">
            <div class="fasilitas-img">
                <img src="{{ asset('images/gedung.jpg') }}" alt="Masjid">
            </div>
            <p>Masjid</p>
        </div>

        <div class="fasilitas-card">
            <div class="fasilitas-img">
                <img src="{{ asset('images/wudhuw.jpg') }}" alt="Wudhu Wandi">
            </div>
            <p>Wudhu Wanita</p>
        </div>


        <div class="fasilitas-card">
            <div class="fasilitas-img">
                <img src="{{ asset('images/wudhup.jpg') }}" alt="Wudhu Pria">
            </div>
            <p>Wudhu Pria</p>
        </div>

        <div class="fasilitas-card">
            <div class="fasilitas-img">
                <img src="{{ asset('images/kamarmandi1.jpg') }}" alt="Kamar Mandi">
            </div>
            <p>Kamar Mandi</p>
        </div>

        <div class="fasilitas-card">
            <div class="fasilitas-img">
                <img src="{{ asset('images/kamarmandi2.jpg') }}" alt="Kamar Mandi">
            </div>
            <p>Kamar Mandi</p>
        </div>

        <div class="fasilitas-card">
            <div class="fasilitas-img">
                <img src="{{ asset('images/kamarmandi3.jpg') }}" alt="Kamar Mandi">
            </div>
            <p>Kamar Mandi</p>
        </div>

        <div class="fasilitas-card">
            <div class="fasilitas-img">
                <img src="{{ asset('images/kamarmandip.jpg') }}" alt="Kamar Mandi">
            </div>
            <p>Kamar Mandi</p>
        </div>

    </div>

</section>

@endsection