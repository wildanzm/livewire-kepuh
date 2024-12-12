<?php

namespace App\Livewire\Admin;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Asantibanez\LivewireCharts\Models\ColumnChartModel;

class WaterDebit extends Component
{

    #[Layout('layouts.admin')]
    #[Title('Debit Air | Desa Kepuh')]

    public function render()
    {
        $columnChartModel = (new ColumnChartModel())
            ->setTitle('Debit Air')
            ->addColumn('Flow Rate', 200, '#fc8181')
            ->addColumn('RSSI', 300, '#90cdf4');

        return view('livewire.admin.water-debit')->with([
            'columnChartModel' => $columnChartModel
        ]);
    }
}
