<?php

namespace App\Livewire\Admin\Letter;

use App\Models\Request;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

class BirthLetter extends Component
{
    #[Layout('layouts.admin')]
    #[Title('Akta Kelahiran | Desa Kepuh')]

    public $letters;
    public $isModalOpen = false;
    public $modalImage;
    public $search = ''; // Tambahkan properti untuk pencarian

    public function render()
    {

        $requests = Request::whereHas('typeLetter', function ($query) {
            $query->where('name', 'Akta Kelahiran');
        })
            ->where('request_status_id', 5)
            ->when($this->search, function ($query) {
                // Pencarian berdasarkan applicant_name
                $query->where('applicant_name', 'like', '%' . $this->search . '%');
            })
            ->get();

        return view('livewire.admin.letter.birth-letter', [
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