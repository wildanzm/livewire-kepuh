<?php

namespace App\Livewire\Admin;

use Carbon\Carbon;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\DB;
use Asantibanez\LivewireCharts\Models\ColumnChartModel;

class WaterDebit extends Component
{
    #[Layout('layouts.admin')]
    #[Title('Debit Air | Desa Kepuh')]

    // public $columnChartModel;
    // public $dateRange = 'daily'; // Default to 'daily'

    // public function mount()
    // {
    //     // Initialize the ColumnChartModel with default data
    //     $this->columnChartModel = new ColumnChartModel();
    //     $this->generateChartData(); // Generate the initial chart with daily data
    // }

    // // Method to set the date range and re-fetch data
    // public function setDateRange($range)
    // {
    //     $this->dateRange = $range;
    //     $this->generateChartData();
    // }

    // // Method to generate the chart data based on the selected date range
    // public function generateChartData()
    // {
    //     // Initialize the column chart model if it hasn't been already
    //     if (!$this->columnChartModel) {
    //         $this->columnChartModel = new ColumnChartModel();
    //     }

    //     // Set the start and end date based on the selected range
    //     $startDate = Carbon::now();
    //     $endDate = Carbon::now();

    //     if ($this->dateRange == 'daily') {
    //         $startDate->startOfDay();
    //         $endDate->endOfDay();
    //     } elseif ($this->dateRange == 'weekly') {
    //         $startDate->startOfWeek();
    //         $endDate->endOfWeek();
    //     } elseif ($this->dateRange == 'monthly') {
    //         $startDate->startOfMonth();
    //         $endDate->endOfMonth();
    //     }

    //     // Fetch data for all 3 nodes (node1, node2, node3)
    //     $node1Data = $this->fetchData('node1', $startDate, $endDate);
    //     $node2Data = $this->fetchData('node2', $startDate, $endDate);
    //     $node3Data = $this->fetchData('node3', $startDate, $endDate);

    //     // Calculate total flow rate and total RSSI
    //     $totalFlowRate = $node1Data['flow_rate'] + $node2Data['flow_rate'] + $node3Data['flow_rate'];
    //     $totalRssi = abs($node1Data['rssi']) + abs($node2Data['rssi']) + abs($node3Data['rssi']);

    //     // Reset the column chart model before adding new columns
    //     $this->columnChartModel = (new ColumnChartModel())
    //         ->setTitle('Rekap Flow Rate dan RSSI dari Semua Masjid')
    //         ->addColumn('Total Flow Rate', $totalFlowRate, '#f6ad55') // Flow Rate Column
    //         ->addColumn('Total RSSI', $totalRssi, '#90cdf4'); // RSSI Column
    // }

    // // Helper method to fetch and aggregate data for a node
    // public function fetchData($nodeId, $startDate, $endDate)
    // {
    //     $data = DB::table('volume_air')
    //         ->selectRaw('SUM(flow_rate) as flow_rate, SUM(rssi) as rssi')
    //         ->where('Node_id', $nodeId)
    //         ->whereBetween('timestamp', [$startDate, $endDate])
    //         ->first();

    //     return [
    //         'flow_rate' => $data->flow_rate ?? 0,
    //         'rssi' => $data->rssi ?? 0,
    //     ];
    // }





    public function render()
    {
        // Fetch the latest data for each node
        $node1Data = DB::table('volume_air')
            ->select('flow_rate', 'rssi')
            ->where('Node_id', 'node1')
            ->orderBy('timestamp', 'desc')
            ->first();

        $node2Data = DB::table('volume_air')
            ->select('flow_rate', 'rssi')
            ->where('Node_id', 'node2')
            ->orderBy('timestamp', 'desc')
            ->first();

        $node3Data = DB::table('volume_air')
            ->select('flow_rate', 'rssi')
            ->where('Node_id', 'node3')
            ->orderBy('timestamp', 'desc')
            ->first();

        // Prepare the fallback for missing data
        $node1 = [
            'flow_rate' => $node1Data->flow_rate ?? 0,
            'rssi' => $node1Data->rssi ?? 0,
        ];
        $node2 = [
            'flow_rate' => $node2Data->flow_rate ?? 0,
            'rssi' => $node2Data->rssi ?? 0,
        ];
        $node3 = [
            'flow_rate' => $node3Data->flow_rate ?? 0,
            'rssi' => $node3Data->rssi ?? 0,
        ];

        // Create ColumnChartModel objects for each node
        $node1ChartModel = new ColumnChartModel();
        $node1ChartModel->setTitle('Debit Air Mesjid 1')
            ->addColumn('Flow Rate', $node1['flow_rate'], '#f6ad55')
            ->addColumn('RSSI', abs($node1['rssi']), '#90cdf4');

        $node2ChartModel = new ColumnChartModel();
        $node2ChartModel->setTitle('Debit Air Mesjid 2')
            ->addColumn('Flow Rate', $node2['flow_rate'], '#f6ad55')
            ->addColumn('RSSI', abs($node2['rssi']), '#90cdf4');

        $node3ChartModel = new ColumnChartModel();
        $node3ChartModel->setTitle('Debit Air Mesjid 3')
            ->addColumn('Flow Rate', $node3['flow_rate'], '#f6ad55')
            ->addColumn('RSSI', abs($node3['rssi']), '#90cdf4');

        // Return the view with the ColumnChartModel objects
        return view('livewire.admin.water-debit')->with([
            'node1' => $node1,
            'node2' => $node2,
            'node3' => $node3,
            'node1Chart' => $node1ChartModel, // Pass the ColumnChartModel object
            'node2Chart' => $node2ChartModel, // Pass the ColumnChartModel object
            'node3Chart' => $node3ChartModel, // Pass the ColumnChartModel object
        ]);
    }
}
