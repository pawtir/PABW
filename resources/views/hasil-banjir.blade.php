
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Konfirmasi Laporan Banjir</title>

    <link rel="stylesheet" href="{{ asset('css/banjir.css') }}">
</head>

<body>

    <main class="container">

        <div class="header">
            <h1>LaporBanjir</h1>
            <p>Konfirmasi Laporan Banjir</p>
        </div>

        <div class="card">

            <div class="success">
                <h2>Laporan Berhasil Dikirim!</h2>
                <p>Data laporan berhasil diproses.</p>
            </div>

            <h3>Informasi Laporan</h3>

            <table>

                <tr>
                    <td>Nama Pelapor</td>
                    <td>{{ $laporan['nama'] }}</td>
                </tr>

                <tr>
                    <td>Kecamatan</td>
                    <td>{{ $laporan['kecamatan'] }}</td>
                </tr>

                <tr>
                    <td>Desa / Kelurahan</td>
                    <td>{{ $laporan['desa'] }}</td>
                </tr>

                <tr>
                    <td>Tinggi Genangan</td>
                    <td>{{ $laporan['tinggi'] }} cm</td>
                </tr>

            </table>



            <a href="{{ route('banjir.form') }}" class="btn">
                Buat Laporan Baru
            </a>

        </div>

    </main>

</body>
</html>
