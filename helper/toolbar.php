<?php
/* TODO: Remove me */ $parent = realpath(dirname(__FILE__) . '/..');
require_once ($parent . '/core/authentication.php');
$auth = new auth();
$UserId = $auth->login();
if ($UserId == null)
    return;
?>
<div class="toolbar">
	<img src="cms.svg" alt="logo">
    <!-- TODO: Admin panel here -->
	<?php
	$items =  explode('/',preg_replace("/[^a-zA-Z0-9_\-\/اآبپتثجچحخدذرزسشصضطظعغفقکگلمنوهی]/","-",str_replace("://", "/", str_replace("?", "/", $path))));
	for ($i= $c + 1 ; $i < count($items); $i++ )
	{
		echo '<a href=tinyfilemanager.php?p=' . core\config::Url_PATH . '/css';
		if ($i == $c + 1)
			echo '/master';
		else
			for ($j= $c + 2; $j <= $i; $j++ )
				echo '&view=' . (($items[$j] == "")?"index-php":$items[$j]);
		echo '.css>' . $functionalitiesInstance->label("ویرایش تم") . ' ' . $i . '</a>';
		echo '
	';
	}
	?>
</div>
