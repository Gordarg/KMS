<?php
echo '<div>';
echo '<h4><b>' . $row['Username'] . '</b></h4>';
echo '<div class="answers">';
foreach (json_decode($row['Body'], true) as $key => $value)
{
    echo '<span>' . str_replace("_"," ",$key)  . '</span><p>' .  $value . ' </p>';
}
echo '</div>';
echo '</div>';
?>