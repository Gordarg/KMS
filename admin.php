<?php
$IsUserAuthorized = false;

function YouAreNotAuthorized()
{
    header('WWW-Authenticate: Basic realm="My Realm"');
    header('HTTP/1.0 401 Unauthorized');
    exit();
}
if (! isset($_SERVER['PHP_AUTH_USER'])) {
    YouAreNotAuthorized();
    // header('Location: index.php');
} else {
    $username = $_SERVER['PHP_AUTH_USER'];
    $password = $_SERVER['PHP_AUTH_PW'];
    
    // SQL Injection Prevention
    // settype($username, 'varchar');
    // settype($password, 'varchar');
    
    // Connect to database
    include ('core/database_conn.php');
    
    // SQL Injection Protection Method 2
    $username_safe = mysqli_real_escape_string($conn, $username);
    $password_safe = mysqli_real_escape_string($conn, $password);
    
    // Login
    $login_query = "select Id from users where Username='" . $username_safe . "' AND Password='" . $password_safe . "';";
    $login_result = mysqli_query($conn, $login_query);
    $login_num = mysqli_num_rows($login_result);
    if ($login_num == 1) {
        $IsUserAuthorized = true;
        $UserId = mysqli_fetch_array($login_result)['Id'];
    }
    if (! $IsUserAuthorized) {
        YouAreNotAuthorized();
    }
}
$Id = $_GET['id'];
include ('core/public-header.php');

?>


<?php
// echo '<table>';
// $select_result = mysqli_query($conn, "SELECT * FROM `post_details`");
// while($row = mysqli_fetch_assoc($select_result)) {
// foreach($row as $field => $value) {
// echo '<tr><td>' . htmlentities($field) . '</td><td>' . htmlentities($value) . '</td></tr>';
// }
// echo '<tr><td colspan="2">&nbsp;</td></tr>';
// }
// echo '</table>';
?>




<table class="table table-bordered">
	<thead>
		<tr>
			<td></td>
			<td>شناسه</td>
			<td>عنوان</td>
			<td>ضمیمه</td>
			<td>متن</td>
		</tr>
	</thead>
	<tbody>
        <?php
        // $connect = mysql_connect("localhost","root", "root");
        // if (!$connect) {
        // die(mysql_error());
        // }
        // mysql_select_db("apploymentdevs");
        
        require_once 'core/functionalities.php';
        use core\functionalities;
        $functionalitiesInstance = new functionalities();
        
        $select_result = mysqli_query($conn, "SELECT * FROM post_details ORDER BY `Submit` DESC");
        while ($row = mysqli_fetch_array($select_result)) {
            ?>
                <tr>
			<td><a href="admin.php?id=<?php echo $row['ID']?>">ویرایش و حذف</a></td>
			<td><?php echo $row['ID']?></td>
			<td><?php echo $row['Title']?></td>
			<td><a href="download.php?id=<?php echo $row['ID']?>">بارگزاری</a></td>
			<td><?php echo $functionalitiesInstance->makeAbstract($row['Body'], 80)  ?></td>
		</tr>

            <?php
        }
        ?>
            </tbody>
</table>
</body>

<form
action="<?php echo (isset($_SERVER['HTTPS']) ? "https" : "http") .
"://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>"
	method="post" enctype="multipart/form-data">
	<?php
date_default_timezone_set('Asia/Tehran');
$datetime = date('Y-m-d h:i', time());
?>

<?php if ($Id != "") {
 $IId = mysqli_real_escape_string($conn, $Id);
 $query = "select Username, Title, Submit, Body from post_details where ID=" . $IId . ";";
 $result = mysqli_query($conn, $query);
 $row = mysqli_fetch_array($result);       
}?>

    <input type="hidden" name="userid" value="<?php echo $UserId; ?>" /> <input
    type="hidden" name="submit" value="<?php echo $datetime; ?>" /> <label
    for="title">عنوان</label> <input name="title"
    placeholder="عنوان را وارد نمایید" type="text" value="<?php echo $row["Title"]?>" /> <label
    for="categoryid">دسته بندی</label> <select name="categoryid">
    <?php
    $category_query = "select Id, Name from categories";
    $category_result = mysqli_query($conn, $category_query);
    $category_num = mysqli_num_rows($category_result);
    for ($i = 0; $i < $category_num; $i ++) {
        $category_row = mysqli_fetch_array($category_result);
        echo '<option value="' . $category_row['Id'] . '">' . $category_row['Name'] . '</option>';
    }
    ?>
    </select> <label for="bpdy">متن</label>
	<textarea name="body"><?php echo $row['Body']?></textarea>
	<label for="bpdy">پرونده</label> <input type="file" name="content"
		id="file" />
	<?php

