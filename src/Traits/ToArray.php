<?php

namespace SimpleCollection\Traits;

trait ToArray
{
    public function toArray(): array
    {
        return $this->collection;
    }
}
