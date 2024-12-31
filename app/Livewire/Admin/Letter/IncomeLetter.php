<?php

namespace App\Livewire\Admin\Letter;

use App\Models\Request;
use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\PovertyLetter;
use Livewire\Attributes\Title;
use Barryvdh\DomPDF\Facade\Pdf;
use Livewire\Attributes\Layout;

class IncomeLetter extends Component
{
    #[Layout('layouts.admin')]
    #[Title('Surat Pendapatan | Desa Kepuh')]

    public $letters;
    public $isModalOpen = false;
    public $modalImage;
    public function render()
    {
        // Fetch only the requests where status_id is 4 (assuming 'status_id' is the column for status)
        $requests = Request::whereHas('typeLetter', function ($query) {
            $query->where('name', 'Surat Pendapatan');
        })
            ->where('request_status_id', 5)  // Filter by status_id being 5
            ->get();

        return view('livewire.admin.letter.income-letter', [
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
    public function terbilang($angka)
    {
        $huruf = array(
            '',
            'Satu',
            'Dua',
            'Tiga',
            'Empat',
            'Lima',
            'Enam',
            'Tujuh',
            'Delapan',
            'Sembilan',
            'Sepuluh',
            'Sebelas',
            'Dua Belas',
            'Tiga Belas',
            'Empat Belas',
            'Lima Belas',
            'Enam Belas',
            'Tujuh Belas',
            'Delapan Belas',
            'Sembilan Belas',
            'Dua Puluh',
            'Tiga Puluh',
            'Empat Puluh',
            'Lima Puluh',
            'Enam Puluh',
            'Tujuh Puluh',
            'Delapan Puluh',
            'Sembilan Puluh'
        );

        $angka = (int) $angka;
        if ($angka < 12) {
            return $huruf[$angka];
        } elseif ($angka < 20) {
            return $huruf[$angka - 10] . ' Belas';
        } elseif ($angka < 100) {
            return $huruf[intval($angka / 10)] . ' Puluh ' . $huruf[$angka % 10];
        } elseif ($angka < 200) {
            return 'Seratus ' . $this->terbilang($angka - 100);
        } elseif ($angka < 1000) {
            return $huruf[intval($angka / 100)] . ' Ratus ' . $this->terbilang($angka % 100);
        } elseif ($angka < 2000) {
            return 'Seribu ' . $this->terbilang($angka - 1000);
        } elseif ($angka < 1000000) {
            return $this->terbilang(intval($angka / 1000)) . ' Ribu ' . $this->terbilang($angka % 1000);
        } elseif ($angka < 1000000000) {
            return $this->terbilang(intval($angka / 1000000)) . ' Juta ' . $this->terbilang($angka % 1000000);
        } elseif ($angka < 1000000000000) {
            return $this->terbilang(intval($angka / 1000000000)) . ' Miliar ' . $this->terbilang($angka % 1000000000);
        }
        return $angka;
    }


    public function streamPDF($id)
    {
        // Retrieve data for the document
        $incomeLetter = \App\Models\IncomeLetter::findOrFail($id);

        // Get the formatted income and its textual representation
        $formattedIncome = number_format($incomeLetter->average_income, 0, ',', '.');
        $incomeText = $this->terbilang($incomeLetter->average_income); // Use terbilang function

        // Generate PDF using DomPDF
        $pdf = Pdf::loadView('pdf.income_letter', [
            'income' => $incomeLetter,
            'formattedIncome' => $formattedIncome,
            'incomeText' => ucwords($incomeText) // Pass formatted income text
        ])
            ->setPaper('a4') // Set the paper size (optional)
            ->setOption('isHtml5ParserEnabled', true) // Optional settings
            ->setOption('isRemoteEnabled', true);     // Allow loading external CSS/JS (optional)

        // Format nama surat untuk mencegah karakter tidak valid
        $namaSurat = Str::slug($incomeLetter->name); // Menggunakan slug agar aman untuk nama file

        // Save the PDF to a specific directory
        $pdfFileName = "Surat-Keterangan-Penghasilan-{$namaSurat}.pdf";
        // Simpan file ke dalam folder 'storage/app/public/pdf'
        $filePath = storage_path("app/public/pdf/{$pdfFileName}");
        $pdf->save($filePath);

        // Stream the PDF to the browser
        return $pdf->stream();
    }

    public function downloadPDF($id)
    {
        // Retrieve data for the document using IncomeLetter model
        $income = \App\Models\IncomeLetter::findOrFail($id);

        // Get the formatted income and its textual representation
        $formattedIncome = number_format($income->average_income, 0, ',', '.');
        $incomeText = $this->terbilang($income->average_income); // Use terbilang function

        // Generate PDF using DomPDF
        $pdf = Pdf::loadView('pdf.income_letter', [
            'income' => $income, // Pass income to the view
            'formattedIncome' => $formattedIncome,
            'incomeText' => ucwords($incomeText) // Pass formatted income text
        ])
            ->setPaper('a4') // Set the paper size (optional)
            ->setOption('isHtml5ParserEnabled', true) // Optional settings
            ->setOption('isRemoteEnabled', true);     // Allow loading external CSS/JS (optional)

        // Format nama surat untuk mencegah karakter tidak valid
        $namaSurat = Str::slug($income->name); // Menggunakan slug agar aman untuk nama file

        // Return the PDF as a download
        $pdfFileName = "Surat Keterangan Penghasilan | {$namaSurat}.pdf";
        return $pdf->download($pdfFileName);
    }
}
