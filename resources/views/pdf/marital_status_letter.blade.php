<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Surat Keterangan {{ $maritalStatusLetter->marital_status }}</title>
    <style>
        @media print {
            body {
                width: 210mm;
                height: 297mm;
            }
        }

        body {
            background-color: white;
            color: #111827;
            padding: 2rem;
            font-family: serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        .header-table,
        .footer-table {
            margin-bottom: 1rem;
        }

        .header-table td {
            vertical-align: middle;
        }

        .logo {
            width: 70px;
            height: auto;
        }

        .government-name {
            font-size: 1.5rem;
            font-weight: bold;
            text-transform: uppercase;
        }

        .district-name,
        .village-name {
            font-size: 1.5rem;
            font-weight: bold;
            text-transform: uppercase;
        }

        .address {
            font-size: 1rem;
            font-weight: 500;
        }

        .header-divider {
            border: 2px solid black;
            margin-top: 0.5rem;
            margin-bottom: 1rem;
        }

        .letter-title {
            text-align: center;
            font-size: 1.25rem;
            font-weight: bold;
            text-transform: uppercase;
            text-decoration: underline;
            margin: 1rem 0;
        }

        .letter-number {
            text-align: center;
            margin-bottom: 1.5rem;
        }

        .content {
            font-size: 1.1rem;
            margin-bottom: 1.5rem;
        }

        .person-details {
            margin-bottom: 1.5rem;
            font-size: 1.1rem;
        }

        .footer {
            margin-top: 4rem;
            font-size: 1.1rem;
        }

        .signature-section {
            text-align: center;
        }

        .signature-title {
            margin-bottom: 6rem;
        }

        .signature-name {
            font-weight: bold;
        }
    </style>
</head>

<body>
    <!-- Header -->
    <table class="header-table">
        <tr>
            <td style="width: 80px">
                <img src="{{ public_path('images/sindangkasih-sugih-mukti-logo-7BA62C1744-seeklogo.com.png') }}"
                    alt="Logo Pemerintah" class="logo" />
            </td>
            <td align="center">
                <div>
                    <div class="government-name">
                        Pemerintah Kabupaten Majalengka
                    </div>
                    <div class="district-name">Kecamatan Lemahsugih</div>
                    <div class="village-name">Desa Kepuh</div>
                    <div class="address">
                        Alamat: Jln Raya Desa Kepuh No 01 Kec. Lemahsugih
                        Kab. Majalengka 45465
                    </div>
                </div>
            </td>
        </tr>
    </table>
    <hr class="header-divider" />

    <!-- Content -->
    <div class="content">
        <h3 class="letter-title">Surat Keterangan {{ $maritalStatusLetter->marital_status }}</h3>
        <p class="letter-number">Nomor: {{ $maritalStatusLetter->number_letter }}</p>
        <p>
            Yang bertanda tangan di bawah ini, Kepala Desa Kepuh Kecamatan
            Lemahsugih Kabupaten Majalengka, dengan ini menerangkan bahwa:
        </p>
        <table class="person-details">
            <tr>
                <td style="width: 35%">Nama</td>
                <td>: {{ $maritalStatusLetter->name }}</td>
            </tr>
            <tr>
                <td>Tempat, Tgl Lahir</td>
                <td>: {{ $maritalStatusLetter->birth_place }},
                    {{ \Carbon\Carbon::parse($maritalStatusLetter->birth_date)->translatedFormat('j F Y') }}</td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>: {{ $maritalStatusLetter->gender }}</td>
            </tr>
            <tr>
                <td>Pekerjaan</td>
                <td>: {{ $maritalStatusLetter->occupation }}</td>
            </tr>
            <tr>
                <td>Status Perkawinan</td>
                <td>: {{ $maritalStatusLetter->marital_status }}</td>
            </tr>
            <tr>
                <td>Agama</td>
                <td>: {{ $maritalStatusLetter->religion }}</td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>: {{ $maritalStatusLetter->address }}</td>
            </tr>
        </table>
        <p>
            Orang tersebut di atas benar-benar penduduk Desa Kepuh, Kecamatan Lemahsugih, Kabupaten Majalengka yang
            selama ini berstatus {{ $maritalStatusLetter->marital_status }} karena
            {{ strtolower($maritalStatusLetter->status_reason) }}, dan sampai sekarang belum
            menikah lagi.
        </p>
        <p>
            Demikian surat keterangan {{ $maritalStatusLetter->marital_status }} ini di buat agar dapat dipergunakan
            sebegaimana mestinya dan dapat dipertanggung jawabkan kebenerannya.
        </p>
    </div>

    <!-- Footer -->
    <table class="footer-table" style="margin-left: auto; text-align: right; width: auto">
        <tr>
            <td>
                <div class="signature-section">
                    <p class="date">
                        Kepuh, {{ now()->translatedFormat('j F Y') }}
                    </p>
                    <p class="signature-title">An. Kepala Desa Kepuh</p>
                    <p class="signature-name">...............</p>
                    <p class="signature-nip">NIP. ...............</p>
                </div>
            </td>
        </tr>
    </table>
</body>

</html>
