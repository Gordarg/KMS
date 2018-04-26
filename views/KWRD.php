<?php
    echo '<div class="w3-padding-16">';
    /* TODO: Delete keyword helper here */
    echo '  <a href="search.php?Q=' . $row['Body'] . '" rel="tag">' . $row['Body'] . '</a>';
    echo '</div>';
?>