<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Childtriggers extends Model
{
    public function child()
    {
        return $this->belongsTo(Member::class);
    }
}
