<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    public function member()
    {
        return $this->belongsTo(Member::class);
    }

    public function client()
    {
        return $this->belongsTo(Member::class);
    }
}
