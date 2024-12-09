<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="styles.css">
    <title>Surat Keterangan Domisili</title>
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
            padding: 4rem;
            font-family: serif;
        }

        /* Header Styles */
        .header {
            text-align: center;
            margin-bottom: 1rem;
        }

        .header-content {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .logo {
            width: 4.7rem;
            height: auto;
            margin-bottom: 1rem;
            margin-left: -4rem;
        }

        .header-text {
            margin-left: 0.5rem;
        }

        .government-name {
            font-size: 1.5rem;
            font-weight: bold;
            text-transform: uppercase;
        }

        .district-name,
        .village-name {
            font-size: 1.5rem;
            font-weight: 600;
            text-transform: uppercase;
            padding-top: 0.5rem;
            padding-bottom: 0.5rem;
            font-weight: bold;
        }

        .address {
            font-size: 1rem;
            letter-spacing: 0.025em;
            font-weight: 500;
        }

        .header-divider {
            border-color: black;
            border-width: 2px;
        }

        /* Content Styles */
        .content {
            margin-bottom: 1.5rem;
            font-size: 1.1rem;
        }

        .letter-title {
            font-size: 1.125rem;
            font-weight: bold;
            text-transform: uppercase;
            text-align: center;
            text-decoration: underline;
        }

        .letter-number {
            font-size: 1.1rem;
            text-align: center;
            padding: 1rem 0;
        }

        .introduction,
        .domicile-confirmation,
        .closing-statement {
            font-size: 1.1rem;
            margin-bottom: 1rem;
        }

        .person-details {
            width: 100%;
            margin-bottom: 1.5rem;
            font-size: 1.1rem;
        }

        .detail-label {
            width: 33.333%;
            font-weight: 600;
            padding-bottom: 1rem;
        }

        /* Footer Styles */
        .footer {
            display: flex;
            justify-content: flex-end;
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
            font-weight: 600;
        }

        .signature-nip {
            font-size: 0.875rem;
        }

        .logo-pemerintah {
            width: 6rem;
            height: auto;
            margin-bottom: 1rem;
            /* mb-4 */
            margin-left: -6rem;
            margin-right: 0.3rem
                /* -ml-16 */
        }
    </style>
</head <body>
<!-- Header -->
<div class="header">
    <div class="header-content">
        <img src="{{ public_path('images/sindangkasih-sugih-mukti-logo-7BA62C1744-seeklogo.com.png') }}"
            alt="Logo Pemerintah" class="logo-pemerintah" />
        <div class="header-text">
            <h1 class="government-name">Pemerintah Kabupaten Majalengka</h1>
            <h2 class="district-name">Kecamatan Lemahsugih</h2>
            <h2 class="village-name">Desa Kepuh</h2>
            <p class="address"><span>Alamat:</span> Jln Raya Desa Kepuh No 01 Kec. Lemahsugih Kab. Majalengka 45465
            </p>
        </div>
    </div>
    <hr class="header-divider" />
</div>

<!-- Content -->
<div class="content">
    <h3 class="letter-title">Surat Keterangan Berdomisili</h3>
    <p class="letter-number">Nomor: [Nomor Surat]</p>
    <p class="introduction">Yang bertanda tangan di bawah ini, Kepala Desa Kepuh Kecamatan Lemahsugih Kabupaten
        Majalengka, dengan ini menerangkan bahwa:</p>
    <table class="person-details">
        <tr>
            <td class="detail-label">NIK</td>
            <td>: {{ $domicileLetter->nik }}</td>
        </tr>
        <tr>
            <td class="detail-label">Nama Lengkap</td>
            <td>: {{ $domicileLetter->name }}</td>
        </tr>
        <tr>
            <td class="detail-label">Jenis Kelamin</td>
            <td>: {{ $domicileLetter->gender }}</td>
        </tr>
        <tr>
            <td class="detail-label">Tempat/Tgl Lahir</td>
            <td>: {{ $domicileLetter->birth_date }}</td>
        </tr>
        <tr>
            <td class="detail-label">Bangsa/Agama</td>
            <td>: {{ $domicileLetter->religion }}</td>
        </tr>
        <tr>
            <td class="detail-label">Pekerjaan</td>
            <td>: {{ $domicileLetter->occupation }}</td>
        </tr>
        <tr>
            <td class="detail-label">Alamat pada KTP</td>
            <td>: {{ $domicileLetter->address }}</td>
        </tr>
    </table>
    <p class="domicile-confirmation">Bahwa yang bersangkutan benar-benar Berdomisili di kepuh RT 013 RW 004 Desa
        Kepuh Kecamatan Lemahsugih Kabupaten Majalengka</p>
    <p class="closing-statement">Demikian surat keterangan domisili ini kami buat dengan sebenarnya agar di gunakan
        dengan sebaik-baiknya.</p>
</div>

<!-- Footer -->
<div class="footer">
    <div class="signature-section">
        <p class="date">Kepuh, {{ now()->translatedFormat('j F Y') }}</p>
        <p class="signature-title">An. Kepala Desa Kepuh</p>
        <p class="signature-name">[Nama Kepala Desa]</p>
        <p class="signature-nip">NIP. [NIP Kepala Desa]</p>
    </div>
</div>
</body>

</html>
