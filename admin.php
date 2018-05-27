<?php
include_once ('core/init.php');
include ('core/auth.php');
include ('forms/submit.php');
include ('master/public-header.php');
$_GET['type'] = "POST";
include ('forms/render.php');
include ('master/public-footer.php');
?>