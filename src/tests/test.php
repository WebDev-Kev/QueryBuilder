<?php
/**
 * Created by PhpStorm.
 * User: zyxpc
 * Date: 2022-02-07
 * Time: 13:42
 */
use QueryBuilder\QueryBuilder;

function testSelect()
{

}

function testInsert()
{
    echo (new QueryBuilder())
        ->insert('database_table')
        ->columns('a', 'b', 'c')
        ->values('1', '2', '3');
}

function testUpdate(){
    echo (new QueryBuilder())
        ->update('database_table')
        ->set('column2=test','column1=33')
        ->where('id=3');
}

function testDelete(){
    echo (new QueryBuilder())
        ->delete('database_table')
        ->where('id=22');
}

#echo "Select Query: ";
#testSelect();
#echo "\n";
#echo "Insert Query: ";
#testInsert();
#echo "Update Query: ";
#echo testUpdate();
echo "Delete Query: ";
testDelete();