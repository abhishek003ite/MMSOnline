<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    public function from()
    {
        return $this->belongsTo(Member::class);
    }

    public function to()
    {
        return $this->belongsTo(Member::class);
    }
}
