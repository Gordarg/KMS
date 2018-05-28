
<?php
include_once 'variable/config.php';
use core\config;
include ('core/init.php');
require_once 'core/functionalities.php';
use core\functionalities;
$functionalitiesInstance = new functionalities();
?>

<!DOCTYPE html>

<!--
	GORDCMS by
	
                                                                          `:+shdmNMMMNmdyo/.        
                                                                       .:/o+/:.`    .-+smMMMNy/     
                                                                    -+sdmMMMMMMMNds/`    .oNMMMNo`  
                                                                .+hNMMMMMMMMMMMMMMMMNs`    `hMMMMN: 
                                                             .omMMMMMMMNho/-.```.:+yNMN.    `mMMMMM:
                                                           -yMMMMMMMms-              :dm     yMMMMMd
                                                         -hMMMMMMMy:                 -./.   `NMMMMMM
                                                       .hMMMMMMNs.             -oh-  oNo.`-+NMMMMMMm
                                                     `oMMMMMMMs`            .sNMMMN- +MMMMMMMMMMMMM/
                                                    :mMMMMMMy.             sMMMMMMMm``dMMMMMMMMMMM+ 
                                                  `yMMMMMMm:              sMMMMMMMMMy  /hMMMMMMmo.  
           .o:                                   /NMMMMMMo                NMMMMMMMMMM-    -::-`     
          oMMMNs.                              `yMMMMMMm-                 dMMMMMMMMMMy              
        .dMMMMMMMs                            :mMMMMMMs                   -MMMMMMMMMMN              
       .NMMMMMMMMMh                          sMMMMMMN:                     /MMMMMMMMMM`             
       yMMMMMMMMMMMo                       .mMMMMMMh`                       /MMMMMMMMM              
       sMMMMMMMMMMMd                      +MMMMMMN/                   :odM.  /MMMMMMMh              
       `dMMMMMMMMMMd                    -dMMMMMMy`                 :yNMMMM.   hMMMMMM-              
         oMMMMMMMMM+                  .yMMMMMMd-                -sNMMMMMMM:  .mMMMMM+               
          .dMMMMMMh                 -hMMMMMMm/               .omMMMh+-yMMMMmmMMMMMN/                
            mMMMMh`              `+dMMMMMMd:              `/hMMMm+`   +MMMMMMMMMNs`                 
           `NMMN/             .+hMMMMMMNs.             `/hMMMMy-       +hmMMNmy/`                   
          :mMd+          `-+ymMMMMMMdo-             .+hMMMMNo`                                      
       -omdo. .::::/+oyhmMMMMMNdy+-`            `:smMMMMMd/                                         
   -oyyo:-:ohho+/:/+oooo++/:.`             `-+ymMMMMMMmo.                                           
 /soooydNMMMMMMMMMmdyo+/:-.``    ``.-:/oyhmMMMMMMMMdo-                                              
 `/ymMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMds/`                                                 
     `-+shmMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMNdy+-`                                                     
            .:/osyhdmNNMMMMMMMNNmdhys+/-`                                                           
-->
<html>
<head>
<title><?php echo config::TITLE ?></title>
<?php
$_GET['yeild'] =  basename($_SERVER["SCRIPT_FILENAME"], ".php");
include_once $parent . '/meta/render.php';
$c = 1 + count(explode('/', config::Url_PATH));
$c -= count(explode('.', config::Url_SUBDOMAIN)); // TODO: BUG: dots in address has some problems; eg -> www. | .com
$items =  explode('/',preg_replace("/[^a-zA-Z0-9_\-\/اآبپتثجچحخدذرزسشصضطظعغفقکگلمنوهی]/","-",str_replace("://", "/", str_replace("?", "/", $path))));
for ($i= $c + 1 ; $i < count($items); $i++ )
{
	echo '<link href="' . $npath . '/css';
	if ($i == $c + 1)
	    echo '/master';
    else
    	for ($j= $c + 2; $j <= $i; $j++ )
    		echo '/' . (($items[$j] == "")?"index-php":$items[$j]);
	echo '.css" rel="stylesheet" />';
	echo '
';
}
?>
</head>
<body>
	<?php include ('helper/toolbar.php'); ?>
	<nav
		class="w3-sidebar w3-bar-block w3-card w3-top w3-xlarge w3-animate-right"
		style="display: none; z-index: 2; width: 40%; min-width: 300px"
		id="mySidebar">
		<a href="javascript:void(0)" onclick="w3_close()" class="w3-bar-item w3-button">☰</a> <a href="./" onclick="w3_close()" class="w3-bar-item w3-button"><?= $functionalitiesInstance->label("خانه"); ?></a>
		<a href="search.php" onclick="w3_close()" class="w3-bar-item w3-button"><?= $functionalitiesInstance->label("جستجو"); ?></a>
		<a href="register.php" onclick="w3_close()" class="w3-bar-item w3-button"><?= $functionalitiesInstance->label("ثبت نام"); ?></a>
		<a href="contactus.php" onclick="w3_close()" class="w3-bar-item w3-button"><?= $functionalitiesInstance->label("تماس با ما"); ?></a>
		<?php include ('helper/menu.php'); ?>
	</nav>

	<header class="w3-top" role="banner">
		<div class="w3-white w3-xlarge"
			style="max-width: 1200px; margin: auto">
			<div class="w3-button w3-padding-16 w3-right" onclick="w3_open()">☰</div>
			<div class="w3-center w3-padding-16"><?= config::NAME ?></div>
		</div>
	</header>

	<div class="w3-main w3-content w3-padding"
		style="max-width: 1200px; margin-top: 100px">