<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    public function members()
    {
        return $this->hasMany(Member::class);
    }

    public function businessGroup()
    {
        return $this->belongsTo(Businessgroup::class);
    }

    public function churchGroup()
    {
        return $this->belongsTo(Churchgroup::class);
    }
}
