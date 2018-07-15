<?php
/* TODO: Remove me */ $parent = realpath(dirname(__FILE__) . '/..');
require_once ($parent . '/core/authentication.php');
use core\authentication;
$authentication = new authentication();
$UserId = $authentication->login();
if ($UserId == null)
    return;
$_GET['type'] = "KWRD";
include ('forms/render.php');
?>