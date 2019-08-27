<?php

namespace App\Interfaces\VendingMachine;

use App\Product;

interface OrderInterface {

    /**
     * Get order product
     *
     * @return Product
     */
    public function getProduct(): Product;

    /**
     * Check if order is ready
     *
     * @return bool
     */
    public function isReady(): bool;
}
