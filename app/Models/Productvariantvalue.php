<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Productvariantvalue extends Model
{
    protected $fillable = [
        'variant_id',
        'value_id'
    ];

    public function productvariant()
    {
        return $this->belongsTo(Productvariant::class);
    }

    public function attributevalues()
    {
        return $this->belongsTo(Productattributevalue::class);
    }
}
