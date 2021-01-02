<?php

namespace SimpleCollection\Traits;

trait Max
{
    public function max(?string $value = null)
    {
        $collection = $this->collection;

        if ($this->onlyContainsArrays() && $value !== null) {
            $temp = [];
            foreach ($collection as $item) {
                if (array_key_exists($value, $item)) {
                    $temp[] = $item[$value];
                }
            }

            if (!empty($temp)) {
                return max($temp);
            }

            return null;
        }

        return max($collection);
    }
}
