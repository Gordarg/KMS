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
<a href="profile.php?id=<?php echo $_SESSION['PHP_AUTH_ID']?>" onclick="w3_close()" class="w3-bar-item w3-button"><?= $functionalitiesInstance->label("حساب کاربری"); ?></a>
<a href="./login.php?way=bye" onclick="w3_close()" class="w3-bar-item w3-button"><?= $functionalitiesInstance->label("خروج"); ?></a>
<a href="post.php" onclick="w3_close()" class="w3-bar-item w3-button"><?= $functionalitiesInstance->label("پست"); ?></a>
<a href="category.php" onclick="w3_close()" class="w3-bar-item w3-button"><?= $functionalitiesInstance->label("دسته‌بندی‌ها"); ?></a>
<a href="tinyfilemanager.php?p=<?=core\config::Url_PATH?>" onclick="w3_close()" class="w3-bar-item w3-button"><?= $functionalitiesInstance->label("پرونده‌ها"); ?></a>