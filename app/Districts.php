<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;


use Illuminate\Database\Eloquent\SoftDeletes;

class Districts extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'districts';

    protected $fillable = ['name', 'regions_id'];
    

    public static function boot()
    {
        parent::boot();

        Districts::observe(new UserActionsObserver);
    }

    public function region()
    {
        return $this->belongsTo(Regions::class);
    }

    public function cities()
    {
        return $this->hasMany(Cities::class);
    }
    
}