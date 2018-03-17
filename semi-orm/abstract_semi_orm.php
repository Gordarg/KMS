<?php
namespace orm;
include_once ('orm.php');
class abstract_semi_orm implements semi_orm
{
    protected $conn ;
    protected $table;
    protected $pk   ;

    function __construct($database_connection = null, $table = null, $pk = "Id"){
        $this->conn = $database_connection;
        $this->table = $table;
        $this->pk = $pk;
    }
    function FirstOrDefault($Id)
    {
        $query = "SELECT * FROM `" . $this->table . "` WHERE `" . $this->pk . "` = '" . $Id . "';";
        $result = mysqli_query($this->conn, $query);
        if ($result)
            return $row = mysqli_fetch_array($result);
        return $row = [];
    }
    function ToList($Skip = 0 , $Take = 10, $OrderField = 'Id', $OrderArrange = 'ASC', $Clause = '')
    {
        $query = "SELECT * FROM `" . $this->table . "` " . $Clause . " ORDER BY `" . $OrderField . "` " . $OrderArrange . " LIMIT ". $Take . " OFFSET " . $Skip . ";";
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
        $query = "SELECT `" . $Name . "` FROM `" . $this->table . "` WHERE `" . $this->pk . "` ='" . $Id . "';";
        $result = mysqli_query($this->conn, $query);
        $row = mysqli_fetch_array($result);
        return $row[$Name];
    }
    function Insert($Values)
	{
     	$query  = "INSERT INTO `" . $this->table . "` (";
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
		return mysqli_insert_id($this->conn);
    }
    function Update($Id, $Values)
    {
        $query  = "UPDATE `" . $this->table . "` SET ";
        for ($i= 0; $i < count($Values);){
            $query .=
            '`' .  $Values[$i][0] . '`' . " = " . $Values[$i][1]
            
            . ((++$i === count($Values)) ? "" : ", " );
        }
        $query = $query . " WHERE `" . $this->pk . "` = " . $Id . ";";
        mysqli_query($this->conn, $query);
    }
    function Delete($Id){
        $query  = "DELETE FROM `" . $this->table . "` WHERE `" . $this->pk . "` = " . $Id . ";";
		mysqli_query($this->conn, $query);
    }
}

?>