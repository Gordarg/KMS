<?php
$Type = $_GET['type'];
$Id = mysqli_real_escape_string($conn, $functionalitiesInstance->ifexistsidx($_GET, 'id'));
$row = $Post->FirstOrDefault($Id);

// Default Values
// TODO
$Title = '';
$RefrenceID = null;
$MasterID = sprintf( '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),
mt_rand( 0, 0xffff ),
mt_rand( 0, 0x0fff ) | 0x4000,
mt_rand( 0, 0x3fff ) | 0x8000,
mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ));
$Index = '0';
$CategoryID = null;
$Submit = $datetime; // Comes from Init.php
$UserID = $UserId; // Comes from Auth.php
$Level = 1;
$Body = '';
$Status = 'Publish';
$Content = null;

if ($Id != null)
    $MasterID = $Post->GetValueById($Id, 'MasterID');
switch ($Type)
{
    case "POST":
        $Title = $functionalitiesInstance->ifexistsidx($row,'Title');
        $Level = $functionalitiesInstance->ifexistsidx($row,'Level');
        $Body = $functionalitiesInstance->ifexistsidx($row,'Body');
        $CategoryID = $functionalitiesInstance->ifexistsidx($row,'CategoryID');
        break;
    case "COMT":
        $RefrenceID = $functionalitiesInstance->ifexistsidx($row,'RefrenceID');
        break;
}
?>