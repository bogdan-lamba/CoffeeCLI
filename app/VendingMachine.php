<?php

namespace App;

use App\Interfaces\Exceptions\InvalidSelectionException;
use App\Interfaces\Exceptions\NoOrderInProgressException;
use App\Interfaces\VendingMachine\VendingMachineInterface;
use Illuminate\Database\Eloquent\Model;

class VendingMachine extends Model implements VendingMachineInterface
{
    protected $fillable = [
        'status'
    ];

    protected $table = 'vending_machine';

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

        try {
            $product = Product::find($productId);
            if($product == null || !$product->isAvailable()) {
                throw new InvalidSelectionException;
            } else {
                return Product::find($productId)->exists();
            }
        } catch (InvalidSelectionException $e) {
            echo  $e;
            return false;
        }
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
        return true;
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
        $order = Order::where('status', 'pending')->first();
        try {
            if ($order == null)
                throw new NoOrderInProgressException;
        } catch (NoOrderInProgressException $e) {
            echo $e;
        }
        return $order;
    }

    public function lock()
    {
        VendingMachine::first()->update([
            'status' => 'locked'
        ]);
    }

    public function unlock()
    {
        VendingMachine::first()->update([
            'status' => 'unlocked'
        ]);
    }
}
