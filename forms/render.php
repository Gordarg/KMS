<?php
/* TODO: Remove me */ $parent = realpath(dirname(__FILE__) . '/..');
require_once  $parent . '/core/functionalities.php';
use core\functionalities;
require_once $parent . '/semi-orm/Posts.php';
use orm\Posts;
$functionalitiesInstance = new functionalities();
require_once $parent . '/core/database_conn.php';
use core\database_connection;
$db = new database_connection();
$conn  = $db->open();
$Post = new Posts($conn);
include ('values.php');
?>
<form id="gordform" method="post" action="<?= /*TODO*/ 'post.php?type=' . $Type ?>" enctype="multipart/form-data">
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
    case "FILE":
        include('FILE.php');
        break;
    case "QUST":
        include('QUST.php');
        break;
}
?>
</form>