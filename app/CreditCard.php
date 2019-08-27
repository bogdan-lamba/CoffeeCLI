<?php

namespace App;

use App\Interfaces\Client\CreditCardInterface;
use Illuminate\Database\Eloquent\Model;

class CreditCard extends Model implements CreditCardInterface
{
    /**
     * Get card details
     *
     * @return string
     */
    public function details(): string
    {

    }
}
