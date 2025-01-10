<main>
    <div class="px-4 pt-6">
        <div class="gap-4 grid grid-cols-2">
            <!-- Main widget -->
            <!-- Rekapan start -->

            <div
                class="p-4 bg-white border border-gray-200 rounded-lg shadow-sm overflow-x-scroll col-span-2 dark:border-gray-700 sm:p-6 dark:bg-gray-800">
                <h1 class="text-3xl font-bold ">Data Debit Air</h1>
                <div class="flex items-center justify-between mb-4">
                    <div class="flex-shrink-0">
                        {{-- <canvas id="flowRateChart" width="800" height="400">
                        </canvas> --}}
                        <div>

                            <iframe src="https://api.kepuh.co.id/flow.php" class="w-[63rem] h-[40rem] max-xl:w-[40rem]"></iframe>
                            <iframe src="https://api.kepuh.co.id/rssi.php" class="w-full h-[40rem]"></iframe>

                            
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
                <!-- Rekapan End -->
            </div>
            <!--Tabs widget -->
        </div>
        {{-- <div class="grid w-full grid-cols-1 gap-4 mt-4 xl:grid-cols-2 2xl:grid-cols-3">
            <!-- Mesjid 1 -->
            <div
                class="items-center justify-between p-4 bg-white border border-gray-200 rounded-lg shadow-sm sm:flex dark:border-gray-700 sm:p-6 dark:bg-gray-800">
                <div class="w-full">
                    <h3 class="text-2xl font-bold text-gray-900 dark:text-gray-400 mb-5">Mesjid 1</h3>
                    <div class="flex gap-4">
                        <div>
                            <p class="text-gray-400">Flow Rate</p>
                            <span class="text-xl font-bold leading-none text-gray-900 sm:text-3xl dark:text-white">
                                {{ $node1['flow_rate'] }}
                            </span>
                        </div>
                        <div class="flex flex-col items-center">
                            <p class="text-gray-400">RSSI</p>
                            <span class="text-xl font-bold leading-none text-gray-900 sm:text-3xl dark:text-white">
                                {{ $node1['rssi'] }}
                            </span>
                        </div>
                    </div>
                    <div class="mt-5">
                        <livewire:livewire-column-chart :column-chart-model="$node1Chart" wire:poll.5s="render" />
                    </div>
                </div>
            </div>

            <!-- Mesjid 2 -->
            <div
                class="items-center justify-between p-4 bg-white border border-gray-200 rounded-lg shadow-sm sm:flex dark:border-gray-700 sm:p-6 dark:bg-gray-800">
                <div class="w-full">
                    <h3 class="text-2xl font-bold text-gray-900 dark:text-gray-400 mb-5">Mesjid 2</h3>
                    <div class="flex gap-4">
                        <div>
                            <p class="text-gray-400">Flow Rate</p>
                            <span class="text-xl font-bold leading-none text-gray-900 sm:text-3xl dark:text-white">
                                {{ $node2['flow_rate'] }}
                            </span>
                        </div>
                        <div class="flex flex-col items-center">
                            <p class="text-gray-400">RSSI</p>
                            <span class="text-xl font-bold leading-none text-gray-900 sm:text-3xl dark:text-white">
                                {{ $node2['rssi'] }}
                            </span>
                        </div>
                    </div>
                    <div class="mt-5">
                        <livewire:livewire-column-chart :column-chart-model="$node2Chart" wire:poll.5s="render" />
                    </div>
                </div>
            </div>

            <!-- Mesjid 3 -->
            <div
                class="items-center justify-between p-4 bg-white border border-gray-200 rounded-lg shadow-sm sm:flex dark:border-gray-700 sm:p-6 dark:bg-gray-800">
                <div class="w-full">
                    <h3 class="text-2xl font-bold text-gray-900 dark:text-gray-400 mb-5">Mesjid 3</h3>
                    <div class="flex gap-4">
                        <div>
                            <p class="text-gray-400">Flow Rate</p>
                            <span class="text-xl font-bold leading-none text-gray-900 sm:text-3xl dark:text-white">
                                {{ $node3['flow_rate'] }}
                            </span>
                        </div>
                        <div class="flex flex-col items-center">
                            <p class="text-gray-400">RSSI</p>
                            <span class="text-xl font-bold leading-none text-gray-900 sm:text-3xl dark:text-white">
                                {{ $node3['rssi'] }}
                            </span>
                        </div>
                    </div>
                    <div class="mt-5">
                        <livewire:livewire-column-chart :column-chart-model="$node3Chart" wire:poll.5s="render" />
                    </div>
                </div>
            </div>
            <!-- Buat Chart 3 -->

        </div> --}}

        <!-- 2 columns -->
        <div class="mt-6 p-4 bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 dark:bg-gray-800">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-2xl font-bold">Rekapan Debit Air</h2>
                
                <div class="flex items-center space-x-4">
                    <select 
                        id="periodSelect" 
                        class="form-select rounded-lg border-gray-300"
                        onchange="filterPeriod(this.value)"
                    >

                        <option value="daily">Harian</option>
                        <option value="monthly">Bulanan</option>
                        <option value="yearly">Tahunan</option>
                    </select>
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                <!-- Card Harian -->
                <div data-period="daily" class="rekap-card bg-white border border-gray-200 rounded-lg p-4 shadow-sm">
                    <div class="flex justify-between items-center mb-3">
                        <h3 class="text-lg font-semibold text-gray-700">2023-12-01</h3>
                        <span class="text-sm text-gray-500 bg-gray-100 px-2 py-1 rounded">Harian</span>
                    </div>
                    <div class="grid grid-cols-2 gap-2">
                        <div>
                            <p class="text-xs text-gray-500">Total Debit</p>
                            <p class="text-lg font-bold text-blue-600">1,250.50 m³</p>
                        </div>
                        <div>
                            <p class="text-xs text-gray-500">Rata-rata Debit</p>
                            <p class="text-lg font-bold text-green-600">52.10 m³/jam</p>
                        </div>
                    </div>
                    <div class="mt-3 border-t pt-2">
                        <a href="#" class="text-sm text-blue-500 hover:underline">Detail Rekap</a>
                    </div>
                </div>

                <!-- Card Harian 2 -->
                <div data-period="daily" class="rekap-card bg-white border border-gray-200 rounded-lg p-4 shadow-sm">
                    <div class="flex justify-between items-center mb-3">
                        <h3 class="text-lg font-semibold text-gray-700">2023-12-02</h3>
                        <span class="text-sm text-gray-500 bg-gray-100 px-2 py-1 rounded">Harian</span>
                    </div>
                    <div class="grid grid-cols-2 gap-2">
                        <div>
                            <p class="text-xs text-gray-500">Total Debit</p>
                            <p class="text-lg font-bold text-blue-600">1,175.25 m³</p>
                        </div>
                        <div>
                            <p class="text-xs text-gray-500">Rata-rata Debit</p>
                            <p class="text-lg font-bold text-green-600">49.00 m³/jam</p>
                        </div>
                    </div>
                    <div class="mt-3 border-t pt-2">
                        <a href="#" class="text-sm text-blue-500 hover:underline">Detail Rekap</a>
                    </div>
                </div>
        
                <!-- Card Bulanan -->
                <div data-period="monthly" class="rekap-card bg-white border border-gray-200 rounded-lg p-4 shadow-sm" style="display:none;">
                    <div class="flex justify-between items-center mb-3">
                        <h3 class="text-lg font-semibold text-gray-700">2023-12</h3>
                        <span class="text-sm text-gray-500 bg-gray-100 px-2 py-1 rounded">Bulanan</span>
                    </div>
                    <div class="grid grid-cols-2 gap-2">
                        <div>
                            <p class="text-xs text-gray-500">Total Debit</p>
                            <p class="text-lg font-bold text-blue-600">15,000.50 m³</p>
                        </div>
                        <div>
                            <p class="text-xs text-gray-500">Rata-rata Debit</p>
                            <p class="text-lg font-bold text-green-600">500.10 m³/jam</p>
                        </div>
                    </div>
                    <div class="mt-3 border-t pt-2">
                        <a href="#" class="text-sm text-blue-500 hover:underline">Detail Rekap</a>
                    </div>
                </div>
        
                <!-- Card Tahunan -->
                <div data-period="yearly" class="rekap-card bg-white border border-gray-200 rounded-lg p-4 shadow-sm" style="display:none;">
                    <div class="flex justify-between items-center mb-3">
                        <h3 class="text-lg font-semibold text-gray-700">2023</h3>
                        <span class="text-sm text-gray-500 bg-gray-100 px-2 py-1 rounded">Tahunan</span>
                    </div>
                    <div class="grid grid-cols-2 gap-2">
                        <div>
                            <p class="text-xs text-gray-500">Total Debit</p>
                            <p class="text-lg font-bold text-blue-600">180,000.50 m³</p>
                        </div>
                        <div>
                            <p class="text-xs text-gray-500">Rata-rata Debit</p>
                            <p class="text-lg font-bold text-green-600">15,000.10 m³/jam</p>
                        </div>
                    </div>
                    <div class="mt-3 border-t pt-2">
                        <a href="#" class="text-sm text-blue-500 hover:underline">Detail Rekap</a>
                    </div>
                </div>
            </div>
    </div>
    <script>
        document.addEventListener('livewire:load', function() {
            // Debug data
            const node1Data = @json($node1Data ?? [10, 20, 30]); // Ganti dengan data statis sementara
            const node2Data = @json($node2Data ?? [15, 25, 35]);
            const node3Data = @json($node3Data ?? [20, 30, 40]);

            console.log({
                node1Data,
                node2Data,
                node3Data
            }); // Debugging

            const chartCanvas = document.getElementById('flowRateChart');
            if (!chartCanvas) {
                console.error('Canvas element not found!');
                return;
            }

            // Labels for X-Axis
            const labels = Array.from({
                length: Math.max(node1Data.length, node2Data.length, node3Data.length)
            }, (_, i) => i + 1);

            // Render Chart
            new Chart(chartCanvas.getContext('2d'), {
                type: 'line',
                data: {
                    labels: labels,
                    datasets: [{
                            label: 'Node 1 Flow Rate',
                            data: node1Data,
                            borderColor: 'rgba(54, 162, 235, 1)',
                            backgroundColor: 'rgba(54, 162, 235, 0.2)',
                            borderWidth: 2
                        },
                        {
                            label: 'Node 2 Flow Rate',
                            data: node2Data,
                            borderColor: 'rgba(255, 99, 132, 1)',
                            backgroundColor: 'rgba(255, 99, 132, 0.2)',
                            borderWidth: 2
                        },
                        {
                            label: 'Node 3 Flow Rate',
                            data: node3Data,
                            borderColor: 'rgba(75, 192, 192, 1)',
                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
                            borderWidth: 2
                        }
                    ]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            display: true,
                            position: 'top'
                        }
                    },
                    scales: {
                        x: {
                            title: {
                                display: true,
                                text: 'Data Points'
                            }
                        },
                        y: {
                            beginAtZero: true,
                            title: {
                                display: true,
                                text: 'Flow Rate'
                            }
                        }
                    }
                }
            });
        });

        function filterPeriod(period) {
        const cards = document.querySelectorAll('.rekap-card');
        
        // Menampilkan atau menyembunyikan kartu berdasarkan periode
        cards.forEach(card => {
            card.style.display = card.getAttribute('data-period') === period ? '' : 'none';
        });
    }
    </script>
</main>
