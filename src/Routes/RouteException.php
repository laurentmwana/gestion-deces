<?php


namespace App\Routes;

use Exception;
use Throwable;

class RouteException extends Exception {

    /**
     * RouteException Constructor 
     *
     * @param string $message
     * @param integer $code
     * @param Throwable|null $previous
     */
    public function __construct(string $message = "", int $code = 0, ?Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

}