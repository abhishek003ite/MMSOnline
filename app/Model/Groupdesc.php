<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Groupdesc extends Model
{
    public function member()
    {
        return $this->belongsTo(Member::class);
    }
}
