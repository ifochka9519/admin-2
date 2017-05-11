<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    public function order()
    {

        return $this->belongsTo(Orders::class);
    }
    public function status()
    {

        return $this->belongsTo(Statuses::class);
    }
}
