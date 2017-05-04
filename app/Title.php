<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;


use Illuminate\Database\Eloquent\SoftDeletes;

class Title extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'title';
    
    protected $fillable = [
          'text',
          'size'
    ];
    

    public static function boot()
    {
        parent::boot();

        Title::observe(new UserActionsObserver);
    }
    
    
    
    
}