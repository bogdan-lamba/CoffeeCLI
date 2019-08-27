<?php

namespace App\Interfaces\Payments;

interface BillInterface {

    /**
     * Get banknote value
     *
     * @return int
     */
    public function getValue(): int;
}
