<?php
namespace orm;
include_once ('abstract_semi_orm.php');

class Users extends abstract_semi_orm
{
    function __construct($database_connection, $table = "users" , $pk = "Id"){
        parent::__construct($database_connection, $table, $pk);
    }
}
?>