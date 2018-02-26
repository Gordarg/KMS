<?php

include ('core/public-header.php');


$db = mysqli_connect('localhost', 'root', '', 'gordcms');


$name = "";
$id = 0;
$update = false;

if (isset($_POST['save'])) {
    $name = $_POST['name'];
    mysqli_query($db, "INSERT INTO categories (Name) VALUES ('$name')"); 
    // header('location: category.php');
}



if (isset($_POST['update'])) {
	$id = $_POST['id'];
	$name = $_POST['name'];
	$address = $_POST['address'];
	mysqli_query($db, "UPDATE categories SET name='$name' WHERE Id=$id");
	// header('location: category.php');
}




if (isset($_GET['del'])) {
	$id = $_GET['del'];
	mysqli_query($db, "DELETE FROM categories WHERE Id=$id"); 
	// header('location: category.php');
}





if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $update = true;
    $record = mysqli_query($db, "SELECT * FROM categories WHERE Id=$id");

    if (count($record) == 1 ) {
        $n = mysqli_fetch_array($record);
        $name = $n['Name'];
    }
}
?>




<form method="post" action="category.php" >
		
			<label>عنوان</label>
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="text" name="name" value="<?php echo $name; ?>">
			<button class="btn" type="submit" name="save" >ذخیره</button>
		
	</form>


    <?php $results = mysqli_query($db, "SELECT * FROM categories"); ?>

<table>
	<thead>
		<tr>
			<th>عنوان</th>
			<th colspan="2"></th>
		</tr>
	</thead>
	
	<?php while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
			<td><?php echo $row['Name']; ?></td>
			<td>
				<a href="category.php?edit=<?php echo $row['Id']; ?>" class="edit_btn">ویرایش</a>
			</td>
			<td>
				<a href="category.php?del=<?php echo $row['Id']; ?>" class="del_btn">حذف</a>
			</td>
		</tr>
	<?php } ?>
</table>

<form>









<?php include ('core/public-footer.php');?>