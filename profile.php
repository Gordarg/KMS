<?php
include_once ('core/init.php');
include ('core/secure.php');
require_once 'core/functionalities.php';
use core\functionalities;
require_once 'semi-orm/Posts.php';
use orm\Posts;
require_once 'semi-orm/Users.php';
use orm\Users;
if (isset($_POST["updatepass"])) {
    $User = new Users($conn);
    $User->ChangePassword(
        mysqli_real_escape_string($conn, $_POST['username']),
        mysqli_real_escape_string($conn, $_POST['prev']),
        mysqli_real_escape_string($conn, $_POST['new']),
        mysqli_real_escape_string($conn, $_POST['confirm'])
    );
}
include ('master/public-header.php');
$Username = $functionalitiesInstance->ifexistsidx($_SESSION, 'PHP_AUTH_USER');
$Post = new Posts($conn);
// TODO: username and password edit must be done
// image is a post
// There are `groups` that can contain `cv items`
// TODO: Alert if login failed
?>
<form action="profile.php" method="post">
    <label for="title"><?= $functionalitiesInstance->label("نام کاربری"); ?></label>
    <input name="username" type="text" value="<?= $Username ?>" />

    <div class="pass">
        <label for="prev"><?= $functionalitiesInstance->label("گذرواژه‌ی قبلی"); ?></label>
        <input name="prev" type="password" />

        <label for="new"><?= $functionalitiesInstance->label("گذرواژه‌ی جدید"); ?></label>
        <input name="new" type="password" />

        <label for="confirm"><?= $functionalitiesInstance->label("تکرار"); ?></label>
        <input name="confirm" type="password" />

        <input name="updatepass" type="submit" value="<?= $functionalitiesInstance->label("به روز رسانی"); ?>" />
    </div>
</form>
<?php
include ('helper/user_role.php');
include ('helper/user_active.php');
/*
// TODO: List user posts
$rows=[];
$rows = (new Posts($conn))->
    ToList(0, 48, "Submit", "DESC",
    "WHERE (`Level` = 1 OR `Level` = 2) AND `LANGUAGE`='" . $_COOKIE['LANG'] . "'");
foreach ($rows as $row) {
    if ($row['Level'] != '1')
        continue;
    $_GET['masterid'] = $row['MasterID'];
    $_GET["level"] = '1';
    $_GET["type"] = 'POST';
    include ('views/render.php');
}
*/
include ('master/public-footer.php');
?>