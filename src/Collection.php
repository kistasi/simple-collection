<?php

namespace SimpleCollection;

require './vendor/autoload.php';

use SimpleCollection\Traits;

class Collection
{
    use Traits\ToArray;
    use Traits\ToJson;
    use Traits\IsNotEmpty;
    use Traits\IsEmpty;
    use Traits\Count;
    use Traits\GetByIndex;
    use Traits\Last;
    use Traits\First;
    use Traits\Remove;
    use Traits\Prepend;
    use Traits\Append;
    use Traits\Only;
    use Traits\Has;
    use Traits\Get;
    use Traits\Max;
    use Traits\Min;
    use Traits\Sum;
    use Traits\Avg;
    use Traits\Sync;
    use Traits\Contains;

    private $collection;

    public function __construct(?array $array = [])
    {
        $this->collection = $array;
    }
}
