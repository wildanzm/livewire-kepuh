<?php

namespace App\Livewire\Admin;

use App\Models\Request;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use WireUi\Traits\WireUiActions;

class RequestIndex extends Component
{
    use WireUiActions;

    #[Layout('layouts.admin')]
    #[Title('Permintaan Surat | Desa Kepuh')]

    // Properti Modal
    public $isModalOpen = false;
    public $modalImage;

    public function confirmApprove($id)
    {
        $this->dialog()->confirm([
            'title' => 'Apakah anda setuju dengan permintaan ini?',
            'icon' => 'question',
            'accept' => [
                'label' => 'Ya, Setuju',
                'method' => 'approved',
                'params' => $id,
            ],
            'reject' => [
                'label' => 'Tidak',
                'method' => 'cancel',
            ],
        ]);
    }

    public function approved($id)
    {
        $request = Request::find($id);
        $request->update([
            'request_status_id' => 2,
        ]);

        $this->dialog()->show([
            'icon' => 'success',
            'title' => 'Berhasil Disetujui',
        ]);
    }

    public function confirmReject($id)
    {
        $this->dialog()->confirm([
            'title' => 'Apakah anda menolak permintaan ini?',
            'icon' => 'question',
            'accept' => [
                'label' => 'Ya, Tolak',
                'method' => 'rejected',
                'params' => $id,
            ],
            'reject' => [
                'label' => 'Tidak',
                'method' => 'cancel',
            ],
        ]);
    }

    public function rejected($id)
    {
        $request = Request::find($id);
        $request->update([
            'request_status_id' => 3,
        ]);

        $this->dialog()->show([
            'icon' => 'success',
            'title' => 'Berhasil Ditolak',
        ]);
    }

    public function confirmProcess($id)
    {
        $this->dialog()->confirm([
            'title' => 'Apakah anda ingin memproses permintaan ini?',
            'icon' => 'question',
            'accept' => [
                'label' => 'Ya, Proses',
                'method' => 'processed',
                'params' => $id,
            ],
            'reject' => [
                'label' => 'Tidak',
                'method' => 'cancel',
            ],
        ]);
    }

    public function processed($id)
    {
        $request = Request::find($id);
        $request->update([
            'request_status_id' => 4,
        ]);

        $this->dialog()->show([
            'icon' => 'success',
            'title' => 'Berhasil Diproses',
        ]);
    }

    public function confirmComplete($id)
    {
        $this->dialog()->confirm([
            'title' => 'Apakah permintaan ini telah selesai?',
            'icon' => 'question',
            'accept' => [
                'label' => 'Ya, Selesai',
                'method' => 'completed',
                'params' => $id,
            ],
            'reject' => [
                'label' => 'Belum',
                'method' => 'cancel',
            ],
        ]);
    }

    public function completed($id)
    {
        $request = Request::find($id);
        $request->update([
            'request_status_id' => 5,
        ]);

        $this->dialog()->show([
            'icon' => 'success',
            'title' => 'Surat Telah Selesai Dibuat',
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
    public function render()
    {
        return view('livewire.admin.request-index', [
            'requests' => Request::all(),
        ]);
    }
}
