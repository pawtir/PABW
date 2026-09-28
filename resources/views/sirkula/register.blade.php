@extends('sirkula.layout')
@section('title', 'Daftar')
@section('content')
<header class="hero">
    <a class="back" href="{{ route('sirkula.landing') }}">← Kembali</a>
    <span class="brand-pill">SIRKULA.ID</span>
    <div class="eyebrow top-space">MULAI AKUN BARU</div>
    <h1>Daftar layanan lingkungan</h1>
    <p>Pilih peran dan lengkapi data. Pada praktikum ini akun hanya berlaku untuk sesi sementara.</p>
</header>
<main class="body-content overlap">
    <section class="card">
        <h2>Profil pendaftar</h2>
        @if ($errors->any())
            <div class="alert danger">Periksa kembali: {{ $errors->first() }}</div>
        @endif
        <form method="POST" action="{{ route('sirkula.register.proses') }}" class="stack" id="register-form">
            @csrf
            <div class="role-options">
                <label class="role-card"><input type="radio" name="role" value="warga" {{ old('role', 'warga') === 'warga' ? 'checked' : '' }}><span>Warga<small>Akses layanan harian</small></span></label>
                <label class="role-card"><input type="radio" name="role" value="pengurus" {{ old('role') === 'pengurus' ? 'checked' : '' }}><span>Pengurus<small>Kelola operasional RT</small></span></label>
            </div>
            <label>Nama lengkap<input name="nama_lengkap" value="{{ old('nama_lengkap') }}" maxlength="100" required placeholder="Nama lengkap"></label>
            <label>Email<input type="email" name="email" value="{{ old('email') }}" required placeholder="nama@email.com"></label>
            <label>No. HP<input type="tel" name="no_hp" value="{{ old('no_hp') }}" required placeholder="Nomor telepon"></label>
            <div data-for-role="warga" class="stack role-fields">
                <div class="inline-fields">
                    <label>RT<input name="rt" value="{{ old('rt') }}" pattern="[0-9]{1,3}" inputmode="numeric" placeholder="01"></label>
                    <label>RW<input name="rw" value="{{ old('rw') }}" pattern="[0-9]{1,3}" inputmode="numeric" placeholder="02"></label>
                </div>
                <label>Alamat<input name="alamat" value="{{ old('alamat') }}" maxlength="180" placeholder="Alamat rumah"></label>
            </div>
            <div data-for-role="pengurus" class="stack role-fields" hidden>
                <label>Jabatan<input name="jabatan" value="{{ old('jabatan') }}" placeholder="Contoh: Bendahara RT"></label>
            </div>
            <label>Kata sandi<div class="password-wrap"><input id="register-password" name="password" type="password" minlength="8" required placeholder="Minimal 8 karakter"><button type="button" class="eye" data-toggle-password="register-password" aria-label="Tampilkan kata sandi">Lihat</button></div></label>
            <button class="btn btn-primary" type="submit">Daftar sekarang</button>
        </form>
    </section>
    <p class="switch">Sudah punya akun? <a href="{{ route('sirkula.login') }}">Masuk</a></p>
</main>
@endsection
