<input type="hidden" name="id" value="<?= $Id ?>" />
<input type="hidden" name="submit" value="<?= $Submit ?>" />
<input type="hidden" name="userid" value="<?= $UserID ?>" />
<input type="hidden" name="index" value="<?= $Index ?>" />
<input type="hidden" name="refrenceid" value="<?= $RefrenceID ?>" />
<input type="hidden" name="status" value="<?= $Status ?>" />


<select name="language">
  <option <?= ($Language == "fa-IR") ? "selected" : ""  ?> value="1">🇮🇷</option>
  <option <?= ($Language == "en-US") ? "selected" : ""  ?> value="2">🇺🇸</option>
  <option <?= ($Language == "ru-RU") ? "selected" : ""  ?> value="3">🇷🇺</option>
</select>

<label for="title"><?= $functionalitiesInstance->label("عنوان"); ?></label>
<input name="title" placeholder="<?= $functionalitiesInstance->label("عنوان"); ?>" type="text" value="<?= $Title ?>" />

<label for="level"><?= $functionalitiesInstance->label("مرتبه"); ?></label>
<select name="level">
  <option <?= ($Level == "1") ? "selected" : ""  ?> value="1"><?= $functionalitiesInstance->label("سریع"); ?> - <?= $functionalitiesInstance->label("بالا"); ?></option>
  <option <?= ($Level == "2") ? "selected" : ""  ?> value="2"><?= $functionalitiesInstance->label("متوسط"); ?> - <?= $functionalitiesInstance->label("مرکز"); ?></option>
  <option <?= ($Level == "3") ? "selected" : ""  ?> value="3"><?= $functionalitiesInstance->label("کند"); ?> - <?= $functionalitiesInstance->label("پایین"); ?></option>
</select>

<label for="body"><?= $functionalitiesInstance->label("متن"); ?></label>
<textarea name="body"><?= $Body  ?></textarea>
<label for="body"><?= $functionalitiesInstance->label("پرونده"); ?></label>
<input type="file" name="content" id="file" />
<?php
/*
TODO: create drafting and publish mechanisms
      based on user role

    echo '<input type="submit" name="draft" value="پیش‌نویس" />';
    echo '<input type="submit" name="edit" value="ویرایش" />';
    echo '<input type="submit" name="publish" value="انتشار عمومی" />';
    echo '<input type="submit" name="burn" value="لغو انتشار" />';
*/
if ($Id == null ) {
    echo '<input type="submit" name="insert" value="' . $functionalitiesInstance->label("ارسال") . '" />';
} else {
    echo '<input type="submit" name="update" value="' . $functionalitiesInstance->label("به‌روز رسانی") . '" />';
    echo '<input type="submit" name="delete" value="' . $functionalitiesInstance->label("حذف") . '" />';
    echo '<input type="submit" name="clear" value="' . $functionalitiesInstance->label("حذف پیوست") . '" />';
}
    echo '<a href="index.php">' . $functionalitiesInstance->label("انصراف") . '</a>';
?>