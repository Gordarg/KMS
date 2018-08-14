<?php
include_once ('core/init.php');
include ('core/secure.php');
include ('forms/submit.php');
include ('master/public-header.php');
$_GET['type'] = "FILE";
require_once ('forms/render.php');
require_once 'semi-orm/Posts.php';
use orm\Posts;
$post = new Posts($conn);
$rows=[];
$rows = $post->
    ToList(0, 48, "Submit", "DESC",
    "WHERE `UserID` = '" . $functionalitiesInstance->ifexistsidx($_SESSION, 'PHP_AUTH_ID') . "' AND `Type`='FILE'");

/*

TODO: if it was admin, push (WHERE UserID <> this User) to the array!
admin can see everything


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