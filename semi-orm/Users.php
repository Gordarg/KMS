<?php
namespace orm;
include_once ('abstract_semi_orm.php');
include_once ($parent . '/core/authentication.php');

class Users extends abstract_semi_orm
{
    function __construct($database_connection, $table = "users" , $pk = "Id"){
        parent::__construct($database_connection, $table, $pk);
    }
    function ChangePassword($username, $previous_password, $new_password, $confirm_password){
        echo "ChangePassword";
        authentication.test();
        // $authentication = new authentication('a', '');
        echo "Done";
        $Login = $authentication->login();
        $UserId = $Login["Id"];
        echo $UserId;
        exit;
        $this->Update(
            $UserId
            ,[
            ["Username", "'" . $username . "'"],
            ["Password", "'" . $new_password . "'"]
        ]);
    }
}
?>