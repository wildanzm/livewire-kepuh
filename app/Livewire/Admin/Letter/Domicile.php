<?php

namespace App\Livewire\Admin\Letter;

use App\Models\Request;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

class Domicile extends Component
{
    #[Layout('layouts.admin')]
    #[Title('Surat Domisili | Desa Kepuh')]

    public $letters;
    public $isModalOpen = false;
    public $modalImage;
    public function render()
    {
        // Fetch only the requests where status_id is 4 (assuming 'status_id' is the column for status)
        $requests = Request::whereHas('typeLetter', function ($query) {
            $query->where('name', 'Surat Domisili');
        })
            ->where('request_status_id', 5)  // Filter by status_id being 4
            ->get();

        return view('livewire.admin.letter.domicile', [
            'requests' => $requests,
        ]);
    }
    // Open Modal with the image passed as parameter
    public function openModal($imageUrl)
    {
        $this->modalImage = $imageUrl; // Set image URL
        $this->isModalOpen = true;    // Open modal
    }

    public function closeModal()
    {
        $this->isModalOpen = false; // Close modal

    }
}
