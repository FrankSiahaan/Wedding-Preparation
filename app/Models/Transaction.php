<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'user_id',
        'address_id',
        'total',
        'payment_status',
        'oder_status',
        'order_id',
        'snap_token'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    public function orderitems()
    {
        return $this->hasMany(Orderitems::class);
    }
}
