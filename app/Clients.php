<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;


use Illuminate\Database\Eloquent\SoftDeletes;

class Clients extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'clients';
    
    protected $fillable = ['name'];
    

    public static function boot()
    {
        parent::boot();

        Clients::observe(new UserActionsObserver);
    }
    
    
    
    
}