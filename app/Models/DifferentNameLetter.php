<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DifferentNameLetter extends Model
{
    protected $fillable = [
        'request_id',
        'number_letter',
        'name',
        'birth_place',
        'birth_date',
        'address',
        'document_name',
        'family_card_number',
        'same_name',
        'same_address',
        'same_document'
    ];

    public function request(): BelongsTo
    {
        return $this->belongsTo(Request::class);
    }
}
