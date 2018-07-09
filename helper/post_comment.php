<?php
/* TODO: Remove me */ $parent = realpath(dirname(__FILE__) . '/..');
/* TODO: Draft Comments at First*/
$authentication = new authentication();
$UserId = $authentication->login();
if ($UserId == null)
    return;
$_GET['type'] = "COMT";
include ('forms/render.php');
?>