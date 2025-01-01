<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class VillageLetter extends Model
{
    protected $fillable = [
        'request_id',
        'number_letter',
        'sppt_number',
        'persil_number',
        'kohir_number',
        'class',
        'land_area',
        'land_owner',
        'north_border',
        'east_border',
        'south_border',
        'west_border',
        'letter_c_number', // Kolom untuk "Letter C No ..."
        'land_assessment_price', // Kolom untuk harga taksiran tanah
        'building_assessment_price', // Kolom untuk harga taksiran bangunan
        'total_assessment_price', // Kolom untuk jumlah total
    ];

    public function request(): BelongsTo
    {
        return $this->belongsTo(Request::class);
    }
}
