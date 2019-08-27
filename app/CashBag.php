<?php

namespace App;

use App\Interfaces\Client\CashBagInterface;
use Illuminate\Database\Eloquent\Model;

class CashBag extends Model implements CashBagInterface
{
    /**
     * Get wallet cash contents
     *
     * @return arrat
     */
    public function getContents(): array
    {

    }
}
