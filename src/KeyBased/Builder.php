<?php

namespace BlackKat\TreeModel\KeyBased;

use BlackKat\TreeModel\Exceptions\DataTypeNotSupportedException;
use BlackKat\TreeModel\Exceptions\EmptyDataException;
use BlackKat\TreeModel\Exceptions\MainKeyMissingException;
use BlackKat\TreeModel\Exceptions\MixedDataTypeException;
use BlackKat\TreeModel\Exceptions\ParentKeyMissingException;

class Builder
{
    /**
     * Check if the given data is usable
     * @param mixed $dataSet Unprocessed data
     * @param string|int $mainKey Primary key
     * @param string|int $parentKey Parent key
     * @return void
     */
    private function dataCheck($dataSet, $mainKey, $parentKey)
    {
        if (!$dataSet) {
            throw new EmptyDataException();
        }

        $arrayCount = 0;
        $objectCount = 0;
        $parentKeyDefects = 0; // count the number of elements without $parentKey property
        $mainKeyDefects = 0;

        foreach ($dataSet as $element) {
            if (is_array($element)) {
                $arrayCount++;

                if (!key_exists($mainKey, $element)) {
                    $mainKeyDefects++;
                }

                if (!key_exists($parentKey, $element)) {
                    $parentKeyDefects++;
                }
            } elseif (is_object($element)) {
                $objectCount++;

                if (!property_exists($element, $mainKey)) {
                    $mainKeyDefects++;
                }

                if (!property_exists($element, $parentKey)) {
                    $parentKeyDefects++;
                }
            } else {
                throw new DataTypeNotSupportedException($element);
            }
        }

        if ($arrayCount && $objectCount) {
            throw new MixedDataTypeException();
        }

        if ($mainKeyDefects) {
            throw new MainKeyMissingException($arrayCount + $objectCount, $mainKeyDefects, $mainKey);
        }

        if ($parentKeyDefects) {
            throw new ParentKeyMissingException($arrayCount + $objectCount, $parentKeyDefects, $parentKey);
        }

        return $arrayCount > 0 ? 'array' : 'object';
    }

    public function build($dataSet, $mainKey, $parentKey)
    {
        $dataType = $this->dataCheck($dataSet, $mainKey, $parentKey);
        
        if ($dataType == 'array') {

        } elseif ($dataType == 'object') {

        }
    }
}
