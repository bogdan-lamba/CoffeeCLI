<?php

namespace Tests\Feature;

use App\Client;
use App\Price;
use App\Product;
use App\VendingMachine;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class OrderCommandTest extends TestCase
{
    use RefreshDatabase;
    /**
     * Machine is locked while client is using it
     *
     * @test
     *
     * @return void
     */
    public function is_locked_if_in_use()
    {
        Product::create([
            'name' => 'Coffee',
            'quantity' => '13'
        ]);

        Price::create([
            'product_id' => '1',
            'price' => '200'
        ]);

        $machine = VendingMachine::create([
            'status' => 'unlocked'
        ]);

        (new Client)->useMachine($machine);

        $this->assertTrue($machine->status == 'locked');

        /*$this->artisan('order 1 2')
            ->expectsQuestion('Chose payment method:', '2');

        $this->artisan('order 1 1')
            ->expectsOutput('Vending machine is currently in use');*/
    }
}
