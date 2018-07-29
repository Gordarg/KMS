<?php
$parent = realpath(dirname(__FILE__) . '/..');
require_once  $parent . '/core/functionalities.php';
require_once  $parent . '/plug-in/Parsedown.php';
use core\functionalities;
$functionalitiesInstance = new functionalities();
$Parsedown = new Parsedown();
switch ($_GET['type'])
{
    case "QUST":
        include('QUST.php');
        break;
    case "POST":
        include('POST.php');
        break;
    case "COMT":
        include('COMT.php');
        break;
    case "KWRD":
        include('KWRD.php');
        break;
    case "FILE":
        include('FILE.php');
        break;
}
?>