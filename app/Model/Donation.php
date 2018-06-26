<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    public function member()
    {
        return $this->belongsTo(Member::class);
    }
}
