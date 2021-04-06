<?php

include('src/KeyBased/Builder.php');
include('src/Exceptions/DataTypeNotSupportedException.php');
include('src/Exceptions/EmptyDataException.php');
include('src/Exceptions/MainKeyMissingException.php');
include('src/Exceptions/MixedDataTypeException.php');
include('src/Exceptions/ParentKeyMissingException.php');

$builder = new BlackKat\TreeModel\KeyBased\Builder();
$dataSet = [
    [
        'id' => 0,
        'value' => 0,
        'parent_id' => 1
    ],
    [
        'id' => 1,
        'value' => 1,
        'parent_id' => null
    ],
];
$mainKey = 'id';
$parentKey = 'parent_id';
$builder->build($dataSet, $mainKey, $parentKey);
