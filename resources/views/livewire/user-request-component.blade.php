<div class="max-w-4xl mx-auto mt-24 py-6 bg-white shadow-xl p-8 my-10 rounded-xl">
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
            <!-- Tambah Anggota Keluarga untuk Surat Pindah (Type Letter ID 2) -->
            @if ($type_letter_id == 2)
                <div class="mt-6 border-t pt-4">
                    <h3 class="text-lg font-semibold mb-4">Tambah Anggota Keluarga</h3>

                    <!-- Family Member Input Fields -->
                    @foreach ($familyMemberFields as $field)
                        <div class="mb-4">
                            <label for="family_{{ $field['name'] }}" class="block text-sm font-medium text-gray-700">
                                {{ $field['label'] }}
                            </label>
                            <input type="{{ $field['type'] }}"
                                wire:model="formFieldsValues.family_{{ $field['name'] }}"
                                id="family_{{ $field['name'] }}"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                                placeholder="{{ $field['placeholder'] }}">

                            @error('formFieldsValues.family_' . $field['name'])
                                <span class="text-sm text-red-600">{{ $message }}</span>
                            @enderror
                        </div>
                    @endforeach

                    <!-- Tombol Tambah Anggota Keluarga -->
                    <div class="mb-4">
                        <button type="button" wire:click.prevent="addFamilyMember"
                            class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600">
                            Tambah Anggota Keluarga
                        </button>
                    </div>

                    <!-- Daftar Anggota Keluarga yang Ditambahkan -->
                    @if (!empty($familyMembers))
                        <div class="mt-4">
                            <h4 class="text-md font-semibold mb-2">Daftar Anggota Keluarga</h4>
                            <div class="space-y-2">
                                @foreach ($familyMembers as $index => $member)
                                    <div class="flex justify-between items-center bg-gray-100 p-3 rounded-md">
                                        <div>
                                            <span class="font-medium">NIK:</span> {{ $member['nik'] ?? 'N/A' }} |
                                            <span class="font-medium">Nama:</span> {{ $member['name'] ?? 'N/A' }} |
                                            <span class="font-medium">Status:</span> {{ $member['shdk'] ?? 'N/A' }}
                                        </div>
                                        <button type="button"
                                            wire:click.prevent="removeFamilyMember({{ $index }})"
                                            class="text-red-500 hover:text-red-700">
                                            Hapus
                                        </button>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
            @endif

            @if ($type_letter_id == 6)
                <div class="mt-6 border-t pt-4">
                    <h3 class="text-lg font-semibold mb-4">Detail Taksiran</h3>

                    <!-- Input Field Dinamis untuk Detail Taksiran -->
                    @foreach ($assessmentFields as $field)
                        <div class="mb-4">
                            <label for="assessment_{{ $field['name'] }}"
                                class="block text-sm font-medium text-gray-700">
                                {{ $field['label'] }}
                            </label>
                            <input type="text" wire:model.lazy="formFieldsValues.assessment_{{ $field['name'] }}"
                                id="assessment_{{ $field['name'] }}"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                                placeholder="{{ $field['placeholder'] }}"
                                @if (isset($field['readonly']) && $field['readonly']) readonly @endif
                                value="{{ isset($formFieldsValues['assessment_' . $field['name']])
                                    ? number_format((float) str_replace('.', '', $formFieldsValues['assessment_' . $field['name']]), 0, ',', '.')
                                    : '' }}"
                                oninput="this.value = formatRupiah(this.value)">
                        </div>
                    @endforeach
                </div>
            @endif
        @endif

        <!-- Submit Button -->
        <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700">
            Ajukan Permintaan
        </button>
    </form>
</div>
