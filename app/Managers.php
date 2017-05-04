<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;


use Illuminate\Database\Eloquent\SoftDeletes;

class Managers extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'managers';

    protected $fillable = ['name', 'user_id'];
    

    public static function boot()
    {
        parent::boot();

        Managers::observe(new UserActionsObserver);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function clients()
    {
        return $this->hasMany(Clients::class);
    }
    
    
}