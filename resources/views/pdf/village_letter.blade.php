<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SURAT KETERANGAN DESA</title>
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
            margin-bottom: 5px;
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
            margin-top: -1rem
        }

        .signature-title {
            margin-bottom: 6rem;
        }

        .signature-name {
            font-weight: bold;
        }

        td,
        .size-text,
        li {
            font-size: 13px;
        }

        .data-table {
            margin: 1rem 0;
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
        <h3 class="letter-title">SURAT KETERANGAN DESA</h3>
        <p class="letter-number">Nomor: {{ $villageLetter->number_letter }}</p>
        <p class="size-text">Yang bertanda tangan di bawah ini:</p>

        <table class="data-table">
            <tr>
                <td class="data-label">Kepala Desa</td>
                <td>: Kepuh</td>
            </tr>
            <tr>
                <td class="data-label">Kecamatan</td>
                <td>: Lemahsugih</td>
            </tr>
            <tr>
                <td class="data-label">Kabupaten</td>
                <td>: Majalengka</td>
            </tr>
        </table>

        <p class="size-text">Menerangkan bahwa salinan Letter C:</p>

        <table class="data-table">
            <tr>
                <td class="data-label">Nomor Sppt</td>
                <td>: {{ $villageLetter->sppt_number }}</td>
                <td class="data-label">Luas Tanah</td>
                <td>: {{ $villageLetter->land_area }} M2</td>
            </tr>
            <tr>
                <td class="data-label">Nomor Persil</td>
                <td>: {{ $villageLetter->persil_number }}</td>
                <td class="data-label">Pemilikan Tanah Atas Nama</td>
                <td>: {{ $villageLetter->land_owner }}</td>
            </tr>
            <tr>
                <td class="data-label">Kohir No</td>
                <td>: {{ $villageLetter->kohir_number }}</td>
                <td class="data-label">Kelas</td>
                <td>: {{ $villageLetter->class }}</td>
            </tr>
            <tr>
                <td class="data-label">Batas Tanah</td>
                <td></td>
                <td class="data-label">Sebelah Utara</td>
                <td>: {{ $villageLetter->north_border }}</td>
            </tr>
            <tr>
                <td class="data-label"></td>
                <td></td>
                <td class="data-label">Sebelah Timur</td>
                <td>: {{ $villageLetter->east_border }}</td>
            </tr>
            <tr>
                <td class="data-label"></td>
                <td></td>
                <td class="data-label">Sebelah Selatan</td>
                <td>: {{ $villageLetter->south_border }}</td>
            </tr>
            <tr>
                <td class="data-label"></td>
                <td></td>
                <td class="data-label">Sebelah Barat</td>
                <td>: {{ $villageLetter->west_border }}</td>
            </tr>
        </table>


        <ol>
            <li>Adalah Benar dimiliki/dikuasai oleh Ybs. Dan tidak dalam sengketa.</li>
            <li>Tanah/bangunan Ybs belum pernah diterbitkan Letter asli sebelumnya.</li>
            <li>
                Salinan letter C hanya diterbitkan satu kali dan tidak dipublikasikan baik untuk dan atas
                nama Ybs ataupun atas nama orang ketiga.
            </li>
            <li>
                Apabila salinan Letter C No {{ $villageLetter->letter_c_number }} akan ditingkatkan statusnya menjadi
                Sertifikat Hak Milik
                (SHM), maka akan melakukan pemberitahuan ke <strong>BRI Unit Padarek.</strong>
            </li>
        </ol>

        <p class="size-text">Demikian SKD ini dibuat sebagai bukti salinan Letter C tersebut sesuai poin 1 s/d 4.</p>

        <table style="margin-bottom: 2px">
            <tr>
                <td>
                    <p>HARGA TAKSIRAN:</p>
                    <table>
                        <tr>
                            <td>Tanah</td>
                            <td>: Rp. {{ number_format($villageLetter->land_assessment_price, 0, ',', '.') }} -</td>
                        </tr>
                        <tr>
                            <td>Bangunan</td>
                            <td>: Rp. {{ number_format($villageLetter->building_assessment_price, 0, ',', '.') }} -
                            </td>
                        </tr>
                        <tr>
                            <td>Jumlah</td>
                            <td>: Rp. {{ number_format($villageLetter->total_assessment_price, 0, ',', '.') }} -</td>
                        </tr>
                    </table>

                </td>
        </table>
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
