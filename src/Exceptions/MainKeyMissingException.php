<?php

namespace BlackKat\TreeModel\Exceptions;

use Exception;

class MainKeyMissingException extends Exception
{
    public function __construct(int $total, int $defects, $mainKey)
    {
        $elementWord = $total > 1 ? 'elements' : 'element';
        $haveWord = $defects > 1 ? 'have' : 'has';
        $message = "Of all $total given $elementWord, $defects $haveWord no main key $mainKey";
        parent::__construct($message, 0, null);
    }

    public function __toString()
    {
        return __CLASS__ . ": $this->message";
    }
}
