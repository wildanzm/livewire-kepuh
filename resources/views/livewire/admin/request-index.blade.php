<div>
    <div
        class="p-4 bg-white block sm:flex items-center justify-between border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
        <div class="w-full mb-1">
            <div class="mb-4">
                <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">Permintaan Surat</h1>
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
                <div class="flex items-center ml-auto space-x-2 sm:space-x-3">
                    <button type="button"
                        class="inline-flex items-center justify-center w-1/2 px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 sm:w-auto dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg class="w-5 h-5 mr-2 -ml-1" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                clip-rule="evenodd"></path>
                        </svg>
                        Tambah Permintaan
                    </button>
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
                                    Foto KTP
                                </th>
                                <th scope="col"
                                    class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                    Foto Selfie + KTP
                                </th>
                                <th scope="col"
                                    class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                    Status
                                </th>
                                <th scope="col"
                                    class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                            @forelse ($requests as $request)
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
                                    {{ $request->user->name }}
                                </td>
                                <td
                                    class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $request->typeLetter->name }}
                                </td>
                                <!-- Thumbnail Images -->
                                <!-- Thumbnail Images -->
                                <td
                                    class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    <!-- Thumbnail for KTP -->
                                    <img src="{{ Storage::url($request->image_ktp) }}" alt="KTP Image"
                                        class="h-24 w-auto rounded-md cursor-pointer"
                                        wire:click="openModal('{{ Storage::url($request->image_ktp) }}')" />
                                </td>

                                <td
                                    class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    <!-- Thumbnail for Selfie -->
                                    <img src="{{ Storage::url($request->image_selfie) }}" alt="Selfie Image"
                                        class="h-24 w-auto rounded-md cursor-pointer"
                                        wire:click="openModal('{{ Storage::url($request->image_selfie) }}')" />
                                </td>







                                <td
                                    class="p-4 text-base font-normal text-gray-900 whitespace-nowrap dark:text-white">
                                    @switch($request->request_status_id)
                                    @case(1)
                                    <span
                                        class="bg-red-100 text-red-800 text-sm font-bold me-2 px-3 py-2 rounded-full dark:bg-red-900 dark:text-red-300">Belum
                                        Disetujui</span>
                                    @break

                                    @case(2)
                                    <span
                                        class="bg-lime-100 text-lime-800 text-sm font-bold me-2 px-3 py-1 rounded-full dark:bg-lime-900 dark:text-lime-300">Disetujui</span>
                                    @break

                                    @case(3)
                                    <span
                                        class="bg-red-100 text-red-800 text-sm font-bold me-2 px-3 py-1 rounded-full dark:bg-red-900 dark:text-red-300">Ditolak</span>
                                    @break

                                    @case(4)
                                    <span
                                        class="bg-amber-100 text-amber-800 text-sm font-bold me-2 px-3 py-1 rounded-full dark:bg-amber-900 dark:text-amber-300">Diproses</span>
                                    @break

                                    @case(5)
                                    <span
                                        class="bg-green-100 text-green-800 text-sm font-bold me-2 px-3 py-1 rounded-full dark:bg-green-900 dark:text-green-300">Selesai</span>
                                    @break
                                    @endswitch
                                </td>
                                <td class="p-4 space-x-2 whitespace-nowrap">
                                    @switch($request->request_status_id)
                                    @case(1)
                                    <button type="button" wire:click="confirmApprove({{ $request->id }})"
                                        class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                                        Setujui
                                    </button>
                                    <button wire:click="confirmReject({{ $request->id }})" type="button"
                                        class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-800 focus:ring-4 focus:ring-red-300 dark:focus:ring-red-900">
                                        Tolak
                                    </button>
                                    @break

                                    @case(2)
                                    <button type="button" wire:click="confirmProcess({{ $request->id }})"
                                        class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-amber-700 hover:bg-amber-800 focus:ring-4 focus:ring-amber-300 dark:bg-amber-600 dark:hover:bg-amber-700 dark:focus:ring-amber-800">
                                        Proses
                                    </button>
                                    @break

                                    @case(3)
                                    @break

                                    @case(4)
                                    <!-- Tombol Selesai -->
                                    <button type="button" wire:click="confirmComplete({{ $request->id }})"
                                        class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                                        Selesai
                                    </button>

                                    @if ($request->domicileLetter)
                                    <!-- Tombol untuk menampilkan modal -->
                                    <button type="button" wire:click="showPdfModalPDF"
                                        class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 dark:bg-blue-500 dark:hover:bg-blue-600 dark:focus:ring-blue-800">
                                        Lihat Surat
                                    </button>


                                    <x-modal name="pdf-preview-modal" wire:model.defer="isModalOpenpdf">
                                        <x-card title="Domicile Letter">
                                            @if ($domicileLetter)
                                            <iframe
                                                src="data:application/pdf;base64,{{ base64_encode($domicileLetter['content']) }}"
                                                class="w-full h-screen" frameborder="0"></iframe>
                                            @else
                                            <p>Data surat tidak tersedia untuk ditampilkan.</p>
                                            @endif
                                        </x-card>
                                    </x-modal>
                                    @else
                                    <p>Data surat tidak tersedia.</p>
                                    @endif

                                    <!-- Tombol Download PDF -->
                                    <button type="button" wire:click="downloadPdf"
                                        class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-emerald-700 hover:bg-emerald-800 focus:ring-4 focus:ring-emerald-300 dark:bg-emerald-600 dark:hover:bg-emerald-700 dark:focus:ring-green-800">
                                        Download PDF
                                    </button>
                                    @break

                                    @case(5)
                                    @break
                                    @endswitch
                                </td>
                            </tr>
                            @empty
                            @endforelse
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