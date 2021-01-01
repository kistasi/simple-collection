<?php

namespace SimpleCollection\Traits;

trait Min
{
    public function min()
    {
        return min($this->collection);
    }
}
