<?php
function YouAreNotAuthorized()
{
    exit(header("Location: login.php")); 
}
include ('init.php');
require_once ('authentication.php');
use core\authentication;
$authentication = new authentication();
$Login = $authentication->login(strtok($_SERVER["REQUEST_URI"], '?'));
$UserId = $Login["Id"];
if ($UserId == null)
    YouAreNotAuthorized();
else $_SESSION['PHP_AUTH_ID'] = $UserId;
?>