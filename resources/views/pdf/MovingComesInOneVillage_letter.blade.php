<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Surat Keterangan Pindah WNI</title>
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
            width: 140px;
            vertical-align: top;
        }

        .sub-data {
            padding-left: 20px;
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

        td {
            font-size: 13px
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
                    <div class="address">TELP <span>(0233) </span> 281757, FAX <span>(0233)</span>281757</div>
                </div>
            </td>
        </tr>
    </table>
    <hr class="header-divider" />

    <!-- Content -->
    <div>
        <table>
            <tr>
                <td class="data-label-atas">PROVINSI</td>
                <td>: JAWA BARAT <span>(32)</span></td>
            </tr>
            <tr>
                <td class="data-label-atas">KABUPATEN/KOTA</td>
                <td>: MAJALENGKA <span>(10)</span></td>
            </tr>
            <tr>
                <td class="data-label-atas">KECAMATAN</td>
                <td>: LEMAHSUGIH <span>(01)</span></td>
            </tr>
            <tr>
                <td class="data-label-atas">DESA/KELURAHAN</td>
                <td>: KEPUH <span>(2007)</span></td>
            </tr>
        </table>
        <h3 class="document-title">SURAT KETERANGAN PINDAH DATANG WNI</h3>
        <p style="text-align: center; margin-top: -0.9rem; font-weight: bold; font-size: 1rem" class="jenis">Dalam Satu
            Desa/
            Kelurahan</p>
        <p class="letter-number">Nomor: {{ $MovingComesInOneVillageLetter->number_letter }}</p>

        <h3 style="margin-bottom: 4px">DATA DAERAH ASAL</h3>
        <table>
            <tr>
                <td class="data-label">1. Nomor Kartu Keluarga</td>
                <td>: {{ $MovingComesInOneVillageLetter->origin_family_card_number }}</td>
            </tr>
            <tr>
                <td class="data-label">2. Nama Kepala Keluarga</td>
                <td>: {{ $MovingComesInOneVillageLetter->origin_head_of_family_name }}</td>
            </tr>
            <tr>
                <td class="data-label">3. Alamat</td>
                <td>
                    : {{ $MovingComesInOneVillageLetter->origin_address }}
                    RT.{{ $MovingComesInOneVillageLetter->origin_rt }}
                    RW.{{ $MovingComesInOneVillageLetter->origin_rw }} <br />
                    <span style="padding-left: 7px">Dusun/Dukuh/Kampung :
                        {{ $MovingComesInOneVillageLetter->origin_hamlet }}</span>
                </td>
            </tr>

            <tr>
                <!-- Desa/Kelurahan dan Kab/Kota -->
                <td class="sub-data">a. Desa/Kelurahan</td>
                <td class="width-kanan">: {{ $MovingComesInOneVillageLetter->origin_village }}</td>
                <td style="width: 90px">c. Kab/Kota</td>
                <td class="width-kanan">: {{ $MovingComesInOneVillageLetter->origin_regency }}</td>
            </tr>
            <tr>
                <!-- Kecamatan dan Provinsi sejajar -->
                <td class="sub-data">b. Kecamatan</td>
                <td class="width-kanan">: {{ $MovingComesInOneVillageLetter->origin_district }}</td>
                <td style="width: 90px">d. Provinsi</td>
                <td>: {{ $MovingComesInOneVillageLetter->origin_province }}</td>
            </tr>
            <tr>
                <!-- Kode Pos di bawah Kecamatan sejajar dengan Telepon -->
                <td></td>
                <td style="padding-left: 10px">Kode Pos : {{ $MovingComesInOneVillageLetter->origin_postal_code }}</td>

                <td style="width: 4px">Telepon</td>
                <td>: {{ $MovingComesInOneVillageLetter->origin_phone }}</td>
            </tr>

            <tr>
                <td class="data-label">4. NIK Pemohon</td>
                <td>: {{ $MovingComesInOneVillageLetter->applicant_nik }}</td>
            </tr>
            <tr>
                <td class="data-label">5. Nama Lengkap</td>
                <td>: {{ $MovingComesInOneVillageLetter->applicant_full_name }}</td>
            </tr>
        </table>

        <h3 style="margin-bottom: 4px">DATA DAERAH TUJUAN</h3>
        <table>
            <tr>
                <td class="data-label">1. Status Nomor KK Bagi Yang Pindah</td>
                <td>: {{ $MovingComesInOneVillageLetter->kk_status_moving }}</td>
            </tr>
            <tr>
                <td class="data-label">2. Nomor Kartu Keluarga</td>
                <td>: {{ $MovingComesInOneVillageLetter->destination_card_number_family }}</td>
            </tr>
            <tr>
                <td class="data-label">3. Nik Kepala Keluarga</td>
                <td>: {{ $MovingComesInOneVillageLetter->destination_nik_head_of_family }}</td>
            </tr>
            <tr>
                <td class="data-label">4. Nama Kepala Keluarga</td>
                <td>: {{ $MovingComesInOneVillageLetter->destination_name_head_of_family }}</td>
            </tr>
            <tr>
                <td class="data-label">5. Tanggal Kedatangan</td>
                <td>:
                    {{ \Carbon\Carbon::parse($MovingComesInOneVillageLetter->destination_arrival_date)->translatedFormat('j F Y') }}
                </td>

            </tr>
            <tr>
                <td class="data-label">6. Alamat</td>
                <td>
                    : {{ $MovingComesInOneVillageLetter->destination_address }}
                    RT.{{ $MovingComesInOneVillageLetter->destination_rt }}
                    RW.{{ $MovingComesInOneVillageLetter->destination_rw }} <br />
                    <span style="padding-left: 7px">Dusun/Dukuh/Kampung :
                        {{ $MovingComesInOneVillageLetter->destination_hamlet }}</span>
                </td>
            </tr>

            <tr>
                <!-- Desa/Kelurahan dan Kab/Kota -->
                <td class="sub-data">a. Desa/Kelurahan</td>
                <td class="width-kanan">: {{ $MovingComesInOneVillageLetter->destination_village }}</td>
                <td style="width: 90px">c. Kab/Kota</td>
                <td class="width-kanan">: {{ $MovingComesInOneVillageLetter->destination_regency }}</td>
            </tr>
            <tr>
                <!-- Kecamatan dan Provinsi sejajar -->
                <td class="sub-data">b. Kecamatan</td>
                <td class="width-kanan">: {{ $MovingComesInOneVillageLetter->destination_district }}</td>
                <td style="width: 90px">d. Provinsi</td>
                <td>: {{ $MovingComesInOneVillageLetter->destination_province }}</td>
            </tr>
            {{-- <tr>
                <!-- Kode Pos di bawah Kecamatan sejajar dengan Telepon -->
                <td></td>
                <td style="padding-left: 10px">Kode Pos : {{$MovingComesInOneVillageLetter->destination_postal_code}}</td>

                <td style="width: 4px">Telepon</td>
                <td>: 123456789</td>
            </tr> --}}
        </table>

        <h3 style="margin-bottom: 4px; margin-top: 4px">Keluarga yang pindah</h3>

        <table style="border: 1px solid black">
            <tr>
                <th style="border: 1px solid black; padding: 0.5rem">NO.</th>
                <th style="border: 1px solid black; padding: 0.5rem">NIK</th>
                <th style="border: 1px solid black; padding: 0.5rem">NAMA</th>
                <th style="border: 1px solid black; padding: 0.5rem">MASA BERLAKU KTP S/D</th>
                <th style="border: 1px solid black; padding: 0.5rem">SHDK</th>
            </tr>
            @foreach ($familyMembers as $index => $member)
                <tr>
                    <td style="border: 1px solid black; padding: 0.5rem">{{ $index + 1 }}</td>
                    <td style="border: 1px solid black; padding: 0.5rem">{{ $member->nik }}</td>
                    <td style="border: 1px solid black; padding: 0.5rem">{{ $member->name }}</td>
                    <td style="border: 1px solid black; padding: 0.5rem">
                        {{ \Carbon\Carbon::parse($member->ktp_expiry)->translatedFormat('j F Y') }}</td>
                    <td style="border: 1px solid black; padding: 0.5rem">{{ $member->shdk }}</td>
                </tr>
            @endforeach
        </table>
    </div>

    <!-- Footer -->
    <table class="footer-table" style="margin-left: auto; text-align: right; width: auto">
        <tr>
            <td>
                <div class="signature-section">
                    <p class="date" style="margin-bottom: -12px">Kepuh, {{ now()->translatedFormat('j F Y') }}</p>
                    <p class="signature-title">An. Kepala Desa Kepuh</p>

                    <p class="signature-name">...............</p>
                    <p class="signature-nip">NIP. ...............</p>
                </div>
            </td>
        </tr>
    </table>
</body>

</html>
