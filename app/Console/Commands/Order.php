<?php

namespace App\Console\Commands;

use App\Bill;
use App\Client;
use App\Interfaces\Exceptions\InvalidSelectionException;
use App\Product;
use App\Receipt;
use App\VendingMachine;
use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\ModelNotFoundException;

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
        try {
            $product = Product::findOrFail($this->argument('product'));
        } catch (ModelNotFoundException $e) {
            $this->info($e->getMessage());
            return;
        }

        $machine = new VendingMachine();
        $client = new Client();

        if (VendingMachine::first()->status == 'locked')
        {
            $this->info('Vending machine is currently in use');
            $this->info('For testing you can run order:clear command to free machine');
            return;
        }

        $client->useMachine($machine);

        $order = $client->placeOrder($product, $this->argument('quantity'));

        $this->info('Order ' . $order->status);

        if ($order->status == 'failed') {
            $client->leaveMachine();
            exit();
        }

        $orderCost = $product->price->price * $this->argument('quantity');

        $this->info('Order cost = ' . $orderCost);

        $payMethod = $this->choice('Chose payment method: ', ['1' => 'cash', '2' => 'card']);

        if($payMethod == 'cash') {
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

        } else {
            $this->info('Scanning card ...');
            if ($machine->scanCard()) {
                $this->info('Charged: ' . $orderCost);
            }
        }

        $receipt = new Receipt($product->name, $this->argument('quantity'), $orderCost);

        $this->info('Your receipt... Total paid: ' . $receipt->getTotal());

        //confirm order
        //substract product quantity
        $product->update([
            'quantity' => $product->quantity - $this->argument('quantity')
        ]);
        //add paid bills to cash bag
        //substract bills used to give change

        $client->leaveMachine();

    }
}
