<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class RequestStatus extends Model
{
    protected $fillable = ['status'];

    public function request(): HasOne{
        return $this->hasOne(Request::class);
    }
}
