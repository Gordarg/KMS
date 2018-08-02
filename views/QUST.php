<?php
    include ('helper/question_edit.php');
    echo '<input type="hidden" id="output" value="';
    echo htmlentities($row['Body']);
    echo '" />';
    $_GET['type'] = "ANSR";
    require_once ('forms/render.php');
    include ('helper/answers_table.php');
?>