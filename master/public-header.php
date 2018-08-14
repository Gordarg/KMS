<?php
include_once 'variable/config.php';
use core\config;
include ('core/init.php');
?>
<!DOCTYPE html>
<!--
CMS by
                                                `..`                                                
                                              `.    .`                                              
                                            `.        .`                                            
                                          `.            .`                                          
                                        `.                .`         `                              
                                      `.                    .`       ..`                            
                                    `.                        .`     .  .`                          
                                  `.                            .`  ``   ``                         
                                `.                                .`.     `.                        
                              `.                                   .`      `.                       
                            `.                                    ``        `.                      
                          `.                                     ``          ``                     
                        `.`                                     .`            .                     
                      `.`                                     ``              `.                    
                    ```    ``````````                       ```                .                    
                  ```  `````         `````               ````                  .``                  
                ``` ````                ``````````````````                     . ```                
              ``` ```                        ````````                          .   ```              
            ```  ``                                                            .     ```            
          ```   .`                                                             :       ```          
        ```    .`                                                              /         ```        
      ```     `.                                                              `:           ```      
    ```       .                                                               -.             ```    
  ```         .                                                              .-`               ```  
```           .                                                             `..                  ```
:`            :`                                                           `..                    `:
.```          .-                                                          ...`                  ```.
.  `.`        `-.                                                        ...`                 ```  .
.    `.`       .`.                                                     `.`.`                ```    .
.      `.`      .`.`                                                 `.``.                ```      .
.        `.`     .``..                                             `.. .`               ```        .
.          `.`    `. `..`                                        ..` `.               ```          .
.            `.`    ``` `..`                                  ...  ``               ```            .
.              `.`    ```  `...`                          ....  ```               `.`              .
.`               `.`     ````  `......`           `......`   ```                `.`               `.
` .`               `.`      `````      `..........`     `````                 `.`               `. `
-.` .`               `.`         ```````````````````````                    `.`               `.  `-
. `.` .`               `.`                                                ```               `.  `` .
.   `.` .`               `.`                                            ```               `.  ``   .
.     `.` .`               `.`                                        ```               `. ```     .
.       ``` .`               `.`                                    ```               `.  ``       .
.         ``` ``               `.`                                ```               `.  ``         .
.           ``` .`               `.`                            ```               `` ```           .
.             ``` .`               ```                        ```               `.  ``             .
.               ``` .`               ```                    ```               ``  ``               .
```               ``` .`               ```                ```               ``  ``               ```
  ```               ``` .`               ```            ```               `.` ``               ```  
    ```               `` `.`               ```        ```               `.` ``               ```    
      ```               `` `.`               ```    ```               `.` ``               ```      
        ```               `` `.`               ``````               `.` ``               ```        
          ```               `` `.`               ..               `.` ``               ```          
            ```               `` `.`             ``             `.` ``               ```            
              ```               `` ```           ``           `.` ``               ```              
                ```               `` ```         ``         ``` ``               ```                
                  ```               `` ```       ``       ``` ``               ```                  
                    ```               `` ```     ``     `.` ``               ```                    
                      ```               `` ```   ``   ``` ``               ```                      
                        ``                `` ``` `` ``` ``                ``                        
                          ``                `` ``..`` ``                ``                          
                            ``                `` `` ``                ``                            
                              `.                ````                ``                              
                                ``               `.               .`                                
                                  ``             ``             ``                                  
                                    `.           ``           ``                                    
                                      `.         ``         ``                                      
                                        `.       ``       .`                                        
                                          `.     ``     .`                                          
                                            `.   ``   .`                                            
                                              `. `` .`                                              
                                                `.-`                                                
-->
<html>
<head>
<title><?php echo $functionalitiesInstance->label(config::TITLE) ?></title>
<link rel="icon" href="favicon.png" type="image/png" sizes="96x96">
<?php

$_GET['yeild'] = basename($_SERVER["SCRIPT_FILENAME"], ".php");
include_once $parent . '/meta/render.php';
$c = 1 + count(explode('/', config::Url_PATH));
$c -= count(explode('.', config::Url_SUBDOMAIN)); // TODO: BUG: dots in address has some problems; eg -> www. | .com
$items =  explode('/',preg_replace("/[^a-zA-Z0-9_\-\/اآبپتثجچحخدذرزسشصضطظعغفقکگلمنوهی]/","-",str_replace("://", "/", str_replace("?", "/", $path))));
for ($i= $c + 1 ; $i < count($items); $i++ )
{
  echo '
  <link href="' . $npath . '/css';
	if ($i == $c + 1)
  echo '/master';
  else
  for ($j= $c + 2; $j <= $i; $j++ )
  echo '/' . (($items[$j] == "")?"index-php":$items[$j]);
	echo '.css" rel="stylesheet" />';
}
echo '<link href="' . $npath . '/css/' . $functionalitiesInstance->ifexistsidx($_COOKIE, 'LANG') . '.css" rel="stylesheet" />';
?>
</head>
<body>
  <nav id="sidebar">
    <div onclick="w3_close()" class="sidebar-close">☰</div>
    <a href="./" onclick="w3_close()" class="w3-bar-item w3-button"><?= $functionalitiesInstance->label("خانه"); ?></a>
		<a href="search.php" onclick="w3_close()" class="w3-bar-item w3-button"><?= $functionalitiesInstance->label("جستجو"); ?></a>
		<a href="register.php" onclick="w3_close()" class="w3-bar-item w3-button"><?= $functionalitiesInstance->label("عضویت"); ?></a>
		<a href="contactus.php" onclick="w3_close()" class="w3-bar-item w3-button"><?= $functionalitiesInstance->label("تماس با ما"); ?></a>
    <?php include ('helper/menu.php'); ?>
	</nav>
  
	<header role="banner">
    <div class="sidebar-open" onclick="w3_open()">☰</div>
    <?= $functionalitiesInstance->label(config::NAME) ?>
    <?php
    include ('helper/toolbar.php');
    include ('helper/choose_language.php');
    ?>
	</header>

<div class="container">