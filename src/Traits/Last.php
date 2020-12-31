<?php

namespace SimpleCollection\Traits;

trait Last
{
    public function last()
    {
        return end($this->collection);
    }
}
