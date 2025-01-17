<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class IncomeLetter extends Model
{
    protected $fillable = [
        'request_id',
        'number_letter',
        'name',
        'nik',
        'birth_place',
        'birth_date',
        'occupation',
        'address',
        'average_income',
        'parent_name',
        'parent_nik',
        'parent_gender',
        'parent_birth_place',
        'parent_nationality',
        'parent_religion',
        'parent_address'
    ];

    public function request(): BelongsTo
    {
        return $this->belongsTo(Request::class);
    }
}
