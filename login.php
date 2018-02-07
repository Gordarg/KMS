<!--
Copyright (c) 2018 by Sergey Kupletsky (https://codepen.io/zavoloklom/pen/Khbxm)


Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.



A Pen created at CodePen.io. You can find this one at https://codepen.io/zavoloklom/pen/Khbxm.

 Based on:
- Flat Login Form (http://codepen.io/zavoloklom/pen/siKdh/)
- Material Design by Google (http://www.google.com/design/)
- Form (http://codepen.io/zavoloklom/full/yaozl)
- Buttons (http://codepen.io/zavoloklom/pen/Gubja)
-->

<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Material Login Form</title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js" type="text/javascript"></script>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

  <link rel='stylesheet prefetch' href='css/gubja.css'>
<link rel='stylesheet prefetch' href='css/yaozl.css'>

      <link rel="stylesheet" href="css/style.css">

  
</head>

<body>

  <div class="container">
<div id="login" class="signin-card">
  <div class="logo-image">
  <img src="http://www.officialpsds.com/images/thumbs/Spiderman-Logo-psd59240.png" alt="Logo" title="Logo" width="138">
  </div>
  <h1 class="display1">Title</h1>
  <p class="subhead">Description</p>
  <form action="" method="" class="" role="form">
    <div id="form-login-username" class="form-group">
      <input id="username" class="form-control" name="username" type="text" size="18" alt="login" required />
      <span class="form-highlight"></span>
      <span class="form-bar"></span>
      <label for="username" class="float-label">login</label>
    </div>
    <div id="form-login-password" class="form-group">
      <input id="passwd" class="form-control" name="password" type="password" size="18" alt="password" required>
      <span class="form-highlight"></span>
      <span class="form-bar"></span>
      <label for="password" class="float-label">password</label>
    </div>
    <div id="form-login-remember" class="form-group">
      <div class="checkbox checkbox-default">       
          <input id="remember" type="checkbox" value="yes" alt="Remember me" class="">
          <label for="remember">Remember me</label>      
      </div>
    </div>
    <div>
      <button class="btn btn-block btn-info ripple-effect" type="submit" name="Submit" alt="sign in">Sign in</button>  
	  </div>

    </div>
  </form>
</div>
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='js/gubja.js'></script>
<script src='js/yaozl.js'></script>

  

    <script  src="js/index.js"></script>




</body>

</html>