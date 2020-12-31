<?php

namespace SimpleCollection\Traits;

trait Has
{
    public function has(string $value): bool
    {
        return array_key_exists($value, $this->collection);
    }
}
