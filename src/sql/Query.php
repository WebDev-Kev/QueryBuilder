<?php

namespace WebDevKev\QueryBuilder\sql;

abstract class Query
{
    /**
     * @var string
     */
    protected $table = '';
    /**
     * @var array
     */
    protected $conditions = [];

    /**
     * @param string ...$where
     * @return Deleter
     */
    public function where(string ...$where): self
    {
        foreach ($where as $item) {
            $this->conditions[] = $item;
        }
        return $this;
    }
}