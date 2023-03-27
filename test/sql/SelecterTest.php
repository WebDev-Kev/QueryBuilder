<?php

use PHPUnit\Framework\TestCase;
use WebDevKev\QueryBuilder\sql\Selecter;

class SelecterTest extends TestCase
{
    public function testToString()
    {
        $selecter = new Selecter();

        $selecter->select('id', 'name', 'email')
            ->from('users')
            ->where('id = 1')
            ->order('name', 'asc')
            ->limit(10);

        $expected = "SELECT `id`, `name`, `email` FROM users WHERE id = 1 ORDER BY name ASC LIMIT 10;";
        $actual = (string)$selecter;

        $this->assertEquals($expected, $actual);
    }
}