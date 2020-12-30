<?php

require_once './vendor/autoload.php';

use PHPUnit\Framework\TestCase;

class CollectionTest extends TestCase
{
    public function testAppend()
    {
        $collection = new SimpleCollection\Collection(['asd']);
        $collection->append('dsa');
        $this->assertSame(['asd', 'dsa'], $collection->toArray());
    }
}
