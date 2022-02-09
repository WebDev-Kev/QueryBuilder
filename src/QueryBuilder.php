<?php

namespace WebDevKev\QueryBuilder;

use WebDevKev\QueryBuilder\sql\Deleter;
use WebDevKev\QueryBuilder\sql\Inserter;
use WebDevKev\QueryBuilder\sql\Selecter;
use WebDevKev\QueryBuilder\sql\Updater;

class QueryBuilder
{
    public function select(string ...$columns)
    {
        return (new Selecter)->select(...$columns);
    }

    public function insert(string $into)
    {
        return (new Inserter)->insert($into);
    }

    public function update(string $table)
    {
        return (new Updater)->update($table);
    }

    public function delete(string $table)
    {
        return (new Deleter)->delete($table);
    }
}