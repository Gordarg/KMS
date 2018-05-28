<?php
include_once 'variable/config.php';
use core\config;
require_once 'semi-orm/Posts.php';
use orm\Posts;
?>
</div>
<footer>
	<div class="w3-third">
		<h3><?= $functionalitiesInstance->label("همراهان ما"); ?></h3>
		<p><?php echo config::SPONSOR ?></p>
	</div>
	<div class="w3-third">
		<h3><?= $functionalitiesInstance->label("یادداشت ها"); ?></h3>
		<ul class="w3-ul w3-hoverable">
        <?php
        $rows = (new Posts($conn))->ToList(0, 2, "Submit", "DESC", "WHERE Level = 3");
        foreach ($rows as $row) {
            if ($row['Level'] != '3')
                continue;
            $_GET['masterid'] = $row['MasterID'];
            $_GET["level"] = '3';
            $_GET["type"] = 'POST';
            include ('views/render.php');
        }
        ?>
      </ul>
	</div>
	<div class="w3-third w3-serif">
		<h3><?= $functionalitiesInstance->label("واژگان کلیدی"); ?></h3>
		<p>
        <?php
        $keywords = //file_get_contents('./keywords.txt', FILE_USE_INCLUDE_PATH);
        config::META_KEYWORDS;
        $keywords_arr = explode(',', $keywords);
        foreach ($keywords_arr as $keywordsArr) {
            echo '<a rel="search" class="w3-tag w3-dark-grey w3-small w3-margin-bottom" href="search.php?Q=' . $keywordsArr . '"> ' . $keywordsArr . ' </a>' . ' ';
        }
        ?>
     </p>
	</div>
</footer>
</div>
<?php
for ($i=1 + $c; $i < count($items); $i++ )
{
    echo '<script type="text/javascript" src="' . $npath . '/js';
    if ($i == 1 + $c)
    echo '/master';
    else
        for ($j=2 + $c; $j <= $i; $j++ )
            echo '/' . (($items[$j] == "")?"index-php":$items[$j]);
	echo '.js" ></script>';
}
?>
</body>
</html>