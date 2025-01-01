<div class="max-w-4xl mx-auto my-6  bg-white shadow-xl p-8  rounded-xl ">
    <h2 class="text-2xl font-bold mb-4">Edit Data Surat Keterangan Usaha</h2>

    @if (session()->has('message'))
        <div class="mb-4 text-green-500">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="update">
        @foreach ([
        ['number_letter', 'Nomor Surat', 'text'],
        ['family_head_name', 'Nama Kepala Keluarga', 'text'],
        ['family_card_number', 'Nomor Kartu Keluarga', 'number'],
        ['baby_name', 'Nama Bayi', 'text'],

        ['birth_date', 'Tanggal Lahir', 'date'],
        ['birth_time', 'Waktu Lahir', 'time'],
        ['birth_order', 'Urutan Kelahiran', 'number'],
        ['birth_helper', 'Penolong Kelahiran', 'text'],
        ['baby_weight', 'Berat Bayi (kg)', 'number'],
        ['baby_length', 'Panjang Bayi (cm)', 'number'],
        ['mother_nik', 'NIK Ibu', 'number'],
        ['mother_name', 'Nama Ibu', 'text'],
        ['mother_birth_date', 'Tanggal Lahir Ibu', 'date'],
        ['mother_age', 'Usia Ibu', 'number'],
        ['mother_occupation', 'Pekerjaan Ibu', 'text'],
        ['mother_address', 'Alamat Ibu', 'textarea'],
        ['mother_nationality', 'Kewarganegaraan Ibu', 'text'],
        ['mother_ethnicity', 'Etnis Ibu', 'text'],
        ['mother_marriage_date', 'Tanggal Pernikahan Ibu', 'date'],
        ['father_nik', 'NIK Ayah', 'number'],
        ['father_name', 'Nama Ayah', 'text'],
        ['father_birth_date', 'Tanggal Lahir Ayah', 'date'],
        ['father_age', 'Usia Ayah', 'number'],
        ['father_occupation', 'Pekerjaan Ayah', 'text'],
        ['father_address', 'Alamat Ayah', 'textarea'],
        ['father_nationality', 'Kewarganegaraan Ayah', 'text'],
        ['father_ethnicity', 'Etnis Ayah', 'text'],
        ['father_marriage_date', 'Tanggal Pernikahan Ayah', 'date'],
        ['reporter_nik', 'NIK Pelapor', 'number'],
        ['reporter_name', 'Nama Pelapor', 'text'],
        ['reporter_age', 'Usia Pelapor', 'number'],

        ['reporter_occupation', 'Pekerjaan Pelapor', 'text'],
        ['reporter_address', 'Alamat Pelapor', 'textarea'],
        ['witness1_nik', 'NIK Saksi 1', 'number'],
        ['witness1_name', 'Nama Saksi 1', 'text'],
        ['witness1_age', 'Usia Saksi 1', 'number'],
        ['witness1_occupation', 'Pekerjaan Saksi 1', 'text'],
        ['witness1_address', 'Alamat Saksi 1', 'textarea'],
        ['witness2_nik', 'NIK Saksi 2', 'number'],
        ['witness2_name', 'Nama Saksi 2', 'text'],
        ['witness2_age', 'Usia Saksi 2', 'number'],
        ['witness2_occupation', 'Pekerjaan Saksi 2', 'text'],
        ['witness2_address', 'Alamat Saksi 2', 'textarea'],
    ] as $field)
            <div class="mb-4">
                <label for="{{ $field[0] }}"
                    class="block text-sm font-medium text-gray-700">{{ $field[1] }}</label>
                @if ($field[2] === 'textarea')
                    <textarea id="{{ $field[0] }}" wire:model="{{ $field[0] }}"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"></textarea>
                @else
                    <input type="{{ $field[2] }}" id="{{ $field[0] }}" wire:model="{{ $field[0] }}"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                @endif
                @error($field[0])
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
        @endforeach

        {{-- Dropdown untuk Jenis Kelamin Bayi --}}
        <div class="mb-4">
            <label for="baby_gender" class="block text-sm font-medium text-gray-700">Jenis Kelamin Bayi</label>
            <select id="baby_gender" wire:model="baby_gender"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                <option value="" disabled selected>Pilih Jenis Kelamin</option>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
            @error('baby_gender')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        {{-- Dropdown untuk Jenis Kelamin Pelapor --}}
        <div class="mb-4">
            <label for="reporter_gender" class="block text-sm font-medium text-gray-700">Jenis Kelamin Pelapor</label>
            <select id="reporter_gender" wire:model="reporter_gender"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                <option value="" disabled selected>Pilih Jenis Kelamin</option>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
            @error('reporter_gender')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="flex justify-end">
            <button type="submit"
                class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700">Simpan</button>
            <a href="{{ route('admin.birth-letter') }}"
                class="ml-4 px-4 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400">Batal</a>
        </div>
    </form>
</div>
