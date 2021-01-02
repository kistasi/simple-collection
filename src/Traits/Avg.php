<?php

namespace SimpleCollection\Traits;

trait Avg
{
    public function avg(?string $value = null)
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
                return array_sum($temp) / count($temp);
            }

            return null;
        }

        return array_sum($this->collection) / count($this->collection);
    }
}
