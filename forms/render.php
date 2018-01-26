<?php
$parent = realpath(dirname(__FILE__) . '/..');
// TODO: include ('../core/auth.php');
require_once  $parent . '/core/functionalities.php';
use core\functionalities;
$functionalitiesInstance = new functionalities();

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
echo (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]" . "$_SERVER[REQUEST_URI]"
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


<?php

/*

TODO: Modify queries

*/

if (isset($_POST["submit"])) {

    if ($_FILES['content']['size'] == 0)
        $uploadOk = 0;
    else $uploadOk = 1;

    if (isset($_POST["insert"])) {

        if ($uploadOk == 0) {
            $post_query = "INSERT INTO posts (`Title`,`Submit`,`Body`,`CategoryId`,`UserId`, `Type`) VALUES(" . "'" . mysqli_real_escape_string($conn, $_POST['title']) . "'" . ", " . "'" . mysqli_real_escape_string($conn, $_POST['submit']) . "'" . ", " . "'" . mysqli_real_escape_string($conn, $_POST['body']) . "'" . ", " . "'" . mysqli_real_escape_string($conn, $_POST['categoryid']) . "'" . ", " . "'" . mysqli_real_escape_string($conn, $_POST['userid']) . "'" .
            ", " . "'" . mysqli_real_escape_string($conn, $_POST['type']) . "'" .
            ");";
        }
        else if ($uploadOk == 1) {
            $post_query = "INSERT INTO posts (`Title`,`Submit`,`Content`,`Body`,`CategoryId`,`UserId`, `Type`) VALUES(" . "'" . mysqli_real_escape_string($conn, $_POST['title']) . "'" . ", " . "'" . mysqli_real_escape_string($conn, $_POST['submit']) . "'" . ", " . "'" . mysqli_real_escape_string($conn, file_get_contents($_FILES['content']['tmp_name'])) . "'" . ", " . "'" . mysqli_real_escape_string($conn, $_POST['body']) . "'" . ", " . "'" . mysqli_real_escape_string($conn, $_POST['categoryid']) . "'" . ", " . "'" . mysqli_real_escape_string($conn, $_POST['userid']) . "'" .
            ", " . "'" . mysqli_real_escape_string($conn, $_POST['type']) . "'" .
            ");";
        }
    }
    else if (isset($_POST["update"])) {
        if ($uploadOk == 0) {
            $post_query = "UPDATE posts SET `Type` = '" . mysqli_real_escape_string($conn, $_POST['type']) . "', `Title` = '" . mysqli_real_escape_string($conn, $_POST['title']) . "', `Submit` = '" . mysqli_real_escape_string($conn, $_POST['submit']) . "', `Body` =  '" . mysqli_real_escape_string($conn, $_POST['body']) . "', `CategoryId` =  '" . mysqli_real_escape_string($conn, $_POST['categoryid']) . "', `UserId` = '" . mysqli_real_escape_string($conn, $_POST['userid']) . "' WHERE `Id` = " . $Id . ";";
        } else if ($uploadOk == 1) {
            $post_query = "UPDATE posts SET `Type` = '" . mysqli_real_escape_string($conn, $_POST['type']) . "', `Title` = '" . mysqli_real_escape_string($conn, $_POST['title']) . "', `Submit` = '" . mysqli_real_escape_string($conn, $_POST['submit']) . "', `Body` =  '" . mysqli_real_escape_string($conn, $_POST['body']) . "', `CategoryId` =  '" . mysqli_real_escape_string($conn, $_POST['categoryid']) . "', `UserId` = '" . mysqli_real_escape_string($conn, $_POST['userid']) . "', `Content` = '" . mysqli_real_escape_string($conn, file_get_contents($_FILES['content']['tmp_name'])) . "' WHERE `Id` = " . $Id . ";";
        }
        else if (isset($_POST["delete"])) {
            // Logical delete
        }
    }
    if (mysqli_real_escape_string($conn, $_POST['title']) != "")
    {
        $post_result = mysqli_query($conn, $post_query);
        header("Location: " + $PATH);
    }
}

?>
