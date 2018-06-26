<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Words extends Model
{
    public function member()
    {
        return $this->hasMany(Member::class);
    }
}
