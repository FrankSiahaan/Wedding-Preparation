<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orderitems extends Model
{
    protected $fillable = [
        'transaction_id',
        'product_id',
        'variant_id',
        'vendor_id',
        'quantity',
        'price'
    ];

    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function productvariant()
    {
        return $this->belongsTo(Productvariant::class, 'variant_id');
    }

    public function variant()
    {
        return $this->belongsTo(Productvariant::class);
    }

    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }
}
