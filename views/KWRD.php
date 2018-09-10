<?php
    echo '<div>';
    /* TODO: Delete keyword helper here */
    echo '  <a href="search.php?Q=%23' . substr($row['Title'], 1) . '" rel="tag">' . $row['Title'] . '</a>';
    include ('helper/post_comment_delete.php');
    echo '</div>';
?>