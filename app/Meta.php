<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;


use Illuminate\Database\Eloquent\SoftDeletes;

class Meta extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'meta';
    
    protected $fillable = [
          'text_tag',
          'type_tag'
    ];
    

    public static function boot()
    {
        parent::boot();

        Meta::observe(new UserActionsObserver);
    }
    
    
    
    
}