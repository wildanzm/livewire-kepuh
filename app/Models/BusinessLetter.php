<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BusinessLetter extends Model
{
    protected $fillable = [
        'request_id',
        'nik',
        'name',
        'birth_place',
        'birth_date',
        'gender',
        'religion',
        'occupation',
        'address',
        'marital_status',
        'business_name',
        'business_type',
        'business_address',
    ];

    public function request(): BelongsTo{
        return $this->belongsTo(Request::class);
    }
}
