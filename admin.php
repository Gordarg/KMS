<?php
include ('core/auth.php');
require_once 'core/functionalities.php';
use core\functionalities;
$path = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]" . "$_SERVER[REQUEST_URI]";
include ('forms/submit.php');
include ('core/public-header.php');
?>

<div class="switch-field">

    <div class="switch-title">قصد ارسال چه محتوایی دارید؟</div>

    <input id="switch_right" onchange="mode();" type="radio" name="type" value="FILE" <?php echo (($_GET['type'] == "FILE") ? 'checked="checked"' : "") ?>>
    <label for="switch_right">فایل</label>

    <input id="switch_1" onchange="mode();" type="radio" name="type" value="SURV" <?php echo (($_GET['type'] == "SURV") ? 'checked="checked"' : '') ?>/>
    <label for="switch_1">سنجش</label>

    <input id="switch_2" onchange="mode();" type="radio" name="type" value="ARTL" <?php echo (($_GET['type'] == "ARTL") ? 'checked="checked"' : '') ?>/>
    <label for="switch_2">مقاله</label>

    <input id="switch_3" onchange="mode();" type="radio" name="type" value="QUST" <?php echo (($_GET['type'] == "QUST") ? 'checked="checked"' : '') ?>/>
    <label for="switch_3">پرسش</label>

    <input id="switch_4" onchange="mode();" type="radio" name="type" value="ANSR" <?php echo (($_GET['type'] == "ANSR") ? 'checked="checked"' : '') ?>/>
    <label for="switch_4">پاسخ</label>

    <input id="switch_5" onchange="mode();" type="radio" name="type" value="COMT" <?php echo (($_GET['type'] == "COMT") ? 'checked="checked"' : '') ?>/>
    <label for="switch_5">دیدگاه</label>

    <input id="switch_6" onchange="mode();" type="radio" name="type" value="TRNL" <?php echo (($_GET['type'] == "TRNL") ? 'checked="checked"' : '') ?>/>
    <label for="switch_6">ترجمه</label>

    <input id="switch_left" onchange="mode();" type="radio" name="type" value="POST" <?php echo (($_GET['type'] == "POST") ? 'checked="checked"' : '') ?>/>
    <label for="switch_left">پست</label>

</div>
<script src="scripts/admin.js"></script>

<?php
include ('forms/render.php');
include ('core/public-footer.php');
?>