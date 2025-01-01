<?php

namespace App\Livewire\Admin\Letter;

use App\Models\Family;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use WireUi\Traits\WireUiActions;
use App\Models\MovingComesInOneVillage;

class EditMovingComesOneVillage extends Component
{
    use WireUiActions;
    #[Layout('layouts.admin')]
    #[Title('Edit Data Kemiskinan | Desa Kepuh')]
    // Define public properties for form fields
    public $origin_family_card_number, $origin_head_of_family_name, $origin_address, $origin_rt, $origin_rw, $origin_hamlet, $origin_village, $origin_district, $origin_regency, $origin_province, $origin_postal_code, $origin_phone;

    public $applicant_nik, $applicant_full_name, $reason_for_move;

    public $destination_address, $destination_rt, $destination_rw, $destination_hamlet, $destination_village, $destination_district, $destination_regency, $destination_province, $destination_postal_code, $destination_card_number_family, $destination_nik_head_of_family, $destination_name_head_of_family, $destination_arrival_date;

    public $move_type, $kk_status_moving, $familyMembers = [];
    public $movingRequestId, $number_letter;

    // Mount method to load existing data
    public function mount($id)
    {
        // Ambil data MovingComesInOneVillage berdasarkan ID surat
        $movingRequest = MovingComesInOneVillage::findOrFail($id);
        $this->movingRequestId = $id;

        // Mengisi properti dengan data dari surat
        $this->fill($movingRequest->toArray());
        $this->number_letter = $movingRequest->number_letter; // Mengisi nomor surat

        // Ambil request_id dari surat pindah datang satu desa
        $requestId = $movingRequest->request_id;

        // Ambil data keluarga berdasarkan request_id
        $familyMembers = Family::where('request_id', $requestId)->get();

        // Mengisi data anggota keluarga berdasarkan query Family
        $this->familyMembers = $familyMembers->map(function ($member) {
            return [
                'nik' => $member->nik,
                'name' => $member->name,
                'ktp_expiry' => $member->ktp_expiry,
                'shdk' => $member->shdk,
            ];
        })->toArray();
    }

    public function addFamilyMember()
    {
        $this->familyMembers[] = [
            'nik' => '',
            'name' => '',
            'shdk' => '',
        ];
    }

    public function removeFamilyMember($index)
    {
        unset($this->familyMembers[$index]);
        $this->familyMembers = array_values($this->familyMembers);  // Reindex array
    }

    // Validation rules
    protected $rules = [
        // Origin details
        'origin_family_card_number' => 'required|string', // Sesuai dengan fillable (bukan numeric)
        'origin_head_of_family_name' => 'required|string',
        'origin_address' => 'required|string',
        'origin_rt' => 'required|numeric',
        'origin_rw' => 'required|numeric',
        'origin_hamlet' => 'required|string',
        'origin_village' => 'required|string',
        'origin_district' => 'required|string',
        'origin_regency' => 'required|string',
        'origin_province' => 'required|string',
        'origin_postal_code' => 'required|string', // Sesuai dengan fillable (bukan numeric)
        'origin_phone' => 'required|string', // Sesuai dengan fillable (bukan numeric)

        // Applicant details
        'applicant_nik' => 'required|string', // Sesuai dengan fillable (bukan numeric)
        'applicant_full_name' => 'required|string',

        // Destination details
        'destination_card_number_family' => 'required|string',
        'destination_nik_head_of_family' => 'required|string',
        'destination_name_head_of_family' => 'required|string',
        'destination_arrival_date' => 'required|date',
        'destination_address' => 'required|string',
        'destination_rt' => 'required|numeric',
        'destination_rw' => 'required|numeric',
        'destination_hamlet' => 'required|string',
        'destination_village' => 'required|string',
        'destination_district' => 'required|string',
        'destination_regency' => 'required|string',
        'destination_province' => 'required|string',
        'destination_postal_code' => 'required|string', // Sesuai dengan fillable (bukan numeric)

        // Move type and family card status
        'kk_status_moving' => 'required|string',

        // Number letter
        'number_letter' => 'required|string',

        // Family members
        'familyMembers.*.nik' => 'required|string', // Sesuai dengan fillable (bukan numeric)
        'familyMembers.*.name' => 'required|string',
        'familyMembers.*.ktp_expiry' => 'required|date',
        'familyMembers.*.shdk' => 'required|string',
    ];


    // Update method
    public function update()
    {
        // Validate input
        $validatedData = $this->validate();

        // Update moving request
        $movingRequest = MovingComesInOneVillage::findOrFail($this->movingRequestId);
        $movingRequest->update(array_merge($validatedData, [
            'number_letter' => $this->number_letter, // Update nomor surat
        ]));

        // Update family members
        foreach ($this->familyMembers as $member) {
            // Cari data family berdasarkan request_id dan nik
            $family = Family::where('request_id', $movingRequest->request_id)
                ->where('nik', $member['nik'])
                ->first();

            if ($family) {
                // Jika ditemukan, lakukan update data yang sudah ada
                $family->update([
                    'name' => $member['name'],
                    'ktp_expiry' => $member['ktp_expiry'],
                    'shdk' => $member['shdk'],
                ]);
            } else {
                // Jika tidak ditemukan, buat data baru
                Family::create([
                    'request_id' => $movingRequest->request_id,
                    'nik' => $member['nik'],
                    'name' => $member['name'],
                    'ktp_expiry' => $member['ktp_expiry'],
                    'shdk' => $member['shdk'],
                ]);
            }
        }

        // $this->notification()->send([
        //     'icon' => 'success',
        //     'title' => 'Success Notification!',
        //     'description' => 'Data telah berhasil diperbarui.',
        // ]);
        // Tambahkan delay sebelum redirect (misalnya 3 detik)

        // Redirect with success message
        session()->flash('success', 'Data Surat Pindah Satu Desa berhasil diperbarui.');

        // Redirect ke halaman tujuan
        return redirect()->route('admin.moving-one-village-letter');
    }

    public function render()
    {
        return view('livewire.admin.letter.edit-moving-comes-one-village');
    }
}
