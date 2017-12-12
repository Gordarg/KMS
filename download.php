<?php
include ('core/database_conn.php');
require_once 'core/functionalities.php';
use core\functionalities;

$Id = mysqli_real_escape_string($conn, $_GET["id"]);

$query = "select Content
        from post_details where ID=" . $Id . ";";

$result = mysqli_query($conn, $query);
$content = mysqli_fetch_array($result)["Content"];

// $finfo = new finfo(FILEINFO_MIME);
// $type = $finfo->buffer($content);


// $type = $functionalitiesInstance->getMime($name);


$name = "Gord-" . $Id;
$size = strlen($content);

// Please send the content-type :(

// header("Content-type: " . $type);
header('Content-Disposition: attachment; filename="' . $name . '"');
header("Content-Transfer-Encoding: binary");
// header('Expires: 0');
// header('Pragma: no-cache');
header("Expires: ".gmdate("D, d M Y H:i:s", time()+1800)." GMT");
header("Cache-Control: max-age=1800");
header("Content-Length: " . $size);

echo $content;
exit();
include ('core/database_close.php');
?>