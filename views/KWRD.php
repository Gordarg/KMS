<?php
    echo '<div class="w3-padding-16">';
    /* TODO: Delete keyword helper here */
    echo '  <a href="search.php?Q=' . $row['Title'] . '" rel="tag">' . $row['Title'] . '</a>';
    echo '</div>';
?>