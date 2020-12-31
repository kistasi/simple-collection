<?php

namespace SimpleCollection\Traits;

trait IsEmpty
{
    public function isEmpty(): bool
    {
        return empty($this->collection);
    }
}
