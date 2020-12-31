<?php

namespace SimpleCollection\Traits;

trait Prepend
{
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
}
