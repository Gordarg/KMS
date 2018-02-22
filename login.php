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
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="Gordarg.png" alt="Gordarg logo" class="avatar">
    </div>

    <div class="container">
      <label for="uname"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="user" required>

      <label for="pass"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="pass" required>

      <button type="submit" name="login" >Login</button>
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
        <span class="psw">Forgot <a href="#">password?</a>
      <label>
        <input type="checkbox" checked="checked" name="remember"> Remember me
      </label>   
    </div>
    </div>


  </form>
</div>

 <?php include_once ('core/public-footer.php'); ?> 