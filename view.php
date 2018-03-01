<?php
require_once 'core/init.php';
require_once 'core/functionalities.php';
use core\functionalities;
$functionalitiesInstance = new functionalities();
$Id = mysqli_real_escape_string($conn, $_GET["id"]);
require_once 'semi-orm/Posts.php';
use orm\Posts;
$row = (new Posts($conn))->FirstOrDefault($Id);
if ($row == [])
{
    exit(header("HTTP/1.0 404 Not Found"));
}
include ('core/public-header.php');
echo '<article class="w3-full">';
echo '<img src="download.php?id=' . $Id . '" alt="' . $row["Title"] . '" style="width:100%">';
include ('navigation/post_edit.php');
echo '<h1 class="large">' . $row['Title'] . '</h1>';
echo '<a href="archive.php?CategoryID=' . $row['CategoryID'] . '" class="medium">' . $row['CategoryName'] . '</a>';
echo '<p>' . $row['Body']  . '</p>';
echo '</article>';
include ('core/public-footer.php');
?>