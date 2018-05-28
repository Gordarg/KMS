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
<form action="contactus.php">
  <label for="fname"><?= $functionalitiesInstance->label("نام"); ?></label>
  <input type="text" id="fname" name="firstname" >
  <label for="lname"><?= $functionalitiesInstance->label("نام خانوادگی"); ?></label>
  <input type="text" id="lname" name="lastname">
  <label for="email"><?= $functionalitiesInstance->label("ایمیل"); ?></label>
  <input type="email" id="email" name="email">
  <label for="subject"><?= $functionalitiesInstance->label("موضوع"); ?></label>
  <input type=" subject" id="subject" name="subject">
  <label for="text"><?= $functionalitiesInstance->label("متن"); ?></label>
  <textarea id="text" name="text" ></textarea>

  <input type="submit" value="<?= $functionalitiesInstance->label("ارسال"); ?>">
</form>
<?php
include_once ('master/public-footer.php');
?>