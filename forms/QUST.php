<input type="hidden" name="id" value="<?= $Id ?>" />
<input type="hidden" name="submit" value="<?= $Submit ?>" />
<input type="hidden" name="userid" value="<?= $UserID ?>" />
<input type="hidden" name="index" value="<?= $Index ?>" />
<input type="hidden" name="refrenceid" value="<?= $RefrenceID ?>" />
<input type="hidden" name="status" value="<?= $Status ?>" />
<?php /* $Body = '[{"type":"textarea","label":"Describe yourself in 3rd person","req":0}]' */ ?>
<input type="hidden" id="output" name="body" value="<?php echo htmlentities($Body) ?>" />
<input type="hidden" name="language" value="<?= $functionalitiesInstance->ifexistsidx($_COOKIE, 'LANG') ?>" />

<label for="title"><?= $functionalitiesInstance->label("عنوان"); ?></label>
<input name="title" required placeholder="<?= $functionalitiesInstance->label("عنوان"); ?>" type="text" value="<?= $Title ?>" />

<?php
if ($Id == null ) {
    echo '<input type="submit" name="insert" value="' . $functionalitiesInstance->label("ارسال") . '" />';
} else {
    echo '<input type="submit" name="update" value="' . $functionalitiesInstance->label("به‌روز رسانی") . '" />';
    echo '<input type="submit" name="delete" value="' . $functionalitiesInstance->label("حذف") . '" />';
}
    echo '<a href="index.php">' . $functionalitiesInstance->label("انصراف") . '</a>';
?>

