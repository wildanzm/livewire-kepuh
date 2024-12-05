<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')]
#[Title('Beranda | Desa Kepuh')]
class Index extends Component
{
    public function render()
    {
        return view('livewire.index');
    }
}
