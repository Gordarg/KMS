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
    function ChangePassword($checkprevpass, $userid, $username, $previous_password, $new_password, $confirm_password){
        if ($checkprevpass)
        {
            $authentication = new authentication($username, $previous_password);
            $Login = $authentication->login();
            if ($Login == null)
            {
                header("HTTP/1.1 401 Unauthorized");
                header('Location: profile.php?message=⊥&id=' . $userid);
            }
            $userid = $Login["Id"];
        }
        $this->Update(
            $userid
            ,[
            ["Username", "'" . $username . "'"],
            ["Password", "'" . $new_password . "'"]
        ]);
        header('Location: profile.php?id=' . $userid);
    }
    function GetUsernameById($Id)
    {
        $query = "SELECT `Username` FROM `users` WHERE `Id`='" . $Id . "';";
        $result = mysqli_query($this->conn, $query);
        $row = mysqli_fetch_array($result);
        return $row['Username'];
    }
    function GetRoleById($Id)
    {
        $query = "SELECT `Role` FROM `users` WHERE `Id`='" . $Id . "';";
        $result = mysqli_query($this->conn, $query);
        $row = mysqli_fetch_array($result);
        return $row['Role'];
    }
}
?>