<?php

namespace BlackKat\TreeModel\Exceptions;

use Exception;

class DataTypeNotSupportedException extends Exception
{
    public function __construct($oddVariable)
    {
        $oddType = gettype($oddVariable);
        $message = "Tree data set must contain only arrays or objects. $oddType given.";
        parent::__construct($message, 0, null);
    }

    public function __toString()
    {
        return __CLASS__ . ": $this->message";
    }
}
