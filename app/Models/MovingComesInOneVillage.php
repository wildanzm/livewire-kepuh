<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MovingComesInOneVillage extends Model
{
    use HasFactory;

    protected $table = 'moving_comes_in_one_village';
    protected $fillable = [
        'number_letter',
        // Origin details
        'origin_family_card_number',
        'origin_head_of_family_name',
        'origin_address',
        'origin_rt',
        'origin_rw',
        'origin_hamlet',
        'origin_village',
        'origin_district',
        'origin_regency',
        'origin_province',
        'origin_postal_code',
        'origin_phone',
        // Applicant details
        'applicant_nik',
        'applicant_full_name',
        // Move reason
        'reason_for_move',
        // Destination details
        'destination_address',
        'destination_rt',
        'destination_rw',
        'destination_hamlet',
        'destination_village',
        'destination_district',
        'destination_regency',
        'destination_province',
        'destination_postal_code',
        'destination_phone',
        // Move type and family card status
        'move_type',
        'kk_status_not_moving',
        'kk_status_moving',
    ];
    public function family()
    {
        return $this->belongsTo(Family::class);  // Relasi ke tabel families
    }
    public function request(): BelongsTo
    {
        return $this->belongsTo(Request::class);
    }
}