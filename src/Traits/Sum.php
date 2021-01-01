<?php

namespace SimpleCollection\Traits;

trait Sum
{
    public function sum()
    {
        return array_sum($this->collection);
    }
}
