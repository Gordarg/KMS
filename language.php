<?php
require_once 'core/functionalities.php';
use core\functionalities;
$Lang =(new functionalities())->ifexistsidx($_GET,'l');
$_COOKIE['LANG'] = $Lang;
include ('master/public-header.php');
?>
<a href="language.php?l=fa-IR">🇮🇷</a>
<a href="language.php?l=en-US">🇺🇸</a>
<a href="language.php?l=ru-RU">🇷🇺</a>
<?php
include ('master/public-footer.php');
?>