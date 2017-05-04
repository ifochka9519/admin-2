<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;


use Illuminate\Database\Eloquent\SoftDeletes;

class Orders extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'orders';
    
    protected $fillable = ['scan_order_path'];
    

    public static function boot()
    {
        parent::boot();

        Orders::observe(new UserActionsObserver);
    }
    
    
    
    
}