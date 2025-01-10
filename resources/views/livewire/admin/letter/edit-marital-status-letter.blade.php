<div class="max-w-4xl mx-auto my-6  bg-white shadow-xl p-8  rounded-xl ">
    <h2 class="text-2xl font-bold mb-4">Edit Data Surat Keterangan Janda/Duda</h2>

    @if (session()->has('message'))
        <div class="mb-4 text-green-500">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="update">
        @foreach ([['number_letter', 'Nomor Surat', 'text'], ['name', 'Nama', 'text'], ['birth_place', 'Tempat Lahir', 'text'], ['birth_date', 'Tanggal Lahir', 'date'], ['religion', 'Agama', 'text'], ['occupation', 'Pekerjaan', 'text'], ['address', 'Alamat', 'textarea']] as $field)
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

        {{-- Dropdown untuk Gender --}}
        <div class="mb-4">
            <label for="gender" class="block text-sm font-medium text-gray-700">Jenis Kelamin</label>
            <select id="gender" wire:model="gender"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                <option value="" disabled selected>Pilih Jenis Kelamin</option>
                <option value="Laki-Laki" {{ $gender === 'Laki-Laki' ? 'selected' : '' }}>Laki-laki</option>
                <option value="Perempuan" {{ $gender === 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
            </select>
            @error('gender')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
        {{-- Dropdown untuk Marital Status --}}
        <div class="mb-4">
            <label for="marital_status" class="block text-sm font-medium text-gray-700">Status Perkawinan</label>
            <select id="marital_status" wire:model="marital_status"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                <option value="" disabled selected>Pilih Status Perkawinan</option>
                <option value="Duda" {{ $marital_status === 'Duda' ? 'selected' : '' }}>Duda</option>
                <option value="Janda" {{ $marital_status === 'Janda' ? 'selected' : '' }}>Janda</option>
            </select>
            @error('marital_status')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
        {{-- Dropdown untuk Status Reason --}}
        <div class="mb-4">
            <label for="status_reason" class="block text-sm font-medium text-gray-700">Alasan Status</label>
            <select id="status_reason" wire:model="status_reason"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                <option value="" disabled selected>Pilih Alasan Status</option>
                <option value="Perceraian" {{ $status_reason === 'Perceraian' ? 'selected' : '' }}>Perceraian</option>
                <option value="Kematian" {{ $status_reason === 'Kematian' ? 'selected' : '' }}>Kematian</option>
            </select>
            @error('status_reason')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>



        <div class="flex justify-end">
            <button type="submit"
                class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700">Simpan</button>
            <a href="{{ route('admin.marital-status-letter') }}"
                class="ml-4 px-4 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400">Batal</a>
        </div>
    </form>
</div>
