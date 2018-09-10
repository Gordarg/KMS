<?php
/*
Gordarg KMS Version 1.9.0.0
Director: MohammadReza Tayyebi, Gordarg

NOTE: > git config core.fileMode false

TODO: Comments to update version please:

Major release number
Minor release number
Maintenance release number (bugfixes only)
If used at all: build number (or source control revision number)
*/
date_default_timezone_set('Asia/Tehran');
$datetime = date('Y-m-d h:i:s.u', time());
if (session_status() == PHP_SESSION_NONE) 
    session_start();
require_once 'database_conn.php';
use core\database_connection;
$db = new database_connection();
$conn  = $db->open();
include_once 'variable/config.php';
use core\config;
$config = new config;
$npath=(isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]" . config::Url_PATH;
$path = $npath . "$_SERVER[REQUEST_URI]";
$parent = realpath(dirname(__FILE__) . '/..');
require_once 'core/functionalities.php';
use core\functionalities;
$functionalitiesInstance = new functionalities();
?>