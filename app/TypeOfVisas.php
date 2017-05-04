<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;


use Illuminate\Database\Eloquent\SoftDeletes;

class TypeOfVisas extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'typeofvisas';

    protected $fillable = ['name'];
    

    public static function boot()
    {
        parent::boot();

        TypeOfVisas::observe(new UserActionsObserver);
    }


    public function orders()
    {
        return $this->hasMany(Orders::class);
    }
    
}