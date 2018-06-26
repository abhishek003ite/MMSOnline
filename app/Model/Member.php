<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    public function businessGroup()
    {
        return $this->belongsTo(Businessgroup::class);
    }

    public function churchGroup()
    {
        return $this->belongsTo(Churchgroup::class);
    }

    public function child()
    {
        return $this->hasMany(Children::class);
    }

    public function grandChild()
    {
        return $this->hasMany(Children::class);
    }
}
