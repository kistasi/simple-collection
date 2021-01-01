<?php

namespace SimpleCollection\Traits;

trait Max
{
    public function max()
    {
        return max($this->collection);
    }
}
