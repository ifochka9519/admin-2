<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;


use Illuminate\Database\Eloquent\SoftDeletes;

class NewChanges extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'newchanges';
    
    protected $fillable = ['name'];
    

    public static function boot()
    {
        parent::boot();

        NewChanges::observe(new UserActionsObserver);
    }
    
    
    
    
}