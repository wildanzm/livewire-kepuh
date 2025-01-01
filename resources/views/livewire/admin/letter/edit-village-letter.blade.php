<div class="max-w-4xl mx-auto my-6 bg-white shadow-xl p-8 rounded-xl">
    <h2 class="text-2xl font-bold mb-4">Edit Data Surat Desa</h2>

    @if (session()->has('message'))
        <div class="mb-4 text-green-500">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="update">
        @foreach ([['number_letter', 'Nomor Surat', 'text'], ['sppt_number', 'Nomor SPPT', 'text'], ['persil_number', 'Nomor Persil', 'text'], ['kohir_number', 'Nomor Kohir', 'text'], ['class', 'Kelas', 'text'], ['land_area', 'Luas Tanah', 'number'], ['land_owner', 'Nama Pemilik Tanah', 'text'], ['north_border', 'Batas Utara', 'text'], ['east_border', 'Batas Timur', 'text'], ['south_border', 'Batas Selatan', 'text'], ['west_border', 'Batas Barat', 'text'], ['land_assessment_price', 'Harga Taksiran Tanah', 'text'], ['building_assessment_price', 'Harga Taksiran Bangunan', 'text'], ['total_assessment_price', 'Jumlah Taksiran', 'text']] as $field)
            <div class="mb-4">
                <label for="{{ $field[0] }}"
                    class="block text-sm font-medium text-gray-700">{{ $field[1] }}</label>

                @if ($field[0] === 'total_assessment_price')
                    <!-- Input readonly untuk 'total_assessment_price' -->
                    <input type="{{ $field[2] }}" id="{{ $field[0] }}"
                        wire:model.live.debounce.5ms="{{ $field[0] }}"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                        placeholder="Masukkan {{ $field[1] }}" readonly>
                @else
                    <!-- Input normal untuk kolom lainnya -->
                    <input type="{{ $field[2] }}" id="{{ $field[0] }}"
                        wire:model.live.debounce.5ms="{{ $field[0] }}"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                        placeholder="Masukkan {{ $field[1] }}">
                @endif

                @error($field[0])
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>
        @endforeach

        <div class="flex justify-end">
            <button type="submit"
                class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700">Simpan</button>
            <a href="{{ route('admin.village-letter') }}"
                class="ml-4 px-4 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400">Batal</a>
        </div>
    </form>
</div>


<script>
    document.addEventListener('input', function(e) {
        if (e.target.matches(
                '[wire\\:model.lazy="land_assessment_price"], [wire\\:model.lazy="building_assessment_price"], [wire\\:model.lazy="total_assessment_price"]'
            )) {
            e.target.value = formatRupiah(e.target.value);
        }
    });

    function formatRupiah(value) {
        let number_string = value.replace(/[^,\d]/g, '').toString();
        let split = number_string.split(',');
        let remainder = split[0].length % 3;
        let rupiah = split[0].substr(0, remainder);
        let thousand = split[0].substr(remainder).match(/\d{3}/gi);
        if (thousand) {
            separator = remainder ? '.' : '';
            rupiah += separator + thousand.join('.');
        }
        rupiah = split[1] !== undefined ? rupiah + ',' + split[1] : rupiah;
        return rupiah ? 'Rp. ' + rupiah : '';
    }
</script>
