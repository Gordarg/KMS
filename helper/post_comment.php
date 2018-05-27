<?php
/* TODO: Remove me */ $parent = realpath(dirname(__FILE__) . '/..');
/* TODO: Draft Comments at First*/
$auth = new auth();
$UserId = $auth->login();
if ($UserId == null)
    return;
$_GET['type'] = "COMT";
include ('forms/render.php');
?>