<?php
include_once ('core/public-header.php');
?>

<div class="container">
  <form action="/action_page.php">
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
//متغیر دریافت آی پی مخاطب
@$pfw_ip= $_SERVER['REMOTE_ADDR']; 
//متغیر دریافت نام و نام خانوادگی
@$firstName = addslashes($_POST['firstName']); 
@$lastName = addslashes($_POST['lastname']);
//متغیر دریافت پست الکترونیک مخاطب
@$EMail = addslashes($_POST['email']); 
//متغیر دریافت موضوع پیام
@$subject = addslashes($_POST['subject']); 
//متغیر دریافت متن پیام
@$subject = addslashes($_POST['text']); 
//بخش ارسال مشخصات به ایمیل شما
. "Reply-To: $EMail\n";
$header .= "Content-Type: text/plain; charset=UTF-8\n";
$subject = '=?UTF-8?B?'.base64_encode($subject).'?=';
$email_to = "YOUR-EMAIL-HERE";
$message = "آی پی مخاطب: $pfw_ip\n"
. "نام و نام خانوادگی: $firstName\n"
. "ایمیل: $EMail\n"
. "موضوع پیام: $subject\n";
. "متن پیام: $text\n";
@mail($email_to, $subject ,$message ,$header ) ; 
//درصورتی که فرم به درستی تکمیل شده باشد پیام زیر برای مخاطب نمایش داده می شود
echo(" با تشکر ، پیام شما با موفقیت ارسال گردید");
?>

<?php
include_once ('core/public-footer.php');
?>