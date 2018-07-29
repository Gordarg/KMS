<?php
if ($row['Type'] == "QUST")
{
    echo '<article>';
    echo '<img src="download.php?id=' . $row['MasterID'] . '" alt="' . $row["Title"] . '" >';
    echo '<h3><a href="view.php?lang=' . $row['Language'] . '&id=' . $row['MasterID'] . '">' . $row['Title'] . '</h3></a>';
    echo '</article>';
}
else
switch ($_GET["level"])
{
    case "view":
        echo '<article>';
        echo '<img src="download.php?id=' . $Id . '" alt="' . $row["Title"] . '" />';
        echo '<h1>' . $row['Title'] . '</h1>';
        include ('helper/post_edit.php');
        echo $Parsedown->text($row['Body']);
        echo '</article>';

$rows=[];
$rows = $post->GetContributers("WHERE `Language`='" . $row['Language'] . "' AND `MasterID`='" . mysqli_real_escape_string($conn, $functionalitiesInstance->ifexistsidx($_GET, 'id')) . "'");
foreach ($rows as $row) {
    /*
    TODO:
    Use profile pic.
    
    echo '<a href="version.php?MasterID=' . $row['MasterID'] . '&Submit=' . $row['Submit'] . '"><em>' . $row['Username'] . ':<ins>' . $row['Submit'] . '</ins></em></a>&nbsp&nbsp&nbsp&nbsp';
    */
}

$rows=[];
$rows = $post->ToList(-1, -1, "Submit", "DESC", "WHERE `Type` = 'KWRD' AND `RefrenceId`='" . mysqli_real_escape_string($conn, $functionalitiesInstance->ifexistsidx($_GET, 'id')) . "'");
foreach ($rows as $row) {
    $_GET['masterid'] = $row['MasterID'];
    $_GET["type"] = 'KWRD';
    include ('views/render.php');
}
include ('helper/post_comment.php');
$rows=[];
$rows = $post->ToList(-1, -1, "Submit", "DESC", "WHERE `Type` = 'COMT' AND `RefrenceId`='" . mysqli_real_escape_string($conn, $functionalitiesInstance->ifexistsidx($_GET, 'id')) . "'");
foreach ($rows as $row) {
    $_GET['masterid'] = $row['MasterID'];
    $_GET["type"] = 'COMT';
    include ('views/render.php');
}
        break;
    case "3":
        echo '<li><a href="view.php?lang="' . $row['Language'] . '"&id=' . $row['MasterID'] . '">';
        echo '  <img src="download.php?id=' . $row['MasterID'] . '">';
        echo '  <h1>' . $row['Title'] . '</h1><br>';
        echo '  <span>' . $functionalitiesInstance->makeAbstract($Parsedown->text($row['Body']), 120) . '</span>';
        echo '</a></li>';  
        break;
    case "1":
        echo '<article>';
        echo '<img src="download.php?id=' . $row['MasterID'] . '" alt="' . $row["Title"] . '" >';
        echo '<h3><a href="view.php?lang=' . $row['Language'] . '&id=' . $row['MasterID'] . '">' . $row['Title'] . '</h3></a>';
        echo '<p>' . $functionalitiesInstance->makeAbstract($Parsedown->text($row['Body']), 480)  . '</p>';
        echo '</article>';
        break;
    case "2":
        echo '<article>';
        echo $row['Submit'] . '<br>';
        echo '<div>';
        echo '<h4><b>' . $row['Username'] . '</b></h4>';
        echo '<h2><a href="view.php?lang=' . $row['Language'] . '&id=' . $row['MasterID'] . '">' . $row['Title'] . '</a></h2>';
        echo $functionalitiesInstance->makeAbstract($Parsedown->text($row['Body']), 960, "<img>");
        echo '</div>';
        echo '</article>';
        break;
    default:
        break;
}
?>