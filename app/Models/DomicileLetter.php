<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DomicileLetter extends Model
{
    protected $fillable = [
        'request_id',
        'nik',
        'name',
        'gender',
        'birth_place',
        'birth_date',
        'nationality',
        'religion',
        'address',
        'occupation',
        'number_letter'
    ];

    public function request(): BelongsTo
    {
        return $this->belongsTo(Request::class);
    }
}
