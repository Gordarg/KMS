<input type="hidden" name="id" value="<?= $Id ?>" />
<input type="hidden" name="submit" value="<?= $Submit ?>" />
<input type="hidden" name="userid" value="<?= $UserID ?>" />
<input type="hidden" name="index" value="<?= $Index ?>" />
<input type="hidden" name="refrenceid" value="<?= $RefrenceID ?>" />
<input type="hidden" name="status" value="<?= $Status ?>" />
<input type="hidden" name="language" value="<?= $_COOKIE["LANG"] ?>" />

<label for="title"><?= $functionalitiesInstance->label("اسم"); ?></label>
<input name="title" placeholder="<?= $functionalitiesInstance->label("اسم"); ?>" type="text" value="<?= $Title ?>" />

<input type="file" name="content" id="file" />
<?php
if ($Id == null ) {
    echo '<input type="submit" name="insert" value="' . $functionalitiesInstance->label("ارسال") . '" />';
} else {
    echo '<input type="submit" name="update" value="' . $functionalitiesInstance->label("به‌روز رسانی") . '" />';
    echo '<input type="submit" name="delete" value="' . $functionalitiesInstance->label("حذف") . '" />';
}
    echo '<a href="index.php">' . $functionalitiesInstance->label("انصراف") . '</a>';
?>