<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;


use Illuminate\Database\Eloquent\SoftDeletes;

class Cities extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'cities';

    protected $fillable = ['name', 'districts_id'];
    

    public static function boot()
    {
        parent::boot();

        Cities::observe(new UserActionsObserver);
    }


    public function district()
    {
        return $this->belongsTo(Districts::class);
    }

    public function addresses()
    {
        return $this->hasMany(Addresses::class);
    }
    
}