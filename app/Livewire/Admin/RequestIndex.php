<?php

namespace App\Livewire\Admin;

use App\Models\Request;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

class RequestIndex extends Component
{
    #[Layout('layouts.admin')] 
    #[Title('Permintaan Surat | Desa Kepuh')]

    public Request $request;


    public function approve($id){;

        $request = Request::find($id);

        
        return redirect()->route('admin.request');
    }


    public function render()
    {
        return view('livewire.admin.request-index', [
            'requests' => Request::all(),
        ]);
    }
}
