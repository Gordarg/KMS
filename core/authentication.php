<?php

require_once ('authorization.php');
use core\authorization;

require_once 'functionalities.php';
use core\functionalities;

class authentication{
    function login($path  = null){
        if (! isset($_SESSION['PHP_AUTH_USER']))
            return null;
        
        $username = $_SESSION['PHP_AUTH_USER'];
        $password = $_SESSION['PHP_AUTH_PW'];

        $db = new database_connection();
        $conn  = $db->open();

        $username_safe = mysqli_real_escape_string($conn, $username);
        $password_safe = mysqli_real_escape_string($conn, $password);

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