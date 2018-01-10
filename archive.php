<?php
require_once 'core/functionalities.php';
use core\functionalities;
include('core/init.php');
include('core/public-header.php');
$CategoryID = $_GET['CategoryID'];
?>
<table class="table table-bordered">
	<thead>
		<tr>
			<td>شناسه</td>
			<td>عنوان</td>
			<td>ضمیمه</td>
			<td>متن</td>
		</tr>
	</thead>
	<tbody>
        <?php
        $functionalitiesInstance = new functionalities();
		$select_query = "SELECT * FROM post_details" .
		(($CategoryID != "") ? (' WHERE `CategoryID` = ' . $CategoryID) : ("")) .
		" ORDER BY `Submit` DESC";
		$select_result = mysqli_query($conn,
			$select_query);
        while ($row = mysqli_fetch_array($select_result)) {
		?>
        <tr>
			<td><?php echo $row['ID']?></td>
			<td><a href="view.php?id=<?php echo $row['ID']?>"><?php echo $row['Title']?></a></td>
			<td><a href="download.php?id=<?php echo $row['ID']?>">بارگزاری</a></td>
			<td><?php echo $functionalitiesInstance->makeAbstract($row['Body'], 80)  ?></td>
		</tr>
		<?php
        }
        ?>
	</tbody>
</table>
</body>
<?php
include ('core/public-footer.php');
?>