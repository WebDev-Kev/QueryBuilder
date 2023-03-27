<?php

use PHPUnit\Framework\TestCase;
use WebDevKev\QueryBuilder\sql\Inserter;

class InserterTest extends TestCase
{
    public function testToString()
    {
        $inserter = new Inserter();

        $inserter->insert('my_table')
            ->columns('id', 'name', 'email')
            ->values(1, 'John Doe', 'john@example.com');

        $expected = "INSERT INTO my_table (`id`, `name`, `email`) VALUES (1, 'John Doe', 'john@example.com');";
        $actual = (string)$inserter;

        $this->assertEquals($expected, $actual);
    }
}







