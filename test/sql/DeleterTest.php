<?php

use PHPUnit\Framework\TestCase;

use WebDevKev\QueryBuilder\sql\Deleter;

class DeleterTest extends TestCase
{
    public function testToString()
    {
        $deleter = new Deleter();

        $deleter->delete('my_table')->where('id = 1');

        $expected = "DELETE FROM my_table WHERE id = 1;";
        $actual = (string)$deleter;

        $this->assertEquals($expected, $actual);
    }

    public function testWhere()
    {
        $deleter = new Deleter();

        $deleter->delete('users')
            ->where('id = 1')
            ->where("name = 'John Doe'");

        $expected = 'DELETE FROM users WHERE id = 1 AND name = \'John Doe\';';
        $actual = (string)$deleter;

        $this->assertEquals($expected, $actual);
    }
}
