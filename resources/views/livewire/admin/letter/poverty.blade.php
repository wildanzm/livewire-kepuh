<div>
    <div>
        <div
            class="p-4 bg-white block sm:flex items-center justify-between border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
            <div class="w-full mb-1">
                <div class="mb-4">
                    <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">Permintaan Surat
                        Keterangan Tidak Mampu
                    </h1>
                </div>
                <div>
                    @if (session()->has('success'))
                        <x-notifications />
                        <script>
                            // Menampilkan notifikasi menggunakan WireUI
                            window.addEventListener('DOMContentLoaded', () => {
                                setTimeout(() => {
                                    window.$wireui.notify({
                                        icon: 'success',
                                        title: 'Success',
                                        description: "{{ session('success') }}",
                                    });
                                }, 500); // Delay opsional 0.5 detik agar lebih mulus
                            });
                        </script>
                    @endif
                </div>
                <div class="sm:flex">
                    <div
                        class="items-center hidden mb-3 sm:flex sm:divide-x sm:divide-gray-100 sm:mb-0 dark:divide-gray-700">
                        <form class="lg:pr-3" action="#" method="GET">
                            <label for="users-search" class="sr-only">Search</label>
                            <div class="relative mt-1 lg:w-64 xl:w-96">
                                <input type="text" name="email" id="users-search"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Cari...">
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        <div class="flex flex-col">
            <div class="overflow-x-auto">
                <div class="inline-block min-w-full align-middle">
                    <div class="overflow-hidden shadow">
                        <table class="min-w-full divide-y divide-gray-200 table-fixed dark:divide-gray-600">
                            <thead class="bg-gray-100 dark:bg-gray-700">
                                <tr>
                                    <th scope="col"
                                        class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                        No
                                    </th>
                                    <th scope="col"
                                        class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                        Nama
                                    </th>
                                    <th scope="col"
                                        class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                        Jenis Surat
                                    </th>
                                    <th scope="col"
                                        class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                        Nomor Surat
                                    </th>
                                    <th scope="col"
                                        class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                        Foto KTP
                                    </th>
                                    <th scope="col"
                                        class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                        Foto Selfie + KTP
                                    </th>

                                    <th scope="col"
                                        class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                        Aksi
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                                @foreach ($requests as $request)
                                    <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                        <td class="flex items-center p-4 mr-12 space-x-6 whitespace-nowrap">
                                            <div class="text-sm font-normal text-gray-500 dark:text-gray-400">
                                                <div class="text-base font-semibold text-gray-900 dark:text-white">
                                                    {{ $loop->iteration }}
                                                </div>
                                            </div>
                                        </td>
                                        <td
                                            class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $request->povertyLetter->name ?? 'Data tidak tersedia' }}
                                        </td>
                                        <td
                                            class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $request->typeLetter->name }}
                                        </td>
                                        <td
                                            class="p-4 text-base font-medium text-gray-900 break-words whitespace-normal dark:text-white ">
                                            {{ $request->povertyLetter->number_letter ?? 'Belum ada nomor surat. Edit data untuk menambahkan nomor surat.' }}
                                        </td>
                                        <!-- Thumbnail Images -->
                                        <td
                                            class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            <!-- Link for KTP -->
                                            <a href="#" class="text-blue-600 underline cursor-pointer"
                                                wire:click="openModal('{{ Storage::url($request->image_ktp) }}')">
                                                Lihat KTP
                                            </a>
                                        </td>

                                        <td
                                            class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            <!-- Link for Selfie -->
                                            <a href="#" class="text-blue-600 underline cursor-pointer"
                                                wire:click="openModal('{{ Storage::url($request->image_selfie) }}')">
                                                Lihat Selfie
                                            </a>
                                        </td>

                                        <td class="p-4 space-x-2 whitespace-nowrap">
                                            <div class="flex flex-col gap-3">

                                                @if ($request->povertyLetter)
                                                    <a href="{{ route('admin.poverty-letter.download', $request->povertyLetter->id) }}"
                                                        class="flex flex-column items-center justify-center  py-2 px-2 text-sm font-medium text-white bg-amber-700 rounded-lg hover:bg-amber-800 focus:ring-4 focus:ring-amber-300 dark:bg-amber-600 dark:hover:bg-amber-700 dark:focus:ring-amber-800 ease-in-out duration-300">
                                                        <span class="mr-2">Download</span>
                                                        <x-grommet-document-download class="w-5 " />
                                                    </a>
                                                    <a href="{{ route('admin.poverty-letter.streamPDF', $request->povertyLetter->id) }}"
                                                        class="flex flex-column items-center justify-center  py-2 px-2 text-sm font-medium text-white bg-cyan-700 rounded-lg hover:bg-cyan-800 focus:ring-4 focus:ring-cyan-300 dark:bg-cyan-600 dark:hover:bg-cyan-700 dark:focus:ring-cyan-800 ease-in-out duration-300"
                                                        target="_blank">
                                                        <span class="mr-2">Stream</span>
                                                        <x-iconpark-previewopen-o class="w-5" />
                                                    </a>
                                                    <a href="{{ route('admin.poverty.edit', $request->povertyLetter->id) }}"
                                                        class="flex flex-column items-center justify-center  py-2 px-2 text-sm font-medium text-white bg-yellow-400 rounded-lg hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 dark:bg-yellow-600 dark:hover:bg-yellow-700 dark:focus:ring-yellow-800 ease-in-out duration-300">
                                                        <span class="mr-2">Edit</span>
                                                        <x-feathericon-edit class="w-5 " /> </a>
                                                @endif
                                            </div>

                                        </td>
                                    </tr>
                                @endforeach
                                <!-- Modal -->
                                <x-modal name="image-preview-modal" wire:model.defer="isModalOpen" blur='sm'>
                                    <x-card title="Image Preview">
                                        @if ($modalImage)
                                            <img src="{{ $modalImage }}" alt="Image Preview"
                                                class="max-h-screen max-w-full rounded-md" />
                                        @else
                                            <p class="text-gray-500">No image to preview</p>
                                        @endif
                                    </x-card>
                                </x-modal>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
