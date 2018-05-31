<?php
include ('core/init.php');
if (isset($_GET['way']) && ($_GET['way'] == 'bye'))
{
    session_destroy();
    exit(header("Location: login.php"));
}
if (isset($_POST['login']))
{
    $_SESSION['PHP_AUTH_USER'] = $_POST['user'];
    $_SESSION['PHP_AUTH_PW'] = $_POST['pass'];
    exit(header("Location: post.php"));
}
include_once ('master/public-header.php');   
?>
<form action="login.php" method="post">
    <img src="cms.svg" alt="logo" class="avatar">

    <label for="user"><?= $functionalitiesInstance->label("نام کاربری"); ?></label>
    <input type="text" name="user" required>

    <label for="pass"><?= $functionalitiesInstance->label("کلمه‌ی عبور"); ?></label>
    <input type="password" placeholder="کلمه‌ی عبور را وارد نمایید" name="pass" required>

    <button type="submit" name="login" ><?= $functionalitiesInstance->label("ورود"); ?></button>
    <a href="index.php"><?= $functionalitiesInstance->label("انصراف"); ?></a>
</form>
<?php include_once ('master/public-footer.php'); ?> 