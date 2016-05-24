<?php

function array_dot_flatten(array $data): array
{
    $rItIt = new RecursiveIteratorIterator(new RecursiveArrayIterator($data));
    $result = [];
    foreach ($rItIt as $leafValue) {
        $keys = [];
        foreach (range(0, $rItIt->getDepth()) as $depth) {
            $keys[] = $rItIt->getSubIterator($depth)->key();
        }
        
        $result[join('.', $keys)] = $leafValue;
    }
    
    return $result;
}
