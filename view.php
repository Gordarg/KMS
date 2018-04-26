<?php
require_once 'core/init.php';
require_once 'core/functionalities.php';
use core\functionalities;
$functionalitiesInstance = new functionalities();
$Id = mysqli_real_escape_string($conn, $_GET["id"]);
require_once 'semi-orm/Posts.php';
use orm\Posts;
$post = new Posts($conn);
$row = $post->FirstOrDefault($Id);
if ($row == [])
{
    exit(header("HTTP/1.0 404 Not Found"));
}
include ('core/public-header.php');
echo '<article class="w3-full">';
echo '<img src="download.php?id=' . $Id . '" alt="' . $row["Title"] . '" style="width:100%">';
include ('helper/post_edit.php');
echo '<h1 class="large">' . $row['Title'] . '</h1>';
echo '<a href="archive.php?CategoryID=' . $row['CategoryID'] . '" class="medium">' . $row['CategoryName'] . '</a>';
echo '<p>' . $row['Body']  . '</p>';
echo '</article>';
include ('helper/post_comment.php');
include ('helper/post_keywords.php');
$rows=[];
$rows = $post->ToList(0, 48, "Submit", "DESC", "WHERE `Type` = 'COMT' AND `RefrenceId`='" . mysqli_real_escape_string($conn, $functionalitiesInstance->ifexistsidx($_GET, 'id')) . "'");
foreach ($rows as $row) {
    $_GET['masterid'] = $row['MasterID'];
    $_GET["type"] = 'COMT';
    include ('views/render.php');
}
$rows=[];
$rows = $post->ToList(0, 48, "Submit", "DESC", "WHERE `Type` = 'KWRD' AND `RefrenceId`='" . mysqli_real_escape_string($conn, $functionalitiesInstance->ifexistsidx($_GET, 'id')) . "'");
foreach ($rows as $row) {
    $_GET['masterid'] = $row['MasterID'];
    $_GET["type"] = 'KWRD';
    include ('views/render.php');
}
include ('core/public-footer.php');
?>