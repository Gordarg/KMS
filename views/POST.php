<?php
switch ($_GET["level"])
{
    case "view":
        echo '<article>';
        echo '<img src="download.php?id=' . $Id . '" alt="' . $row["Title"] . '">';
        echo '<h1>' . $row['Title'] . '</h1>';
        include ('helper/post_edit.php');
        echo '<p>' . $Parsedown->text($row['Body'])  . '</p>';
        echo '</article>';
        break;
    case "3":
        echo '<li><a href="view.php?lang="' . $row['Language'] . '"&id=' . $row['MasterID'] . '">';
        echo '  <img src="download.php?id=' . $row['MasterID'] . '">';
        echo '  <h1>' . $row['Title'] . '</h1><br>';
        echo '  <span>' . $Parsedown->text($functionalitiesInstance->makeAbstract($row['Body'], 120)) . '</span>';
        echo '</a></li>';  
        break;
    case "1":
        echo '<article>';
        echo '<img src="download.php?id=' . $row['MasterID'] . '" alt="' . $row["Title"] . '" >';
        echo '<h3><a href="view.php?lang=' . $row['Language'] . '&id=' . $row['MasterID'] . '">' . $row['Title'] . '</h3></a>';
        echo '<p>' . $Parsedown->text($functionalitiesInstance->makeAbstract($row['Body'], 480))  . '</p>';
        echo '</article>';
        break;
    case "2":
        echo '<article>';
        echo $row['Submit'] . '<br>';
        echo '<div>';
        echo '<h4><b>' . $row['Username'] . '</b></h4>';
        echo '<h2><a href="view.php?lang=' . $row['Language'] . '&id=' . $row['MasterID'] . '">' . $row['Title'] . '</a></h2>';
        echo $Parsedown->text($functionalitiesInstance->makeAbstract($row['Body'], 960, "<img>")) ;
        echo '</div>';
        echo '</article>';
        break;
    default:
        break;
}
?>