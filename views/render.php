<?php
$parent = realpath(dirname(__FILE__) . '/..');
require_once  $parent . '/core/functionalities.php';
use core\functionalities;
$functionalitiesInstance = new functionalities();
switch ($_GET['type'])
{
    case "POST":
        include('POST.php');
        break;
    case "COMT":
        include('COMT.php');
        break;
    case "KWRD":
        include('COMT.php');
        break;
}
?>