<?php

namespace App\Console\Commands;

use App\Bill;
use App\Client;
use App\Interfaces\Exceptions\InvalidSelectionException;
use App\Product;
use App\Receipt;
use App\VendingMachine;
use Illuminate\Console\Command;

class Order extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'order {product} {quantity}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Select a product';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     * @throws InvalidSelectionException
     */
    public function handle()
    {
        //TODO: sugar and milk options with value
        $product = Product::find($this->argument('product'));

        $machine = new VendingMachine();
        $client = new Client();

        $client->useMachine($machine);

        $order = $client->placeOrder($product, $this->argument('quantity'));

        $this->info('Order ' . $order->status);

        if($order->status == 'failed')
            exit();

        $orderCost = $product->price->price * $this->argument('quantity');

        $this->info('Order cost = ' . $orderCost);

        $payMethod = $this->choice('Chose payment method: ', ['1' => 'cash', '2' => 'card']);

        if($payMethod == 'cash') {
            //take payment
            //check if inserted cash value matches order cost
            //insert bills in cash bag
            //give change
            //confirm order
            //give product
            //give receipt
            //finish order->unlock machine for other clients

            $total = 0;

            while ($total < $product->price->price * $this->argument('quantity')) {
                if ($total != 0)
                    $this->info('Needs more money!');

                $bills = Bill::pluck('value', 'id')->toArray();

                $value = $this->choice('Select bill: ', $bills);

                $quantity = $this->ask('Input number of selected bills: ');

                $total += ($value * $quantity);
                $this->info('Total inserted value = ' . $total);

            }

            $change = $total - $orderCost;
            $this->info('Change: ' . $change);

            $receipt = new Receipt($product->name, $this->argument('quantity'), $orderCost);

            $this->info('Your receipt... Total paid: ' . $receipt->getTotal());

            $client->leaveMachine();

        } else {
            //scan card
        }

    }
}
