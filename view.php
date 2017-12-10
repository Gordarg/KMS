<?php
require_once 'core/functionalities.php';
use core\functionalities;
include('core/database_conn.php');
$functionalitiesInstance = new functionalities();
$Id = mysqli_real_escape_string($conn, $_GET["id"]);
$query = "select Username, Title, Submit, Body from post_details where ID=" . $Id . ";";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_array($result);
include ('core/public-header.php');
echo '<div class="w3-full">';
echo '<img src="download.php?id=' . $Id . '" alt="' . $row["Title"] . '" style="width:100%">';
echo '<h1 class="large">' . $row['Title'] . '</h1>';
echo '<p>' . $row['Body']  . '</p>';
echo '</div>';
include ('core/public-footer.php');

?>