<?php
/*
TODO: Security Check for permission
*/
include_once ('core/init.php');
include ('core/secure.php');
require_once 'core/functionalities.php';
use core\functionalities;
require_once 'semi-orm/Users.php';
use orm\Users;
$user = new Users($conn);
require_once 'semi-orm/Posts.php';
use orm\Posts;
$post = new Posts($conn);
$Id = $functionalitiesInstance->ifexistsidx($_GET, 'id');
$LoggedInUserId = $functionalitiesInstance->ifexistsidx($_SESSION, 'PHP_AUTH_ID');
$Role = $user->GetRoleById($LoggedInUserId);
if (isset($_POST["updatepass"])) {
    $user->ChangePassword(
        ($Role != 'ADMIN'),
        $functionalitiesInstance->ifexistsidx($_POST, 'id'),
        mysqli_real_escape_string($conn, $_POST['username']),
        mysqli_real_escape_string($conn, $_POST['prev']),
        mysqli_real_escape_string($conn, $_POST['new']),
        mysqli_real_escape_string($conn, $_POST['confirm'])
    );
}
include ('master/public-header.php');
$Username = $user->GetUsernameById($Id);
?>
<form action="profile.php" method="post" id="edit">
    <label for="title"><?= $functionalitiesInstance->label("نام کاربری"); ?></label>
    <input name="username" readonly type="text" value="<?= $Username ?>" />
    <div class="pass">
        <input name="id" type="hidden" value="<?= $Id ?>" />
        <?php
        if ($Role != 'ADMIN' || $LoggedInUserId == $Id)
        {
            echo '<label for="prev">' . $functionalitiesInstance->label("گذرواژه‌ی قبلی") . '</label>';
            echo '<input name="prev" type="password" />';
        }
        else
        {
            echo '<input name="prev" type="hidden" />';
        }
        ?>
        <label for="new"><?= $functionalitiesInstance->label("گذرواژه‌ی جدید"); ?></label>
        <input name="new" type="password" />
        <label for="confirm"><?= $functionalitiesInstance->label("تکرار"); ?></label>
        <input name="confirm" type="password" />
        <input name="updatepass" type="submit" value="<?= $functionalitiesInstance->label("به روز رسانی"); ?>" />
    </div>
</form>
<section>
    <img src="drawable/profile.png"  />
    <a href="#"><?= $functionalitiesInstance->label("نام کاربری") .': ' . $Username ?></a>
    <a id="changepass" href="#" ><?= $functionalitiesInstance->label("تغییر کلمه‌ی عبور") ?></a>
    <a href="payment.php"><?= $functionalitiesInstance->label("تراکنش های ملی") ?></a>
    <a href="box.php"><?= $functionalitiesInstance->label("جعبه") ?></a>
    <a href="search.php?Q=%40<?= $Username ?>"><?= $functionalitiesInstance->label("فعالیت") ?></a>
    <a href="database.php" ><?= $functionalitiesInstance->label("پایگاه داده") ?></a>
</section>
<section>
    <?php
    $rows = $post->ToList(-1, -1, "Status", "ASC", "WHERE `Type` = 'ANSR' AND (`UserID` = " . mysqli_real_escape_string($conn, $functionalitiesInstance->ifexistsidx($_GET, 'id')) . ")");
    foreach ($rows as $row) {        
        $refrence = $post->FirstOrDefault($row['RefrenceID']);
        $_GET["level"] = 'profile';
        $_GET["type"] = 'ANSR';
        include ('views/render.php');
    }
    ?>
</section>
<?php
include ('helper/user_role.php');
include ('helper/user_active.php');
include ('master/public-footer.php');
?>