<?php
namespace WebDevKev\QueryBuilder\sql;

class Updater
{

    private $table;
    private $values = [];
    private $conditions = [];


    public function __toString(): string
    {
        return 'UPDATE ' . $this->table
            . ' SET '
            . implode(', ', $this->values)
            . ' WHERE '
            . implode(' AND ', $this->conditions)
            . ';';
    }

    public function update(string $table): self
    {
        $this->table = $table;
        return $this;
    }

    public function set(string ...$value): self
    {
        foreach ($value as $value_single) {
            $this->values[] = $value_single;
        }
        return $this;
    }

    public function where(string ...$condition): self
    {
        foreach ($condition as $condition_single) {
            $this->conditions[] = $condition_single;
        }
        return $this;
    }

}