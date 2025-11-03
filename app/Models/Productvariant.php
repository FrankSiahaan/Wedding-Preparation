<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Productvariant extends Model
{
    protected $fillable = [
        'product_id',
        'sku',
        'price',
        'stock',
        'imagevariant'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function orderitems()
    {
        return $this->hasMany(Orderitems::class, 'variant_id');
    }

    public function cartitems()
    {
        return $this->hasMany(Cartitem::class, 'variant_id');
    }

    public function variantvalues()
    {
        return $this->hasMany(Productvariantvalue::class, 'variant_id');
    }

    // Helper untuk mendapatkan attribute values
    public function attributeValues()
    {
        return $this->belongsToMany(
            Productattributevalue::class,
            'productvariantvalues',
            'variant_id',
            'value_id'
        );
    }
}
