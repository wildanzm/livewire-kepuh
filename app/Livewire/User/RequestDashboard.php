<?php

namespace App\Livewire\User;

use App\Models\Request;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;

class RequestDashboard extends Component
{
    #[Layout('layouts.app')]
    #[Title('Permintaan Surat | Desa Kepuh')]
    public function render()
    {
        return view('livewire.user.request-dashboard', [
            'requests' => Request::where('user_id', Auth::id())->orderBy('created_at', 'desc')->get(),
        ]);
    }
}
