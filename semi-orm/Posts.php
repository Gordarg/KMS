<?php
namespace orm;
include ('orm.php');

class Posts implements semi_orm
{    
    private $conn ;
    function __construct($database_connection){
        $this->conn = $database_connection;
    }
    function FirstOrDefault($Id)
    {
        $query = "select * from post_details where ID=" . $Id . ";";
        $result = mysqli_query($this->conn, $query);
        if ($result)
            return $row = mysqli_fetch_array($result);
        return $row = [];
    }
    function ToList($Skip = 0 , $Take = -1, $OrderField = 'Id', $OrderArrange = 'ASC')
    {
        /*
        TODO: Parameters
        */
        $query = "select * from post_details order by `Submit` desc";
        $result = mysqli_query($this->conn, $query);
        $rows = array();
        // if ($result)
        while(($row = mysqli_fetch_array($result))) {
            $rows[] = $row;
        }
        return $rows;       
    }
}

?>