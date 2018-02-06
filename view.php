<?php
require_once 'core/functionalities.php';
use core\functionalities;
include('core/init.php');
$functionalitiesInstance = new functionalities();
$Id = mysqli_real_escape_string($conn, $_GET["id"]);
require_once 'semi-orm/Posts.php';
use orm\Posts;
$Row = (new Posts($conn))->FirstOrDefault($Id);
include ('core/public-header.php');
echo '<article class="w3-full">';
echo '<img src="download.php?id=' . $Id . '" alt="' . $Row["Title"] . '" style="width:100%">';
echo '<h1 class="large">' . $Row['Title'] . '</h1>';
echo '<a href="archive.php?CategoryID=' . $Row['CategoryID'] . '" class="medium">' . $Row['CategoryName'] . '</a>';
echo '<p>' . $Row['Body']  . '</p>';
echo '</article>';
include ('core/public-footer.php');
?>