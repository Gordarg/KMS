<?php
function YouAreNotAuthorized()
{
    exit(header("Location: login.php")); 
}
include ('init.php');
require_once ('authentication.php');
$auth = new auth();
$UserId = $auth->login();
if ($UserId == null)
    YouAreNotAuthorized();
else $_SESSION['PHP_AUTH_ID'] = $UserId;
?>