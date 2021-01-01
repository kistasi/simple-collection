<?php

namespace SimpleCollection\Traits;

trait OnlyContainsArrays
{
    public function onlyContainsArrays()
    {
        $collection = $this->collection;

        return empty(array_filter($collection, function ($item) {
            return !is_array($item);
        }));
    }
}
