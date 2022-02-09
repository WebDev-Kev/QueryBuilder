<?php
namespace QueryBuilder\QueryBuilder\sql;

class Deleter
{
    private $table;
    private $condition = [];

    public function __toString(): string
    {
        $where = $this->condition === [] ? '' : ' WHERE ' . implode(' AND ', $this->condition);

        return 'DELETE FROM '
            . $this->table
            . ' WHERE '
            . $where
            . ';';
    }

    public function delete(string $table): self
    {
        $this->table = $table;
        return $this;
    }

    public function where(string ...$where): self
    {
        foreach ($where as $item) {
            $this->condition[] = $item;
        }
        return $this;
    }
}