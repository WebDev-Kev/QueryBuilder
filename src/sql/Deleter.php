<?php
namespace WebDevKev\QueryBuilder\sql;

class Deleter
{
    /**
     * @var
     */
    private $table;
    /**
     * @var array
     */
    private $condition = [];

    /**
     * @return string
     */
    public function __toString(): string
    {
        $where = $this->condition === [] ? '' : ' WHERE ' . implode(' AND ', $this->condition);

        return 'DELETE FROM '
            . $this->table
            . ' WHERE '
            . $where
            . ';';
    }

    /**
     * @param string $table
     * @return Deleter
     */
    public function delete(string $table): self
    {
        $this->table = $table;
        return $this;
    }

    /**
     * @param string ...$where
     * @return Deleter
     */
    public function where(string ...$where): self
    {
        foreach ($where as $item) {
            $this->condition[] = $item;
        }
        return $this;
    }
}