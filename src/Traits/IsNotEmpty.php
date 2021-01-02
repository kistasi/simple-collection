<?php

namespace SimpleCollection\Traits;

trait IsNotEmpty
{
    public function isNotEmpty(): bool
    {
        return !$this->isEmpty();
    }
}
