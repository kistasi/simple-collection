<?php

use PHPUnit\Framework\TestCase;

class CollectionTest extends TestCase
{
    public function testToArray()
    {
        $collection = collect();
        $this->assertSame([], $collection->toArray());

        $collection = collect([]);
        $this->assertSame([], $collection->toArray());

        $collection = collect(['a', 'b', 'c']);
        $this->assertSame(['a', 'b', 'c'], $collection->toArray());
    }

    public function testToJson()
    {
        $collection = collect(['a', 'b']);
        $this->assertSame('["a","b"]', $collection->toJson());
    }

    public function testCount()
    {
        $collection = collect(['a', 'b']);
        $this->assertSame(2, $collection->count());
    }

    public function testChaining()
    {
        $collection = collect();
        $collection
            ->append(['a', 'b'])
            ->remove('b');

        $this->assertSame(['a'], $collection->toArray());
    }

    public function testFirst()
    {
        $collection = collect(['a', 'b', 'c']);

        $this->assertSame('a', $collection->first());
    }

    public function testLast()
    {
        $collection = collect(['a', 'b', 'c']);

        $this->assertSame('c', $collection->last());
    }

    public function testIsEmpty()
    {
        $collection = collect();
        $this->assertTrue($collection->isEmpty());

        $collection = collect(['a']);
        $this->assertFalse($collection->isEmpty());
    }

    public function testIsNotEmpty()
    {
        $collection = collect();
        $this->assertFalse($collection->isNotEmpty());

        $collection = collect(['a']);
        $this->assertTrue($collection->isNotEmpty());
    }

    public function testGetByIndex()
    {
        $collection = collect(['a', 'b', 'c']);

        $this->assertSame('a', $collection->getByIndex(0));
        $this->assertSame('b', $collection->getByIndex(1));
        $this->assertSame('c', $collection->getByIndex(2));
    }

    public function testGet()
    {
        $collection = collect(['name' => 'Robin', 'age' => 29]);

        $this->assertSame('Robin', $collection->get('name'));
        $this->assertSame(29, $collection->get('age'));
        $this->assertSame(null, $collection->get('something'));
    }

    public function testHas()
    {
        $collection = collect(['name' => 'Robin', 'age' => 29]);

        $this->assertTrue($collection->has('name'));
        $this->assertFalse($collection->has('something'));
    }

    public function testOnly()
    {
        $collection = collect(['name' => 'Lily', 'age' => 27, 'location' => 'New York']);
        $this->assertSame(['name' => 'Lily', 'age' => 27], $collection->only(['name', 'age']));
    }

    public function testOnly_2()
    {
        $collection = collect(['name' => 'Lily', 'age' => 27, 'location' => 'New York']);
        $this->assertSame(['name' => 'Lily', 'age' => 27], $collection->only(['name', 'age', 'something']));
    }

    public function testAppend()
    {
        $collection = collect(['a']);
        $collection->append('b');
        $this->assertSame(['a', 'b'], $collection->toArray());

        $collection = collect();
        $collection->append(['a', 'b', 'c']);
        $this->assertSame(['a', 'b', 'c'], $collection->toArray());
    }

    public function testPrepend()
    {
        $collection = collect(['a', 'b']);
        $collection->prepend('c');
        $this->assertSame(['c', 'a', 'b'], $collection->toArray());

        $collection = collect(['a', 'b', 'c']);
        $collection->prepend(['d', 'e']);
        $this->assertSame(['d', 'e', 'a', 'b', 'c'], $collection->toArray());
    }

    public function testRemove()
    {
        $collection = collect(['a', 'b']);
        $collection->remove('b');
        $this->assertSame(['a'], $collection->toArray());

        $collection = collect(['a', 'b', 'c']);
        $collection->remove(['a', 'b']);
        $this->assertSame(['c'], $collection->toArray());
    }

    public function testMin()
    {
        $collection = collect([1344, 432562, 6432]);
        $this->assertSame(1344, $collection->min());
    }

    public function testMin_assoc()
    {
        $collection = collect([['age' => 10], ['age' => 50]]);
        $this->assertSame(10, $collection->min('age'));
    }

    public function testMin_assoc_2()
    {
        $collection = collect([['age' => 10], ['age' => 50]]);
        $this->assertSame(null, $collection->min('count'));
    }

    public function testMin_assoc_3()
    {
        $collection = collect([['age' => 10, 'count' => 30], ['age' => 50, 'count' => 30]]);
        $this->assertSame(10, $collection->min('age'));
        $this->assertSame(30, $collection->min('count'));
        $this->assertSame(null, $collection->min('something'));
    }

    public function testMax()
    {
        $collection = collect([1344, 432562, 6432]);
        $this->assertSame(432562, $collection->max());
    }

    public function testMax_assoc()
    {
        $collection = collect([['age' => 10], ['age' => 50]]);
        $this->assertSame(50, $collection->max('age'));
    }

    public function testMax_assoc_2()
    {
        $collection = collect([['age' => 10], ['age' => 50]]);
        $this->assertSame(null, $collection->max('count'));
    }

    public function testMax_assoc_3()
    {
        $collection = collect([['age' => 10, 'count' => 30], ['age' => 50, 'count' => 30]]);
        $this->assertSame(50, $collection->max('age'));
        $this->assertSame(30, $collection->max('count'));
        $this->assertSame(null, $collection->max('something'));
    }

    public function testSum()
    {
        $collection = collect([10, 20, 30]);
        $this->assertSame(60, $collection->sum());
    }

    public function testAvg()
    {
        $collection = collect([10, 20, 30]);
        $this->assertSame(20, $collection->avg());
    }

    public function testSync()
    {
        $collection = collect([1, 2, 3]);
        $collection->sync(['a', 'b', 'c']);
        $this->assertSame(['a', 'b', 'c'], $collection->toArray());
    }

    public function testContains()
    {
        $collection = collect(['Lily', 'Robin']);
        $this->assertTrue($collection->contains('Lily'));
        $this->assertFalse($collection->contains('Ted'));
    }

    public function testContains_assoc()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Contains method is not working with associative arrays.');

        $collection = collect(['name' => 'Robin', 'age' => 20]);
        $collection->contains('asdf');
    }

    public function testIsAssoc()
    {
        $collection = collect([1, 2]);
        $this->assertFalse($collection->isAssoc());

        $collection = collect(['a' => 1, 2]);
        $this->assertTrue($collection->isAssoc());

        $collection = collect(['a' => 1, 'b' => 2]);
        $this->assertTrue($collection->isAssoc());
    }

    public function testOnlyContainsArrays()
    {
        $collection = collect([1, 2]);
        $this->assertFalse($collection->onlyContainsArrays());

        $collection = collect([[1], [2]]);
        $this->assertTrue($collection->onlyContainsArrays());
    }
}

function collect(?array $array = []): SimpleCollection\Collection
{
    return new SimpleCollection\Collection($array);
}
