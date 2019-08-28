<?php


namespace App\Interfaces\Exceptions;

use Exception;

/**
 * Exception for scenarios when an order is requested when there is none
 */
class NoOrderInProgressException extends Exception {

}
