<?php
$IsUserAuthorized = false;
function YouAreNotAuthorized()
{
    header('WWW-Authenticate: Basic realm="My Realm"');
    header('HTTP/1.0 401 Unauthorized');
    exit();
}
if (! isset($_SERVER['PHP_AUTH_USER'])) {
    YouAreNotAuthorized();
} else {
    
    include ('init.php');
    
    $username = $_SERVER['PHP_AUTH_USER'];
    $password = $_SERVER['PHP_AUTH_PW'];

    $username_safe = mysqli_real_escape_string($conn, $username);
    $password_safe = mysqli_real_escape_string($conn, $password);

    // Login
    $login_query = "select Id from users where Username='" . $username_safe . "' AND Password='" . $password_safe . "';";
    $login_result = mysqli_query($conn, $login_query);
    $login_num = mysqli_num_rows($login_result);

    if ($login_num == 1) {
        $IsUserAuthorized = true;
        $UserId = mysqli_fetch_array($login_result)['Id'];
    }
    if (! $IsUserAuthorized) {
        YouAreNotAuthorized();
    }
}
?>