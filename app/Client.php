<?php

namespace App;

use App\Interfaces\Client\ClientInterface;
use App\Interfaces\Exceptions\EmptyCashBagException;
use Illuminate\Database\Eloquent\Model;

class Client extends Model implements ClientInterface
{
    /**
     * User pays with card
     *
     * @param CreditCard $card
     */
    public function setCard(CreditCard $card): void
    {

    }

    /**
     * Client pays with cash
     *
     * @param CashBag $cash
     *
     * @throws EmptyCashBagException
     */
    public function setCashBag(CashBag $cash): void
    {

    }

    /**
     * Client shows up in from of the machine
     *
     * @param VendingMachine $machine
     *
     * @return void
     */
    public function useMachine(VendingMachine $machine): void
    {
        //machine gets locked for other clients
        $machine->lock();
    }

    /**
     * Client leaves the machine they are sitting at
     *
     * @return void
     */
    public function leaveMachine(): void
    {
        //machine is unlocked for other clients
        VendingMachine::first()->update([
            'status' => 'unlocked'
        ]);
    }

    /**
     * Client checks the machine menu
     *
     * @return array The list of ProductInterface the machine has
     */
    public function checkAvailableProducts(): array
    {
        return Product::where('quantity', '!=', '0')->get()->toArray();
    }

    /**
     * Place order
     *
     * @param Product $product
     * @param int $quantity
     *
     * @return Order
     * @throws \App\Interfaces\Exceptions\InvalidSelectionException
     */
    public function placeOrder(Product $product, int $quantity): Order
    {
        $pid = $product->getId();

        $order = [
            'product_id' => $pid,
            'quantity' => $quantity
        ];

        if (!(new VendingMachine)->selectProduct($pid)) {
            $order['status'] = 'failed';
        }

        return Order::create($order);
    }

    /**
     * Cancel order
     *
     * @param Order $order
     *
     * @return void
     * @throws CannotCancelOrderException
     */
    public function cancelOrder(Order $order): void
    {
        $order->update([
            'status' => 'cancelled',
        ]);
    }

    /**
     * Pay order
     *
     * @return Receipt
     * @throws PaymentException
     */
    public function pay(): Receipt
    {

    }
}
