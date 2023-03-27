<?php
namespace WebDevKev\QueryBuilder\sql;

class Updater extends Query
{
    /**
     * @var array
     */
    private $values = [];

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
}