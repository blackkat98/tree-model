<?php

namespace BlackKat\TreeModel\KeyBase;

class Builder
{
    public function __construct()
    {
         
    }

    private function dataCheck($dataSet)
    {
        $arrayCount = 0;
        $objectcount = 0;

        foreach ($dataSet as $element) {
            if (is_array($element)) {
                $arrayCount++;
            } elseif (is_object($element)) {
                $objectcount++;
            } else {
                
            }
        }
    }


}
