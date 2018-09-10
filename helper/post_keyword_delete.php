<?php
/* TODO: Remove me */ $parent = realpath(dirname(__FILE__) . '/..');
require_once ($parent . '/core/authentication.php');
use core\authentication;
$authentication = new authentication();
$UserId = $authentication->login('post_comment_delete.php');
if ($UserId == null)
        return;
$_GET['type'] = "KWRD_delete";
$_GET['masterid'] = $row['MasterID'];
$_GET['langauge'] = $row['Language'];
$_GET['refrenceid'] = $row['RefrenceID'];
include ($parent . '/forms/render.php');
?>