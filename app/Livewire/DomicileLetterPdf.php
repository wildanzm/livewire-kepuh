<?php

namespace App\Livewire;

use Livewire\Component;
use Mpdf\Mpdf;
use App\Models\Request;

class DomicileLetterPdf extends Component
{
    public $domicileLetter;
    public $isModalOpenpdf = false; // Properti untuk modal
    public $modalImage;            // Properti untuk image preview

    public function mount($requestId)
    {
        $request = Request::with('domicileLetter')->find($requestId);

        if ($request && $request->domicileLetter) {
            $this->domicileLetter = $request->domicileLetter;
        } else {
            $this->domicileLetter = null;
            session()->flash('error', 'Data surat tidak ditemukan untuk permintaan ini.');
        }

        // Debugging
        if (config('app.debug')) {
            logger()->info('DomicileLetter:', ['data' => $this->domicileLetter]);
        }
    }



    // Metode untuk membuka modal PDF
    public function showPdfModalPDF()
    {
        $this->isModalOpenpdf = true;
    }

    // Metode untuk mendownload PDF
    public function downloadPdf()
    {
        if (!$this->domicileLetter) {
            session()->flash('error', 'Data surat tidak ditemukan untuk diunduh.');
            return;
        }

        // Logika untuk generate PDF
        $mpdf = new Mpdf();
        $mpdf->WriteHTML($this->domicileLetter->content);
        $mpdf->Output('DomicileLetter.pdf', 'D');
    }

    public function render()
    {
        return view('livewire.domicile-letter-pdf');
    }
}
