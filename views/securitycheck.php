<?php
require_once 'semi-orm/Posts.php';
use orm\Posts;
if ($row['Type'] == 'QUST')
{
    $post = new Posts($conn);
    $refrence = $post->FirstOrDefault($row['RefrenceID'],  $row['Language']);
    if ($refrence != null)
    {
        $answers = $post->ToList(-1, -1, "Submit", "DESC", "WHERE `Type` = 'ANSR' AND `UserID` = " . $functionalitiesInstance->ifexistsidx($_SESSION, 'PHP_AUTH_ID') . " AND (`Status` ='Approve' OR `Status` ='' OR `Status` ='Sent') AND `RefrenceID`='" . $refrence['MasterID'] . "'");
        if (sizeof($answers) == 0)
        {
            header("HTTP/1.1 303 See Other");
            header('Location: view.php?message=⎗&lang=' . $refrence['Language'] . '&id=' . $refrence['MasterID']);
        }
    }
}