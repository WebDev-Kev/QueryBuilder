<?php
require("../../../../autoload.php");

use WebDevKev\QueryBuilder\QueryBuilder;

echo (new QueryBuilder())
    ->select('column1','column2')
    ->from('database_table', 'dbtable')
    ->where('id=1', 'id!=2')
    ->limit(100)
    ->order("id", "desc");