<?php

namespace SimpleCollection\Traits;

trait ToJson
{
    public function toJson(): string
    {
        return json_encode($this->collection);
    }
}
