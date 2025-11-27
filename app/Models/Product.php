<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'description',
        'price',
        'stock',
        'image',
        'category_id',
        'vendor_id',
        'is_active',
        'total_review',
        'avg_rating'
    ];

    public function category()
    {
        return $this->belongsTo(category::class);
    }

    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }

    public function variants()
    {
        return $this->hasMany(Productvariant::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function orderitems()
    {
        return $this->hasMany(Orderitems::class);
    }

    public function cartitems()
    {
        return $this->hasMany(Cartitem::class);
    }

    public function attributes()
    {
        return $this->hasMany(Productattribute::class);
    }

    public function images()
    {
        return $this->hasMany(Productimage::class);
    }

    public function productimages()
    {
        return $this->hasMany(Productimage::class);
    }
}
