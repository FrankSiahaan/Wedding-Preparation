<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = [
        'user_id'
    ];

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function cartitems()
    {
        return $this->hasMany(Cartitem::class);
    }
}
