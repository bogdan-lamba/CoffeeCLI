<?php


namespace App\Interfaces\Exceptions;

use Exception;
use Throwable;

/**
 * Exception describing the inability to work with an empty wallet
 */
class EmptyCashBagException extends Exception {
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
