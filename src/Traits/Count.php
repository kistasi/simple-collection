<?php

namespace SimpleCollection\Traits;

trait Count
{
    public function count()
    {
        return count($this->collection);
    }
}
