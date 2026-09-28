@extends('sirkula.layout')
@section('title', 'Beranda')
@section('content')
<header class="hero landing-hero">
    <div class="eyebrow">LINGKUNGAN DIGITAL</div>
    <h1>Sirkula.id</h1>
    <p>Urus bank sampah, iuran, kebun komunitas, dan laporan fasilitas dari satu aplikasi warga.</p>
    <div class="feature-strip"><span>♻ Bank Sampah</span><span>◆ Iuran</span><span>✿ Kebun</span></div>
</header>
<main class="body-content">
    <section class="card text-center overlap">
        <h2>Selamat datang!</h2>
        <p>Contoh alur pendaftaran dan login dari proyek Sirkula.</p>
        <div class="stack top-space">
            <a class="btn btn-yellow" href="{{ route('sirkula.login') }}">Masuk</a>
            <a class="btn btn-outline" href="{{ route('sirkula.register') }}">Daftar</a>
        </div>
    </section>
</main>
@endsection
