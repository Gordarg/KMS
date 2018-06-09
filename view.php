<?php
require_once 'core/init.php';
require_once 'core/functionalities.php';
use core\functionalities;
$functionalitiesInstance = new functionalities();
$Id = mysqli_real_escape_string($conn, $_GET["id"]);
$Language = mysqli_real_escape_string($conn, $_GET["lang"]);
require_once 'semi-orm/Posts.php';
use orm\Posts;
$post = new Posts($conn);
$row = $post->FirstOrDefault($Id, $Language);
if ($row == [])
{
    exit(header("HTTP/1.0 404 Not Found"));
}

include ('master/public-header.php');
$_GET['masterid'] = $row['MasterID'];
$_GET["level"] = 'view';
$_GET["type"] = 'POST';
include ('views/render.php');

$rows=[];
$rows = $post->GetContributers("WHERE `Language`='" . $row['Language'] . "' AND `MasterID`='" . mysqli_real_escape_string($conn, $functionalitiesInstance->ifexistsidx($_GET, 'id')) . "'");
foreach ($rows as $row) {
    /*
    TODO:
    Use profile pic.
    
    echo '<a href="version.php?MasterID=' . $row['MasterID'] . '&Submit=' . $row['Submit'] . '"><em>' . $row['Username'] . ':<ins>' . $row['Submit'] . '</ins></em></a>&nbsp&nbsp&nbsp&nbsp';
    */
}

$rows=[];
$rows = $post->ToList(-1, -1, "Submit", "DESC", "WHERE `Type` = 'KWRD' AND `RefrenceId`='" . mysqli_real_escape_string($conn, $functionalitiesInstance->ifexistsidx($_GET, 'id')) . "'");
foreach ($rows as $row) {
    $_GET['masterid'] = $row['MasterID'];
    $_GET["type"] = 'KWRD';
    include ('views/render.php');
}
include ('helper/post_comment.php');
$rows=[];
$rows = $post->ToList(-1, -1, "Submit", "DESC", "WHERE `Type` = 'COMT' AND `RefrenceId`='" . mysqli_real_escape_string($conn, $functionalitiesInstance->ifexistsidx($_GET, 'id')) . "'");
foreach ($rows as $row) {
    $_GET['masterid'] = $row['MasterID'];
    $_GET["type"] = 'COMT';
    include ('views/render.php');
}
include ('master/public-footer.php');
?>