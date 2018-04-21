<input type="hidden" name="submit" value="<?= $Submit ?>" />
<input type="hidden" name="userid" value="<?= $UserID ?>" />
<input type="hidden" name="refrenceid" value="<?= $RefrenceID ?>" />
<input type="hidden" name="status" value="<?= $Status ?>" />

<label for="body">متن</label>
<textarea name="body"><?= $Body  ?></textarea>
<?php
if ($Id == "" ) {
    echo '<input type="submit" name="insert" value="ارسال" />';
} else {
    echo '<input type="submit" name="update" value="به روز رسانی" />';
    echo '<input type="submit" name="delete" value="حذف" />';
    echo '<input type="submit" name="clear" value="حذف پیوست" />';
}
?>