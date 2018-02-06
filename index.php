<?php
include ('core/init.php');
require_once 'semi-orm/Posts.php';
use orm\Posts;
$rows=[];
$post = new Posts($conn);
$rows = $rows = (new Posts($conn))->ToList(0, 48, "Submit", "DESC", "WHERE `Level` = 1 OR `Level` = 2");

include('core/public-header.php');

$header_num = 0;
foreach ($rows as $row) {
    if ($row['Level'] != '1')
        continue;
    $header_num++;
    $_GET['id'] = $row['ID'];
    $_GET["level"] = '1';
    $_GET["type"] = 'POST';
    include ('views/render.php');
    if (($header_num + 1) % 4 == 0) {
        echo '</div>';
        echo '<div class="head-post-row w3-row-padding w3-padding-16">';
    }
}
echo '<div class="w3-center w3-padding-32"><div class="w3-bar" id="paging">';
echo '<a class="w3-bar-item w3-black w3-button">1</a>';
for ($k = 1; $k <= (int) ($header_num / 8); $k ++) {
    echo '<a class="w3-bar-item w3-button w3-hover-black">' . ($k + 1) . '</a>';
}
echo '</div></div>';

foreach ($rows as $row) {
    if ($row['Level'] != '2')
        continue;
    $_GET['id'] = $row['ID'];
    $_GET["level"] = '2';
    $_GET["type"] = 'POST';
    include ('views/render.php');
        break;
}

include('core/public-footer.php')
?>