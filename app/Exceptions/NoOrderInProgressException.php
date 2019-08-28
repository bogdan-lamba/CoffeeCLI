<?php


namespace App\Interfaces\Exceptions;

use Exception;

/**
 * Exception for scenarios when an order is requested when there is none
 */
class NoOrderInProgressException extends Exception {
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    public function __toString()
    {
        return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
    }
}
