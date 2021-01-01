<?php

namespace SimpleCollection\Traits;

trait Avg
{
    public function avg()
    {
        return array_sum($this->collection) / count($this->collection);
    }
}
