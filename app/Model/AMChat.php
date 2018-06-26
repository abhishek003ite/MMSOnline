<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AMChat extends Model
{
    public function member()
    {
        return $this->belongsTo(Member::class);
    }

    public function admin()
    {
        return $this->belongsTo(Credential::class);
    }
}
