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

    public function has(string $value): bool
    {
        return array_key_exists($value, $this->collection);
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

    public function first()
    {
        return $this->collection[0];
    }

    public function last()
    {
        return end($this->collection);
    }

    public function getByIndex(int $index)
    {
        return $this->collection[$index];
    }

    public function count()
    {
        return count($this->collection);
    }

    public function isEmpty(): bool
    {
        return empty($this->collection);
    }

    public function isNotEmpty(): bool
    {
        return !empty($this->collection);
    }

    public function toJson(): string
    {
        return json_encode($this->collection);
    }

    public function toArray(): array
    {
        return $this->collection;
    }
}
