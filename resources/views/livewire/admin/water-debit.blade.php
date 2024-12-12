<main>
    <div class="px-4 pt-6">
        <div class="gap-4 2xl:grid-cols-3">
            <!-- Main widget -->
            <!-- Rekapan start -->
            <div
                class="p-4 bg-white border border-gray-200 rounded-lg shadow-sm 2xl:col-span-2 dark:border-gray-700 sm:p-6 dark:bg-gray-800">
                <div class="flex items-center justify-between mb-4">
                    <div class="flex-shrink-0">
                        <span
                            class="text-xl font-bold leading-none text-gray-900 sm:text-2xl dark:text-white">Rekap</span>
                        <h3 class="text-base font-light text-gray-500 dark:text-gray-400">
                            Rekapan Perhari
                        </h3>
                        <div class="w-[1000px]">
                            <livewire:livewire-column-chart :column-chart-model="$columnChartModel" />
                        </div>
                    </div>
                </div>
                <!-- Rekapan End -->
                <!-- Card Footer -->
                <div
                    class="flex items-center justify-between pt-3 mt-4 border-t border-gray-200 sm:pt-6 dark:border-gray-700">
                    <div>
                        <button
                            class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-500 rounded-lg hover:text-gray-900 dark:text-gray-400 dark:hover:text-white"
                            type="button" data-dropdown-toggle="sales-rekap-dropdown">
                            Rekap Perhari
                            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <!-- Dropdown menu -->
                        <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow dark:bg-gray-700 dark:divide-gray-600"
                            id="sales-rekap-dropdown">
                            <div class="px-4 py-3" role="none">
                                <p class="text-sm font-medium text-gray-900 truncate dark:text-white" role="none">
                                    Pilih Periode Rekap
                                </p>
                            </div>
                            <ul class="py-1" role="none">
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white"
                                        role="menuitem">Rekap Per Hari</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white"
                                        role="menuitem">Rekap Per Minggu</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white"
                                        role="menuitem">Rekap Per Bulan</a>
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
            <!--Tabs widget -->
        </div>
        <div class="grid w-full grid-cols-1 gap-4 mt-4 xl:grid-cols-2 2xl:grid-cols-3">
            <div
                class="items-center justify-between p-4 bg-white border border-gray-200 rounded-lg shadow-sm sm:flex dark:border-gray-700 sm:p-6 dark:bg-gray-800">
                <div class="w-full">
                    <h3 class="text-2xl font-bold text-gray-900 dark:text-gray-400 mb-5">Mesjid 1</h3>
                    <div class="flex gap-4">
                        <div>
                            <p class="text-gray-400">Flow_Rate</p>
                            <span
                                class="text-xl font-bold leading-none text-gray-900 sm:text-3xl dark:text-white">15</span>
                        </div>
                        <div class="flex flex-col items-center">
                            <p class="text-gray-400">rssi</p>
                            <span class="text-xl font-bold leading-none text-gray-900 sm:text-3xl dark:text-white">
                                -70</span>
                        </div>
                    </div>
                    <div class="mt-5">
                        <livewire:livewire-column-chart :column-chart-model="$columnChartModel" />
                    </div>
                </div>
                <!-- Buat Chart 1 -->
            </div>
            <div
                class="items-center justify-between p-4 bg-white border border-gray-200 rounded-lg shadow-sm sm:flex dark:border-gray-700 sm:p-6 dark:bg-gray-800">
                <div class="w-full">
                    <h3 class="text-2xl font-bold text-gray-900 dark:text-gray-400 mb-5">Mesjid 2</h3>
                    <div class="flex gap-4">
                        <div>
                            <p class="text-gray-400">Flow_Rate</p>
                            <span
                                class="text-xl font-bold leading-none text-gray-900 sm:text-3xl dark:text-white">15</span>
                        </div>
                        <div class="flex flex-col items-center">
                            <p class="text-gray-400">rssi</p>
                            <span class="text-xl font-bold leading-none text-gray-900 sm:text-3xl dark:text-white">
                                -65</span>
                        </div>
                    </div>
                    <div class="mt-5">
                        <livewire:livewire-column-chart :column-chart-model="$columnChartModel" />
                    </div>
                </div>
                <!-- Buat Chart 2 -->
            </div>
            <div
                class="items-center justify-between p-4 bg-white border border-gray-200 rounded-lg shadow-sm sm:flex dark:border-gray-700 sm:p-6 dark:bg-gray-800">
                <div class="w-full">
                    <h3 class="text-2xl font-bold text-gray-900 dark:text-gray-400 mb-5">Mesjid 3</h3>
                    <div class="flex gap-4">
                        <div>
                            <p class="text-gray-400">Flow_Rate</p>
                            <span
                                class="text-xl font-bold leading-none text-gray-900 sm:text-3xl dark:text-white">15</span>
                        </div>
                        <div class="flex flex-col items-center">
                            <p class="text-gray-400">rssi</p>
                            <span class="text-xl font-bold leading-none text-gray-900 sm:text-3xl dark:text-white">
                                -70</span>
                        </div>
                    </div>
                    <div class="mt-5">
                        <livewire:livewire-column-chart :column-chart-model="$columnChartModel" />
                    </div>
                </div>
            </div>
            <!-- Buat Chart 3 -->

        </div>

        <!-- 2 columns -->
    </div>
</main>