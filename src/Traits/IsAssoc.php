<?php

namespace SimpleCollection\Traits;

trait IsAssoc
{
    public function isAssoc()
    {
        $collection = $this->collection;
        return ($collection !== array_values($collection));
    }
}
