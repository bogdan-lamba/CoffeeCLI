<?php

namespace App;

use App\Interfaces\Payments\BillInterface;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model implements BillInterface
{
    public function getRouteKeyName()
    {
        return 'value';
    }

    /**
     * Get banknote value
     *
     * @return int
     */
    public function getValue(): int
    {
        return $this->value;
    }
}
