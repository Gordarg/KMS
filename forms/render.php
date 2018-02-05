<?php
$parent = realpath(dirname(__FILE__) . '/..');
require_once  $parent . '/core/functionalities.php';
use core\functionalities;
require_once $parent . '/semi-orm/Posts.php';
use orm\Posts;
$functionalitiesInstance = new functionalities();
include_once $parent . '/core/auth.php';
$Type = $_GET['type'];
$db = new database_connection();
$conn  = $db->open();
$row=[];
$Id = mysqli_real_escape_string($conn, $functionalitiesInstance->ifexistsidx($_GET, 'id'));
$post = new Posts($conn);
$row = $post->FirstOrDefault($Id);
// include ($parent . '/forms/submit.php');
?>

<form  method="post" action="<?php echo $path?>" enctype="multipart/form-data">
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