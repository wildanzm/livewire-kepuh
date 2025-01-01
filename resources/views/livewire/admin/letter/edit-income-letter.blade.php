<div class="max-w-4xl mx-auto my-6  bg-white shadow-xl p-8  rounded-xl">
    <h2 class="text-2xl font-bold mb-4">Edit Data Surat Keterangan Tidak Mampu</h2>

    @if (session()->has('message'))
        <div class="mb-4 text-green-500">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="update">
        @foreach ([['number_letter', 'Nomor Surat', 'text'], ['name', 'Nama', 'text'], ['nik', 'NIK', 'number'], ['birth_place', 'Tempat Lahir', 'text'], ['birth_date', 'Tanggal Lahir', 'date'], ['occupation', 'Pekerjaan', 'text'], ['address', 'Alamat', 'textarea'], ['average_income', 'Rata-rata Penghasilan', 'number'], ['parent_name', 'Nama Orang Tua', 'text'], ['parent_nik', 'NIK Orang Tua', 'number'], ['parent_gender', 'Jenis Kelamin Orang Tua', 'text'], ['parent_birth_place', 'Tempat Lahir Orang Tua', 'text'], ['parent_nationality', 'Kewarganegaraan Orang Tua', 'text'], ['parent_religion', 'Agama Orang Tua', 'text'], ['parent_address', 'Alamat Orang Tua', 'textarea']] as $field)
            <div class="mb-4">
                <label for="{{ $field[0] }}"
                    class="block text-sm font-medium text-gray-700">{{ $field[1] }}</label>
                @if (isset($field[2]) && $field[2] === 'textarea')
                    <!-- Check if the third element exists and is 'textarea' -->
                    <textarea id="{{ $field[0] }}" wire:model="{{ $field[0] }}"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"></textarea>
                @else
                    <input type="{{ $field[2] ?? 'text' }}" id="{{ $field[0] }}" wire:model="{{ $field[0] }}"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                @endif
                @error($field[0])
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
        @endforeach

        {{-- Dropdown untuk Gender --}}
        <div class="mb-4">
            <label for="parent_gender" class="block text-sm font-medium text-gray-700">Jenis Kelamin</label>
            <select id="parent_gender" wire:model="parent_gender"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                <option value="" disabled selected>Pilih Jenis Kelamin</option>
                <option value="Laki-Laki" {{ $parent_gender === 'Laki-Laki' ? 'selected' : '' }}>Laki-laki</option>
                <option value="Perempuan" {{ $parent_gender === 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
            </select>
            @error('gender')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="flex justify-end">
            <button type="submit"
                class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700">Simpan</button>
            <a href="{{ route('admin.income-letter') }}"
                class="ml-4 px-4 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400">Batal</a>
        </div>
    </form>
</div>
