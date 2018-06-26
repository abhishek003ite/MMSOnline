<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Productservices extends Model
{
    public function member()
    {
        return $this->belongsTo(Member::class);
    }
}
