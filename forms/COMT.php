<input type="hidden" name="submit" value="<?= $Submit ?>" />
<input type="hidden" name="userid" value="<?= $UserID ?>" />
<input type="hidden" name="refrenceid" value="<?= $RefrenceID ?>" />
<input type="hidden" name="status" value="<?= $Status ?>" />
<label for="title"><?= $functionalitiesInstance->label("دیدگاه"); ?></label>
<input type="text" name="title" value="<?= $Body  ?>" />
<input type="submit" name="insert" value="<?= $functionalitiesInstance->label("ارسال"); ?>" />