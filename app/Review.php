<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;


use Illuminate\Database\Eloquent\SoftDeletes;

class Review extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'review';
    
    protected $fillable = [
          'author',
          'text',
          'photo',
          'alt_photo'
    ];
    

    public static function boot()
    {
        parent::boot();

        Review::observe(new UserActionsObserver);
    }
    
    
    
    
}