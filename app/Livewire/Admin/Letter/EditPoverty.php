<?php

namespace App\Livewire\Admin\Letter;

use Livewire\Component;
use App\Models\Poverty; // Pastikan model sesuai
use App\Models\PovertyLetter;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

class EditPoverty extends Component
{
    public $povertyId; // ID data yang akan diedit
    public $name;
    public $nik;
    public $gender;
    public $birth_place;
    public $birth_date;
    public $nationality;
    public $religion;
    public $occupation;
    public $purpose;
    public $address;
    public $number_letter;

    #[Layout('layouts.admin')]
    #[Title('Edit Data Kemiskinan | Desa Kepuh')]
    public function mount($id)
    {
        $poverty = PovertyLetter::findOrFail($id); // Ambil data berdasarkan ID
        $this->povertyId = $poverty->id;
        $this->name = $poverty->name;
        $this->nik = $poverty->nik;
        $this->gender = $poverty->gender;
        $this->birth_place = $poverty->birth_place;
        $this->birth_date = $poverty->birth_date;
        $this->nationality = $poverty->nationality;
        $this->religion = $poverty->religion;
        $this->occupation = $poverty->occupation;
        $this->purpose = $poverty->purpose;
        $this->address = $poverty->address;
        $this->number_letter = $poverty->number_letter;
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'nik' => 'required',
            'gender' => 'required|string',
            'birth_place' => 'required|string|max:255',
            'birth_date' => 'required|date',
            'nationality' => 'required|string|max:255',
            'religion' => 'required|string|max:255',
            'occupation' => 'required|string|max:255',
            'purpose' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'number_letter' => 'required|string|max:255',
        ]);

        $poverty = PovertyLetter::findOrFail($this->povertyId);
        $poverty->update([
            'name' => $this->name,
            'nik' => $this->nik,
            'gender' => $this->gender,
            'birth_place' => $this->birth_place,
            'birth_date' => $this->birth_date,
            'nationality' => $this->nationality,
            'religion' => $this->religion,
            'occupation' => $this->occupation,
            'purpose' => $this->purpose,
            'address' => $this->address,
            'number_letter' => $this->number_letter, // Tambahkan ini
        ]);

        session()->flash('success', 'Data berhasil diperbarui!');
        return redirect()->route('admin.poverty-letter'); // Ganti sesuai dengan route index Anda
    }

    public function render()
    {
        return view('livewire.admin.letter.edit-poverty');
    }
}
