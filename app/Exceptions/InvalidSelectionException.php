<?php


namespace App\Interfaces\Exceptions;

use Exception;
use Throwable;

/**
 * Encapsulate exceptions when client selection is invalid
 */
class InvalidSelectionException extends Exception {
    public function __construct($message = "The selected product is not available", $code = 0, Throwable $previous =
    null)
    {
        parent::__construct($message, $code, $previous);
    }

    public function __toString()
    {
        return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
    }

}
