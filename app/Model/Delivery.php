<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    public function invoice()
    {
        return $this->belongsTo(Custominvoice::class);
    }
}
