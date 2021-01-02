<?php

namespace SimpleCollection\Traits;

trait Get
{
    public function get(string $value)
    {
        if ($this->has($value)) {
            return $this->collection[$value];
        }

        return null;
    }
}
