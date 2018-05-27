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

<label for="title">نام کاربری</label>
<input name="title" type="text" value="" />

<div class="pass">
    <label for="title">گذرواژه‌ی قبلی</label>
    <input name="title" type="password" />

    <label for="title">گذرواژه‌‌ی جدید</label>
    <input name="title" type="password" />

    <label for="title">تکرار جدید</label>
    <input name="title" type="password" />
</div>

<label for="body">پرونده</label>
<input type="file" name="content" id="file" />

<?php
include ('helper/user_role.php');
include ('helper/user_active.php');
include ('master/public-footer.php');
?>