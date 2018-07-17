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
$rows = (new Posts($conn))->
    ToList(0, 48, "Submit", "DESC",
    "WHERE `UserID` = '" . $_SESSION['PHP_AUTH_ID'] . "' AND `Type`='FILE'");
$_GET["type"] = 'FILE';
foreach ($rows as $row) {
    $_GET['masterid'] = $row['MasterID'];
    include ('views/render.php');
}
include ('master/public-footer.php');
?>