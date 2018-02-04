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
}
?>