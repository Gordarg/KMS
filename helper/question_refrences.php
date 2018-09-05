<?php
/* TODO: Remove me */ $parent = realpath(dirname(__FILE__) . '/..');
require_once ($parent . '/core/authentication.php');
use core\authentication;
$authentication = new authentication();
$UserId = $authentication->login('answers_table.php');
if ($UserId == null)
        return;
$rows=[];
require_once 'semi-orm/Posts.php';
use orm\Posts;
$post = new Posts($conn);
$rows = $post->ToList(-1, -1, "Submit", "DESC", "WHERE `Type` = 'QUST'");
echo '<label for="refrenceid">' . $functionalitiesInstance->label("پیش نیاز") . '</label>';
echo '<select class="refrenceid" name="refrenceid">';
echo '<option selected="selected">' . $functionalitiesInstance->label("هیچکدام") . '</option>';
foreach ($rows as $row) {
        echo '<option value="' . $row['MasterID'] . '">' . $row['Title'] . '</option>';
}
echo '</select>';