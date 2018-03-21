<?php
/*
Gordarg CMS Version 1.0.0.0

TODO: Comments to update version please:
Major release number
Minor release number
Maintenance release number (bugfixes only)
If used at all: build number (or source control revision number)
*/
date_default_timezone_set('Asia/Tehran');
$datetime = date('Y-m-d h:i', time());
if (session_status() == PHP_SESSION_NONE) 
    session_start();
include_once 'database_conn.php';
$db = new database_connection();
$conn  = $db->open();
include_once 'core/config.php';
use core\config;
$npath=(isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]" . config::Url_PATH;
$path = $npath . "$_SERVER[REQUEST_URI]";
$parent = realpath(dirname(__FILE__) . '/..');
?>