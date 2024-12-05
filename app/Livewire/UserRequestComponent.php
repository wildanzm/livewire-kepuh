<?php

namespace App\Livewire;

use App\Models\PovertyLetter;
use App\Models\Request;
use App\Models\TypeLetter;
use App\Models\DomicileLetter;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;
use WireUi\Traits\WireUiActions;

class UserRequestComponent extends Component
{
    use WireUiActions, WithFileUploads;

    public $type_letter_id;
    public $image_ktp;
    public $image_selfie;
    public $formFields = [];
    public $formFieldsValues = [];
    public $isFormVisible = false;
    public $activeTab = 1; // Default tab

    #[Layout('layouts.app')]
    #[Title('Ajukan Permintaan Surat')]

    public function mount()
    {
        $this->isFormVisible = false;
        $this->formFields = []; // Awalnya kosong
    }

    public function updatedTypeLetterId()
    {
        // Memuat form fields sesuai dengan pilihan jenis surat
        $this->loadFormFields();
        // Menampilkan form tambahan jika type_letter_id diisi
        $this->isFormVisible = !empty($this->type_letter_id);
    }

    public function getSelectedTypeNameProperty()
    {
        $selectedType = $this->typeLetters->firstWhere('id', $this->type_letter_id);
        return $selectedType ? $selectedType['name'] : null;
    }

    public function loadFormFields()
    {
        switch ($this->type_letter_id) {
            case 1: // poverty
                $this->formFields = [
                    ['name' => 'name', 'type' => 'text', 'label' => 'Nama', 'placeholder' => 'Masukkan nama'],
                    ['name' => 'nik', 'type' => 'number', 'label' => 'NIK', 'placeholder' => 'Masukkan NIK'],
                    ['name' => 'gender', 'type' => 'select', 'label' => 'Jenis Kelamin', 'options' => ['Laki-laki', 'Perempuan']],
                    ['name' => 'birth_place', 'type' => 'text', 'label' => 'Tempat Lahir', 'placeholder' => 'Masukkan tempat lahir'],
                    ['name' => 'birth_date', 'type' => 'date', 'label' => 'Tanggal Lahir', 'placeholder' => ''],
                    ['name' => 'nationality', 'type' => 'text', 'label' => 'Kewarganegaraan', 'placeholder' => 'Masukkan kewarganegaraan'],
                    ['name' => 'religion', 'type' => 'text', 'label' => 'Agama', 'placeholder' => 'Masukkan agama'],
                    ['name' => 'occupation', 'type' => 'text', 'label' => 'Pekerjaan', 'placeholder' => 'Masukkan pekerjaan'],
                    ['name' => 'purpose', 'type' => 'text', 'label' => 'Tujuan Di Buat Surat', 'placeholder' => 'Masukkan tujuan surat'],
                    ['name' => 'address', 'type' => 'textarea', 'label' => 'Alamat', 'placeholder' => 'Masukkan alamat lengkap'],
                ];
                break;

            case 3: // domicille Letter
                $this->formFields =
                    [
                        ['name' => 'name', 'type' => 'text', 'label' => 'Nama', 'placeholder' => 'Masukkan nama'],
                        ['name' => 'nik', 'type' => 'number', 'label' => 'NIK', 'placeholder' => 'Masukkan NIK'],
                        ['name' => 'gender', 'type' => 'select', 'label' => 'Jenis Kelamin', 'options' => ['Laki-laki', 'Perempuan']],
                        ['name' => 'birth_date', 'type' => 'date', 'label' => 'Tanggal Lahir', 'placeholder' => ''],
                        ['name' => 'nationality', 'type' => 'text', 'label' => 'Kewarganegaraan', 'placeholder' => 'Masukkan kewarganegaraan'],
                        ['name' => 'religion', 'type' => 'text', 'label' => 'Agama', 'placeholder' => 'Masukkan agama'],
                        ['name' => 'occupation', 'type' => 'text', 'label' => 'Pekerjaan', 'placeholder' => 'Masukkan pekerjaan'],
                        ['name' => 'address', 'type' => 'textarea', 'label' => 'Alamat', 'placeholder' => 'Masukkan alamat lengkap'],
                    ];
                break;

            default:
                $this->formFields = [];
                break;
        }
    }

    public function submit()
    {
        $validationRules = [
            'type_letter_id' => 'required|exists:type_letters,id',
            'image_ktp' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'image_selfie' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ];

        foreach ($this->formFields as $field) {
            if ($field['name'] === 'nik') {
                $validationRules['formFieldsValues.' . $field['name']] = 'required|digits_between:1,16'; // Pastikan hanya angka dengan panjang tertentu
            } elseif ($field['type'] === 'date') {
                $validationRules['formFieldsValues.' . $field['name']] = 'nullable|date';
            } else {
                $validationRules['formFieldsValues.' . $field['name']] = 'required|string|max:255';
            }
        }

        $this->validate($validationRules);

        // Validasi keamanan file
        $this->validateImage($this->image_ktp);
        $this->validateImage($this->image_selfie);

        // Generate hashed filenames
        $ktpHashName = uniqid() . '.' . $this->image_ktp->getClientOriginalExtension();
        $selfieHashName = uniqid() . '.' . $this->image_selfie->getClientOriginalExtension();

        // Simpan file ke folder public storage dengan nama hash
        $ktpPath = $this->image_ktp->storeAs('ktp', $ktpHashName, 'public');
        $selfiePath = $this->image_selfie->storeAs('selfie', $selfieHashName, 'public');

        $request = Request::create([
            'user_id' => Auth::id(),
            'type_letter_id' => $this->type_letter_id,
            'image_ktp' => $ktpPath,
            'image_selfie' => $selfiePath,
            'request_status_id' => 1,
        ]);

        $data = array_merge($this->formFieldsValues, [
            'user_id' => Auth::id(),
            'request_id' => $request->id,
        ]);

        if ($this->type_letter_id == 1) {
            PovertyLetter::create($data);
        } elseif ($this->type_letter_id == 3) {
            DomicileLetter::create($data);
        }

        $this->reset();
        $this->dialog()->show([
            'title' => 'Berhasil',
            'description' => 'Permintaan surat berhasil disimpan.',
            'icon' => 'success',
        ]);
    }

    // Fungsi untuk memvalidasi apakah file adalah gambar yang sah
    public function validateImage($file)
    {
        // Pastikan file benar-benar gambar
        $imageInfo = getimagesize($file->getRealPath());

        if ($imageInfo === false) {
            throw new \Exception('File yang diunggah bukan gambar valid.');
        }

        // Validasi MIME type
        $allowedMimeTypes = ['image/jpeg', 'image/png', 'image/jpg'];
        $fileMimeType = $file->getMimeType();

        if (!in_array($fileMimeType, $allowedMimeTypes)) {
            throw new \Exception('File yang diunggah tidak memiliki tipe MIME valid.');
        }
    }

    public function render()
    {
        return view('livewire.user-request-component', [
            'typeLetters' => TypeLetter::all(),
        ]);
    }
}
