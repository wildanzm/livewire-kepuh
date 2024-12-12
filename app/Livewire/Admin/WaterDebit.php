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
            ->setTitle('Expenses by Type')
            ->addColumn('Food', 100, '#f6ad55')
            ->addColumn('Shopping', 200, '#fc8181')
            ->addColumn('Travel', 300, '#90cdf4');

        return view('livewire.admin.water-debit')->with([
            'columnChartModel' => $columnChartModel
        ]);
    }
}
