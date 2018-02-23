<?php
include ('core/public-header.php');
require_once 'semi-orm/Posts.php';
use orm\Posts;
?>
<form method="GET" action="Search.php">
    <input type="text" name="Q" placeholder="عبارت را وارد نمائید" value="<?= $_GET['Q'] ?>" />
    <input type="submit" value = "جستجو" />
</form>

<?php
echo $_GET['Q']; // Search by this
include ('core/public-footer.php');
?>