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

    }

    /**
     * Check if product can be ordered
     *
     * @return bool
     */
    public function isAvailable(): bool
    {

    }
}
