<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SURAT KETERANGAN KELAHIRAN</title>
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
            margin-bottom: 4px;
            font-size: 19px;
            font-weight: bold;
            text-transform: uppercase;
        }

        .department-name {
            margin-bottom: 2px;
            font-size: 19px;
            font-weight: 600;
            text-transform: uppercase;
        }

        .address {
            margin-bottom: 1px;
            font-size: 1rem;
            letter-spacing: 0.025em;
            font-weight: 500;
        }

        .header-divider {
            border: 2px solid black;

            margin-bottom: 1rem;
        }

        .document-title {
            text-align: center;
            font-size: 17px;
            font-weight: bold;
            text-decoration: underline;
            margin: 1rem 0;
        }

        .letter-number {
            font-size: 17px;
            font-weight: bold;
            margin-top: -0.9rem;
            text-align: center;
        }

        .data-label {
            width: 150px;
            vertical-align: top;
        }

        .sub-data {
            padding-left: 20px;
            width: 25%;
        }

        .footer {
            margin-top: 4rem;
            font-size: 1.1rem;
        }

        .signature-section {
            margin-top: 1rem;
            text-align: center;
        }

        .signature-title {
            margin-bottom: 4rem;
        }

        .signature-name {
            font-weight: bold;
        }

        .data-label-atas {
            width: 60px;
        }

        .data-tabel-dusun {
            padding-right: -200rem;
        }

        .width-kanan {
            width: 250px;
        }

        td,
        p {
            font-size: 13px;
        }

        h3 {
            font-size: 15px;
        }

        .jenis {
            font-size: 17px;
        }

        .address {
            font-size: 15px;
            font-weight: normal;
        }

        th {
            font-size: 13px;
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
            <td style="text-align: center">
                <div>
                    <div class="government-name">Pemerintah Kabupaten Majalengka</div>
                    <div class="department-name">Dinas Kependudukan dan Pencatatan Sipil</div>
                    <div class="address">Jalan K.H Abdul Halim 483 Majalengka</div>
                    <div class="address">
                        TELP <span>(0233) </span> 281757, FAX <span>(0233)</span>281757
                    </div>
                </div>
            </td>
        </tr>
    </table>
    <hr class="header-divider" />

    <!-- Content -->

    <table style="width: 100%">
        <tr>
            <td class="data-label">Pemerintah Desa/Kelurahan</td>
            <td style="width: 40%">: Kepuh</td>
            <td style="width: 100px">Ket:</td>
            <td style="width: 200px">Lembar 1: UPTD/Instansi Pelaksana</td>
        </tr>
        <tr>
            <td class="data-label">Kecamatan</td>
            <td style="width: 40%">: Lemahsugih</td>
            <td></td>
            <td>Lembar 2: Untuk yang bersangkutan</td>
        </tr>
        <tr>
            <td class="data-label">Kabupaten/Kota</td>
            <td>: Majalengka</td>
            <td style="width: 100px"></td>
            <td>Lembar 3: Desa/Kelurahan</td>
        </tr>
        <tr>
            <td class="data-label">Kode Wilayah</td>
            <td>: 45465</td>
            <td style="width: 100px"></td>
            <td>Lembar 4: Kecamatan</td>
        </tr>
    </table>
    <div>
        <h3 class="document-title">SURAT KETERANGAN KELAHIRAN</h3>
        <table>
            <tr>
                <td class="data-label">Nama Kepala Keluarga</td>
                <td>: {{ $birthLetter->family_head_name }}</td>
            </tr>
            <tr>
                <td class="data-label">Nomor Kartu Keluarga</td>
                <td>: {{ $birthLetter->family_card_number }}</td>
            </tr>
        </table>
        <hr />

        <table>
            <p><strong>BAYI/ANAK</strong></p>
            <tr>
                <td class="data-label">1. Nama</td>
                <td>: {{ $birthLetter->baby_name }}</td>
            </tr>
            <tr>
                <td class="data-label">2. Jenis Kelamin</td>
                <td>: {{ $birthLetter->baby_gender }}</td>
            </tr>
            <tr>
                <td class="data-label">3. Tempat Dilahirkan</td>
                <td>: {{ $birthLetter->baby_name }}</td>
            </tr>
            <tr>
                <td class="data-label">4. Tempat Kelahiran</td>
                <td>: {{ $birthLetter->baby_name }}</td>
            </tr>
            <tr>
                <td class="data-label">5. Hari dan Tanggal Lahir</td>
                <td style="width: 25%">: Hari:
                    {{ \Carbon\Carbon::parse($birthLetter->birth_date)->translatedFormat('l') }}</td>
                <td style="width: 100px">Tgl:
                    {{ \Carbon\Carbon::parse($birthLetter->birth_date)->translatedFormat('d') }}</td>
                <td style="width: 150px">Bulan:
                    {{ \Carbon\Carbon::parse($birthLetter->birth_date)->translatedFormat('F') }}</td>
                <td>Tahun: {{ \Carbon\Carbon::parse($birthLetter->birth_date)->translatedFormat('Y') }}</td>
            </tr>
            <tr>
                <td class="data-label">6. Pukul</td>
                <td>: {{ $birthLetter->birth_time }}</td>
            </tr>
            <tr>
                <td>7. Kelahiran Ke</td>
                <td>: {{ $birthLetter->birth_order }}</td>
            </tr>
            <tr>
                <td>8. Penolong Kelahiran</td>
                <td>: {{ $birthLetter->birth_helper }}</td>
            </tr>
            <tr>
                <td>9. Berat Bayi</td>
                <td>: {{ $birthLetter->baby_weight }} Kg</td>
            </tr>
            <tr>
                <td>10. Panjang Bayi</td>
                <td>: {{ $birthLetter->baby_length }} cm</td>
            </tr>
        </table>
        <hr />
        <table>
            <p><strong>IBU</strong></p>
            <tr>
                <td class="data-label">1. NIK</td>
                <td>: {{ $birthLetter->mother_nik }}</td>
            </tr>
            <tr>
                <td class="data-label">2. Nama Lengkap</td>
                <td>: {{ $birthLetter->mother_name }}</td>
            </tr>
            <tr>
                <td class="data-label">3. Tanggal Lahir / Umur</td>
                <td style="width: 50px;">: Tgl:
                    {{ \Carbon\Carbon::parse($birthLetter->mother_birth_date)->translatedFormat('d') }}</td>
                <td style="width: 100px;">Bln:
                    {{ \Carbon\Carbon::parse($birthLetter->mother_birth_date)->translatedFormat('F') }}</td>
                <td style="width: 60px;">Thn:
                    {{ \Carbon\Carbon::parse($birthLetter->mother_birth_date)->translatedFormat('Y') }}</td>
                <td style="width: 80px;">Umur: {{ $birthLetter->mother_age }}</td>
            </tr>
            <tr>
                <td class="data-label">4. Pekerjaan</td>
                <td>: {{ $birthLetter->mother_occupation }}</td>
            </tr>
            <tr>
                <td class="data-label">5. Alamat</td>
                <td>: {{ $birthLetter->mother_address }}</td>
            </tr>
            <tr>
                <td class="data-label">6. Kewarganegaraan</td>
                <td style="width: 150px">: {{ $birthLetter->mother_nationality }}</td>
            </tr>
            <tr>
                <td class="data-label">7. Kebangsaan</td>
                <td>: {{ $birthLetter->mother_ethnicity }}</td>
            </tr>
            <tr>
                <td class="data-label">8. Tgl Pencatatann Perkawinan</td>
                <td>: Tgl: {{ \Carbon\Carbon::parse($birthLetter->mother_marriage_date)->translatedFormat('d') }}</td>
                <td style="width: 150px">Bln:
                    {{ \Carbon\Carbon::parse($birthLetter->mother_marriage_date)->translatedFormat('F') }}</td>
                <td style="width: 150px">Thn:
                    {{ \Carbon\Carbon::parse($birthLetter->mother_marriage_date)->translatedFormat('Y') }}</td>
            </tr>
        </table>
        <hr />
        <table>
            <p><strong>AYAH</strong></p>
            <tr>
                <td class="data-label">1. NIK</td>
                <td>: {{ $birthLetter->father_nik }}</td>
            </tr>
            <tr>
                <td class="data-label">2. Nama Lengkap</td>
                <td>: {{ $birthLetter->father_name }}</td>
            </tr>
            <tr>
                <td class="data-label">3. Tanggal Lahir / Umur</td>
                <td style="width: 140px;">: Tgl:
                    {{ \Carbon\Carbon::parse($birthLetter->father_birth_date)->translatedFormat('d') }}</td>
                <td style="width: 120px">Bln:
                    {{ \Carbon\Carbon::parse($birthLetter->father_birth_date)->translatedFormat('F') }}</td>
                <td style="width: 120px">Thn:
                    {{ \Carbon\Carbon::parse($birthLetter->father_birth_date)->translatedFormat('Y') }}</td>
                <td style="width: 120px;">Umur: {{ $birthLetter->father_age }}</td>
            </tr>
            <tr>
                <td class="data-label">4. Pekerjaan</td>
                <td>: {{ $birthLetter->father_occupation }}</td>
            </tr>
            <tr>
                <td class="data-label">5. Alamat</td>
                <td>: {{ $birthLetter->father_address }}</td>
            </tr>
            <tr>
                <td class="data-label">6. Kewarganegaraan</td>
                <td>: {{ $birthLetter->baby_name }}</td>
            </tr>
            <tr>
                <td class="data-label">7. Kebangsaan</td>
                <td>: {{ $birthLetter->father_nationality }}</td>
            </tr>
        </table>
        <hr />
        <br>
        <table>
            <p><strong>PELAPOR</strong></p>
            <tr>
                <td class="data-label">1. NIK</td>
                <td>: {{ $birthLetter->reporter_nik }}</td>
            </tr>
            <tr>
                <td class="data-label">2. Nama Lengkap</td>
                <td>: {{ $birthLetter->reporter_name }}</td>
            </tr>
            <tr>
                <td class="data-label">3. Umur</td>
                <td>: {{ $birthLetter->reporter_age }} tahun</td>
            </tr>
            <tr>
                <td class="data-label">4. Jenis Kelamin</td>
                <td>: {{ $birthLetter->reporter_gender }}</td>
            </tr>
            <tr>
                <td class="data-label">5. Pekerjaan</td>
                <td>: {{ $birthLetter->reporter_occupation }}</td>
            </tr>
            <tr>
                <td class="data-label">6. Alamat</td>
                <td>: {{ $birthLetter->reporter_address }}</td>
            </tr>
        </table>
        <hr />
        <table>
            <p><strong>SAKSI I</strong></p>
            <tr>
                <td class="data-label">1. NIK</td>
                <td>: {{ $birthLetter->witness1_nik }}</td>
            </tr>
            <tr>
                <td class="data-label">2. Nama Lengkap</td>
                <td>: {{ $birthLetter->witness1_name }}</td>
            </tr>
            <tr>
                <td class="data-label">3. Umur</td>
                <td>: {{ $birthLetter->witness1_age }} tahun</td>
            </tr>
            <tr>
                <td class="data-label">4. Pekerjaan</td>
                <td>: {{ $birthLetter->witness1_occupation }}</td>
            </tr>
            <tr>
                <td class="data-label">5. Alamat</td>
                <td>: {{ $birthLetter->witness1_address }}</td>
            </tr>
        </table>
        <hr />
        <table>
            <p><strong>SAKSI II</strong></p>
            <tr>
                <td class="data-label">1. NIK</td>
                <td>: {{ $birthLetter->witness2_nik }}</td>
            </tr>
            <tr>
                <td class="data-label">2. Nama Lengkap</td>
                <td>: {{ $birthLetter->witness2_name }}</td>
            </tr>
            <tr>
                <td class="data-label">3. Umur</td>
                <td>: {{ $birthLetter->witness2_age }} tahun</td>
            </tr>
            <tr>
                <td class="data-label">4. Pekerjaan</td>
                <td>: {{ $birthLetter->witness2_occupation }}</td>
            </tr>
            <tr>
                <td class="data-label">5. Alamat</td>
                <td>: {{ $birthLetter->witness2_address }}</td>
            </tr>
        </table>
        <hr />
    </div>

    <!-- Footer -->
    <table class="" style="margin-top: 1rem; width: 100%">
        <tr>
            <td style="width: 25%">
                <div class="signature-section">
                    <p class="date" style="margin-bottom: -12px">Mengetahui</p>
                    <p class="signature-title">Kepala Desa/Lurah</p>

                    <p class="signature-name">(...........................................)</p>
                </div>
            </td>
            <td style="width: 25%">
                <div class="signature-section">
                    <p class="date" style="margin-bottom: -12px">
                        {{ now()->translatedFormat('j F Y') }}
                    </p>
                    <p class="signature-title">{{ $birthLetter->reporter_name }}</p>

                    <p class="signature-name">(...........................................)</p>
                </div>
            </td>
        </tr>
    </table>
</body>

</html>
