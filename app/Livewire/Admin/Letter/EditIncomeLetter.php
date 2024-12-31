<?php

namespace App\Livewire\Admin\Letter;

use Livewire\Component;
use App\Models\IncomeLetter; // Menggunakan model IncomeLetter
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

class EditIncomeLetter extends Component
{
    public $incomeId; // ID data yang akan diedit
    public $number_letter;
    public $name;
    public $nik;
    public $birth_place;
    public $birth_date;
    public $occupation;
    public $address;
    public $average_income; // Add average_income as a public property
    public $parent_name;
    public $parent_nik;
    public $parent_gender;
    public $parent_birth_place;
    public $parent_nationality;
    public $parent_religion;
    public $parent_address;

    #[Layout('layouts.admin')]
    #[Title('Edit Data Surat Penghasilan | Desa Kepuh')]
    public function mount($id)
    {
        $income = IncomeLetter::findOrFail($id); // Ambil data berdasarkan ID
        $this->incomeId = $income->id;
        $this->number_letter = $income->number_letter;
        $this->name = $income->name;
        $this->nik = $income->nik;
        $this->birth_place = $income->birth_place;
        $this->birth_date = $income->birth_date;
        $this->occupation = $income->occupation;
        $this->address = $income->address;
        $this->average_income = $income->average_income; // Set the value of average_income
        $this->parent_name = $income->parent_name;
        $this->parent_nik = $income->parent_nik;
        $this->parent_gender = $income->parent_gender;
        $this->parent_birth_place = $income->parent_birth_place;
        $this->parent_nationality = $income->parent_nationality;
        $this->parent_religion = $income->parent_religion;
        $this->parent_address = $income->parent_address;
    }

    public function update()
    {
        // Validasi input
        $this->validate([
            'number_letter' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'nik' => 'required|string|max:255',
            'birth_place' => 'required|string|max:255',
            'birth_date' => 'required|date',
            'occupation' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'average_income' => 'required|string|max:255', // Validasi average_income
            'parent_name' => 'required|string|max:255',
            'parent_nik' => 'required|string|max:255',
            'parent_gender' => 'required|string|max:10',
            'parent_birth_place' => 'required|string|max:255',
            'parent_nationality' => 'required|string|max:255',
            'parent_religion' => 'required|string|max:255',
            'parent_address' => 'required|string|max:255',
        ]);

        // Membersihkan dan mengonversi average_income
        $this->average_income = preg_replace('/[^0-9.]+/', '', $this->average_income); // Menghapus karakter non-numerik selain titik desimal
        $this->average_income = is_numeric($this->average_income) ? (float)$this->average_income : 0.0; // Konversi ke angka desimal

        // Update data
        $income = IncomeLetter::findOrFail($this->incomeId);
        $income->update([
            'number_letter' => $this->number_letter,
            'name' => $this->name,
            'nik' => $this->nik,
            'birth_place' => $this->birth_place,
            'birth_date' => $this->birth_date,
            'occupation' => $this->occupation,
            'address' => $this->address,
            'average_income' => $this->average_income, // Simpan nilai average_income dalam bentuk desimal
            'parent_name' => $this->parent_name,
            'parent_nik' => $this->parent_nik,
            'parent_gender' => $this->parent_gender,
            'parent_birth_place' => $this->parent_birth_place,
            'parent_nationality' => $this->parent_nationality,
            'parent_religion' => $this->parent_religion,
            'parent_address' => $this->parent_address,
        ]);

        session()->flash('success', 'Data berhasil diperbarui!');
        return redirect()->route('admin.income-letter'); // Ganti sesuai dengan route index Anda
    }


    public function render()
    {
        return view('livewire.admin.letter.edit-income-letter');
    }
}
