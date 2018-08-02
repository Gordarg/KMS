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
$_GET["type"] = 'ANSR';
echo '<a href="view.php?lang=' .$row['Language'] . '&id=' . $row['RefrenceID'] . '">' . $functionalitiesInstance->label("بازگشت") . '</a>';
include ('views/render.php');
include ('master/public-footer.php');
?>