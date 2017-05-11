<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;


use Illuminate\Database\Eloquent\SoftDeletes;

class Orders extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'orders';

    protected $fillable = ['status_id','user_id', 'client_id', 'type_visa_id', 'scan_order_path', 'prepayment', 'payment'];
    

    public static function boot()
    {
        parent::boot();

        Orders::observe(new UserActionsObserver);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function client()
    {
        return $this->belongsTo(Clients::class);
    }

    public function status()
    {
        return $this->belongsTo(Statuses::class);
    }

    public function typeOfVisa()
    {
        return $this->belongsTo(TypeOfVisas::class);
    }

    public function histories()
    {
        return $this->hasMany(History::class);
    }
    
    
}