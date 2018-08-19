<?php
/* TODO:
Check if user has permission to data from values.php
Check if user has permission to send data from submit.php
*/
$UserId = $authentication->login('answers_table.php');
if ($UserId == null)
        return;
?>