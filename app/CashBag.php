<?php

namespace App;

use App\Interfaces\Client\CashBagInterface;
use Illuminate\Database\Eloquent\Model;

class CashBag extends Model implements CashBagInterface
{
    protected $table = 'cash_bag';

    /**
     * Get wallet cash contents
     *
     * @return array
     */
    public function getContents(): array
    {
        return  CashBag::join('bills', 'cash_bag.bill_id', '=', 'bills.id')
            -> pluck('bills.value', 'quantity')
            ->toArray();
    }
}
