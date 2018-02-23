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
echo $Q; // Search by this
include ('core/public-footer.php');
?>