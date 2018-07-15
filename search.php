<?php
include ('master/public-header.php');
require_once 'core/functionalities.php';
use core\functionalities;
require_once 'semi-orm/Posts.php';
use orm\Posts;
$Q = (new functionalities())->ifexistsidx($_GET,'Q');
?>
<form class="example" method="GET" action="search.php">
    <input type="text" name="Q" placeholder="<?= $functionalitiesInstance->label("عبارت را وارد نمائید"); ?>" value="<?= $Q ?>" />
    <input type="submit" value = "<?= $functionalitiesInstance->label("جستجو"); ?>" />
</form>
<div class="line"></div>
<div class="table">
<?php
if ($Q != null)
{
    $a="SELECT * FROM `post_details`
    WHERE
    (`Title` LIKE '%".$Q."%'
    OR `Username` LIKE '%".$Q."%'
    OR `Body` LIKE '%".$Q."%')
    AND (`Type` = 'POST'
    OR `Type` = 'COMT' 
    )
    ORDER BY `Submit`
    Limit 10
    ;";
    $b=mysqli_query($conn,$a);
    if ($b->num_rows > 0) {
        echo '<div class="results">';
        while($row = mysqli_fetch_array($b)){
            echo '<div class="result">';
            switch ($row['Type'])
            {
                case 'COMT':
                    echo '<a href="view.php?lang=' . $row['Language'] . '&id=' . $row['RefrenceID'] . '">' . $row['Body']. '</a>';
                    break;
                // TODO:
                // case 'KWRD':
                //     echo '<a href="view.php?id=' . $row['RefrenceID'] . '">' . $row['Title']. '</p>';
                //     break;
                case 'POST':
                    echo"<p>" . $row['Body']. "</p>";
                    break;
            }
            echo "</div>";
        }
        echo"</div>";
    }
    else{
        echo $functionalitiesInstance->label("نتیجه یافت نشد");
    }
}
?>
</div>

<?php
include ('master/public-footer.php');
?>
