<?php
namespace orm;

interface semi_orm
{
    function __construct($database_connection, $table, $pk = "Id");
    function FirstOrDefault($Id);
    function ToList($Skip = 0 , $Take = -1, $OrderField = 'Id', $OrderArrange = 'ASC');
    function GetValueById($Id, $Field);
    function Insert($Values);
    function Update($Id, $Values);
    function Delete($Id);
}

?>