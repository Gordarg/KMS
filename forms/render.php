<?php
$parent = realpath(dirname(__FILE__) . '/..');
require_once  $parent . '/core/functionalities.php';
use core\functionalities;
$functionalitiesInstance = new functionalities();
include_once $parent . '/core/auth.php';

$Type = $_GET['type'];

$Id = null;
$row=[];
if (isset( $_GET["id"])) 
{ 
    $Id = mysqli_real_escape_string($conn, $_GET["id"]);
    $query = "select * from post_details where ID=" . $Id . ";";
    $result = mysqli_query($conn, $query);
    if ($result)
    $row = mysqli_fetch_array($result);
}
?>

<form action="<?php
echo $path
?>" method="post" enctype="multipart/form-data">

<?php


/*
TODO: Hidden fields for Id, UserId, and ...
*/


switch ($Type)
{
    case "POST":
    include('POST.php');
    break;
}
?>


<?php
/*

TODO: if category was int, just insert.
      else, create new category

TODO: create drafting and publish mechanisms
      based on user role

    echo '<input type="submit" name="draft" value="پیش‌نویس" />';
    echo '<input type="submit" name="edit" value="ویرایش" />';
    echo '<input type="submit" name="publish" value="انتشار عمومی" />';
    echo '<input type="submit" name="burn" value="لغو انتشار" />';
*/
if ($Type != "")
{
    if ($Id == "" ) {
        echo '<input type="submit" name="insert" value="ارسال" />';
    } else {
        echo '<input type="submit" name="update" value="به روز رسانی" />';
        echo '<input type="submit" name="delete" value="حذف" />';
        echo '<a href="admin.php">انصراف</a>';
    }
}
?>

</form>