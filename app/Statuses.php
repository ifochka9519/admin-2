<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;


use Illuminate\Database\Eloquent\SoftDeletes;

class Statuses extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'statuses';

    protected $fillable = ['name'];
    

    public static function boot()
    {
        parent::boot();

        Statuses::observe(new UserActionsObserver);
    }

    public function orders()
    {
        $this->hasMany(Orders::class);
    }

    public function histories()
    {
        return $this->hasMany(History::class);
    }
}