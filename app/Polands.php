<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;


use Illuminate\Database\Eloquent\SoftDeletes;

class Polands extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'polands';

    protected $fillable = ['name', 'address', 'user_id'];
    

    public static function boot()
    {
        parent::boot();

        Polands::observe(new UserActionsObserver);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orders()
    {
        return $this->hasMany(Orders::class);
    }

    public function partners()
    {
        return $this->hasMany(Partners::class);
    }
    
}