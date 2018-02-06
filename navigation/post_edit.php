<?php
$parent = realpath(dirname(__FILE__) . '/..');
require_once ($parent . '/core/authentication.php');
$auth = new auth();
$UserId = $auth->login();
if ($UserId == null)
        return;
?>
<a href="admin.php?type=POST&id=<?= $Id ?>">ویرایش</a>