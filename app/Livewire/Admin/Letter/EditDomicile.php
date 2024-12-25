<?php

namespace App\Livewire\Admin\Letter;

use Livewire\Component;
use App\Models\DomicileLetter;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

class EditDomicile extends Component
{
    public $domicileId; // ID data yang akan diedit
    public $name;
    public $nik;
    public $gender;
    public $birth_place;
    public $birth_date;
    public $nationality;
    public $religion;
    public $address;
    public $occupation;
    public $number_letter;

    #[Layout('layouts.admin')]
    #[Title('Edit Data Surat Domisili | Desa Kepuh')]
    public function mount($id)
    {
        $domicile = DomicileLetter::findOrFail($id); // Ambil data berdasarkan ID
        $this->domicileId = $domicile->id;
        $this->name = $domicile->name;
        $this->nik = $domicile->nik;
        $this->gender = $domicile->gender;
        $this->birth_place = $domicile->birth_place;
        $this->birth_date = $domicile->birth_date;
        $this->nationality = $domicile->nationality;
        $this->religion = $domicile->religion;
        $this->address = $domicile->address;
        $this->occupation = $domicile->occupation;
        $this->number_letter = $domicile->number_letter;
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'nik' => 'required|string|max:255',
            'gender' => 'required|string',
            'birth_place' => 'required|string|max:255',
            'birth_date' => 'required|date',
            'nationality' => 'required|string|max:255',
            'religion' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'occupation' => 'required|string|max:255',
            'number_letter' => 'required|string|max:255',
        ]);

        $domicile = DomicileLetter::findOrFail($this->domicileId);
        $domicile->update([
            'name' => $this->name,
            'nik' => $this->nik,
            'gender' => $this->gender,
            'birth_place' => $this->birth_place,
            'birth_date' => $this->birth_date,
            'nationality' => $this->nationality,
            'religion' => $this->religion,
            'address' => $this->address,
            'occupation' => $this->occupation,
            'number_letter' => $this->number_letter,
        ]);

        session()->flash('success', 'Data surat domisili berhasil diperbarui!');
        return redirect()->route('admin.domicile-letter'); // Ganti sesuai dengan route index Anda
    }

    public function render()
    {
        return view('livewire.admin.letter.edit-domicile');
    }
}
