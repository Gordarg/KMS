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
    exit(header("Location: admin.php?type=POST"));
   }
   include_once ('master/public-header.php');   
   ?>



<form action="login.php" method="post" class="modal-content" >
<div class="container">
    <img src="cms.svg" alt="logo" class="avatar">

    <label for="uname"><b>نام کاربری</b></label>
    <input type="text" placeholder="نام کاربری را وارد نمایید" name="user" required>

    <label for="pass"><b>کلمه‌ی عبور</b></label>
    <input type="password" placeholder="کلمه‌ی عبور را وارد نمایید" name="pass" required>

    <button type="submit" name="login" >ورود</button>
    <a href="index.php">انصراف</a>
    </div>
</div>
</form>

 <?php include_once ('master/public-footer.php'); ?> 