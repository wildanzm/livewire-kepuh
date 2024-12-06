<div class="max-w-4xl mx-auto mt-10 py-6">
    <h1 class="text-2xl font-bold mb-5">Ajukan Permintaan Surat</h1>

    <!-- Form Pengajuan Surat -->
    <form wire:submit.prevent="submit" class="space-y-6">

        <!-- Upload KTP -->
        <div>
            <label for="image_ktp" class="block text-sm font-medium text-gray-700">Foto KTP</label>
            <input type="file" wire:model="image_ktp" id="image_ktp" class="mt-1 block w-full text-sm">
            @error('image_ktp')
                <span class="text-sm text-red-600">{{ $message }}</span>
            @enderror
        </div>

        <!-- Upload Selfie -->
        <div>
            <label for="image_selfie" class="block text-sm font-medium text-gray-700">Foto Selfie</label>
            <input type="file" wire:model="image_selfie" id="image_selfie" class="mt-1 block w-full text-sm">
            @error('image_selfie')
                <span class="text-sm text-red-600">{{ $message }}</span>
            @enderror
        </div>

        <!-- Pilih Jenis Surat -->
        <div>
            <label for="type_letter_id" class="block text-sm font-medium text-gray-700">Jenis Surat</label>
            <select wire:model.live="type_letter_id" id="type_letter_id"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                <option value="">-- Pilih Jenis Surat --</option>
                @foreach ($typeLetters as $type)
                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                @endforeach
            </select>
            @error('type_letter_id')
                <span class="text-sm text-red-600">{{ $message }}</span>
            @enderror
        </div>

        <!-- Form Tambahan -->
        @if ($isFormVisible)
            @foreach ($formFields as $field)
                <div>
                    <label for="{{ $field['name'] }}"
                        class="block text-sm font-medium text-gray-700">{{ $field['label'] }}</label>
                    @if ($field['type'] === 'text' || $field['type'] === 'date' || $field['type'] === 'number')
                        <input type="{{ $field['type'] }}" wire:model="formFieldsValues.{{ $field['name'] }}"
                            id="{{ $field['name'] }}"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                            placeholder="{{ $field['placeholder'] }}">
                    @elseif ($field['type'] === 'textarea')
                        <textarea wire:model="formFieldsValues.{{ $field['name'] }}" id="{{ $field['name'] }}" rows="3"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                            placeholder="{{ $field['placeholder'] }}"></textarea>
                    @elseif ($field['type'] === 'select')
                        <select wire:model="formFieldsValues.{{ $field['name'] }}" id="{{ $field['name'] }}"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                            <option value="">-- Pilih {{ $field['label'] }} --</option>
                            @foreach ($field['options'] as $option)
                                <option value="{{ $option }}">{{ $option }}</option>
                            @endforeach
                        </select>
                    @endif
                    @error("formFieldsValues.{$field['name']}")
                        <span class="text-sm text-red-600">{{ $message }}</span>
                    @enderror
                </div>
            @endforeach
        @endif

        <!-- Submit Button -->
        <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700">
            Ajukan Permintaan
        </button>
    </form>
</div>
