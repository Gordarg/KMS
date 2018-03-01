<?php
use core\config;
?>
<meta http-equiv="content-type" content="text/html;charset=UTF-8">
<meta name="language" content="<?php echo config::LANGUAGE ?>" />
<meta name="geo.region" CONTENT="<?php echo config::REGION ?>" />
<meta name="googlebot" content="INDEX, follow" />
<meta name="robots" content="index, follow"/>
<meta charset="utf-8">
<meta itemprop="name" content="<?php echo config::META_DESCRIPTION ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php
/* TODO: Remove me */ $parent = realpath(dirname(__FILE__) . '/..');
require_once  $parent . '/core/functionalities.php';
use core\functionalities;
$functionalitiesInstance = new functionalities();
if (file_exists($parent . '/meta/' . $_GET['yeild'] . '.php')) include($parent . '/meta/' . $_GET['yeild'] . '.php');
?>