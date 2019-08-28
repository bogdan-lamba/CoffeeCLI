<?php

namespace App\Http\Controllers;

use App\CashBag;
use App\CreditCard;
use App\Interfaces\Client\ClientInterface;
use App\Interfaces\Exceptions\EmptyCashBagException;
use App\Order;
use App\Product;
use App\Receipt;
use App\VendingMachine;
use Illuminate\Http\Request;

class ClientController extends Controller implements ClientInterface
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
        try {
            //cash payment
        } catch(EmptyCashBagException $e) {
            throw new EmptyCashBagException('cash payment error');
        }
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

    }

    /**
     * Client leaves the machine they are sitting at
     *
     * @return void
     */
    public function leaveMachine(): void
    {

    }

    /**
     * Client checks the machine menu
     *
     * @return array The list of ProductInterface the machine has
     */
    public function checkAvailableProducts(): array
    {

    }

    /**
     * Place order
     *
     * @param Product $product
     * @param int $quantity
     *
     * @return Order
     */
    public function placeOrder(Product $product, int $quantity): Order
    {

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
