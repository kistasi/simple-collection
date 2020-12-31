<?php

namespace SimpleCollection\Traits;

trait Get
{
    public function get($values)
    {
        return $this->collection[$values];
    }
}
