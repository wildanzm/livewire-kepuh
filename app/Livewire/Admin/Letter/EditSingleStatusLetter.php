<?php

namespace App\Livewire\Admin\Letter;

use Livewire\Component;
use App\Models\SingleStatusLetter;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

class EditSingleStatusLetter extends Component
{
    public $letterId; // ID data yang akan diedit
    public $name;
    public $nik;
    public $birth_place;
    public $birth_date;
    public $religion;
    public $occupation;
    public $address;
    public $number_letter;
    public $gender;

    #[Layout('layouts.admin')]
    #[Title('Edit Data Surat Status Belum Menikah | Desa Kepuh')]
    public function mount($id)
    {
        $letter = SingleStatusLetter::findOrFail($id); // Ambil data berdasarkan ID
        $this->letterId = $letter->id;
        $this->name = $letter->name;
        $this->nik = $letter->nik;
        $this->birth_place = $letter->birth_place;
        $this->birth_date = $letter->birth_date;
        $this->religion = $letter->religion;
        $this->occupation = $letter->occupation;
        $this->address = $letter->address;
        $this->number_letter = $letter->number_letter;
        $this->gender = $letter->gender; // Tambahkan gender
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'nik' => 'required',
            'birth_place' => 'required|string|max:255',
            'birth_date' => 'required|date',
            'religion' => 'required|string|max:255',
            'occupation' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'number_letter' => 'required|string|max:255',
            'gender' => 'required|in:Laki-Laki,Perempuan', // Validasi gender
        ]);

        $letter = SingleStatusLetter::findOrFail($this->letterId);
        $letter->update([
            'name' => $this->name,
            'nik' => $this->nik,
            'birth_place' => $this->birth_place,
            'birth_date' => $this->birth_date,
            'religion' => $this->religion,
            'occupation' => $this->occupation,
            'address' => $this->address,
            'number_letter' => $this->number_letter,
            'gender' => $this->gender, // Tambahkan gender
        ]);

        session()->flash('success', 'Data berhasil diperbarui!');
        return redirect()->route('admin.single-status-letter'); // Ganti sesuai dengan route index Anda
    }

    public function render()
    {
        return view('livewire.admin.letter.edit-single-status-letter');
    }
}
