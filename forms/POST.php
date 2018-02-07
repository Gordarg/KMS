<input type="hidden" name="submit" value="<?= $Submit ?>" />
<input type="hidden" name="userid" value="<?= $UserID ?>" />
<input type="hidden" name="index" value="<?= $Index ?>" />
<input type="hidden" name="refrenceid" value="<?= $RefrenceID ?>" />
<input type="hidden" name="status" value="<?= $Status ?>" />

<label for="title">عنوان</label>
<input name="title" placeholder="عنوان را وارد نمایید" type="text" value="<?= $Title ?>" />

<label for="level">مرتبه</label>
<input name="level" value="<?= $Level ?>"  type="number" name="quantity" min="1" max="3" />

<label for="categoryid">انتخاب دسته بندی</label>
<input type="text" value="<?= $CategoryID ?>" name="categoryid" list="categories" />
<datalist id="categories" name="categoryid">
<?php
/* TODO
$category_query = "select Id, Name from categories";
$category_result = mysqli_query($conn, $category_query);
$category_num = mysqli_num_rows($category_result);
for ($i = 0; $i < $category_num; $i ++) {
    $category_row = mysqli_fetch_array($category_result);
    echo '  <option value="' . $category_row['Id'] . '"' . (($category_row['Id'] == $CategoryID)?(" selected") : ("")) . '>' . $category_row['Name'] . '</option>';
}
*/
?>
</datalist>
<label for="body">متن</label>
<textarea name="body"><?= $Body  ?></textarea>
<label for="body">پرونده</label>
<input type="file" name="content" id="file" />