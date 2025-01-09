<?php

namespace App\Livewire\Admin\Letter;

use Livewire\Component;
use App\Models\MaritalStatusLetter;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

class EditMaritalStatusLetter extends Component
{
    public $letterId; // ID data yang akan diedit
    public $number_letter;
    public $name;
    public $birth_place;
    public $birth_date;
    public $religion;
    public $occupation;
    public $gender;
    public $address;
    public $marital_status;
    public $status_reason; // Tambahkan status_reason

    #[Layout('layouts.admin')]
    #[Title('Edit Data Surat Keterangan Janda/Duda | Desa Kepuh')]
    public function mount($id)
    {
        $letter = MaritalStatusLetter::findOrFail($id); // Ambil data berdasarkan ID
        $this->letterId = $letter->id;
        $this->number_letter = $letter->number_letter;
        $this->name = $letter->name;
        $this->birth_place = $letter->birth_place;
        $this->birth_date = $letter->birth_date;
        $this->religion = $letter->religion;
        $this->occupation = $letter->occupation;
        $this->gender = $letter->gender;
        $this->address = $letter->address;
        $this->marital_status = $letter->marital_status;
        $this->status_reason = $letter->status_reason; // Ambil data status_reason
    }

    public function update()
    {
        $this->validate([
            'number_letter' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'birth_place' => 'required|string|max:255',
            'birth_date' => 'required|date',
            'religion' => 'required|string|max:255',
            'occupation' => 'required|string|max:255',
            'gender' => 'required|in:Laki-Laki,Perempuan',
            'address' => 'required|string|max:255',
            'marital_status' => 'required|in:Duda,Janda',
            'status_reason' => 'required|in:Perceraian,Kematian', // Validasi status_reason
        ]);

        $letter = MaritalStatusLetter::findOrFail($this->letterId);
        $letter->update([
            'number_letter' => $this->number_letter,
            'name' => $this->name,
            'birth_place' => $this->birth_place,
            'birth_date' => $this->birth_date,
            'religion' => $this->religion,
            'occupation' => $this->occupation,
            'gender' => $this->gender,
            'address' => $this->address,
            'marital_status' => $this->marital_status,
            'status_reason' => $this->status_reason, // Tambahkan status_reason
        ]);

        session()->flash('success', 'Data berhasil diperbarui!');
        return redirect()->route('admin.marital-status-letter'); // Ganti sesuai dengan route index Anda
    }

    public function render()
    {
        return view('livewire.admin.letter.edit-marital-status-letter');
    }
}
