<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;


use Illuminate\Database\Eloquent\SoftDeletes;

class Partners extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'partners';
    protected $fillable = ['name', 'poland_id'];
    

    public static function boot()
    {
        parent::boot();

        Partners::observe(new UserActionsObserver);
    }


    public function poland()
    {
        return $this->belongsTo(Polands::class);
    }
    
}