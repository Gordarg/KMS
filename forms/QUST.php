<input type="hidden" name="id" value="<?= $Id ?>" />
<input type="hidden" name="submit" value="<?= $Submit ?>" />
<input type="hidden" name="userid" value="<?= $UserID ?>" />
<input type="hidden" name="index" value="<?= $Index ?>" />
<input type="hidden" name="refrenceid" value="<?= $RefrenceID ?>" />
<input type="hidden" name="status" value="<?= $Status ?>" />
<input type="hidden" name="level" value="<?= $Level ?>" />
<input type="hidden" name="language" value="<?= $_COOKIE["LANG"] ?>" />

<label for="title"><?= $functionalitiesInstance->label("عنوان"); ?></label>
<input name="title" placeholder="<?= $functionalitiesInstance->label("عنوان"); ?>" type="text" value="<?= $Title ?>" />
<label for="body"><?= $functionalitiesInstance->label("متن"); ?></label>
<textarea name="body"><?= $Body  ?></textarea>

<!------------------------------>
<div id="sjfb-body">
<div id="sjfb-wrap">

<h1>Simple Jquery Form Builder - Demo</h1>

<p>The form builder below was loaded in from a json string.<br>
    <a href="form.html">View form (rendered from the demo json string) here</a>.
</p>

<div class="alert hide">
    <h2>Success! Form saved.</h2>
    <p>Here is what your saved form will look like in your database:</p>
    <textarea></textarea>
</div>

<div class="add-wrap">
    <h3>Add Field:</h3>
    <ul id="add-field">
        <li><a id="add-text" data-type="text" href="#">Single Line Text</a></li>
        <li><a id="add-textarea" data-type="textarea" href="#">Multi Line Text</a></li>
        <li><a id="add-select" data-type="select" href="#">Select Box (Drop down list)</a></li>
        <li><a id="add-radio" data-type="radio" href="#">Radio Buttons</a></li>
        <li><a id="add-checkbox" data-type="checkbox" href="#">Checkboxes</a></li>
        <li><a id="add-agree" data-type="agree" href="#">Agree Box</a></li>
    </ul>
</div>

<form id="sjfb" novalidate>
    <div id="form-fields">
    </div>
    <button type="submit" class="submit">Save Form</button>
</form>

</div>
</div>

<!------------------------------>

<?php
if ($Id == null ) {
    echo '<input type="submit" name="insert" value="' . $functionalitiesInstance->label("ارسال") . '" />';
} else {
    echo '<input type="submit" name="update" value="' . $functionalitiesInstance->label("به‌روز رسانی") . '" />';
    echo '<input type="submit" name="delete" value="' . $functionalitiesInstance->label("حذف") . '" />';
}
    echo '<a href="index.php">' . $functionalitiesInstance->label("انصراف") . '</a>';
?>