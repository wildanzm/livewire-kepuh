<?php

namespace App\Livewire;

use Livewire\Component;
use Mpdf\Mpdf;
use App\Models\Request;

class DomicileLetterPdf extends Component
{
    public $domicileLetter;
    public $isModalOpenpdf = false;  // Properti untuk mengontrol modal
    public $modalImage;    // Untuk mengatur visibilitas modal

    public function mount($requestId)
    {
        // Cari Request berdasarkan ID dan eager load domicileLetter
        $request = Request::with('domicileLetter')->findOrFail($requestId);

        // Ambil data relasi DomicileLetter
        $this->domicileLetter = $request->domicileLetter;

        // Jika tidak ada DomicileLetter, beri pesan error
        if (!$this->domicileLetter) {
            session()->flash('error', 'Data surat tidak ditemukan untuk permintaan ini.');
        }
    }

    public function downloadPdf()
    {
        // Pastikan data tersedia
        if (!$this->domicileLetter) {
            session()->flash('error', 'Surat tidak ditemukan.');
            return;
        }

        // Buat HTML untuk PDF
        $html = view('pdf.domicile_letter', ['data' => $this->domicileLetter])->render();

        // Generate PDF menggunakan MPDF
        $mpdf = new Mpdf(['format' => 'A4']);
        $mpdf->WriteHTML($html);
        $mpdf->Output('domicile_letter.pdf', 'D'); // D untuk download
    }
    public function showPdfModalPDF()
    {
        $this->isModalOpenpdf = true; // Open the modal
    }
    public function hidePdfModalPDF()
    {
        $this->isModalOpenpdf = false; // Menutup modal
    }

    public function render()
    {
        // Ambil semua request beserta domicileLetter
        $requests = Request::with('domicileLetter')->get();

        // Return the view with the 'requests' only
        return view('livewire.admin.request-index', [
            'requests' => $requests,
        ]);
    }
}
