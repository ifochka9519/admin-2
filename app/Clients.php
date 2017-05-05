<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;


use Illuminate\Database\Eloquent\SoftDeletes;

class Clients extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'clients';

    protected $fillable = ['name', 'user_id', 'customer_id', 'prepayment', 'payment', 'address_id',
        'scan_passport_path', 'passport', 'data_of_birthday', 'phone', 'email'];
    

    public static function boot()
    {
        parent::boot();

        Clients::observe(new UserActionsObserver);
    }

    public function customer()
    {
        return $this->belongsTo(Customers::class);
    }

    public function order()
    {
        return $this->hasOne(Orders::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function addresses()
    {
        return $this->hasMany(Addresses::class);
    }
}