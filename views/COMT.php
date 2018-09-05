<?php
    echo '<div>';
    $UserId = $authentication->login('comment_helper.php');
    if ($UserId != null)
    {
        // echo $row['MasterID'];
        // TODO: Delete
    }
    echo '<img src="drawable/profile.png" />';
    echo '<span>' . $row['Body'] . '</span>';
    echo '</div>';
?>
