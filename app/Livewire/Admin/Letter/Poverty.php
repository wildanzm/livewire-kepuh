<?php

namespace App\Livewire\Admin\Letter;

use App\Models\Request;
use Livewire\Component;
use App\Models\PovertyLetter;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Spatie\Browsershot\Browsershot;

class Poverty extends Component
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
            $query->where('name', 'Surat Keterangan Tidak Mampu');
        })
            ->where('request_status_id', 5)  // Filter by status_id being 5
            ->get();

        return view('livewire.admin.letter.poverty', [
            'requests' => $requests,
        ]);
    }
    public function openModal($imageUrl)
    {
        $this->modalImage = $imageUrl; // Set image URL
        $this->isModalOpen = true;    // Open modal
    }

    public function closeModal()
    {
        $this->isModalOpen = false; // Close modal
    }
    public function downloadPDF($id)
    {
        // Ambil data DomicileLetter berdasarkan ID
        $poverty = PovertyLetter::findOrFail($id);

        // Generate konten HTML dari view
        $htmlContent = view('pdf.poverty_letter', compact('poverty'))->render();

        // Gunakan Browsershot untuk membuat PDF sebagai string
        $pdfContent = Browsershot::html($htmlContent)
            ->addChromiumArguments(['--no-sandbox', '--disable-setuid-sandbox'])
            ->timeout(60) // Ubah timeout ke 60 detik
            ->format('A4') // Ukuran kertas
            ->setOption('displayHeaderFooter', false) // Hilangkan header/footer default
            ->pdf(); // Kembalikan PDF sebagai string

        // Kembalikan PDF untuk ditampilkan di browser
        return response($pdfContent, 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => "inline; filename=domicile-letter-{$poverty->id}.pdf",
        ]);
    }



    public function cobapdf()
    {


        // Kirim data ke view
        return view('pdf.poverty_letter');
    }
}
