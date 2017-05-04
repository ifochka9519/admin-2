<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;


use Illuminate\Database\Eloquent\SoftDeletes;

class Job extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'job';
    
    protected $fillable = [
          'title',
          'money',
          'image',
          'description'
    ];
    

    public static function boot()
    {
        parent::boot();

        Job::observe(new UserActionsObserver);
    }
    
    
    
    
}