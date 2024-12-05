<?php

namespace App\Livewire\Admin\Letter;

use App\Models\Request;
use Livewire\Component;
use App\Models\DomicileLetter;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Spatie\Browsershot\Browsershot;


class Domicile extends Component
{
    #[Layout('layouts.admin')]
    #[Title('Surat Domisili | Desa Kepuh')]

    public $letters;
    public $isModalOpen = false;
    public $modalImage;
    public $search = ''; // Tambahkan properti untuk pencarian

    public function render()
    {
        $requests = Request::whereHas('typeLetter', function ($query) {
            $query->where('name', 'Surat Domisili');
        })
            ->where('request_status_id', 5)
            ->when($this->search, function ($query) {
                // Pencarian berdasarkan applicant_name
                $query->where('applicant_name', 'like', '%' . $this->search . '%');
            })
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








    public function downloadPDF($id)
    {
        // Check if PDF already exists in storage
        $pdfFileName = "domicile-letter-{$id}.pdf";
        $pdfPath = storage_path("app/{$pdfFileName}");

        if (!file_exists($pdfPath)) {
            // Retrieve data for the document
            $domicileLetter = DomicileLetter::findOrFail($id);

            // Generate HTML content
            $htmlContent = view('pdf.domicile_letter', compact('domicileLetter'))->render();

            // Generate PDF and save it
            Browsershot::html($htmlContent)
                ->format('A4')
                ->showBackground()
                ->disableJavascript()
                ->timeout(10)
                ->setOption('args', ['--no-sandbox', '--disable-setuid-sandbox'])
                ->save($pdfPath);
        }

        // Return the cached PDF as a download
        return response()->download($pdfPath)->deleteFileAfterSend(false);
    }
}
