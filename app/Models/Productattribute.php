<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Productattribute extends Model
{
    protected $fillable = [
        'product_id',
        'name'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function values()
    {
        return $this->hasMany(Productattributevalue::class, 'attribute_id');
    }
}
