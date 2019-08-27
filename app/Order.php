<?php

namespace App;

use App\Interfaces\VendingMachine\OrderInterface;
use Illuminate\Database\Eloquent\Model;

class Order extends Model implements OrderInterface
{
    /**
     * Get order product
     *
     * @return Product
     */
    public function getProduct(): Product
    {

    }

    /**
     * Check if order is ready
     *
     * @return bool
     */
    public function isReady(): bool
    {

    }
}
