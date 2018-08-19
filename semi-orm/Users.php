<?php
namespace orm;
require_once 'abstract_semi_orm.php';
require_once $parent . '/core/authentication.php';
use core\authentication;

class Users extends abstract_semi_orm
{
    function __construct($database_connection, $table = "users" , $pk = "Id"){
        parent::__construct($database_connection, $table, $pk);
    }
    function ChangePassword($username, $previous_password, $new_password, $confirm_password){
        $authentication = new authentication($username, $previous_password);
        $Login = $authentication->login();
        $UserId = $Login["Id"];
        $this->Update(
            $UserId
            ,[
            ["Username", "'" . $username . "'"],
            ["Password", "'" . $new_password . "'"]
        ]);
    }
    function GetUsernameById($Id)
    {
        $query = "SELECT `Username` FROM `users` WHERE `Id`='" . $Id . "';";
        $result = mysqli_query($this->conn, $query);
        $row = mysqli_fetch_array($result);
        return $row['Username'];
    }
}
?>