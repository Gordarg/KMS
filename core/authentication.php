<?php

class auth{
    function login(){
        session_start(); 
        if (! isset($_SESSION['PHP_AUTH_USER']))
            return null;
        $username = $_SESSION['PHP_AUTH_USER'];
        $password = $_SESSION['PHP_AUTH_PW'];

        $db = new database_connection();
        $conn  = $db->open();

        $username_safe = mysqli_real_escape_string($conn, $username);
        $password_safe = mysqli_real_escape_string($conn, $password);

        // Login
        $login_query = "select Id from users where Username='" . $username_safe . "' AND Password='" . $password_safe . "';";
        $login_result = mysqli_query($conn, $login_query);
        $login_num = mysqli_num_rows($login_result);

        if ($login_num == 1) 
            return mysqli_fetch_array($login_result)['Id'];
        return null;
    }

}

?>