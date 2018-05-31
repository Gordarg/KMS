<?php
require_once 'core/init.php';
require_once 'core/functionalities.php';
require_once $parent . '/semi-orm/Users.php';
require_once $parent . '/semi-orm/Users.php';
use orm\Users;
if(isset($_POST["btn"]))
{
    $conn  = $db->open();
    $User = new Users($conn);
    $User->Insert([
        ["Username", "'" . mysqli_real_escape_string($conn, $_POST['username']) . "'"],
        ["Password", "'" . mysqli_real_escape_string($conn, $_POST['password']) . "'"],
    ]);
    header("Location: " . $npath . '/login.php');
}
include_once ('master/public-header.php');
?>
<form action="register.php" method="post" >
    <h1><?= $functionalitiesInstance->label("ثبت نام"); ?></h1>

    <label for="username"><?= $functionalitiesInstance->label("نام کاربری"); ?></label>
    <input type="text" name="username" required>
    
    <label for="password"><?= $functionalitiesInstance->label("کلمه‌ی عبور"); ?></label>
    <input type="password" name="password" required>
    
    <button type="submit" name="btn" ><?= $functionalitiesInstance->label("ثبت نام"); ?></button>
    <a href="index.php"><?= $functionalitiesInstance->label("انصراف"); ?></a>
</form>

<?php include_once ('master/public-footer.php'); ?> 