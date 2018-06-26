<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Live extends Model
{
    public function member()
    {
        return $this->hasMany(Member::class);
    }
}
