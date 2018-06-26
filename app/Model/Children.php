<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Children extends Model
{
    public function parent()
    {
        return $this->belongsTo(Member::class);
    }
}
