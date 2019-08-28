<?php

namespace App;

use App\Interfaces\Exceptions\NoOrderInProgressException;
use App\Interfaces\VendingMachine\VendingMachineInterface;
use Illuminate\Database\Eloquent\Model;

class VendingMachine extends Model implements VendingMachineInterface
{
    /**
     * Get products inventory
     *
     * @return array
     */
    public function getInventory(): array
    {
        return Product::where('quantity', '!=', '0')->get()->toArray();
    }

    /**
     * Select product from menu
     *
     * @param int Product ID
     *
     * @return bool
     * @throws InvalidSelectionException
     */
    public function selectProduct(int $productId): bool
    {

    }

    /**
     * Adjust sugar level
     *
     * @param int How much sugar
     * @return bool
     */
    public function setSugarLevel(int $sugarLevel): bool
    {

    }

    /**
     * Adjust milk level
     *
     * @param int How much milk
     * @return bool
     */
    public function setMilkLevel(int $milkLevel): bool
    {

    }

    /**
     * Confirm product selection
     *
     * @return bool
     */
    public function confirmSelection(): bool
    {

    }

    /**
     * Scan card for payment
     *
     * @return bool Successful or not
     */
    public function scanCard(): bool
    {

    }

    /**
     * Take 1 bill for cash payment
     *
     * @param Bill
     *
     * @return bool Successful or not
     */
    public function takeBill(Bill $bill): bool
    {

    }

    /**
     * Get current order
     *
     * @return Order
     * @throws NoOrderInProgressException
     */
    public function getCurrentOrder(): Order
    {

    }
}
