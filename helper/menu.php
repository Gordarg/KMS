<?php
/* TODO: Remove me */ $parent = realpath(dirname(__FILE__) . '/..');
require_once $parent . '/core/functionalities.php';
use core\functionalities;
$functionalitiesInstance = new functionalities();
require_once ($parent . '/core/authentication.php');
use core\authentication;
$authentication = new authentication();

echo '<nav id="sidebar">';
echo '<div onclick="w3_close()" class="sidebar-close">☰</div>';
echo '<a href="./" onclick="w3_close()" class="w3-bar-item w3-button">' . $functionalitiesInstance->label("خانه") . '</a>';
echo '<a href="search.php" onclick="w3_close()" class="w3-bar-item w3-button">' . $functionalitiesInstance->label("جستجو") . '</a>';
echo '<a href="register.php" onclick="w3_close()" class="w3-bar-item w3-button">' . $functionalitiesInstance->label("عضویت") . '</a>';
echo '<a href="contactus.php" onclick="w3_close()" class="w3-bar-item w3-button">' . $functionalitiesInstance->label("تماس با ما") . '</a>';

$UserId = $authentication->login();
if ($UserId == null)
{
    echo '<a href="login.php" onclick="w3_close()">' . $functionalitiesInstance->label("ورود") . '</a>';
}
else
{
    echo '<a href="profile.php?id=' . $functionalitiesInstance->ifexistsidx($_SESSION, 'PHP_AUTH_ID') . '" onclick="w3_close()">' . $functionalitiesInstance->label("حساب کاربری") . '</a>';
    echo '<a href="./login.php?way=bye" onclick="w3_close()">' . $functionalitiesInstance->label("خروج") . '</a>';
    echo '<a href="post.php" onclick="w3_close()">' . $functionalitiesInstance->label("پست") . '</a>';
    echo '<a href="question.php" onclick="w3_close()">' . $functionalitiesInstance->label("فرم‌ساز") . '</a>';
    echo '<a href="tinyfilemanager.php?p=' . core\config::Url_PATH. '" onclick="w3_close()">' . $functionalitiesInstance->label("پرونده‌ها") . '</a>';
    echo '<a href="box.php" onclick="w3_close()">' . $functionalitiesInstance->label("جعبه") . '</a>';
    echo '<a href="users.php" onclick="w3_close()">' . $functionalitiesInstance->label("کاربران") . '</a>';
}
echo '</nav>';
?>