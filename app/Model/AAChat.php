<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AAChat extends Model
{
    public function admin()
    {
        return $this->belongsTo(Credential::class);
    }
}
