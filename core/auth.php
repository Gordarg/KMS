<?php
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
    require_once ('authentication.php');
    $auth = new auth();
    $UserId = $auth->login();
    if ($UserId == null)
        YouAreNotAuthorized();
}
?>