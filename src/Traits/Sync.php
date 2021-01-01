<?php

namespace SimpleCollection\Traits;

trait Sync
{
    public function sync(array $collection)
    {
        $this->collection = $collection;

        return $this;
    }
}
