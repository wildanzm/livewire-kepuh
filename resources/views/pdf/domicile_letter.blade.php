<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Surat Keterangan Domisili</title>
    <style>
        body {
            font-family: serif;
            margin: 0;
            padding: 1.5cm;
            background: white;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        td {
            padding: 5px 0;
        }

        .header {
            text-align: center;
        }

        .header img {
            width: 4.3rem;
        }

        .content {
            margin-top: 1rem;
        }

        .footer {
            margin-top: 3rem;
            text-align: right;
        }
    </style>
</head>

<body>
    <!-- Header -->
    <div class="header">
        <img src="path/to/logo.png" alt="Logo" />
        <h1>Pemerintah Kabupaten Majalengka</h1>
        <h2>Kecamatan Lemahsugih</h2>
        <h2>Desa Kepuh</h2>
        <p>Alamat: Jln Raya Desa Kepuh No 01 Kec. Lemahsugih Kab. Majalengka 45465</p>
        <hr>
    </div>

    <!-- Content -->
    <div class="content">
        <h3>Surat Keterangan Berdomisili</h3>
        <p>Nomor: 123/456/789</p>
        <table>
            <tr>
                <td>NIK</td>
                <td>: {{ $data->nik }}</td>
            </tr>
            <tr>
                <td>Nama Lengkap</td>
                <td>: {{ $data->name }}</td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>: {{ $data->gender }}</td>
            </tr>
            <tr>
                <td>Tempat/Tgl Lahir</td>
                <td>: {{ $data->birth_date }}</td>
            </tr>
            <tr>
                <td>Bangsa/Agama</td>
                <td>: {{ $data->nationality }} / {{ $data->religion }}</td>
            </tr>
            <tr>
                <td>Pekerjaan</td>
                <td>: {{ $data->occupation }}</td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>: {{ $data->address }}</td>
            </tr>
        </table>
        <p>Demikian surat ini dibuat untuk digunakan sebagaimana mestinya.</p>
    </div>

    <!-- Footer -->
    <div class="footer">
        <p>Kepuh, {{ now()->format('d M Y') }}</p>
        <p>An. Kepala Desa Kepuh</p>
        <p><b>Nama Kepala Desa</b></p>
        <p>NIP: 1234567890</p>
    </div>
</body>

</html>
