@extends('sirkula.layout')
@section('title', $judul)
@section('content')
<header class="hero">
    <div class="eyebrow">SIRKULA.ID · {{ strtoupper($role) }}</div>
    <h1>{{ $halaman === 'dashboard' ? 'Halo, ' . $pengguna['nama_lengkap'] . '!' : $judul }}</h1>

</header>
<main class="body-content overlap">
    <section class="card">
        @if ($halaman === 'dashboard')

            <div class="detail"><span>Nama</span><strong>{{ $pengguna['nama_lengkap'] }}</strong></div>
            <div class="detail"><span>Peran</span><strong>{{ ucfirst($pengguna['role']) }}</strong></div>
        @else

        @endif
        <h2 class="top-space">Menu {{ ucfirst($role) }}</h2>
        <nav class="menu-grid">
            @foreach (['dashboard'=>'Beranda', 'sampah'=>'Sampah', 'iuran'=>'Iuran', 'kebun'=>'Kebun', 'lapor'=>'Lapor', 'akun'=>'Akun'] as $slug => $nama)
                <a href="{{ route('sirkula.'.$role.'.'.$slug) }}" class="menu-link {{ $halaman === $slug ? 'current' : '' }}">{{ $nama }}</a>
            @endforeach
        </nav>
        <form method="POST" action="{{ route('sirkula.logout') }}" class="top-space">@csrf<button type="submit" class="btn btn-outline">Keluar</button></form>
    </section>
</main>
@endsection