if ($Id == "") {
    echo '<input type="submit" name="insert" value="ارسال" />';
} else {
    echo '<input type="submit" name="update" value="به روز رسانی" />';
    echo '<input type="submit" name="delete" value="حذف" />';
    echo '<a href="admin.php">انصراف</a>';

}

// $uploadOk = 1;
// $fileMime = ($_FILES['content']['size'] == 0 /*&& $_FILES['content']['error'] == 0*/)
// ? ("")
// : (mime_content_type($_FILES["content"]["tmp_name"]));
// if ($fileMime != "image/jpg" && $fileMime != "image/png" && $fileMime != "image/jpeg" && $fileMime != "image/gif") {
//     $uploadOk = 0;
// }

if ($_FILES['content']['size'] == 0)
    $uploadOk = 0;
    else $uploadOk = 1;

if (isset($_POST["insert"])) {
    if ($uploadOk == 0) {
        $post_query = "INSERT INTO posts (`Title`,`Submit`,`Body`,`CategoryId`,`UserId`) VALUES(" . "'" . mysqli_real_escape_string($conn, $_POST['title']) . "'" . ", " . "'" . mysqli_real_escape_string($conn, $_POST['submit']) . "'" . ", " . "'" . mysqli_real_escape_string($conn, $_POST['body']) . "'" . ", " . "'" . mysqli_real_escape_string($conn, $_POST['categoryid']) . "'" . ", " . "'" . mysqli_real_escape_string($conn, $_POST['userid']) . "'" . ");";
    }
    else if ($uploadOk == 1) {
        $post_query = "INSERT INTO posts (`Title`,`Submit`,`Content`,`Body`,`CategoryId`,`UserId`) VALUES(" . "'" . mysqli_real_escape_string($conn, $_POST['title']) . "'" . ", " . "'" . mysqli_real_escape_string($conn, $_POST['submit']) . "'" . ", " . "'" . mysqli_real_escape_string($conn, file_get_contents($_FILES['content']['tmp_name'])) . "'" . ", " . "'" . mysqli_real_escape_string($conn, $_POST['body']) . "'" . ", " . "'" . mysqli_real_escape_string($conn, $_POST['categoryid']) . "'" . ", " . "'" . mysqli_real_escape_string($conn, $_POST['userid']) . "'" . ");";
    }
} else if (isset($_POST["update"])) {
    if ($uploadOk == 0) {
        $post_query = "UPDATE posts SET `Title` = '" . mysqli_real_escape_string($conn, $_POST['title']) . "', `Submit` = '" . mysqli_real_escape_string($conn, $_POST['submit']) . "', `Body` =  '" . mysqli_real_escape_string($conn, $_POST['body']) . "', `CategoryId` =  '" . mysqli_real_escape_string($conn, $_POST['categoryid']) . "', `UserId` = '" . mysqli_real_escape_string($conn, $_POST['userid']) . "' WHERE `Id` = " . $Id . ";";
    } else if ($uploadOk == 1) {
        $post_query = "UPDATE posts SET `Title` = '" . mysqli_real_escape_string($conn, $_POST['title']) . "', `Submit` = '" . mysqli_real_escape_string($conn, $_POST['submit']) . "', `Body` =  '" . mysqli_real_escape_string($conn, $_POST['body']) . "', `CategoryId` =  '" . mysqli_real_escape_string($conn, $_POST['categoryid']) . "', `UserId` = '" . mysqli_real_escape_string($conn, $_POST['userid']) . "', `Content` = '" . mysqli_real_escape_string($conn, file_get_contents($_FILES['content']['tmp_name'])) . "' WHERE `Id` = " . $Id . ";";
    }
} else if (isset($_POST["delete"])) {
    $post_query = "DELETE FROM posts WHERE `Id` = " . $Id . ";";
}
if (isset($_POST["submit"])) {
    if (mysqli_real_escape_string($conn, $_POST['title']) != "")
    {
        $post_result = mysqli_query($conn, $post_query);
        header("Location: admin.php");
        exit();
    }
}
?>
</form>
<?php
include ('core/public-footer.php');
// include ('core/database_close.php');
?>