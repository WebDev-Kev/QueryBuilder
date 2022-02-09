<?php

namespace WebDevKev\QueryBuilder;

use QueryBuilder\QueryBuilder\sql\Deleter;
use QueryBuilder\QueryBuilder\sql\Inserter;
//use QueryBuilder\QueryBuilder\sql\Selecter;
use QueryBuilder\QueryBuilder\sql\Updater;

class QueryBuilder
{
    public function select(string ...$columns)
    {
        return (new WebDevKev\QueryBuilder\sql\Selecter)->select(...$columns);
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