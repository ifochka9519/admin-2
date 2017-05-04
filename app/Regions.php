<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;


use Illuminate\Database\Eloquent\SoftDeletes;

class Regions extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'regions';
    
    protected $fillable = ['name'];
    

    public static function boot()
    {
        parent::boot();

        Regions::observe(new UserActionsObserver);
    }
    
    
    
    
}