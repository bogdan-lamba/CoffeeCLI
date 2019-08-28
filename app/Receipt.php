<?php

namespace App;

use App\Interfaces\VendingMachine\Payments\ReceiptInterface;
use Illuminate\Database\Eloquent\Model;

class Receipt extends Model implements ReceiptInterface
{
    private $product;
    private $quantity;
    private $total;

    public function __construct($product, $quantity, $total)
    {
        $this->product = $product;
        $this->quantity = $quantity;
        $this->total = $total;


    }

    /**
     * Get receipt total
     *
     * @return int
     */
    public function getTotal(): int
    {
        return $this->total;
    }

    /**
     * Get products on receipt
     *
     * @return array
     */
    public function getProducts(): array
    {
        return [
            'quantity' => $this->quantity,
            'product' => $this->product
        ];
    }
}
