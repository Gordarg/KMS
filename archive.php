<?php
require_once 'core/functionalities.php';
use core\functionalities;
$functionalitiesInstance = new functionalities();
include('core/init.php');
require_once 'semi-orm/Posts.php';
use orm\Posts;
include('core/public-header.php');
$CategoryID = $functionalitiesInstance->ifexistsidx($_GET,'CategoryID');
$rows = (new Posts($conn))->ToList(0, 48, "Submit", "DESC", ((isset($CategoryID)? ("WHERE `CategoryID` = " . $CategoryID) : '' )));
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
		foreach ($rows as $row) {
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