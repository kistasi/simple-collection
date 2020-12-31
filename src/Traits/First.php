<?php

namespace SimpleCollection\Traits;

trait First
{
    public function first()
    {
        return $this->collection[0];
    }
}