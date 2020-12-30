<?php

use PHPUnit\Framework\TestCase;

class CollectionTest extends TestCase
{
    public function testToArray()
    {
        $collection = new SimpleCollection\Collection();
        $this->assertSame([], $collection->toArray());

        $collection2 = new SimpleCollection\Collection([]);
        $this->assertSame([], $collection2->toArray());

        $collection3 = new SimpleCollection\Collection(['a', 'b', 'c']);
        $this->assertSame(['a', 'b', 'c'], $collection3->toArray());
    }

    public function testGet()
    {
        $collection = new SimpleCollection\Collection(['name' => 'Robin', 'age' => 29]);

        $this->assertSame('Robin', $collection->get('name'));
        $this->assertSame(29, $collection->get('age'));
    }

    public function testAppend()
    {
        $collection = new SimpleCollection\Collection(['a']);
        $collection->append('b');

        $this->assertSame(['a', 'b'], $collection->toArray());
    }

    public function testAppendMultiple()
    {
        $collection = new SimpleCollection\Collection();
        $collection->appendMultiple(['a', 'b', 'c']);

        $this->assertSame(['a', 'b', 'c'], $collection->toArray());
    }

    public function testPrepend()
    {
        $collection = new SimpleCollection\Collection(['a', 'b']);
        $collection->prepend('c');

        $this->assertSame(['c', 'a', 'b'], $collection->toArray());
    }

    public function testPrependMultiple()
    {
        $collection = new SimpleCollection\Collection(['a', 'b', 'c']);
        $collection->prependMultiple(['d', 'e']);

        $this->assertSame(['d', 'e', 'a', 'b', 'c'], $collection->toArray());
    }

    public function testRemove()
    {
        $collection = new SimpleCollection\Collection(['a', 'b']);
        $collection->remove('b');

        $this->assertSame(['a'], $collection->toArray());
    }

    public function testRemoveMultiple()
    {
        $collection = new SimpleCollection\Collection(['a', 'b', 'c']);
        $collection->removeMultiple(['a', 'b']);

        $this->assertSame(['c'], $collection->toArray());
    }
}
