<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Eventattendance extends Model
{
    public function member()
    {
        return $this->belongsTo(Member::class);
    }

    public function event()
    {
        return $this->belongsTo(Reminders::class);
    }
}
