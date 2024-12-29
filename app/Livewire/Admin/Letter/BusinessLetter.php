<?php

namespace App\Livewire\Admin\Letter;

use App\Models\Request;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\Attributes\Title;
use Barryvdh\DomPDF\Facade\Pdf;
use Livewire\Attributes\Layout;

class BusinessLetter extends Component
{
    #[Layout('layouts.admin')]
    #[Title('Surat Keterangan Usaha | Desa Kepuh')]

    public $letters;
    public $isModalOpen = false;
    public $modalImage;
    public $search = ''; // Tambahkan properti untuk pencarian

    public function render()
    {

        $requests = Request::whereHas('typeLetter', function ($query) {
            $query->where('name', 'Surat Keterangan Usaha');
        })
            ->where('request_status_id', 5)
            ->when($this->search, function ($query) {
                // Pencarian berdasarkan applicant_name
                $query->where('applicant_name', 'like', '%' . $this->search . '%');
            })
            ->get();

        return view('livewire.admin.letter.business-letter', [
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
    public function streamPDF($id)
    {
        // Retrieve data for the document
        $businessLetter = \App\Models\BusinessLetter::findOrFail($id);

        // Generate PDF using DomPDF
        $pdf = Pdf::loadView('pdf.business_letter', ['businessLetter' => $businessLetter])
            ->setPaper('a4') // Set the paper size (optional)
            ->setOption('isHtml5ParserEnabled', true) // Optional settings
            ->setOption('isRemoteEnabled', true);     // Allow loading external CSS/JS (optional)

        // Format nama surat untuk mencegah karakter tidak valid
        $namaSurat = Str::slug($businessLetter->name); // Menggunakan slug agar aman untuk nama file

        // Tentukan nama file PDF
        $pdfFileName = "Surat-Keterangan-Usaha-{$namaSurat}.pdf";

        // Simpan file ke dalam folder 'storage/app/public/pdf'
        $filePath = storage_path("app/public/pdf/{$pdfFileName}");
        $pdf->save($filePath);

        // Stream the PDF to the browser
        return $pdf->stream();
    }
    public function downloadPDF($id)
    {
        //composer require barryvdh/laravel-dompdf
        // Retrieve data for the document
        $businessLetter = \App\Models\BusinessLetter::findOrFail($id);

        // Generate HTML content
        $htmlContent = view('pdf.business_letter', compact('businessLetter'))->render();

        // Generate PDF using DomPDF
        $pdf = Pdf::loadHTML($htmlContent)
            ->setPaper('a4') // Set the paper size (optional)
            ->setOption('isHtml5ParserEnabled', true) // Optional settings
            ->setOption('isRemoteEnabled', true);     // Allow loading external CSS/JS (optional)
        // Pastikan kolom nama surat ada di tabel
        // Format nama surat untuk mencegah karakter tidak valid
        $namaSurat = Str::slug($businessLetter->name); // Menggunakan slug agar aman untuk nama file

        // Return the PDF as a download
        $pdfFileName = "Surat Keterangan Usaha | {$namaSurat}.pdf";
        return $pdf->download($pdfFileName);
    }
}