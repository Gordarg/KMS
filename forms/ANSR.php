<input type="hidden" name="id" value="<?= $Id ?>" />
<input type="hidden" name="submit" value="<?= $Submit ?>" />
<input type="hidden" name="userid" value="<?= $UserID ?>" />
<input type="hidden" name="index" value="<?= $Index ?>" />
<input type="hidden" name="status" value="<?= $Status ?>" />
<input type="hidden" name="refrenceid" value="<?= $RefrenceID ?>" />
<input type="hidden" name="status" value="<?= $Status ?>" />
<input type="hidden" name="language" value="<?= $functionalitiesInstance->ifexistsidx($_COOKIE, 'LANG') ?>" />
<h1><?= $row['Title'] ?></h1>
<div id="sjfb-fields"></div>
<input type="submit" name="insert" value="<?= $functionalitiesInstance->label("ارسال") ?>" />