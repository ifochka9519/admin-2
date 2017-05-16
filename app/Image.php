<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    public function client()
    {
        return $this->belongsTo(Clients::class);
    }
}
