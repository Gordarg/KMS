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
<?php
switch ($Type)
{
    case "POST":
        include($parent . '/forms/POST.php');
        break;
    case "COMT":
        include($parent . '/forms/COMT.php');
        break;
    case "KWRD":
        include($parent . '/forms/KWRD.php');
        break;
    case "FILE":
        include($parent . '/forms/FILE.php');
        break;
    case "QUST":
        include($parent . '/forms/QUST.php');
        break;
    case "ANSR":
        include($parent . '/forms/ANSR.php');
        break;
    case "ANSR_status":
        include($parent . '/forms/ANSR_status.php');
        break;
}
?>
<input type="hidden" name="type" value="<?= $Type ?>" />
</form>