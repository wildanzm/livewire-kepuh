<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BirthLetter extends Model
{
    protected $fillable = [
        'request_id',
        'number_letter',
        'family_head_name',
        'family_card_number',
        'baby_name',
        'baby_gender',
        'birth_date',
        'birth_time',
        'birth_order',
        'birth_helper',
        'baby_weight',
        'baby_length',
        'mother_nik',
        'mother_name',
        'mother_birth_date',
        'mother_age',
        'mother_occupation',
        'mother_address',
        'mother_nationality',
        'mother_ethnicity',
        'mother_marriage_date',
        'father_nik',
        'father_name',
        'father_birth_date',
        'father_age',
        'father_occupation',
        'father_address',
        'father_nationality',
        'father_ethnicity',
        'father_marriage_date',
        'reporter_nik',
        'reporter_name',
        'reporter_age',
        'reporter_gender',
        'reporter_occupation',
        'reporter_address',
        'witness1_nik',
        'witness1_name',
        'witness1_age',
        'witness1_occupation',
        'witness1_address',
        'witness2_nik',
        'witness2_name',
        'witness2_age',
        'witness2_occupation',
        'witness2_address',
    ];

    public function request(): BelongsTo
    {
        return $this->belongsTo(Request::class);
    }
}
