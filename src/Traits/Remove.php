<?php

namespace SimpleCollection\Traits;

trait Remove
{
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
}
