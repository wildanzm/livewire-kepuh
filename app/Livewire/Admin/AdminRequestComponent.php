<?php

namespace App\Livewire\Admin;

use App\Models\BusinessLetter;
use App\Models\Family;
use App\Models\Request;
use Livewire\Component;
use App\Models\TypeLetter;
use App\Models\PovertyLetter;
use Livewire\WithFileUploads;
use App\Models\DomicileLetter;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use WireUi\Traits\WireUiActions;
use Illuminate\Support\Facades\Auth;
use App\Models\MovingComesInOneVillage;

class AdminRequestComponent extends Component
{
    use WireUiActions, WithFileUploads;

    public $type_letter_id;
    public $image_ktp;
    public $image_selfie;
    public $formFields = [];
    public $formFieldsValues = [];
    public $isFormVisible = false;
    public $activeTab = 1; // Default tab
    public $familyMembers = []; // New property to store family members
    public $familyMemberFields = [
        ['name' => 'nik', 'label' => 'NIK', 'type' => 'text'],
        ['name' => 'name', 'label' => 'Nama', 'type' => 'text'],
        ['name' => 'ktp_expiry', 'label' => 'Tanggal Kadaluarsa KTP', 'type' => 'date'],
        ['name' => 'shdk', 'label' => 'Status Hubungan Keluarga', 'type' => 'select'],
    ];


    #[Layout('layouts.admin')]
    #[Title('Ajukan Permintaan Surat')]

    public function mount()
    {
        $this->isFormVisible = false;
        $this->formFields = []; // Awalnya kosong
        $this->familyMemberFields = [
            ['name' => 'nik', 'type' => 'number', 'label' => 'NIK', 'placeholder' => 'Masukkan NIK'],
            ['name' => 'name', 'type' => 'text', 'label' => 'Nama', 'placeholder' => 'Masukkan nama'],
            ['name' => 'ktp_expiry', 'type' => 'date', 'label' => 'Tanggal Kadaluarsa KTP', 'placeholder' => ''],
            ['name' => 'shdk', 'type' => 'text', 'label' => 'Status Hubungan Keluarga', 'placeholder' => 'Masukkan status hubungan keluarga'],
        ];
        $this->familyMembers = []; // Initialize family members array
    }


    public function addFamilyMember()
    {
        // Prepare family member data
        $familyMemberData = [];
        foreach ($this->familyMemberFields as $field) {
            // Ensure we're capturing the correct field values
            $familyMemberData[$field['name']] = $this->formFieldsValues['family_' . $field['name']] ?? null;
        }

        // Validation rules
        $rules = [
            'formFieldsValues.family_nik' => 'required|max:16',
            'formFieldsValues.family_name' => 'required|string|max:255',
            'formFieldsValues.family_ktp_expiry' => 'nullable|date',
            'formFieldsValues.family_shdk' => 'required|string|max:255',
        ];

        // Validation messages
        $messages = [
            'formFieldsValues.family_nik.required' => 'NIK harus diisi',
            'formFieldsValues.family_nik.digits' => 'NIK harus terdiri dari 16 digit',
            'formFieldsValues.family_name.required' => 'Nama harus diisi',
            'formFieldsValues.family_shdk.required' => 'Status Hubungan Keluarga harus diisi',
        ];

        // Validate the data
        $validatedData = $this->validate($rules, $messages);

        // Add the validated family member data to the familyMembers array
        $this->familyMembers[] = [
            'nik' => $validatedData['formFieldsValues']['family_nik'],
            'name' => $validatedData['formFieldsValues']['family_name'],
            'ktp_expiry' => $validatedData['formFieldsValues']['family_ktp_expiry'],
            'shdk' => $validatedData['formFieldsValues']['family_shdk'],
        ];

        // Clear form fields after adding the family member
        foreach ($this->familyMemberFields as $field) {
            unset($this->formFieldsValues['family_' . $field['name']]);
        }
    }




