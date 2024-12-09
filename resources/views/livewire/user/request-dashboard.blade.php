<div class=" px-9 py-8 mt-20">
    <div class="flex flex-col lg:flex-row lg:justify-between lg:items-center justify-start items-start mb-5">
        <!-- Judul -->
        <h1 class="lg:text-2xl text-lg font-bold mb-2 lg:mb-0">Daftar Permintaan Surat</h1>

        <!-- Button Tambah Permintaan -->
        <div
            class="flex lg:items-center justify-start items-start space-x-2 sm:space-x-3 mt-2 lg:mt-0 ml-auto w-full lg:w-auto">
            <a href="{{ route('request.letter') }}" wire:navigate>
                <button type="submit"
                    class="inline-flex items-center justify-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 w-full sm:w-auto">
                    <svg class="w-5 h-5 mr-2 -ml-1" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                            clip-rule="evenodd"></path>
                    </svg>
                    Tambah Permintaan
                </button>
            </a>
        </div>
    </div>


    <!-- Dashboard -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        <!-- Card untuk setiap permintaan surat -->
        @forelse ($requests as $request)
            <div class="bg-white p-4 rounded-lg shadow-lg">
                <div class="flex justify-between items-center">
                    <div class="flex items-center space-x-2">
                        <div>
                            <p class="text-lg font-bold">#{{ $loop->iteration }}</p>
                        </div>
                    </div>
                    @switch($request->request_status_id)
                        @case(1)
                            <span
                                class="bg-red-100 text-red-800 text-sm font-normal me-2 px-3 py-2 rounded-full dark:bg-red-900 dark:text-red-300">Belum
                                Disetujui</span>
                        @break

                        @case(2)
                            <span
                                class="bg-lime-100 text-lime-800 text-sm font-normal me-2 px-3 py-1 rounded-full dark:bg-lime-900 dark:text-lime-300">Disetujui</span>
                        @break

                        @case(3)
                            <span
                                class="bg-red-100 text-red-800 text-sm font-normal me-2 px-3 py-1 rounded-full dark:bg-red-900 dark:text-red-300">Ditolak</span>
                        @break

                        @case(4)
                            <span
                                class="bg-amber-100 text-amber-800 text-sm font-normal me-2 px-3 py-1 rounded-full dark:bg-amber-900 dark:text-amber-300">Diproses</span>
                        @break

                        @case(5)
                            <span
                                class="bg-green-100 text-green-800 text-sm font-normal me-2 px-3 py-1 rounded-full dark:bg-green-900 dark:text-green-300">Selesai</span>
                        @break
                    @endswitch
                </div>
                <div class="flex justify-between mt-4">
                    <p class="text-lg font-semibold">{{ $request->typeLetter->name }}</p>
                    <p class="text-base text-gray-500">{{ $request->created_at->diffForHumans() }}</p>
                </div>
            </div>
            @empty
            @endforelse

        </div>
    </div>
