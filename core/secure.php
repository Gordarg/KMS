<?php
include ('init.php');
require_once ('authentication.php');
use core\authentication;
$authentication = new authentication();
$Login = $authentication->login(strtok($_SERVER["REQUEST_URI"], '?'));
$UserId = $Login["Id"];
if ($UserId == null)
    $functionalitiesInstance->error(401);
else $_SESSION['PHP_AUTH_ID'] = $UserId;
?>