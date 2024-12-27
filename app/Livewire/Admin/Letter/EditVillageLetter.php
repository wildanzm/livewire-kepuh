<?php

namespace App\Livewire\Admin\Letter;

use Livewire\Component;
use App\Models\VillageLetter;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

class EditVillageLetter extends Component
{
    public $letterId; // ID data yang akan diedit
    public $number_letter;
    public $sppt_number;
    public $persil_number;
    public $kohir_number;
    public $class;
    public $land_area;
    public $land_owner;
    public $north_border;
    public $east_border;
    public $south_border;
    public $west_border;

    #[Layout('layouts.admin')]
    #[Title('Edit Data Surat Tanah | Desa Kepuh')]
    public function mount($id)
    {
        $letter = VillageLetter::findOrFail($id); // Ambil data berdasarkan ID
        $this->letterId = $letter->id;
        $this->number_letter = $letter->number_letter;
        $this->sppt_number = $letter->sppt_number;
        $this->persil_number = $letter->persil_number;
        $this->kohir_number = $letter->kohir_number;
        $this->class = $letter->class;
        $this->land_area = $letter->land_area;
        $this->land_owner = $letter->land_owner;
        $this->north_border = $letter->north_border;
        $this->east_border = $letter->east_border;
        $this->south_border = $letter->south_border;
        $this->west_border = $letter->west_border;
    }

    public function update()
    {
        $this->validate([
            'number_letter' => 'required|string|max:255',
            'sppt_number' => 'required|string|max:255',
            'persil_number' => 'required|string|max:255',
            'kohir_number' => 'required|string|max:255',
            'class' => 'required|string|max:255',
            'land_area' => 'required|numeric',
            'land_owner' => 'required|string|max:255',
            'north_border' => 'required|string|max:255',
            'east_border' => 'required|string|max:255',
            'south_border' => 'required|string|max:255',
            'west_border' => 'required|string|max:255',
        ]);

        $letter = VillageLetter::findOrFail($this->letterId);
        $letter->update([
            'number_letter' => $this->number_letter,
            'sppt_number' => $this->sppt_number,
            'persil_number' => $this->persil_number,
            'kohir_number' => $this->kohir_number,
            'class' => $this->class,
            'land_area' => $this->land_area,
            'land_owner' => $this->land_owner,
            'north_border' => $this->north_border,
            'east_border' => $this->east_border,
            'south_border' => $this->south_border,
            'west_border' => $this->west_border,
        ]);

        session()->flash('success', 'Data surat tanah berhasil diperbarui!');
        return redirect()->route('admin.village-letter'); // Ganti sesuai dengan route index Anda
    }

    public function render()
    {
        return view('livewire.admin.letter.edit-village-letter');
    }
}