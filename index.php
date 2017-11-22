<?php include('core/public-header.php')?>
  
<?php
echo '<div class="head-post-row w3-row-padding w3-padding-16"">';
include ('core/database_conn.php');
$header_query = "select ID from post_details where `CategoryName` = 'daily' order by `Submit` desc";
$header_result = mysqli_query($conn, $header_query);
$header_num = mysqli_num_rows($header_result);
for ($i = 0; $i < $header_num; $i ++) {
    $header_row = mysqli_fetch_array($header_result);
    $_GET['id'] = $header_row['ID'];
    $_GET["type"] = 'daily';
    include ('show.php');
    if (($i + 1) % 4 == 0) {
        echo '</div>';
        echo '<div class="head-post-row w3-row-padding w3-padding-16">';
    }
}
echo '</div>';

echo '<div class="w3-center w3-padding-32">';
echo '<div class="w3-bar" id="paging">';
echo '<!--<a class="w3-bar-item w3-button w3-hover-black">«</a>-->';
echo '<a class="w3-bar-item w3-black w3-button">1</a>';
for ($k = 1; $k <= (int) ($header_num / 8); $k ++) {
    echo '<a class="w3-bar-item w3-button w3-hover-black">' . ($k + 1) . '</a>';
}
echo '<!--<a class="w3-bar-item w3-button w3-hover-black">»</a>-->';
echo '</div>';
echo '</div>';
// include('core/database_close.php');
?>
  
  <?php
include ('core/database_conn.php');
$header_query = "select ID from post_details where `CategoryName` = 'weekly' order by `Submit` desc limit 1";
$header_result = mysqli_query($conn, $header_query);
$header_num = mysqli_num_rows($header_result);
for ($i = 0; $i < $header_num; $i ++) {
    $header_row = mysqli_fetch_array($header_result);
    $_GET['id'] = $header_row['ID'];
    $_GET["type"] = 'weekly';
    include ('show.php');
}
// include('core/database_close.php');
?>
  
<?php include('core/public-footer.php')?>
  
