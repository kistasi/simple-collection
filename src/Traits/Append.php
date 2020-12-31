<?php

namespace SimpleCollection\Traits;

trait Append
{
    public function append($values): self
    {
        if (!is_array($values)) {
            $values = [ $values ];
        }

        $collection = $this->collection;

        foreach ($values as $value) {
            $collection[] = $value;
        }

        $this->collection = $collection;

        return $this;
    }
}
