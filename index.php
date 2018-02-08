<?php
include ('core/init.php');
require_once 'semi-orm/Posts.php';
use orm\Posts;
$rows=[];
$post = new Posts($conn);
$rows = $rows = (new Posts($conn))->ToList(0, 48, "Submit", "DESC", "WHERE `Level` = 1 OR `Level` = 2");

include ('core/public-header.php');

foreach ($rows as $row) {
    if ($row['Level'] != '1')
        continue;
    $_GET['id'] = $row['ID'];
    $_GET["level"] = '1';
    $_GET["type"] = 'POST';
    include ('views/render.php');
}

foreach ($rows as $row) {
    if ($row['Level'] != '2')
        continue;
    $_GET['id'] = $row['ID'];
    $_GET["level"] = '2';
    $_GET["type"] = 'POST';
    include ('views/render.php');
        break;
}

include ('core/public-footer.php');
?>