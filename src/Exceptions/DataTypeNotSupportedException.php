<?php

namespace BlackKat\TreeModel\Exception;

use Exception;
use BlackKat\TreeModel\KeyBase\Builder;

class DataTypeNotSupportedException extends Exception
{
    protected $oddVariable;

    public function __construct($oddVariable, $funcName, $className)
    {
        $oddType = gettype($oddVariable);
        $message = "Function $funcName of class $className requires " ;

        parent::__construct($message, $code, $previous);
    }

    public function __toString()
    {
        
    }
}
