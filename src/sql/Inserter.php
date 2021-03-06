<?php
namespace WebDevKev\QueryBuilder\sql;

class Inserter
{
    /**
     * @var string
     */
    private $table = '';
    /**
     * @var array
     */
    private $columns = [];
    /**
     * @var array
     */
    private $values = [];

    /**
     * @return string
     */
    public function __toString(): string
    {
        $columns = $this->columns === [] ? '' : ' (' . implode(', ', $this->columns) . ')';

        return 'INSERT INTO '
            . $this->table
            . $columns
            . ' VALUES ('
            . implode(', ', $this->values)
            . ');';
    }

    /**
     * @param string $into
     * @return Inserter
     */
    public function insert(string $into): self
    {
        $this->table = $into;
        return $this;
    }

    /**
     * @param string ...$columns
     * @return Inserter
     */
    public function columns(string ...$columns): self
    {
        foreach ($columns as $column) {
            $this->columns[] = "`${column}`";
        }
        return $this;
    }

    /**
     * @param mixed ...$values
     * @return Inserter
     */
    public function values(...$values): self
    {
        $this->values = $values;
        return $this;
    }
}