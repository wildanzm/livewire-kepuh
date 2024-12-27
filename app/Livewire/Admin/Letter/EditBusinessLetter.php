<?php

namespace App\Livewire\Admin\Letter;

use Livewire\Component;
use App\Models\BusinessLetter;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

class EditBusinessLetter extends Component
{
    public $businessId; // ID data yang akan diedit
    public $number_letter;
    public $nik;
    public $name;
    public $birth_place;
    public $birth_date;
    public $gender;
    public $religion;
    public $occupation;
    public $address;
    public $marital_status;
    public $business_name;
    public $business_type;
    public $business_address;

    #[Layout('layouts.admin')]
    #[Title('Edit Data Surat Usaha | Desa Kepuh')]
    public function mount($id)
    {
        $business = BusinessLetter::findOrFail($id); // Ambil data berdasarkan ID
        $this->businessId = $business->id;
        $this->number_letter = $business->number_letter;
        $this->nik = $business->nik;
        $this->name = $business->name;
        $this->birth_place = $business->birth_place;
        $this->birth_date = $business->birth_date;
        $this->gender = $business->gender;
        $this->religion = $business->religion;
        $this->occupation = $business->occupation;
        $this->address = $business->address;
        $this->marital_status = $business->marital_status;
        $this->business_name = $business->business_name;
        $this->business_type = $business->business_type;
        $this->business_address = $business->business_address;
    }

    public function update()
    {
        $this->validate([
            'number_letter' => 'required|string|max:255',
            'nik' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'birth_place' => 'required|string|max:255',
            'birth_date' => 'required|date',
            'gender' => 'required|string',
            'religion' => 'required|string|max:255',
            'occupation' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'marital_status' => 'required|string',
            'business_name' => 'required|string|max:255',
            'business_type' => 'required|string|max:255',
            'business_address' => 'required|string|max:255',
        ]);

        $business = BusinessLetter::findOrFail($this->businessId);
        $business->update([
            'number_letter' => $this->number_letter,
            'nik' => $this->nik,
            'name' => $this->name,
            'birth_place' => $this->birth_place,
            'birth_date' => $this->birth_date,
            'gender' => $this->gender,
            'religion' => $this->religion,
            'occupation' => $this->occupation,
            'address' => $this->address,
            'marital_status' => $this->marital_status,
            'business_name' => $this->business_name,
            'business_type' => $this->business_type,
            'business_address' => $this->business_address,
        ]);

        session()->flash('success', 'Data surat usaha berhasil diperbarui!');
        return redirect()->route('admin.bussines-letter'); // Ganti sesuai dengan route index Anda
    }

    public function render()
    {
        return view('livewire.admin.letter.edit-business-letter');
    }
}