<?php
    include ('helper/question_edit.php');
    echo '<input type="hidden" id="output" value="';
    echo htmlentities($row['Body']);
    echo '" />';
?>
<form form action="answer.php" method="post" enctype="multipart/form-data">
    <div id="sjfb-fields"></div>
    <input type="submit" value="<?= $functionalitiesInstance->label("ذخیره") ?>" />
</form>