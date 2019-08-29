<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    protected $fillable = [
        'product_id',
        'price'
    ];

    public function products()
    {
        return $this->belongsTo(Product::class);
    }
}
