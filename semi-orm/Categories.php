<?php
namespace orm;
include_once ('abstract_semi_orm.php');

class Categories extends abstract_semi_orm
{
    function __construct($database_connection, $table = "categories" , $pk = "Id"){
        parent::__construct($database_connection, $table, $pk);
    }
}
?>