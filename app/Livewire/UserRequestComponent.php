<?php

namespace App\Livewire;

use App\Models\DomicileLetter; // Import model DomicileLetter
use App\Models\Request;        // Import model Request
use App\Models\TypeLetter;
use App\Models\RequestStatus;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads; // Untuk unggahan file
use WireUi\Traits\WireUiActions;

class UserRequestComponent extends Component
{
    use WireUiActions, WithFileUploads;

    // Properti input data untuk domicile_letters
    public $name;
    public $nik;
    public $gender;
    public $birth_date;
    public $nationality;
    public $religion;
    public $occupation;
    public $address;

    // Properti input data untuk requests
    public $type_letter_id;
    public $image_ktp;
    public $image_selfie;

    #[Layout('layouts.app')]
    #[Title('Ajukan Permintaan Surat')]

    public function submit()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'nik' => 'required|string|max:16',
            'gender' => 'nullable|string',
            'birth_date' => 'nullable|date',
            'nationality' => 'nullable|string|max:50',
            'religion' => 'nullable|string|max:50',
            'occupation' => 'nullable|string|max:100',
            'address' => 'nullable|string|max:500',
            'type_letter_id' => 'required|exists:type_letters,id',
            'image_ktp' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'image_selfie' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Simpan file
        $ktpPath = $this->image_ktp->storeAs(
            'ktp',
            'ktp_' . Auth::id() . '_' . time() . '.' . $this->image_ktp->getClientOriginalExtension(),
            'public'
        );
        
        $selfiePath = $this->image_selfie->storeAs(
            'selfie',
            'selfie_' . Auth::id() . '_' . time() . '.' . $this->image_selfie->getClientOriginalExtension(),
            'public'
        );
        

        // Simpan ke tabel requests
        $request = Request::create([
            'user_id' => Auth::id(),
            'type_letter_id' => $this->type_letter_id,
            'image_ktp' => $ktpPath,
            'image_selfie' => $selfiePath,
            'request_status_id' => 1,
        ]);

        // Simpan ke tabel domicile_letters
        DomicileLetter::create([
            'user_id' => Auth::id(),
            'request_id' => $request->id,
            'name' => $this->name,
            'nik' => $this->nik,
            'gender' => $this->gender,
            'birth_date' => $this->birth_date,
            'nationality' => $this->nationality,
            'religion' => $this->religion,
            'occupation' => $this->occupation,
            'address' => $this->address,
        ]);

        $this->reset();
        $this->dialog()->show([
            'title' => 'Berhasil',
            'description' => 'Data berhasil disimpan.',
            'icon' => 'success',
        ]);
    }

    public function render()
    {
        return view('livewire.user-request-component', [
            'typeLetters' => TypeLetter::all(),
        ]);
    }
}