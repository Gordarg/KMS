<?php
/* TODO: Remove me */ $parent = realpath(dirname(__FILE__) . '/..');
require_once  $parent . '/core/functionalities.php';
use core\functionalities;
require_once $parent . '/semi-orm/Posts.php';
use orm\Posts;
$functionalitiesInstance = new functionalities();
$db = new database_connection();
$conn  = $db->open();
$Post = new Posts($conn);
include ('values.php');
?>
<form  method="post" action="<?= /*TODO*/ 'post.php?type=' . $Type ?>" enctype="multipart/form-data">
<input type="hidden" name="masterid" value="<?= $MasterID ?>" />
<input type="hidden" name="type" value="<?= $Type ?>" />
<?php
switch ($Type)
{
    case "POST":
        include('POST.php');
        break;
    case "COMT":
        include('COMT.php');
        break;
    case "KWRD":
        include('KWRD.php');
        break;
}
?>
</form>