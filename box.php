<?php
include_once ('core/init.php');
include ('core/secure.php');
include ('forms/submit.php');
require_once 'core/functionalities.php';
include ('master/public-header.php');
$_GET['type'] = "FILE";
require_once ('forms/render.php');
require_once 'semi-orm/Posts.php';
require_once 'semi-orm/Users.php';
use orm\Users;
$user = new Users($conn);
use orm\Posts;
$post = new Posts($conn);
$rows=[];
use core\functionalities;
$functionalitiesInstance = new functionalities();
if ($functionalitiesInstance->ifexistsidx($_GET, 'id') == "" && $user->GetRoleById($functionalitiesInstance->ifexistsidx($_SESSION, 'PHP_AUTH_ID')) == 'ADMIN')
{
    $rows = $post->
    ToList(-1, -1, "Submit", "DESC",
    "WHERE `Type`='FILE'");
}
else if ($functionalitiesInstance->ifexistsidx($_GET, 'id') != "")
{
    $rows = $post->
    ToList(-1, -1, "Submit", "DESC",
    "WHERE `UserID` = '" . $functionalitiesInstance->ifexistsidx($_GET, 'id') . "' AND `Type`='FILE'");
}

/*

TODO:

require_once ($parent . '/core/authentication.php');
use core\authentication;
$authentication = new authentication();
$UserId = $authentication->login();

*/

$_GET["type"] = 'FILE';
foreach ($rows as $row) {
    $_GET['masterid'] = $row['MasterID'];
    include ('views/render.php');
}
include ('master/public-footer.php');
?>