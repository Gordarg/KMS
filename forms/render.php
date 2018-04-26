<?php
/* TODO: Remove me */ $parent = realpath(dirname(__FILE__) . '/..');
include_once $parent . '/core/auth.php';
require_once  $parent . '/core/functionalities.php';
use core\functionalities;
require_once $parent . '/semi-orm/Categories.php';
use orm\Categories;
require_once $parent . '/semi-orm/Posts.php';
use orm\Posts;
$functionalitiesInstance = new functionalities();
$db = new database_connection();
$conn  = $db->open();
$Post = new Posts($conn);
$Category = new Categories($conn);
include ('values.php');
?>

<form  method="post" action="<?= /*TODO*/ 'admin.php?type=' . $Type ?>" enctype="multipart/form-data">
<input type="hidden" name="masterid" value="<?= $MasterID ?>" />
<input type="hidden" name="id" value="<?= (($Id == null) ? "NULL" : $Id) ?>" />
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