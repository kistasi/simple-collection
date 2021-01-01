<?php

namespace SimpleCollection\Traits;

trait Contains
{
    public function contains($value)
    {
        return in_array($value, $this->collection);
    }
}
