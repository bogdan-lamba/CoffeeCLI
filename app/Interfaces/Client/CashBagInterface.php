<?php

namespace App\Interfaces\Client;

interface CashBagInterface {

    /**
     * Get wallet cash contents
     *
     * @return arrat
     */
    public function getContents(): array;
}
