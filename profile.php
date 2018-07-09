<?php
include_once ('core/init.php');
include ('core/secure.php');
require_once 'core/functionalities.php';
use core\functionalities;
include ('master/public-header.php');

// TODO: username and password edit must be done
// image is a post
// There are `groups` that can contain `cv items`

$Username = $_SESSION['PHP_AUTH_USER'];

?>
<form>
<label for="title"><?= $functionalitiesInstance->label("نام کاربری"); ?></label>
<input name="username" type="text" value="<?= $Username ?>" />

<div class="pass">
    <label for="prev"><?= $functionalitiesInstance->label("گذرواژه‌ی قبلی"); ?></label>
    <input name="prev" type="password" />

    <label for="new"><?= $functionalitiesInstance->label("گذرواژه‌ی جدید"); ?></label>
    <input name="new" type="password" />

    <label for="confirm"><?= $functionalitiesInstance->label("گذرواژه‌ی تکرار"); ?></label>
    <input name="confirm" type="password" />
</div>
</form>
<?php
include ('helper/user_role.php');
include ('helper/user_active.php');
include ('master/public-footer.php');
?>