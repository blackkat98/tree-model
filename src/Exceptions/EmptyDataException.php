<?php

namespace BlackKat\TreeModel\Exceptions;

use Exception;

class EmptyDataException extends Exception
{
    public function __construct()
    {
        $message = "No data was given to the builder";
        parent::__construct($message, 0, null);
    }

    public function __toString()
    {
        return __CLASS__ . ": $this->message";
    }
}
