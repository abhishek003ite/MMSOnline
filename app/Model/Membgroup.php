<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Membgroup extends Model
{
    public function member()
    {
        return $this->belongsTo(Member::class);
    }

    public function group()
    {
        return $this->belongsTo(Churchgroup::class);
    }
}
