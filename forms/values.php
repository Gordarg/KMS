<?php
$Type = $_GET['type'];

$MasterID = sprintf( '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),
mt_rand( 0, 0xffff ),
mt_rand( 0, 0x0fff ) | 0x4000,
mt_rand( 0, 0x3fff ) | 0x8000,
mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ));

$Title = '';
$Index = '0';
$CategoryID = null;
$Submit = $datetime; // Comes from Init.php
$UserID = $UserId; // Comes from Auth.php
$Level = 1;
$Body = '';
$Status = 'Publish';
$Content = null;
$RefrenceID = null;
$row = $Post->FirstOrDefault($MasterID);
switch ($Type)
{
    case "POST":
        $Title = $functionalitiesInstance->ifexistsidx($row,'Title');
        $Level = $functionalitiesInstance->ifexistsidx($row,'Level');
        $Body = $functionalitiesInstance->ifexistsidx($row,'Body');
        $CategoryID = $functionalitiesInstance->ifexistsidx($row,'CategoryID');
        $Id = mysqli_real_escape_string($conn, $functionalitiesInstance->ifexistsidx($_GET, 'id'));
        if ($Id != null)
            $MasterID = $Post->GetValueById($Id, 'MasterID');
        break;
    case "COMT":
        $RefrenceID = $functionalitiesInstance->ifexistsidx($row,'RefrenceID');
        if ($RefrenceID == "")
            $RefrenceID = mysqli_real_escape_string($conn, $functionalitiesInstance->ifexistsidx($_GET, 'id'));
        break;
    case "KWRD":
        $RefrenceID = $functionalitiesInstance->ifexistsidx($row,'RefrenceID');
        if ($RefrenceID == "")
            $RefrenceID = mysqli_real_escape_string($conn, $functionalitiesInstance->ifexistsidx($_GET, 'id'));
        break;
}
?>