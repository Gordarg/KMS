<?php
include ('core/init.php');
require_once 'core/functionalities.php';
use core\functionalities;

$Id = mysqli_real_escape_string($conn, $_GET["id"]);

$query = "SELECT `Content` FROM `post_details` where MasterID='" . $Id . "';";

$result = mysqli_query($conn, $query);
$item = mysqli_fetch_array($result);
$content = $item["Content"];

$finfo = new finfo(FILEINFO_MIME);
$type = $finfo->buffer($content);
$size = strlen($content);

$delimiters = array("/",";"," ","=");
$ready = str_replace($delimiters, $delimiters[0], $type);
$launch = explode($delimiters[0], $ready);
$name = "Gord-" . $Id . '.' . $launch[1];

header("Content-type: " . $type);
header('Content-Disposition: attachment; filename="' . $name . '"');
header("Content-Transfer-Encoding: binary");
// header('Expires: 0');
// header('Pragma: no-cache');
header("Expires: ".gmdate("D, d M Y H:i:s", time()+1800)." GMT");
header("Cache-Control: max-age=1800");
header("Content-Length: " . $size);
echo $content;
exit;
// TODO: include ('core/database_close.php');
?>
