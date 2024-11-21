<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SingleStatusLetter extends Model
{
    protected $fillable = [
        'request_id',
        'name',
        'nik',
        'birth_place',
        'birth_date',
        'religion',
        'occupation',
        'address',
    ];

    public function request(): BelongsTo
    {
        return $this->belongsTo(Request::class);
    }
}
