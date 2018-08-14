<?php
include ('core/init.php');
include ('master/public-header.php');
require_once 'semi-orm/Posts.php';
use orm\Posts;
require_once 'core/functionalities.php';
use core\functionalities;
$rows=[];
$rows = (new Posts($conn))->
    ToList(0, 48, "Submit", "DESC",
    "WHERE (`Level` = 1 OR `Level` = 2) AND `LANGUAGE`='" . $functionalitiesInstance->ifexistsidx($_COOKIE, 'LANG')  . "'");

foreach ($rows as $row) {
    if ($row['Level'] != '1')
        continue;
    $_GET['masterid'] = $row['MasterID'];
    $_GET["level"] = '1';
    $_GET["type"] = 'POST';
    include ('views/render.php');
}

foreach ($rows as $row) {
    if ($row['Level'] != '2')
        continue;
    $_GET['masterid'] = $row['MasterID'];
    $_GET["level"] = '2';
    $_GET["type"] = 'POST';
    include ('views/render.php');
        break;
}

include ('master/public-footer.php');
?>