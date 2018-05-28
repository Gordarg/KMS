<?php
include_once ('master/public-header.php');
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
}
?>
<form action="register.php" method="post" class="modal-content" >
<div class="container">
    <h1 style="text-align:center"><?= $functionalitiesInstance->label("ثبت نام"); ?></h1>

    <label for="username"><?= $functionalitiesInstance->label("نام کاربری"); ?></label>
    <input type="text" name="username" required>
    
    <label for="password"><?= $functionalitiesInstance->label("کلمه‌ی عبور"); ?></label>
    <input type="password" name="password" required>

    <div class="clearfix">
    <button type="submit" class="signupbtn" name="btn" ><?= $functionalitiesInstance->label("ثبت نام"); ?></button>
    <a href="index.php"><?= $functionalitiesInstance->label("انصراف"); ?></a>
    
</div>
</form>

<?php include_once ('master/public-footer.php'); ?> 