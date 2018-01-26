<?php
namespace orm;

interface semi_orm
{
    function __construct($database_connection);
    function FirstOrDefault($Id); // Select Record By Id

    /*
    function ToList($Skip = 0 , $Take = -1, $OrderField = 'Id', $OrderArrange = 'ASC'); // Return rows array
    function Insert(); // TODO: object as input
    function Delete($Id);
    function Update($Id); // TODO: object as input
    */
}

?>