<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class buddy extends Model
{
    public function member()
    {
        return $this->belongsTo(Member::class);
    }

    public function friend()
    {
        return $this->belongsTo(Member::class);
    }
}
