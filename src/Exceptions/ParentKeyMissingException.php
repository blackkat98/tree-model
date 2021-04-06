<?php

namespace BlackKat\TreeModel\Exceptions;

use Exception;

class ParentKeyMissingException extends Exception
{
    public function __construct(int $total, int $defects, $parentKey)
    {
        $elementWord = $total > 1 ? 'elements' : 'element';
        $haveWord = $defects > 1 ? 'have' : 'has';
        $message = "Of all $total given $elementWord, $defects $haveWord no parent key $parentKey";
        parent::__construct($message, 0, null);
    }

    public function __toString()
    {
        return __CLASS__ . ": $this->message";
    }
}
