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
        return $row = mysqli_fetch_array($result);
    }
}

?>