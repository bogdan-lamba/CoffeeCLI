<?php

namespace App\Interfaces\Client;

interface CreditCardInterface {

    /**
     * Get card details
     *
     * @return string
     */
    public function details(): string;
}
