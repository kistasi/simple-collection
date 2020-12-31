<?php

namespace SimpleCollection\Traits;

trait IsNotEmpty
{
    public function isNotEmpty(): bool
    {
        return !empty($this->collection);
    }
}
