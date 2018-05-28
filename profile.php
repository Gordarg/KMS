<?php
include_once ('core/init.php');
include ('core/auth.php');
require_once 'core/functionalities.php';
use core\functionalities;
include ('master/public-header.php');

/*
TODO: HERE ATTENTION

*/
?>

<label for="title"><?= $functionalitiesInstance->label("نام کاربری"); ?></label>
<input name="username" type="text" value="" />

<div class="pass">
    <label for="prev"><?= $functionalitiesInstance->label("گذرواژه‌ی قبلی"); ?></label>
    <input name="prev" type="password" />

    <label for="new"><?= $functionalitiesInstance->label("گذرواژه‌ی جدید"); ?></label>
    <input name="new" type="password" />

    <label for="confirm"><?= $functionalitiesInstance->label("گذرواژه‌ی تکرار"); ?></label>
    <input name="confirm" type="password" />
</div>

<label for="content"><?= $functionalitiesInstance->label("تصویر"); ?></label>
<input type="file" name="content" id="file" />

<?php
include ('helper/user_role.php');
include ('helper/user_active.php');
include ('master/public-footer.php');
?>