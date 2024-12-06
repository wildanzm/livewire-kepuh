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
                                            {{ $request->user->name }}
                                        </td>
                                        <td
                                            class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $request->typeLetter->name }}
                                        </td>
                                        <!-- Thumbnail Images -->
                                        <td
                                            class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            <img src="{{ Storage::url($request->image_ktp) }}" alt="KTP Image"
                                                class="h-24 w-auto rounded-md cursor-pointer"
                                                wire:click="openModal('{{ Storage::url($request->image_ktp) }}')" />
                                        </td>
                                        <td
                                            class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">
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
                                                    <img src="{{ asset('/images/sindangkasih-sugih-mukti-logo-7BA62C1744-seeklogo.com.png') }}"
                                                        alt="Logo Pemerintah" class="w-[4.3rem] h-auto mb-4 -ml-16" />
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
                                                    <button type="button" wire:click="confirmComplete({{ $request->id }})"
                                                        class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                                                        Selesai
                                                    </button>
                                                @break

                                                @case(5)
                                                @break
                                            @endswitch
                                            <div class="flex flex-col gap-3">

                                                @if ($request->povertyLetter)
                                                    <a href="{{ route('admin.poverty-letter.download', $request->povertyLetter->id) }}"
                                                        class="flex flex-column items-center justify-center  py-2 text-sm font-medium text-white bg-amber-700 rounded-lg hover:bg-amber-800 focus:ring-4 focus:ring-amber-300 dark:bg-amber-600 dark:hover:bg-amber-700 dark:focus:ring-amber-800 ease-in-out duration-300">
                                                        <span class="mr-2">Download</span>
                                                        <x-grommet-document-download class="w-5 " />
                                                    </a>
                                                    <a href="{{ route('admin.poverty.edit', $request->povertyLetter->id) }}"
                                                        class="flex flex-column items-center justify-center  py-2 text-sm font-medium text-white bg-yellow-400 rounded-lg hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 dark:bg-yellow-600 dark:hover:bg-yellow-700 dark:focus:ring-yellow-800 ease-in-out duration-300">
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
