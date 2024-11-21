<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class TypeLetter extends Model
{
    
    protected $fillable = [
        'name'
    ];


    public function request(): HasOne{
        return $this->hasOne(Request::class);
    }

    

}
