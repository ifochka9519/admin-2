<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;


use Illuminate\Database\Eloquent\SoftDeletes;

class Addresses extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'addresses';

    protected $fillable = ['address', 'city_id'];
    

    public static function boot()
    {
        parent::boot();

        Addresses::observe(new UserActionsObserver);
    }

    public function client()
    {
        return $this->hasOne(Clients::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }
    
}