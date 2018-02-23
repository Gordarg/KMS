<?php
include ('core/public-header.php');
require_once 'core/functionalities.php';
use core\functionalities;
require_once 'semi-orm/Posts.php';
use orm\Posts;
$Q = (new functionalities())->ifexistsidx($_GET,'Q');
?>
<form method="GET" action="Search.php">
    <input type="text" name="Q" placeholder="عبارت را وارد نمائید" value="<?= $Q ?>" />
    <input type="submit" value = "جستجو" />
</form>

<?php
$a="SELECT * FROM `post_details` WHERE Title LIKE '%".$Q."%';";
$b=mysqli_query($conn,$a);
if(mysqli_num_rows($b)>0){
echo"<table>";
echo"<tr><th>پیش نمایش</th></tr>";
while($row = mysqli_fetch_array($b)){
    echo"<tr>";
    echo"<td>" . $row['Body']. "</td>";
    echo "</td>";
}
echo"</table>";
}
else{
    echo "نتیجه یافت نشد";
}

include ('core/public-footer.php');
?>