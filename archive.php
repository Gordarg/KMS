<?php
require_once 'core/functionalities.php';
use core\functionalities;
include('core/database_conn.php');
include('core/public-header.php');
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
        
        $select_result = mysqli_query($conn, "SELECT * FROM post_details ORDER BY `Submit` DESC");
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