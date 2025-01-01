<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Surat
        Keterangan Pendapatan</title>
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

        td,
        .size-text,
        .letter-number,
        .letter-title,
        .signature-section {
            font-size: 15.9px
        }

        .data-label {
            width: 200px;
            vertical-align: top;
            /* padding: 0.25rem 0; */
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
        <h3 class="letter-title">Surat
            Keterangan Pendapatan</h3>
        <p class="letter-number">Nomor: {{ $income->number_letter }}</p>
        <p class="size-text">
            Yang bertanda tangan di bawah ini, Kepala Desa Kepuh Kecamatan
            Lemahsugih Kabupaten Majalengka, dengan ini menerangkan bahwa:
        </p>
        <table class="data-table">
            <tr>
                <td class="data-label">Nama</td>
                <td>: {{ $income->name }}</td>
            </tr>
            <tr>
                <td class="data-label">NIK</td>
                <td>: {{ $income->nik }}</td>
            </tr>
            <tr>
                <td class="data-label">Tempat/Tanggal Lahir</td>
                <td>: {{ $income->birth_place }}, {{ $income->birth_date }}</td>
            </tr>
            <tr>
                <td class="data-label">Alamat</td>
                <td>: {{ $income->address }}</td>
            </tr>
        </table>
        <p class="size-text">Adalah bnear orang tua dari :</p>

        <table class="data-table">
            <tr>
                <td class="data-label">Nama</td>
                <td>: {{ $income->parent_name }}</td>
            </tr>
            <tr>
                <td class="data-label">NIK</td>
                <td>: {{ $income->parent_nik }}</td>
            </tr>
            <tr>
                <td class="data-label">Jenis Kelamin</td>
                <td>: {{ $income->parent_gender }}</td>
            </tr>
            <tr>
                <td class="data-label">Tempat/Tanggal Lahir</td>
                <td>: {{ $income->parent_birth_place }}, {{ $income->parent_birth_date }}</td>
            </tr>
            <tr>
                <td class="data-label">Warga Negara</td>
                <td>: {{ $income->parent_nationality }}</td>
            </tr>
            <tr>
                <td class="data-label">Agama</td>
                <td>: {{ $income->parent_religion }}</td>
            </tr>
            <tr>
                <td class="data-label">Alamat</td>
                <td>: {{ $income->parent_address }}</td>
            </tr>
        </table>

        <p class="size-text">
            Menyatakan benar bahwa yang bersangkutan adalah orang tua/wali dari "{{ $income->name }}" dengan mempunyai
            penghasilan rata-rata sebesar Rp. {{ $formattedIncome }},- ({{ $incomeText }})/Bulan
        </p>
        <p class="size-text">
            Demikian surat keterangan ini kamu buat dengan sebenarnya dan digunakan sebagaimana mestinya.
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
