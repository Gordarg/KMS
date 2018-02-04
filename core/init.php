<?php
date_default_timezone_set('Asia/Tehran');
$datetime = date('Y-m-d h:i', time());
include_once 'database_conn.php';
$db = new database_connection();
$conn  = $db->open();
?>