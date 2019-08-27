<?php

namespace App;

use App\Interfaces\VendingMachine\Payments\ReceiptInterface;
use Illuminate\Database\Eloquent\Model;

class Receipt extends Model implements ReceiptInterface
{
    /**
     * Get receipt total
     *
     * @return int
     */
    public function getTotal(): int
    {

    }

    /**
     * Get products on receipt
     *
     * @return array
     */
    public function getProducts(): array
    {

    }
}
