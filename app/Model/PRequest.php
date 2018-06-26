<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PRequest extends Model
{
    public function member()
    {
        return $this->belongsTo(Member::class);
    }
}
