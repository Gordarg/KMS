<input type="hidden" name="id" value="<?= $Id ?>" />
<input type="hidden" name="submit" value="<?= $Submit ?>" />
<input type="hidden" name="body" value="<?= $Body ?>" />
<textarea><?= $Body ?></textarea>
<input type="hidden" name="index" value="<?= $Index ?>" />
<input type="hidden" name="userid" value="<?= $UserID ?>" />
<input type="hidden" name="language" value="<?= $Language ?>" />
<input type="hidden" name="refrenceid" value="<?= $RefrenceID ?>" />
<a href="answer.php?lang=<?= $Language ?>&id=<?= $MasterID ?>"><?= $functionalitiesInstance->label("مشاهده") ?></a>
<input type="submit" name="blocked" value="<?= $functionalitiesInstance->label("رد") ?>" />
<input type="submit" name="approve" value="<?= $functionalitiesInstance->label("تائید") ?>" />