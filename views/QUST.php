<?php
    include ('helper/question_edit.php');
    echo '<input type="hidden" id="output" value="';
    echo htmlentities($row['Body']);
    echo '" />';
?>
<form id="sjfb-sample"><div id="sjfb-fields"></div><input type="submit" value="<?= $functionalitiesInstance->label("دخیره") ?>" /></form>
