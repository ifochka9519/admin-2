<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Corridor extends Model
{
    public function order()
    {
        return $this->belongsTo(Orders::class);
    }
}
