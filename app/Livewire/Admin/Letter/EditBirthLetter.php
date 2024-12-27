<?php

namespace App\Livewire\Admin\Letter;

use App\Models\BirthLetter;
use Livewire\Component;
use App\Models\BusinessLetter;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

class EditBirthLetter extends Component
{
    public $businessId; // ID data yang akan diedit
    public $number_letter;
    public $family_head_name;
    public $family_card_number;
    public $baby_name;
    public $baby_gender;
    public $birth_date;
    public $birth_time;
    public $birth_order;
    public $birth_helper;
    public $baby_weight;
    public $baby_length;
    public $mother_nik;
    public $mother_name;
    public $mother_birth_date;
    public $mother_age;
    public $mother_occupation;
    public $mother_address;
    public $mother_nationality;
    public $mother_ethnicity;
    public $mother_marriage_date;
    public $father_nik;
    public $father_name;
    public $father_birth_date;
    public $father_age;
    public $father_occupation;
    public $father_address;
    public $father_nationality;
    public $father_ethnicity;
    public $father_marriage_date;
    public $reporter_nik;
    public $reporter_name;
    public $reporter_age;
    public $reporter_gender;
    public $reporter_occupation;
    public $reporter_address;
    public $witness1_nik;
    public $witness1_name;
    public $witness1_age;
    public $witness1_occupation;
    public $witness1_address;
    public $witness2_nik;
    public $witness2_name;
    public $witness2_age;
    public $witness2_occupation;
    public $witness2_address;

    #[Layout('layouts.admin')]
    #[Title('Edit Data Kata Kelahiran | Desa Kepuh')]
    public function mount($id)
    {
        $business =  BirthLetter::findOrFail($id); // Ambil data berdasarkan ID
        $this->businessId = $business->id;
        foreach ($business->toArray() as $key => $value) {
            if (property_exists($this, $key)) {
                $this->$key = $value;
            }
        }
    }

    public function update()
    {
        $this->validate([
            'number_letter' => 'nullable|string|max:255',
            'family_head_name' => 'required|string|max:255',
            'family_card_number' => 'required|string|max:255',
            'baby_name' => 'required|string|max:255',
            'baby_gender' => 'required|string', // Assuming 'Laki-Laki' and 'Perempuan' are the valid values.
            'birth_date' => 'required|date',
            'birth_time' => 'required|date_format:H:i:s', // Ensure this is in the correct time format (HH:mm:ss).
            'birth_order' => 'required|integer',
            'birth_helper' => 'required|string|max:255',
            'baby_weight' => 'required|numeric',
            'baby_length' => 'required|numeric',
            'mother_nik' => 'required|string|max:255',
            'mother_name' => 'required|string|max:255',
            'mother_birth_date' => 'required|date',
            'mother_age' => 'required|integer',
            'mother_occupation' => 'required|string|max:255',
            'mother_address' => 'required|string|max:255',
            'mother_nationality' => 'required|string|max:255',
            'mother_ethnicity' => 'required|string|max:255',
            'mother_marriage_date' => 'required|date',
            'father_nik' => 'required|string|max:255',
            'father_name' => 'required|string|max:255',
            'father_birth_date' => 'required|date',
            'father_age' => 'required|integer',
            'father_occupation' => 'required|string|max:255',
            'father_address' => 'required|string|max:255',
            'father_nationality' => 'required|string|max:255',
            'father_ethnicity' => 'required|string|max:255',
            'father_marriage_date' => 'required|date',
            'reporter_nik' => 'required|string|max:255',
            'reporter_name' => 'required|string|max:255',
            'reporter_age' => 'required|integer',
            'reporter_gender' => 'required|in:Laki-Laki,Perempuan',
            'reporter_occupation' => 'required|string|max:255',
            'reporter_address' => 'required|string|max:255',
            'witness1_nik' => 'nullable|string|max:255',
            'witness1_name' => 'nullable|string|max:255',
            'witness1_age' => 'nullable|integer',
            'witness1_occupation' => 'nullable|string|max:255',
            'witness1_address' => 'nullable|string|max:255',
            'witness2_nik' => 'nullable|string|max:255',
            'witness2_name' => 'nullable|string|max:255',
            'witness2_age' => 'nullable|integer',
            'witness2_occupation' => 'nullable|string|max:255',
            'witness2_address' => 'nullable|string|max:255',
        ]);


        $business = BirthLetter::findOrFail($this->businessId);
        $business->update($this->all());

        session()->flash('success', 'Data akta kelahiran berhasil diperbarui!');
        return redirect()->route('admin.birth-letter');
    }

    public function render()
    {
        return view('livewire.admin.letter.edit-birth-letter');
    }
}