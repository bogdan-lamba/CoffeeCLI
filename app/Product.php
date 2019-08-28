<?php

namespace App;

use App\Interfaces\VendingMachine\ProductInterface;
use Illuminate\Database\Eloquent\Model;

class Product extends Model implements ProductInterface
{
    /**
     * Get product ID
     *
     * @return int
     */
    public function getId() :int
    {
        return $this->id;
    }

    /**
     * Check if product can be ordered
     *
     * @return bool
     */
    public function isAvailable(): bool
    {
        /*return static::findOrFail();
        if (Product::find($this->id) == null)
            return false;*/

        return Product::where('id', $this->id)->where('quantity', '!=', '0')->exists();
    }

    public function price()
    {
        return $this->hasOne(Price::class);
    }
}
