<?php

namespace SimpleCollection\Traits;

trait Contains
{
    public function contains($value)
    {
        if ($this->isAssoc()) {
           throw new \InvalidArgumentException('Contains method is not working with associative arrays.');
        }

        return in_array($value, $this->collection);
    }
}
