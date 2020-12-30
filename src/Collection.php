<?php

namespace SimpleCollection;

class Collection
{
    private $collection;

    public function __construct(array $array)
    {
        $this->collection = $array;
    }

    public function append($value)
    {
        $collection = $this->collection;

        $collection[] = $value;

        $this->collection = $collection;

        return $this->collection;
    }

    public function toArray()
    {
        return $this->collection;
    }
}
