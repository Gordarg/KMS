<?php
switch ($_GET["level"])
{
    case "3":
        echo '<article class="w3-padding-16">';
        echo '  <img src="download.php?id=' . $row['MasterID'] . '" class="w3-right w3-margin-right" style="width:50px">';
        echo '  <h1><a href="view.php?id=' . $row['MasterID'] . '" class="w3-large">' . $row['Title'] . '</a></h1><br>';
        echo '  <span>' . $functionalitiesInstance->makeAbstract($row['Body'], 120) . '</span>';
        echo '</article>';  
        break;
    case "1":
        echo '<article class="w3-quarter">';
        echo '<img src="download.php?id=' . $row['MasterID'] . '" alt="' . $row["Title"] . '" style="width:100%">';
        echo '<h3><a href="view.php?id=' . $row['MasterID'] . '">' . $row['Title'] . '</h3></a>';
        echo '<p>' . $functionalitiesInstance->makeAbstract($row['Body'], 480)  . '</p>';
        echo '</article>';
        break;
    case "2":
        echo '<article class="w3-container w3-padding-32 w3-center">';
        echo $row['Submit'] . '<br>';
        echo '<div class="w3-padding-32">';
        echo '<h4><b>' . $row['Username'] . '</b></h4>';
        echo '<h2><a href="view.php?id=' . $row['MasterID'] . '">' . $row['Title'] . '</a></h2>';
        echo $functionalitiesInstance->makeAbstract($row['Body'], 960, "<img>") ;
        echo '</div>';
        echo '</article>';
        break;
    default:
        break;
}
?>