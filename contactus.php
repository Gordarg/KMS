<?php
include_once ('master/public-header.php');

if (isset($_POST['send']))
{
$to      = config::WebMaster;
$subject = $_POST['subject'];
$message = $_POST['text'];
$headers = 'From: ' . $_POST['email'] . "\r\n" .
    'Reply-To: ' . $_POST['email'] . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);
}
?>

<div class="container">
  <form action="contactus.php">
    <label for="fname">نام</label>
    <input type="text" id="fname" name="firstname" placeholder="نام..">
    <label for="lname">نام خانوادگی</label>
    <input type="text" id="lname" name="lastname" placeholder="نام خانوادگی..">
    <label for="email">ایمیل</label>
    <input type=" email" id="email" name="email" placeholder="ایمیل.">
    <label for="subject">موضوع</label>
    <input type=" subject" id="subject" name="subject" placeholder="موضوع...">
    <label for="text">متن</label>
    <textarea id="text" name="text" placeholder="متن را بنویسید.." style="height:200px"></textarea>

    <input type="submit" value="ارسال">
  </form>
</div>
<?php
include_once ('master/public-footer.php');
?>