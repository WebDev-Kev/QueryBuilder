<?php
namespace WebDevKev\QueryBuilder\sql;

class Deleter extends Query
{
    /**
     * @return string
     */
    public function __toString(): string
    {
        $where = $this->conditions === [] ? '' : ' WHERE ' . implode(' AND ', $this->conditions);

        return 'DELETE FROM '
            . $this->table
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

}
