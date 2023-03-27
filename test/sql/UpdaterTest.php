<?php

use PHPUnit\Framework\TestCase;
use WebDevKev\QueryBuilder\sql\Updater;

class UpdaterTest extends TestCase
{
    public function testToString()
    {
        $updater = new Updater();

        $updater->update('users')
            ->set('name = "John Doe"', 'email = "john@example.com"')
            ->where('id = 1');

        $expected = 'UPDATE users SET name = "John Doe", email = "john@example.com" WHERE id = 1;';
        $actual = (string)$updater;

        $this->assertEquals($expected, $actual);
    }
}