<?php
/* TODO: Remove me */ $parent = realpath(dirname(__FILE__) . '/..');
require_once ($parent . '/core/authentication.php');
use core\authentication;
$authentication = new authentication();
$UserId = $authentication->login('answers_table.php');
if ($UserId == null)
        return;
echo '<table><tbody><tr><th></th><th>' . 
$functionalitiesInstance->label("تاریخ") . 
'</th><th>' .
$functionalitiesInstance->label("فرستنده") .
'</th><th>' .
$functionalitiesInstance->label("وضعیت") . 
'</th></tr>';
$rowws=[];
$rowws = $post->ToList(-1, -1, "Status", "DESC", "WHERE `Type` = 'ANSR' AND `RefrenceId`='" . mysqli_real_escape_string($conn, $functionalitiesInstance->ifexistsidx($_GET, 'id')) . "'");
foreach ($rowws as $roww) {
        echo '<tr>';
        echo '<td>';
        $_GET['type'] = "ANSR_status";
        $_GET['masterid'] = $roww['MasterID'];
        $_GET['lang'] = $roww['Language'];
        $_GET['id'] = $roww['ID'];
        $_GET['refrenceid'] = $roww['RefrenceID'];
        $_GET['userid'] = $roww['UserID'];
        $_GET['submit'] = $roww['Submit'];
        $_GET['body'] = $roww['Body'];
        include ('forms/render.php');
        echo '</td>';
        echo '<td>' . $roww['Submit'] . '</td>';
        echo '<td>' . $roww['Username'] . '</td>';
        echo '<td>' . $roww['Status'] . '</td>';
        echo '</tr>';
}
echo '</tbody></table>';