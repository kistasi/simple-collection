<?php

namespace SimpleCollection\Traits;

trait GetByIndex
{
    public function getByIndex(int $index)
    {
        return $this->collection[$index];
    }
}
