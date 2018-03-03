<?php
include_once ('core/init.php');
include ('core/auth.php');
require_once 'core/functionalities.php';
use core\functionalities;
include ('core/public-header.php');

$Id = mysqli_real_escape_string($conn, $functionalitiesInstance->ifexistsidx($_GET, 'id'));
if ($Id != null)
    $MasterID = $Post->GetValueById($Id, 'MasterID');
$row = $Post->FirstOrDefault($MasterID);
?>

<label for="title">نام کاربری</label>
<input name="title" type="text" value="<?= $Title ?>" />

<div class="pass">
    <label for="title">گذرواژه‌ی قبلی</label>
    <input name="title" type="password" />

    <label for="title">گذرواژه‌‌ی جدید</label>
    <input name="title" type="password" />

    <label for="title">تکرار جدید</label>
    <input name="title" type="password" />
</div>

<label for="body">پرونده</label>
<input type="file" name="content" id="file" />

<?php
include ('helper/user_role.php');
include ('helper/user_active.php');
include ('core/public-footer.php');
?>