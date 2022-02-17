<?php

namespace WebDevKev\QueryBuilder\sql;

class Selecter
{

    /**
     * @var array
     */
    private $from = [];
    /**
     * @var array
     */
    private $columns = [];
    /**
     * @var array
     */
    private $conditions = [];
    /**
     * @var null
     */
    private $limit = null;
    /**
     * @var null
     */
    private $order = null;

    /**
     * @var array
     */
    private $join = [];

    /**
     * @return string
     */
    public function __toString(): string
    {
        $where = $this->conditions === [] ? '' : ' WHERE ' . implode(' AND ', $this->conditions);
        $order = $this->order === null ? '' : ' ORDER BY ' . $this->order;
        $limit = $this->limit === null ? '' : ' LIMIT ' . $this->limit;
        //$joins = $this->convertJoins();

        return 'SELECT ' . implode(', ', $this->columns)
            . ' FROM ' . implode(', ', $this->from)
            . $where
            . $order
            . $limit
            . ';';
    }

    public function convertJoins(): string
    {
    }

    /**
     * @param string ...$columns
     * @return Selecter
     */
    public function select(...$columns): self
    {
        if(is_array($columns[0])) $columns = $columns[0];
        foreach ($columns as $column) {
            if ($column === "*") {
                $this->columns[] = $column;
            } else {
                $this->columns[] = "`${column}`";
            }
        }

        return $this;
    }

    /**
     * @param string $table
     * @param null|string $as
     * @return Selecter
     */
    public function from(string $table, ?string $as = null): self
    {
        $this->from[] = !isset($as) ? "${table}" : "${table} AS ${as}";
        return $this;
    }

    /**
     * @param string ...$where
     * @return Selecter
     */
    public function where(string ...$where): self
    {
        foreach ($where as $item) {
            $this->conditions[] = $item;
        }
        return $this;
    }

    /**
     * @param string $column
     * @param null|string $sort
     * @return Selecter
     */
    public function order(string $column, ?string $sort = null): self
    {
        $this->order = $column;
        $this->order .= isset($sort) ? ' ' . strtoupper($sort) : '';
        return $this;
    }

    /**
     * @param int $limit
     * @return Selecter
     */
    public function limit(int $limit): self
    {
        $this->limit = $limit;
        return $this;
    }

    public function innerJoin(string $table, string ...$columns): self
    {
    }

    public function leftJoin()
    {
    }

    public function rightJoin()
    {
    }

    public function fullJoin()
    {
    }

    public function selfJoin()
    {
    }


    #TODO: Implement joins
}