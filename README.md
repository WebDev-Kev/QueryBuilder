# QueryBuilder
A simplistic SQL QueryBuilder for PHP.


## Install
```
composer require webdevkev/querybuilder
```

## Examples

#### Select:
```
(new QueryBuilder())
    ->select('column1','column2')
    ->from('database_table', 'dbtable') // database_table, alias
    ->where('id=1', 'id!=2')
    ->limit(100)
    ->order("id", "desc");

Return:
SELECT `column1`, `column2` FROM database_table AS dbtable WHERE id=1 AND id!=2 ORDER BY id DESC LIMIT 100;
```

#### Insert:
```
(new QueryBuilder())
        ->insert('database_table')
        ->columns('a', 'b', 'c')
        ->values('1', '2', '3');

Return:
INSERT INTO database_table (`a`, `b`, `c`) VALUES (1, 2, 3);
```

#### Update
```
(new QueryBuilder())
        ->update('database_table')
        ->set('column2=test','column1=33')
        ->where('id=3');

Return:
UPDATE database_table SET column2=test, column1=33 WHERE id=3;
```

#### Delete
```
(new QueryBuilder())
        ->delete('database_table')
        ->where('id=22');

Return:
DELETE FROM database_table WHERE  WHERE id=22;
```
