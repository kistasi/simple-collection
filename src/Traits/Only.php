<?php

namespace SimpleCollection\Traits;

trait Only
{
    public function only(array $values)
    {
        $collection = $this->collection;

        $result = [];
        foreach ($values as $value) {
            $result[$value] = $collection[$value];
        }

        return $result;
    }
}