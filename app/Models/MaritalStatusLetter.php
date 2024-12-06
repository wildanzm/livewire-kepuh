<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MaritalStatusLetter extends Model
{
    protected $fillable = [
        'request_id',
        'number_letter',
        'name',
        'birth_place',
        'birth_date',
        'religion',
        'occupation',
        'gender',
        'address',
        'marital_status'
    ];

    public function request(): BelongsTo
    {
        return $this->belongsTo(Request::class);
    }
}
