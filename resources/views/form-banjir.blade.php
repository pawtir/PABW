<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Form Pelaporan Banjir</title>

    <link rel="stylesheet" href="{{ asset('css/banjir.css') }}">
</head>

<body>

    <main class="container">

        <div class="header">
            <h1>LaporBanjir</h1>
            <p>Sistem Pelaporan Banjir Kabupaten Bandung</p>
        </div>

        <div class="card">

            <h2>Form Pelaporan Banjir</h2>
            <p>Silakan isi informasi kejadian banjir.</p>

            @if ($errors->any())
                <div class="error">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('banjir.proses') }}" method="POST">

                @csrf

                <div class="form-group">
                    <label for="nama">Nama Pelapor</label>
                    <input
                        type="text"
                        id="nama"
                        name="nama"
                        value="{{ old('nama') }}"
                        placeholder="Masukkan nama lengkap"
                        maxlength="100"
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="kecamatan">Kecamatan</label>
                    <input
                        type="text"
                        id="kecamatan"
                        name="kecamatan"
                        value="{{ old('kecamatan') }}"
                        placeholder="Masukkan kecamatan"
                        maxlength="100"
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="desa">Desa / Kelurahan</label>
                    <input
                        type="text"
                        id="desa"
                        name="desa"
                        value="{{ old('desa') }}"
                        placeholder="Masukkan desa"
                        maxlength="100"
                        required
                    >
                </div>

                <div class="form-group">
                    <label for="tinggi">Tinggi Genangan Air (cm)</label>
                    <input
                        type="number"
                        id="tinggi"
                        name="tinggi"
                        value="{{ old('tinggi') }}"
                        placeholder="Contoh: 75"
                        min="0"
                        max="1000"
                        step="0.1"
                        required
                    >
                </div>

                <button type="submit">
                    Kirim Laporan
                </button>

            </form>

        </div>
    </main>

</body>
</html>
