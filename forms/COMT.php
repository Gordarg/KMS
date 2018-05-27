<input type="hidden" name="submit" value="<?= $Submit ?>" />
<input type="hidden" name="userid" value="<?= $UserID ?>" />
<input type="hidden" name="refrenceid" value="<?= $RefrenceID ?>" />
<input type="hidden" name="status" value="<?= $Status ?>" />
<label for="body"><?= $functionalitiesInstance->label("دیدگاه"); ?></label>
<textarea name="body"><?= $Body  ?></textarea>
<input type="submit" name="insert" value="<?= $functionalitiesInstance->label("ارسال"); ?>" />