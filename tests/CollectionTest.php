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

    public function testToJson()
    {
        $collection = new SimpleCollection\Collection(['a', 'b']);
        $this->assertSame('["a","b"]', $collection->toJson());
    }

    public function testCount()
    {
        $collection = new SimpleCollection\Collection(['a', 'b']);
        $this->assertSame(2, $collection->count());
    }

    public function testChaining()
    {
        $collection = new SimpleCollection\Collection();
        $collection
            ->append(['a', 'b'])
            ->remove('b');

        $this->assertSame(['a'], $collection->toArray());
    }

    public function testFirst()
    {
        $collection = new SimpleCollection\Collection(['a', 'b', 'c']);

        $this->assertSame('a', $collection->first());
    }

    public function testLast()
    {
        $collection = new SimpleCollection\Collection(['a', 'b', 'c']);

        $this->assertSame('c', $collection->last());
    }


    public function testIsEmpty()
    {
        $collection = new SimpleCollection\Collection();
        $this->assertTrue($collection->isEmpty());

        $collection = new SimpleCollection\Collection(['a']);
        $this->assertFalse($collection->isEmpty());
    }

    public function testGetByIndex()
    {
        $collection = new SimpleCollection\Collection(['a', 'b', 'c']);

        $this->assertSame('a', $collection->getByIndex(0));
        $this->assertSame('b', $collection->getByIndex(1));
        $this->assertSame('c', $collection->getByIndex(2));
    }

    public function testGet()
    {
        $collection = new SimpleCollection\Collection(['name' => 'Robin', 'age' => 29]);

        $this->assertSame('Robin', $collection->get('name'));
        $this->assertSame(29, $collection->get('age'));
    }

    public function testOnly()
    {
        $collection = new SimpleCollection\Collection(['name' => 'Lily', 'age' => 27, 'location' => 'New York']);
        $this->assertSame( ['name' => 'Lily', 'age' => 27], $collection->only(['name', 'age']) );
    }

    public function testAppend()
    {
        $collection = new SimpleCollection\Collection(['a']);
        $collection->append('b');
        $this->assertSame(['a', 'b'], $collection->toArray());

        $collection = new SimpleCollection\Collection();
        $collection->append(['a', 'b', 'c']);
        $this->assertSame(['a', 'b', 'c'], $collection->toArray());
    }

    public function testPrepend()
    {
        $collection = new SimpleCollection\Collection(['a', 'b']);
        $collection->prepend('c');
        $this->assertSame(['c', 'a', 'b'], $collection->toArray());

        $collection = new SimpleCollection\Collection(['a', 'b', 'c']);
        $collection->prepend(['d', 'e']);
        $this->assertSame(['d', 'e', 'a', 'b', 'c'], $collection->toArray());
    }

    public function testRemove()
    {
        $collection = new SimpleCollection\Collection(['a', 'b']);
        $collection->remove('b');
        $this->assertSame(['a'], $collection->toArray());

        $collection = new SimpleCollection\Collection(['a', 'b', 'c']);
        $collection->remove(['a', 'b']);
        $this->assertSame(['c'], $collection->toArray());
    }
}
