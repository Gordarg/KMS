<?php
/* TODO: Remove me */ $parent = realpath(dirname(__FILE__) . '/..');
require_once ($parent . '/core/authentication.php');
use core\authentication;
$authentication = new authentication();
$UserId = $authentication->login('answers_table.php');
if ($UserId == null)
        return;
$rows=[];
$rows = $post->ToList(-1, -1, "Submit", "DESC", "WHERE `Type` = 'ANSR' AND `RefrenceId`='" . mysqli_real_escape_string($conn, $functionalitiesInstance->ifexistsidx($_GET, 'id')) . "'");
echo '<table><tbody><tr><th></th><th>' . 
$functionalitiesInstance->label("تاریخ") . 
'</th><th>' .
$functionalitiesInstance->label("فرستنده") .
'</th><th>' .
$functionalitiesInstance->label("وضعیت") . 
'</th></tr>';
foreach ($rows as $row) {
        echo '<tr>';
        echo '<td>';
        $_GET['type'] = "ANSR_status";
        $_GET['masterid'] = $row['MasterID'];
        include ('forms/render.php');
        echo '</td>';
        echo '<td>' . $row['Submit'] . '</td>';
        echo '<td>' . $row['Username'] . '</td>';
        echo '<td>' . $row['Status'] . '</td>';
        echo '</tr>';
}
echo '</tbody></table>';