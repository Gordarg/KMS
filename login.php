<?php
   if (isset($_GET['way']) && ($_GET['way'] == 'bye'))
   {
      unset($_SESSION['PHP_AUTH_USER']);
      unset($_SESSION['PHP_AUTH_PW']);
      session_destroy();
      exit(header("Location: login.php"));
   }
   if (isset($_POST['login']))
   { 
     session_start();
     $_SESSION['PHP_AUTH_USER'] = $_POST['username'];
     $_SESSION['PHP_AUTH_PW'] = $_POST['password'];
     exit(header("Location: admin.php?type=POST"));
   }
   include_once ('core/public-header.php');   
   ?>
<script src="js/modernizr.js" type="text/javascript"></script>
<link rel="stylesheet" href="css/normalize.css">
<link rel='stylesheet prefetch' href='css/gubja.css'>
<link rel='stylesheet prefetch' href='css/yaozl.css'>
<link rel="stylesheet" href="css/style.css">
<div class="container">
   <div id="login" class="signin-card">
      <div class="logo-image">
         <img src="Gordarg.png" alt="نام‌واره‌ی گردرگ" title="گردرگ" width="138">
      </div>
      <h1 class="display1">ورود به سیستم</h1>
      <p class="subhead">سامانه‌ی مدیریت محتوی گرد</p>
      <form action="login.php" method="POST" class="" role="form">
         <div id="form-login-username" class="form-group">
            <input id="username" class="form-control" name="username" type="text" size="18" alt="login" required />
            <span class="form-highlight"></span>
            <span class="form-bar"></span>
            <label for="username" class="float-label">نام کاربری</label>
         </div>
         <div id="form-login-password" class="form-group">
            <input id="passwd" class="form-control" name="password" type="password" size="18" alt="password" required>
            <span class="form-highlight"></span>
            <span class="form-bar"></span>
            <label for="password" class="float-label">کلمه‌ی عبور</label>
         </div>
         <div id="form-login-remember" class="form-group">
            <div class="checkbox checkbox-default">       
               <input id="remember" type="checkbox" value="yes" alt="Remember me" class="">
               <label for="remember">مرا به خاطر بسپار</label>      
            </div>
         </div>
         <div>
            <input class="btn btn-block btn-info ripple-effect" type="submit" name="login" value="ورود" />
         </div>
         <div class="gordafarid-image">
           <a href="#">
            <img src="Gordafarid.png" alt="gordafarid" title="ورود با گردآفرید - غیر فعال" width="50">
           </a>
         </div>
       </div>
   </form>
</div>
</div>
<script src='js/jquery.min.js'></script>
<script src='js/gubja.js'></script>
<script src='js/yaozl.js'></script>
<script  src="js/index.js"></script>
<?php
   include_once ('core/public-footer.php');
   ?>