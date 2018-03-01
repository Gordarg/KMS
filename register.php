<?php

/* TODO : IMPORTANTTTTT!!!!!!!!!!!!!!!!!!!!! */

if(isset($_POST["btn"]))
{
    
    if($_POST["txt5"]=="" and $_POST["txt6"]=="")
    {
	    
		header("location:register.php?empty=1010");
		exit;
		
    }

	$a="INSERT INTO `users` (`id`, `username`, `password`, `Image`, `Active`, `Role`) VALUES (NULL, 'kokab', '123', NULL, b'1', 'VSTOR')";
    $b=mysqli_query($conn, $a);
    
	if($b)
	{
	header("location:register.php?ok=2020");
	exit;
	}
	else
	{
		header("location:register.php?error=3030");
		exit;
    }
    
}
?>
<!doctype html>
<html>
<head>
<style>
body{font-family:Arial, Helvetica, sans-serif;}
input[type=text],input[type=password]{width:100%;
padding:15px;
margin:5px 0px 22 0;
display: oinline-block;
border:none;
background: #f1f1f1;
}
input[type=txt]:focus,input[type=password]:focus{background-color:#ddd;
outline:none;}
button{
	background: #4caf50;
	color:white;
	padding: 14px 20px;
	margin: 8px 0px;
	border:none;
	cursor: pointer;
	width:100%;
	opacity:0.9;}
	button:hover {
    opacity:1;
}.cancelbtn {
    padding: 14px 20px;
    background-color: #f44336;
}.cancelbtn, .signupbtn {
  float: left;
  width: 50%;
}.container {
    padding: 16px;
}.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: #474e5d;
    padding-top: 50px;
}.modal-content {
    background-color: #fefefe;
    margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
    border: 1px solid #888;
    width: 80%; /* Could be more or less, depending on screen size */
}hr {
    border: 1px solid #f1f1f1;
    margin-bottom: 25px;
}.close {
    position: absolute;
    right: 35px;
    top: 15px;
    font-size: 40px;
    font-weight: bold;
    color: #f1f1f1;
}.close:hover,
.close:focus {
    color: #f44336;
    cursor: pointer;
}.clearfix::after {
    content: "";
    clear: both;
    display: table;
}@media screen and (max-width: 300px) {
    .cancelbtn, .signupbtn {
       width: 100%;
    }
}
	
</style>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<?php
if(isset($_GET["empty"]))
{
		echo "<font  color=#FF0000>"."کادرها خالی رها شده اند"."</font>";

}
if(isset($_GET["ok"]))
{
	echo "<font color=#00CC33>"."اطلاعات با موفقیت ثبت شد"."</font>";
}
if(isset($_GET["error"]))
{
	echo "<font  color=#FF0000>"."مشکل در ثبت نام"."</font>";
}

?>
<button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Sign Up</button>

<div id="id01" class="modal">
  <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
  <form action="register.php" method="post" class="modal-content" >
    <div class="container">
      <h1 style="text-align:center">فرم ثبت نام</h1>
      <p>لطفا جهت ایجاد حساب کاربری فرم زیر را تکمیل کنبد</p>
      <hr>
    <!--  <label for="fname"><b>firstname</b></label>
      <input type="text" placeholder="Enter firstname" name="txt1" required>

      <label for="lname"><b>lastname</b></label>
      <input type="text" placeholder="Enter lastname" name="txt2" required>

      <label for="city"><b>city</b></label>
      <input type="text" placeholder="Enter city" name="txt3" required>
      
      <label for="age"><b>age</b></label>
      <input type="text" placeholder="Enter age" name="txt4" required>-->

      <label for="username"><b>username</b></label>
      <input type="text" placeholder="Enetr username" name="txt5" required>
      
      <label for="password"><b>password</b></label>
      <input type="password" placeholder="Enter password" name="txt6" required>
      
      <label>
        <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
      </label>

      <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

      <div class="clearfix">
        <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn"  >Cancel</button>
        <button type="submit" class="signupbtn" name="btn" >sign up</button>
      </div>
    </div>
  </form>
</div>
</body>

</html>