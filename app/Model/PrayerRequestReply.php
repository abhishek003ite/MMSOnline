<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PrayerRequestReply extends Model
{
    public function member()
    {
        return $this->belongsTo(Member::class);
    }

    public function admin()
    {
        return $this->belongsTo(Credential::class);
    }

    public function prayerRequest()
    {
        return $this->belongsTo(PRequest::class);
    }
}
