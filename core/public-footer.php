<?php
include_once 'core/config.php';
use core\config;
require_once 'semi-orm/Posts.php';
use orm\Posts;
?>
<footer class="w3-row-padding w3-padding-32">
	<div class="w3-third">
		<h3>همراهان ما</h3>
		<p><?php echo config::SPONSOR ?></p>
		<p>
			برگرفته از سامانه ی مدیریت محتوی <a href="http://gordarg.com"
				target="_blank">گُرد</a>
		</p>
	</div>
	<div class="w3-third">
		<h3>یادداشت ها</h3>
		<ul class="w3-ul w3-hoverable">
        <?php
        $rows = (new Posts($conn))->ToList(0, 2, "Submit", "DESC", "WHERE Level = 3");
        foreach ($rows as $row) {
            if ($row['Level'] != '3')
                continue;
            $_GET['id'] = $row['ID'];
            $_GET["level"] = '3';
            $_GET["type"] = 'POST';
            include ('views/render.php');
        }
        ?>
      </ul>
	</div>
	<div class="w3-third w3-serif">
		<h3>واژگان کلیدی</h3>
		<p>
          <?php
        $keywords = //file_get_contents('./keywords.txt', FILE_USE_INCLUDE_PATH);
        config::META_KEYWORDS;
        $keywords_arr = explode(',', $keywords);
        foreach ($keywords_arr as $keywordsArr) {
            echo '<span class="w3-tag w3-dark-grey w3-small w3-margin-bottom"> ' . $keywordsArr . ' </span>' . ' ';
        }
        ?>
     </p>
	</div>
</footer>
</div>
<?php
for ($i=2; $i < count($items); $i++ )
{
	echo '<script type="text/javascript" src="' . $npath . '/js';
	for ($j=2; $j <= $i; $j++ )
		echo '/' . (($items[$j] == "")?"index-php":$items[$j]);
	echo '.js" ></script>';
	echo '
';
}
?>
</body>
</html>