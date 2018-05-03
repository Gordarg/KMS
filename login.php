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
   include_once ('core/public-header.php');   
   ?>

<div id="id01" class="modal">

  <form class="modal-content animate" action="login.php" method="post">
    <div class="imgcontainer">
      <img src="Gordarg.png" alt="Gordarg logo" class="avatar">
    </div>

    <div class="container">
      <label for="uname"><b>نام کاربری</b></label>
      <input type="text" placeholder="نام کاربری را وارد نمایید" name="user" required>

      <label for="pass"><b>کلمه‌ی عبور</b></label>
      <input type="password" placeholder="کلمه‌ی عبور را وارد نمایید" name="pass" required>

      <button type="submit" name="login" >ورود</button>
    </div>
    </div>


  </form>
</div>

 <?php include_once ('core/public-footer.php'); ?> 