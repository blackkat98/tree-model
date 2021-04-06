<?php

namespace BlackKat\TreeModel\Exceptions;

use Exception;

class MixedDataTypeException extends Exception
{
    public function __construct()
    {
        $message = "Tree data set must contain only arrays or only objects. Mixed given.";
        parent::__construct($message, 0, null);
    }

    public function __toString()
    {
        return __CLASS__ . ": $this->message";
    }
}
