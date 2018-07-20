<?php
echo '<div>';
/*

TODO:
UPDATE AND DELETE

*/
echo '<a href="box.php?lang=' . $row["Language"] . '&id=' . $row['MasterID'] . '">' . $functionalitiesInstance->label("ویرایش") . '</a>';
echo '<a href="download.php?id=' . $row['MasterID'] . '" title="' . $functionalitiesInstance->label("دانلود") . '">';
echo '<h5>' . $row['Submit'] . '</h5>';
echo '<h4>' . $row['Title'] . '</h4>';
echo '<h4><b>' . $row['Username'] . '</b></h4>';
// echo getImgType('download.php?id=' . $row['MasterID']);
echo '</a>';
echo '</div>';
?>