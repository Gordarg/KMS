<?php
namespace core;
require_once 'core/authorization.php';
use core\authorization;
require_once 'core/functionalities.php';
use core\functionalities;
require_once 'core/database_conn.php';
use core\database_connection;

class authentication{

    private $authUsername = '';
    private $authPassword = '';

    static function test(){
        echo "you reached the test func!";
        exit;
    }

    function __construct($username = null, $password = null)
    {
        if ($username == null)
        {
            $this->authUsername = $_SESSION['PHP_AUTH_USER'];
            $this->authPassword = $_SESSION['PHP_AUTH_PW'];
        }
        else
        {
            $this->authUsername = $username;
            $this->authPassword = $password;
        }
    }

    function login($path  = null){

        $db = new database_connection();
        $conn  = $db->open();
        
        $username_safe = mysqli_real_escape_string($conn, $this->authUsername);
        $password_safe = mysqli_real_escape_string($conn, $this->authPassword);

        // Login
        $login_query = "SELECT `Id`, `Role` FROM `users` WHERE `Username`='" . $username_safe . "' AND `Password`='" . $password_safe . "';";
        $login_result = mysqli_query($conn, $login_query);
        $login_num = mysqli_num_rows($login_result);

        if ($login_num == 1)
        {
            $login = mysqli_fetch_array($login_result);
            if ($path != null)
            {
                $authorization = new authorization();
                if ($authorization->validate($path, $login["Role"]))
                    return $login;
                else
                {
                    (new functionalities())->error("401");
                }
            }
            else
                return $login;
        }
        return null;
    }
}

?>