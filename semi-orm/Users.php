<?php
namespace orm;
include_once ('orm.php');
class Users implements semi_orm
{
    private $conn ;
    function __construct($database_connection){
        $this->conn = $database_connection;
    }
    function FirstOrDefault($Id)
    {
        $query = "SELECT * FROM `users` WHERE Id=" . $Id . ";";
        $result = mysqli_query($this->conn, $query);
        if ($result)
            return $row = mysqli_fetch_array($result);
        return $row = [];
    }
    function ToList($Skip = 0 , $Take = 10, $OrderField = 'Id', $OrderArrange = 'ASC', $Clause = '')
    {
        $query = "SELECT * FROM `users` " . $Clause . " ORDER BY `" . $OrderField . "` " . $OrderArrange . " LIMIT ". $Take . " OFFSET " . $Skip . ";";
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
        $query = "SELECT `" . $Name . "` FROM `users` WHERE `Id` = " . $Id . ";";
        $result = mysqli_query($this->conn, $query);
        $row = mysqli_fetch_array($result);
        return $row[$Name];
    }
    function Insert($Values)
	{
     	$query  = "INSERT INTO `users` (`Username`, `Password`, `Image`, `Active`, `Role`) VALUES ('" . $Values['Username'] . "', '" . $Values['Password'] . "', '" . $Values['Image'] . "', " . $Values['Active'] . ", '" . $Values['Role'] . "');";
		mysqli_query($this->conn, $query);
    }
    function Update($Id, $Values)
    {
        $query  = "UPDATE `users` SET `Username` = '" . $Values['Username'] . "', `Password` = '" . $Values['Password'] . "', `Image` = '" . $Values['Image'] . "', `Active` = " . $Values['Active'] . ", `Role` = '" . $Values['Role'] . "' WHERE `Id` = " . $Values['Id'] . ";";
		mysqli_query($this->conn, $query);
    }
    function Delete($Id){
        $query  = "DELETE FROM `users` WHERE `Id` = " . $Id . ";";
		mysqli_query($this->conn, $query);
    }
}

?>