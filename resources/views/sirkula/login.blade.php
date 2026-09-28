@extends('sirkula.layout')
@section('title', 'Login')
@section('content')
<header class="hero">
    <div class="eyebrow">SIRKULA.ID</div>
    <h1>Masuk ke layanan warga</h1>
    <div class="feature-strip"><span>♻ Setor</span><span>◆ Bayar</span><span>✿ Kebun</span></div>
</header>
<main class="body-content overlap">
    <section class="card">
        <h2>Selamat datang kembali</h2>
        @if (session('success')) <div class="alert success">{{ session('success') }}</div> @endif
        @if (session('info')) <div class="alert info">{{ session('info') }}</div> @endif
        @if ($errors->any()) <div class="alert danger">{{ $errors->first() }}</div> @endif
        <form class="stack top-space" method="POST" action="{{ route('sirkula.login.proses') }}">
            @csrf
            <label>Email<input type="email" name="email" value="{{ old('email') }}" placeholder="nama@email.com" required></label>
            <label>Kata sandi<div class="password-wrap"><input name="password" id="login-password" type="password" placeholder="Masukkan kata sandi" required><button class="eye" type="button" data-toggle-password="login-password" aria-label="Tampilkan kata sandi">Lihat</button></div></label>
            <button type="submit" class="btn btn-primary">Masuk</button>
        </form>
    </section>
    <p class="switch">Belum punya akun? <a href="{{ route('sirkula.register') }}">Daftar</a></p>
</main>
@endsection
