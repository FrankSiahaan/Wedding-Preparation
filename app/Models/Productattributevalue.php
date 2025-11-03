<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Productattributevalue extends Model
{
    protected $fillable = [
        'attribute_id',
        'value'
    ];

    public function attribute()
    {
        return $this->belongsTo(Productattribute::class);
    }

    public function variantvalues()
    {
        return $this->hasMany(Productvariantvalue::class);
    }

    public function variants()
    {
        return $this->belongsToMany(
            ProductVariant::class,
            'productvariantvalues',
            'value_id',
            'variant_id'
        );
    }
}
