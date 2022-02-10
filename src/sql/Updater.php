<?php
namespace WebDevKev\QueryBuilder\sql;

class Updater
{

    /**
     * @var
     */
    private $table;
    /**
     * @var array
     */
    private $values = [];
    /**
     * @var array
     */
    private $conditions = [];


    /**
     * @return string
     */
    public function __toString(): string
    {
        return 'UPDATE ' . $this->table
            . ' SET '
            . implode(', ', $this->values)
            . ' WHERE '
            . implode(' AND ', $this->conditions)
            . ';';
    }

    /**
     * @param string $table
     * @return Updater
     */
    public function update(string $table): self
    {
        $this->table = $table;
        return $this;
    }

    /**
     * @param string ...$value
     * @return Updater
     */
    public function set(string ...$value): self
    {
        foreach ($value as $value_single) {
            $this->values[] = $value_single;
        }
        return $this;
    }

    /**
     * @param string ...$condition
     * @return Updater
     */
    public function where(string ...$condition): self
    {
        foreach ($condition as $condition_single) {
            $this->conditions[] = $condition_single;
        }
        return $this;
    }

}