<?php

namespace App\Interfaces\Client;

use App\CashBag;
use App\CreditCard;
use App\Order;
use App\Product;
use App\Receipt;
use App\VendingMachine;


interface ClientInterface {

    /**
     * User pays with card
     *
     * @param CreditCard $card
     */
    public function setCard(CreditCard $card): void;

    /**
     * Client pays with cash
     *
     * @param CashBag $cash
     */
    public function setCashBag(CashBag $cash): void;

    /**
     * Client shows up in from of the machine
     *
     * @param VendingMachine $machine
     *
     * @return void
     */
    public function useMachine(VendingMachine $machine): void;

    /**
     * Client leaves the machine they are sitting at
     *
     * @return void
     */
    public function leaveMachine(): void;

    /**
     * Client checks the machine menu
     *
     * @return array The list of ProductInterface the machine has
     */
    public function checkAvailableProducts(): array;

    /**
     * Place order
     *
     * @param Product $product
     * @param int $quantity
     *
     * @return Order
     */
    public function placeOrder(Product $product, int $quantity): Order;

    /**
     * Cancel order
     *
     * @param Order $order
     * @return void
     */
    public function cancelOrder(Order $order): void;

    /**
     * Pay order
     *
     * @return Receipt
     * @throws PaymentException
     */
    public function pay(): Receipt;
}
