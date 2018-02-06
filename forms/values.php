<?php
$Type = $_GET['type'];
$Id = mysqli_real_escape_string($conn, $functionalitiesInstance->ifexistsidx($_GET, 'id'));
$Row = $Post->FirstOrDefault($Id);
$Row=[];

// Default Values
// TODO
$Title = '';
$RefrenceID = $functionalitiesInstance->ifexistsidx($_GET,'refrenceid');
$Index = '0';
$CategoryID = null;
$Submit = $datetime; // Comes from Init.php
$UserID = $UserId; // Comes from Auth.php
$Level = 1;
$Body = '';
$Status = 'Publish';
$Content = null;

// TODO
// if Row found
switch ($Type)
{
    case "POST":
        $Title = $functionalitiesInstance->ifexistsidx($Row,'Title');
        $Level = $functionalitiesInstance->ifexistsidx($Row,'Level');
        $Body = $functionalitiesInstance->ifexistsidx($Row,'Body');
        $CategoryID = $functionalitiesInstance->ifexistsidx($Row,'CategoryID');
        break;
    case "COMT":
        $RefrenceID = $functionalitiesInstance->ifexistsidx($Row,'RefrenceID');
        break;
}

?>