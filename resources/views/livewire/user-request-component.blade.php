<div class="max-w-4xl mx-auto mt-10">
    <h1 class="text-2xl font-bold mb-5">Ajukan Permintaan Surat</h1>
    <form wire:submit="submit" class="space-y-6">
        @csrf
        <!-- Input Nama -->
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700">Nama</label>
            <input type="text" wire:model="name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
            @error('name') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
        </div>

        <!-- Input NIK -->
        <div>
            <label for="nik" class="block text-sm font-medium text-gray-700">NIK</label>
            <input type="number" wire:model="nik" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
            @error('nik') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
        </div>

        <!-- Input Jenis Kelamin -->
        <div>
            <label for="gender" class="block text-sm font-medium text-gray-700">Jenis Kelamin</label>
            <select wire:model="gender" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                <option value="">-- Pilih Jenis Kelamin --</option>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
            @error('gender') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
        </div>

        <!-- Input Tanggal Lahir -->
        <div>
            <label for="birth_date" class="block text-sm font-medium text-gray-700">Tanggal Lahir</label>
            <input type="date" id="birth_date" wire:model="birth_date" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
            @error('birth_date') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
        </div>

        <!-- Input Kewarganegaraan -->
        <div>
            <label for="nationality" class="block text-sm font-medium text-gray-700">Kewarganegaraan</label>
            <input type="text" id="nationality" wire:model="nationality" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
            @error('nationality') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
        </div>

        <!-- Input Agama -->
        <div>
            <label for="religion" class="block text-sm font-medium text-gray-700">Agama</label>
            <select id="religion" wire:model="religion" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                <option value="">-- Pilih Agama --</option>
                <option value="Islam">Islam</option>
                <option value="Kristen">Kristen</option>
                <option value="Katolik">Katolik</option>
                <option value="Hindu">Hindu</option>
                <option value="Buddha">Buddha</option>
                <option value="Konghucu">Konghucu</option>
            </select>
            @error('religion') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
        </div>

        <!-- Input Pekerjaan -->
        <div>
            <label for="occupation" class="block text-sm font-medium text-gray-700">Pekerjaan</label>
            <input type="text" id="occupation" wire:model="occupation" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
            @error('occupation') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
        </div>

        <!-- Input Alamat -->
        <div>
            <label for="address" class="block text-sm font-medium text-gray-700">Alamat</label>
            <textarea id="address" wire:model="address" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500"></textarea>
            @error('address') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
        </div>

        <!-- Jenis Surat -->
        <div>
            <label for="type_letter_id" class="block text-sm font-medium text-gray-700">Jenis Surat</label>
            <select wire:model="type_letter_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                <option value="">-- Pilih Jenis Surat --</option>
                @foreach ($typeLetters as $type)
                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                @endforeach
            </select>
            @error('type_letter_id') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
        </div>

        <!-- Upload KTP -->
        <div>
            <label for="image_ktp" class="block text-sm font-medium text-gray-700">Foto KTP</label>
            <input type="file" wire:model="image_ktp" class="mt-1 block w-full text-sm">
            @error('image_ktp') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
        </div>

        <!-- Upload Selfie -->
        <div>
            <label for="image_selfie" class="block text-sm font-medium text-gray-700">Foto Selfie</label>
            <input type="file" wire:model="image_selfie" class="mt-1 block w-full text-sm">
            @error('image_selfie') <span class="text-sm text-red-600">{{ $message }}</span> @enderror
        </div>

        <!-- Submit Button -->
        <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700">Ajukan Permintaan</button>
    </form>
</div>
