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

    public function get($value)
    {
        return $this->collection[$value];
    }

    public function append($value): array
    {
        $collection = $this->collection;

        $collection[] = $value;

        $this->collection = $collection;

        return $this->collection;
    }

    public function appendMultiple(array $values): array
    {
        $collection = $this->collection;

        $this->collection = array_merge($collection, $values);

        return $this->collection;
    }

    public function prepend($value): array
    {
        $collection = $this->collection;

        array_unshift($collection, $value);

        $this->collection = $collection;

        return $this->collection;
    }

    public function prependMultiple(array $values)
    {
        $collection = $this->collection;

        $values = array_reverse($values);

        foreach ($values as $value) {
            array_unshift($collection, $value);
        }

        $this->collection = $collection;

        return $this->collection;
    }

    public function remove(string $value): array
    {
        $collection = $this->collection;

        unset($collection[array_search($value, $collection)]);

        $this->collection = $collection;

        return $this->collection;
    }

    public function removeMultiple(array $values): array
    {
        $collection = $this->collection;

        foreach ($values as $value) {
            unset($collection[array_search($value, $collection)]);
        }

        $this->collection = array_values($collection);

        return $this->collection;
    }

    public function toArray(): array
    {
        return $this->collection;
    }
}
