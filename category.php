<?php
include ('core/auth.php');
require_once $parent . '/semi-orm/Categories.php';
use orm\Categories;
$conn  = $db->open();
$Category = new Categories($conn);
require_once $parent . '/core/functionalities.php';
use core\functionalities;
$functionalitiesInstance = new functionalities();

$Id = $functionalitiesInstance->ifexistsidx($_GET, 'id');
$name = $fatherid = null;
if ($Id != null)
{
	$row = (new Posts($conn))->FirstOrDefault($Id);
	$name = $row['Name'];
	$fatherid = $row['FatherId'];
}

if (isset($_POST))
{
	if (isset($_POST['save']) && $Id == null)
		$Category->Insert([
			["Name", "'" . mysqli_real_escape_string($conn, $_POST['name']) . "'"],
			// ['FatherId',  $_POST['fatherid']]
		]);
	else if (isset($_POST['save']) && $Id != null)
		$Category->Update([
			['Id', "'" + $Id + "'"],
			["Name", "'" . mysqli_real_escape_string($conn, $_POST['name']) . "'"],
			// ['FatherId', $_POST['fatherid']]
		]);
	else if (isset($_POST['del'])) 
		$Category->Delete([
			['Id', "'" + $Id + "'"]

		]);
}

include ('core/public-header.php');
?>

<form method="post" action="category.php" >
		<label>عنوان</label>
		<input type="hidden" name="id" value="<?php echo $Id; ?>">
		<input type="text" name="name" value="<?php echo $name; ?>">
		<button class="btn" type="submit" name="save" >ذخیره</button>
</form>


<table>
	<thead>
		<tr>
			<th>عنوان</th>
			<th colspan="2"></th>
		</tr>
	</thead>
	
	<?php $results = mysqli_query($conn, "SELECT * FROM categories"); ?>
	<?php while ($roww = mysqli_fetch_array($results)) { ?>
		<tr>
			<td><?php echo $roww['Name']; ?></td>
			<td>
				<a href="category.php?edit=<?php echo $roww['Id']; ?>" class="edit_btn">ویرایش</a>
			</td>
			<td>
				<a href="category.php?del=<?php echo $roww['Id']; ?>" class="del_btn">حذف</a>
			</td>
		</tr>
	<?php } ?>
</table>

<form>









<?php include ('core/public-footer.php');?>