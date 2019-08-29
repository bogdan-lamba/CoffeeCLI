<?php

namespace Tests\Unit;

use App\Product;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductTest extends TestCase
{
    use RefreshDatabase;
    /**
     * Product is unavailable if out of stock
     *
     * @test
     * @return void
     */
    public function is_not_available_if_out_of_stock()
    {
        $product = Product::create([
            'name' => 'Coffee',
            'quantity' => '0'
        ]);

        $this->assertFalse($product->isAvailable());
    }
}
