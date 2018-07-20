<?php
echo '<div>';
echo '<h5>' . $row['Submit'] . '</h5>';
echo '<h4>' . $row['Title'] . '</h4>';
echo '<h4><b>' . $row['Username'] . '</b></h4>';
echo '<a href="download.php?id=' . $row['MasterID'] . '" alt="' . $row["Title"] . '">' . $functionalitiesInstance->label("دانلود") . '</a>';
echo '<h2><a href="view.php?lang=' . $row['Language'] . '&id=' . $row['MasterID'] . '">' . $row['Title'] . '</a></h2>';
echo $functionalitiesInstance->makeAbstract($Parsedown->text($row['Body']), 960, "<img>");
echo '</div>';
?>