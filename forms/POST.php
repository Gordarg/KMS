
<label for="title">عنوان</label>
<input name="title" placeholder="عنوان را وارد نمایید" type="text" value="<?php echo $functionalitiesInstance->ifexistsidx($row,'Title')  ?>" />

<label for="refrenceid">مرجع</label>
<input name="refrenceid" type="text" value="<?php echo $functionalitiesInstance->ifexistsidx($row,'RefrenceId')  ?>" />

<label for="categoryid">انتخاب دسته بندی</label>
<input type="text" name="categoryid" list="categories" />
<datalist id="categories" name="categoryid">
<?php
/* TODO
$category_query = "select Id, Name from categories";
$category_result = mysqli_query($conn, $category_query);
$category_num = mysqli_num_rows($category_result);
for ($i = 0; $i < $category_num; $i ++) {
    $category_row = mysqli_fetch_array($category_result);
    echo '  <option value="' . $category_row['Id'] . '"' . (($category_row['Id'] == $row['CategoryID'])?(" selected") : ("")) . '>' . $category_row['Name'] . '</option>';
}
*/
?>
</datalist>
<label for="body">متن</label>
<textarea name="body"><?= $functionalitiesInstance->ifexistsidx($row,'Body')  ?></textarea>
<label for="body">پرونده</label>
<input type="file" name="content" id="file" />