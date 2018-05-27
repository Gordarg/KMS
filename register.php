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
    <h1 style="text-align:center">ثبت نام</h1>
    <p>لطفا جهت ایجاد حساب کاربری فرم زیر را تکمیل کنبد</p>
    <hr>
    <label for="username"><b>نام کاربری</b></label>
    <input type="text" name="username" required>
    
    <label for="password"><b>گذرواژه</b></label>
    <input type="password" name="password" required>
    
    <p>با ثبت نام در این وب‌سایت، شما <a href="#" style="color:dodgerblue">قوانین ما و تعهدات حریم شخصی</a> را پذیرفته اید.</p>

    <div class="clearfix">
    <button type="submit" class="signupbtn" name="btn" >ثبت نام</button>
    <a href="index.php">انصراف</a>
    </div>
</div>
</form>

<?php include_once ('master/public-footer.php'); ?> 