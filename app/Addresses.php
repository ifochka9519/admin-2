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
    
    protected $fillable = ['name'];
    

    public static function boot()
    {
        parent::boot();

        Addresses::observe(new UserActionsObserver);
    }
    
    
    
    
}