    // Method to remove a family member
    public function removeFamilyMember($index)
    {
        unset($this->familyMembers[$index]);
        $this->familyMembers = array_values($this->familyMembers);
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
            case 2:
                $this->formFields = [
                    // Origin details
                    ['name' => 'origin_family_card_number', 'type' => 'number', 'label' => 'Nomor Kartu Keluarga Asal', 'placeholder' => 'Masukkan nomor kartu keluarga asal'],
                    ['name' => 'origin_head_of_family_name', 'type' => 'text', 'label' => 'Nama Kepala Keluarga Asal', 'placeholder' => 'Masukkan nama kepala keluarga asal'],
                    ['name' => 'origin_address', 'type' => 'textarea', 'label' => 'Alamat Asal', 'placeholder' => 'Masukkan alamat asal lengkap'],
                    ['name' => 'origin_rt', 'type' => 'number', 'label' => 'RT Asal', 'placeholder' => 'Masukkan RT asal'],
                    ['name' => 'origin_rw', 'type' => 'number', 'label' => 'RW Asal', 'placeholder' => 'Masukkan RW asal'],
                    ['name' => 'origin_hamlet', 'type' => 'text', 'label' => 'Dusun Asal', 'placeholder' => 'Masukkan dusun asal'],
                    ['name' => 'origin_village', 'type' => 'text', 'label' => 'Desa Asal', 'placeholder' => 'Masukkan desa asal'],
                    ['name' => 'origin_district', 'type' => 'text', 'label' => 'Kecamatan Asal', 'placeholder' => 'Masukkan kecamatan asal'],
                    ['name' => 'origin_regency', 'type' => 'text', 'label' => 'Kabupaten Asal', 'placeholder' => 'Masukkan kabupaten asal'],
                    ['name' => 'origin_province', 'type' => 'text', 'label' => 'Provinsi Asal', 'placeholder' => 'Masukkan provinsi asal'],
                    ['name' => 'origin_postal_code', 'type' => 'number', 'label' => 'Kode Pos Asal', 'placeholder' => 'Masukkan kode pos asal'],
                    ['name' => 'origin_phone', 'type' => 'number', 'label' => 'Telepon Asal', 'placeholder' => 'Masukkan nomor telepon asal'],

                    // Applicant details
                    ['name' => 'applicant_nik', 'type' => 'number', 'label' => 'NIK Pemohon', 'placeholder' => 'Masukkan NIK pemohon'],
                    ['name' => 'applicant_full_name', 'type' => 'text', 'label' => 'Nama Lengkap Pemohon', 'placeholder' => 'Masukkan nama lengkap pemohon'],

                    // Move reason


                    // Destination details
                    ['name' => 'destination_card_number_family', 'type' => 'number', 'label' => 'Nomor Kartu Keluarga Tujuan', 'placeholder' => 'Masukkan nomor kartu keluarga tujua'],
                    ['name' => 'destination_nik_head_of_family', 'type' => 'number', 'label' => 'Nik Kepala Keluarga Tujuan', 'placeholder' => 'Masukkan nik kepala keluarga tujuan'],
                    ['name' => 'destination_name_head_of_family', 'type' => 'text', 'label' => 'Nama Kepala Keluarga Tujuan', 'placeholder' => 'Masukkan nama kepala keluarga tujuan'],
                    ['name' => 'destination_arrival_date', 'type' => 'date', 'label' => 'Tanggal Kedatangan', 'placeholder' => 'Masukkan tanggal kedatangan'],
                    ['name' => 'destination_address', 'type' => 'textarea', 'label' => 'Alamat Tujuan', 'placeholder' => 'Masukkan alamat tujuan lengkap'],
                    ['name' => 'destination_rt', 'type' => 'number', 'label' => 'RT Tujuan', 'placeholder' => 'Masukkan RT tujuan'],
                    ['name' => 'destination_rw', 'type' => 'number', 'label' => 'RW Tujuan', 'placeholder' => 'Masukkan RW tujuan'],
                    ['name' => 'destination_hamlet', 'type' => 'text', 'label' => 'Dusun Tujuan', 'placeholder' => 'Masukkan dusun tujuan'],
                    ['name' => 'destination_village', 'type' => 'text', 'label' => 'Desa Tujuan', 'placeholder' => 'Masukkan desa tujuan'],
                    ['name' => 'destination_district', 'type' => 'text', 'label' => 'Kecamatan Tujuan', 'placeholder' => 'Masukkan kecamatan tujuan'],
                    ['name' => 'destination_regency', 'type' => 'text', 'label' => 'Kabupaten Tujuan', 'placeholder' => 'Masukkan kabupaten tujuan'],
                    ['name' => 'destination_province', 'type' => 'text', 'label' => 'Provinsi Tujuan', 'placeholder' => 'Masukkan provinsi tujuan'],
                    ['name' => 'destination_postal_code', 'type' => 'number', 'label' => 'Kode Pos Tujuan', 'placeholder' => 'Masukkan kode pos tujuan'],


                    // Move type and family card status
                    ['name' => 'kk_status_moving', 'type' => 'select', 'label' => 'Status KK Pindah', 'options' => ['Numpang KK', 'Membuat KK Baru', 'Nomor KK Tetap']],
                ];
                break;
            case 3: // domicille Letter
                $this->formFields =
                    [
                        ['name' => 'name', 'type' => 'text', 'label' => 'Nama', 'placeholder' => 'Masukkan nama'],
                        ['name' => 'nik', 'type' => 'number', 'label' => 'NIK', 'placeholder' => 'Masukkan NIK'],
                        ['name' => 'gender', 'type' => 'select', 'label' => 'Jenis Kelamin', 'options' => ['Laki-laki', 'Perempuan']],
                        ['name' => 'birth_place', 'type' => 'text', 'label' => 'Tempat Lahir', 'placeholder' => 'Masukkan tempat lahir'],
                        ['name' => 'birth_date', 'type' => 'date', 'label' => 'Tanggal Lahir', 'placeholder' => ''],
                        ['name' => 'nationality', 'type' => 'text', 'label' => 'Kewarganegaraan', 'placeholder' => 'Masukkan kewarganegaraan'],
                        ['name' => 'religion', 'type' => 'text', 'label' => 'Agama', 'placeholder' => 'Masukkan agama'],
                        ['name' => 'occupation', 'type' => 'text', 'label' => 'Pekerjaan', 'placeholder' => 'Masukkan pekerjaan'],
                        ['name' => 'address', 'type' => 'textarea', 'label' => 'Alamat', 'placeholder' => 'Masukkan alamat lengkap'],
                    ];
            case 4: // domicille Letter
                $this->formFields =
                    [
                        ['name' => 'nik', 'type' => 'number', 'label' => 'NIK', 'placeholder' => 'Masukkan NIK'],
                        ['name' => 'name', 'type' => 'text', 'label' => 'Nama', 'placeholder' => 'Masukkan nama'],
                        ['name' => 'birth_place', 'type' => 'text', 'label' => 'Tempat Lahir', 'placeholder' => 'Masukkan tempat lahir'],
                        ['name' => 'birth_date', 'type' => 'date', 'label' => 'Tanggal Lahir', 'placeholder' => ''],
                        ['name' => 'gender', 'type' => 'select', 'label' => 'Jenis Kelamin', 'options' => ['Laki-laki', 'Perempuan']],
                        ['name' => 'religion', 'type' => 'text', 'label' => 'Agama', 'placeholder' => 'Masukkan agama'],
                        ['name' => 'occupation', 'type' => 'text', 'label' => 'Pekerjaan', 'placeholder' => 'Masukkan pekerjaan'],
                        ['name' => 'address', 'type' => 'textarea', 'label' => 'Alamat', 'placeholder' => 'Masukkan alamat lengkap'],
                        ['name' => 'marital_status', 'type' => 'select', 'label' => 'Status Pernikahan', 'options' => ['Belum Menikah', 'Menikah', 'Cerai']],
                        ['name' => 'business_name', 'type' => 'text', 'label' => 'Nama Usaha', 'placeholder' => 'Masukkan nama usaha'],
                        ['name' => 'business_type', 'type' => 'text', 'label' => 'Jenis Usaha', 'placeholder' => 'Masukkan jenis usaha'],
                        ['name' => 'business_address', 'type' => 'textarea', 'label' => 'Alamat Usaha', 'placeholder' => 'Masukkan alamat usaha'],
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
        } elseif ($this->type_letter_id == 2) {
            MovingComesInOneVillage::create($data);
            // Create family members associated with this request
            foreach ($this->familyMembers as $familyMember) {
                Family::create([
                    'request_id' => $request->id,
                    'nik' => $familyMember['nik'],
                    'name' => $familyMember['name'],
                    'ktp_expiry' => $familyMember['ktp_expiry'],
                    'shdk' => $familyMember['shdk'],
                ]);
            }
        } elseif ($this->type_letter_id == 4) {
            BusinessLetter::create($data);
        }

        $this->reset();
        $this->dialog()->show([
            'icon' => 'success',
            'title' => 'Permintaan Surat Berhasil Diajukan',
        ]);
        $this->redirect(route('admin.request'));
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
        return view('livewire.admin.admin-request-component', [
            'typeLetters' => TypeLetter::whereIn('id', [1, 2, 3, 4])->get(),
        ]);
    }
}
