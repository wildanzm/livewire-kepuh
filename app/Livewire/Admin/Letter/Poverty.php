<?php

namespace App\Livewire\Admin\Letter;

use App\Models\Request;
use Livewire\Component;
use App\Models\PovertyLetter;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Barryvdh\DomPDF\Facade\Pdf;

class Poverty extends Component
{
    #[Layout('layouts.admin')]
    #[Title('Surat Keterangan Tidak Mampu | Desa Kepuh')]

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
        //composer require barryvdh/laravel-dompdf
        // Retrieve data for the document
        $povertyLetter = PovertyLetter::findOrFail($id);

        // Generate HTML content
        $htmlContent = view('pdf.poverty_letter', compact('poverty'))->render();

        // Generate PDF using DomPDF
        $pdf = Pdf::loadHTML($htmlContent)
            ->setPaper('a4') // Set the paper size (optional)
            ->setOption('isHtml5ParserEnabled', true) // Optional settings
            ->setOption('isRemoteEnabled', true);     // Allow loading external CSS/JS (optional)

        // Return the PDF as a download
        $pdfFileName = "poverty-letter-{$id}.pdf";
        return $pdf->download($pdfFileName);
    }

    public function streamPDF($id)
    {
        // Retrieve data for the document
        $povertyLetter = PovertyLetter::findOrFail($id);

        // Generate PDF using DomPDF
        $pdf = Pdf::loadView('pdf.poverty_letter', ['poverty' => $povertyLetter])
            ->setPaper('a4') // Set the paper size (optional)
            ->setOption('isHtml5ParserEnabled', true) // Optional settings
            ->setOption('isRemoteEnabled', true);     // Allow loading external CSS/JS (optional)

        // Save the PDF to a specific directory
        $pdfFileName = "poverty-letter-{$id}.pdf";
        $filePath = ('pdf/' . $pdfFileName);
        $pdf->save($filePath);


        // Stream the PDF to the browser
        return $pdf->stream();
    }
}
