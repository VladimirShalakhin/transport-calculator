<?php

namespace TransportCalc\calculator;

use Exception;
use Throwable;

class InvalidTransportInstanceException extends Exception
{
    public function __construct($message, $code = 0, Throwable $previous = null) {
        parent::__construct($message, $code, $previous);
    }
}