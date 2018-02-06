<?php

class auth{
    function get($var,$index)
    {
        return(isset($var[$index])?$var[$index]:'');
    }
    function login(){
        $username = $this->get($_SERVER, 'PHP_AUTH_USER');
        $password = $this->get($_SERVER, 'PHP_AUTH_PW');

        $db = new database_connection();
        $conn  = $db->open();

        $username_safe = mysqli_real_escape_string($conn, $username);
        $password_safe = mysqli_real_escape_string($conn, $password);

        // Login
        $login_query = "select Id from users where Username='" . $username_safe . "' AND Password='" . $password_safe . "';";
        $login_result = mysqli_query($conn, $login_query);
        $login_num = mysqli_num_rows($login_result);

        if ($login_num == 1) {
            return mysqli_fetch_array($login_result)['Id'];
        }
        else {
            return null;
        }
    }

}

?>