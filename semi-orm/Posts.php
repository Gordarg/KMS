<?php
namespace orm;
include_once ('orm.php');

class Posts implements semi_orm
{    
    private $conn ;
    function __construct($database_connection){
        $this->conn = $database_connection;
    }
    function FirstOrDefault($Id)
    {
        $query = "SELECT * FROM post_details WHERE MasterID='" . $Id . "';";
        $result = mysqli_query($this->conn, $query);
        if ($result)
            return $row = mysqli_fetch_array($result);
        return $row = [];
    }
    function ToList($Skip = 0 , $Take = 10, $OrderField = 'Id', $OrderArrange = 'ASC', $Clause = '')
    {
        $query = "SELECT * FROM `post_details` " . $Clause . " ORDER BY `" . $OrderField . "` " . $OrderArrange . " LIMIT ". $Take . " OFFSET " . $Skip . ";";
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
        $query = "select `" . $Name . "` from post_details where ID='" . $Id . "';";
        $result = mysqli_query($this->conn, $query);
        $row = mysqli_fetch_array($result);
        return $row[$Name];
    }
    function Insert($Values)
	{
     	$query  = "INSERT INTO `posts` (";
        for ($i= 0; $i < count($Values);){
            $query .= '`' .  $Values[$i][0] . '`'. ((++$i === count($Values)) ? "" : ", " );
        }
		$query = $query . ") VALUES (";
        $i=0;
		for (;$i < count($Values);){
			$query = $query .
            (
                ($Values[$i][1] === NULL) ? "NULL" : ( $Values[$i][1])
			)
			. ((++$i === count($Values)) ? "" : ", " );
		}
        $query = $query . ");";
		mysqli_query($this->conn, $query);
		// $this->SetValue('Id', mysqli_insert_id($conn));
    }
    function Update($Id, $Values)
    {
        $query  = "UPDATE `posts` SET ";
        for ($i= 0; $i < count($Values);){
            $query .=
            '`' .  $Values[$i][0] . '`' . " = " . $Values[$i][1]
            
            . ((++$i === count($Values)) ? "" : ", " );
        }
        $query = $query . " WHERE `Id` = " . $Id . ";";
		mysqli_query($this->conn, $query);
    }
    function Delete($Id){
        $this->Update($_POST['id'], [
            ["Deleted", "1"],
        ]);
    }
}

?>