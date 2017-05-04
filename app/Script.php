<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;


use Illuminate\Database\Eloquent\SoftDeletes;

class Script extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'script';
    
    protected $fillable = [
          'yandex',
          'google'
    ];
    

    public static function boot()
    {
        parent::boot();

        Script::observe(new UserActionsObserver);
    }
    
    
    
    
}