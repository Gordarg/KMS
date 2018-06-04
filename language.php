<?php
setcookie('LANG', $_GET['L'], time() + (86400 * 30), '/');
include ('master/public-header.php');
include ('helper/choose_language.php');
include ('master/public-footer.php');
?>