<?php

namespace SimpleCollection\Traits;

trait Min
{
    public function min(?string $value = null)
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
                return min($temp);
            }

            return null;
        }

        return min($collection);
    }
}
