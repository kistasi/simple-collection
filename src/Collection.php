<?php

namespace SimpleCollection;

require './vendor/autoload.php';

class Collection
{
    private $collection;

    public function __construct(?array $array = [])
    {
        $this->collection = $array;
    }

    public function get($values)
    {
        return $this->collection[$values];
    }

    public function only(array $values)
    {
        $collection = $this->collection;

        $result = [];
        foreach ($values as $value) {
            $result[$value] = $collection[$value];
        }

        return $result;
    }

    public function append($values): self
    {
        if (!is_array($values)) {
            $values = [ $values ];
        }

        $collection = $this->collection;

        foreach ($values as $value) {
            $collection[] = $value;
        }

        $this->collection = $collection;

        return $this;
    }


    public function prepend($values): self
    {
        if (!is_array($values)) {
            $values = [ $values ];
        }

        $collection = $this->collection;

        $values = array_reverse($values);

        foreach ($values as $value) {
            array_unshift($collection, $value);
        }

        $this->collection = $collection;

        return $this;
    }

    public function remove($values): self
    {
        if (!is_array($values)) {
            $values = [ $values ];
        }

        $collection = $this->collection;

        foreach ($values as $value) {
            unset($collection[array_search($value, $collection)]);
        }

        $this->collection = array_values($collection);

        return $this;
    }

    public function toArray(): array
    {
        return $this->collection;
    }
}
