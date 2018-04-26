<?php
/* TODO: Remove me */ $parent = realpath(dirname(__FILE__) . '/..');
require_once ($parent . '/core/authentication.php');
$auth = new auth();
$UserId = $auth->login();
if ($UserId == null)
    return;
$_GET['type'] = "KWRD";
$Id = "";
include_once ('forms/render.php');
?>