<input type="hidden" name="id" value="<?= $Id ?>" />
<input type="hidden" name="masterid" value="<?= $MasterID ?>" />
<input type="hidden" name="submit" value="<?= $Submit ?>" />
<input type="hidden" name="userid" value="<?= $UserID ?>" />
<input type="hidden" name="refrenceid" value="<?= $RefrenceID ?>" />
<a href="answer.php?lang=<?= $Language ?>&id=<?= $MasterID ?>"><?= $functionalitiesInstance->label("مشاهده") ?></a>
<input type="submit" name="blocked" value="<?= $functionalitiesInstance->label("رد") ?>" />
<input type="submit" name="accepted" value="<?= $functionalitiesInstance->label("تائید") ?>" />