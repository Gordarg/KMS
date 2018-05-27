<?php
include ('core/auth.php');
require_once $parent . '/semi-orm/Categories.php';
use orm\Categories;
$conn  = $db->open();
$category = new Categories($conn);
require_once $parent . '/core/functionalities.php';
use core\functionalities;
$functionalitiesInstance = new functionalities();
$Id = $functionalitiesInstance->ifexistsidx($_GET, 'edit');
$fatherid = $functionalitiesInstance->ifexistsidx($_GET, 'father');
$name = null;
if ($Id != null)
{
	$row = $category->FirstOrDefault($Id);
	$name = $row['Name'];
}
if (isset($_POST['save']) || isset($_POST['del']))
{
	$Id = $functionalitiesInstance->ifexistsidx($_POST, 'id');
	if (isset($_POST['save']) && $Id == null)
		$category->Insert([
			["Name", "'" . mysqli_real_escape_string($conn, $_POST['name']) . "'"],
			['Father',  ($fatherid == null) ? "NULL" : "'" . mysqli_real_escape_string($conn, $fatherid) . "'"]
		]);
	else if (isset($_POST['save']) && $Id != null)
		$category->Update($Id, [
			["Name", "'" . mysqli_real_escape_string($conn, $_POST['name']) . "'"],
			['Father',  ($fatherid == null) ? "NULL" : "'" . mysqli_real_escape_string($conn, $fatherid) . "'"]
		]);
	else if (isset($_POST['del'])) 
		$category->Delete(mysqli_real_escape_string($conn, $Id));
}
include ('master/public-header.php');
?>

<form method="post" action="category.php" >
	<label>عنوان</label>
	<input type="hidden" name="id" value="<?php echo $Id; ?>">
	<input type="text" name="name" value="<?php echo $name; ?>">
	<input type="text" value="<?= $fatherid ?>" name="father" list="categories" />
	<datalist id="categories" name="categoryid">
	<?php
		foreach ($category->ToList(-1, -1, "Name", "DESC", "") as $category_row)
			echo '<option value="' . $category_row['Id'] . '" >' . $category_row['Name'] . '</option>';
	?>
	</datalist>
	<button class="btn" type="submit" name="save">ذخیره</button>
	<button class="btn" type="submit" name="del">حذف</button>
</form>
<table>
	<thead>
		<tr>
			<th>عنوان</th>
			<th colspan="2"></th>
		</tr>
	</thead>
	<?php $results = $category->ToList(0, 100, 'Id', 'ASC', ($fatherid == NULL) ? "" : "WHERE `Father` = '" . $fatherid . "'"); ?>
	<?php foreach ($results as $roww) { ?>
		<tr>
			<td><?php echo $roww['Name']; ?></td>
			<td>
				<a href="category.php?edit=<?php echo $roww['Id']; ?>" class="edit_btn">ویرایش</a>
			</td>
			<td>
				<a href="category.php?father=<?php echo $roww['Id']; ?>" class="del_btn">زیر شاخه‌ها</a>
			</td>
		</tr>
	<?php } ?>
</table>
<form>
<?php include ('master/public-footer.php');?>