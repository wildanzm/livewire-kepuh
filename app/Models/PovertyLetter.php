<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PovertyLetter extends Model
{
    protected $fillable = [
        'request_id',
        'name',
        'nik',
        'gender',
        'birth_place',
        'birth_date',
        'nationality',
        'religion',
        'occupation',
        'purpose',
        'number_letter',
        'address'
    ];

    public function request(): BelongsTo
    {
        return $this->belongsTo(Request::class);
    }
}
