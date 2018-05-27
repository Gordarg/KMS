<?php
/* TODO: Remove me */ $parent = realpath(dirname(__FILE__) . '/..');
require_once ($parent . '/core/authentication.php');
$auth = new auth();
$UserId = $auth->login();
if ($UserId == null)
{
    echo '<a href="login.php" onclick="w3_close()" class="w3-bar-item w3-button">ورود</a>';
    return;
}
?>
<a href="profile.php?id=<?php echo $_SESSION['PHP_AUTH_ID']?>" onclick="w3_close()" class="w3-bar-item w3-button">حساب کاربری</a>
<a href="./login.php?way=bye" onclick="w3_close()" class="w3-bar-item w3-button">خروج</a>
<a href="admin.php" onclick="w3_close()" class="w3-bar-item w3-button">محتوی</a>
<a href="category.php" onclick="w3_close()" class="w3-bar-item w3-button">دسته‌بندی‌ها</a>
<a href="tinyfilemanager.php?p=<?=core\config::Url_PATH?>" onclick="w3_close()" class="w3-bar-item w3-button">پرونده‌ها</a>