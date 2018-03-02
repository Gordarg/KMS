<?php
namespace orm;
include_once ('orm.php');

class Categories implements semi_orm
{
    private $conn ;
    function __construct($database_connection){
        $this->conn = $database_connection;
    }
    function FirstOrDefault($Id)
    {
        $query = "SELECT * FROM `categories` WHERE `Id` = " . $Id . ";";
        $result = mysqli_query($this->conn, $query);
        if ($result)
            return $row = mysqli_fetch_array($result);
        return $row = [];
    }
    function ToList($Skip = 0 , $Take = 10, $OrderField = 'Id', $OrderArrange = 'ASC', $Clause = '')
    {
        $query = "SELECT * FROM `categories` " . $Clause . " ORDER BY `" . $OrderField . "` " . $OrderArrange . " LIMIT ". $Take . " OFFSET " . $Skip . ";";
        $result = mysqli_query($this->conn, $query);
        $rows = array();
        if ($result)
            while(($row = mysqli_fetch_array($result))) {
                $rows[] = $row;
            }
        return $rows;       
    }
    function GetValueById($Id, $Name)
    {
        $query = "SELECT `" . $Name . "` FROM `categories` WHERE `Id` = " . $Id . ";";
        $result = mysqli_query($this->conn, $query);
        $row = mysqli_fetch_array($result);
        return $row[$Name];
    }
    function Insert($Values)
	{
     	$query  = "INSERT INTO `categories` (`Name`, `Father`) VALUES ('" . $Values['Name'] . "', " . $Values['Father'] . ");";
		mysqli_query($this->conn, $query);
    }
    function Update($Id, $Values)
    {
        $query  = "UPDATE `categories` SET `Name` = '" . $Values['Name'] . "', `Father` = " . $Values['Father'] . " WHERE `Id` = " . $Id . ";";
		mysqli_query($this->conn, $query);
    }
    function Delete($Id){
        $query  = "DELETE FROM `categories` WHERE `Id` = " . $Id . ";";
		mysqli_query($this->conn, $query);
    }
}

?>