<?php
require_once 'core/about.php';
use core\about;

$conn = new mysqli(about::ConnectionString_SERVER,about::ConnectionString_USERNAME,about::ConnectionString_PASSWORD,about::ConnectionString_DATABASE);

if ($conn->connect_error) {
    die('Connect Error (' . $conn->connect_errno . ') ' . $conn->connect_error);
}
?>