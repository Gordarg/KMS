<?php
    include('securitycheck.php');

    if (isset($_POST["insert"]) || isset($_POST['update'])) {
        $query = "INSERT INTO `posts` (`MasterId`, `Title`, `Submit`, `Type`, `Level`, `Body`, `CategoryId`, `UserId`, `Status`, `RefrenceId`, `Index`, `Deleted`) VALUES ('"
        . mysqli_real_escape_string($conn, $_POST['masterid']) . "','"
        . mysqli_real_escape_string($conn, $_POST['title']) . "','"
        . mysqli_real_escape_string($conn, $_POST['submit']) . "','"
        . mysqli_real_escape_string($conn, $_POST['type']) . "',"
        . mysqli_real_escape_string($conn, $_POST['level']) . ",'"
        . mysqli_real_escape_string($conn, $_POST['body']) . "',"
        . mysqli_real_escape_string($conn, $_POST['categoryid']) .","
        . mysqli_real_escape_string($conn, $_POST['userid']) .",'"
        . mysqli_real_escape_string($conn, $_POST['status']) ."',"
        . mysqli_real_escape_string($conn, (($_POST['refrenceid'] == null)?"NULL":$_POST['refrenceid'])) .","
        . mysqli_real_escape_string($conn, $_POST['index']) .","
        . "0"
        . ");";
    }
    else if (isset($_POST["delete"])) {      
       
        $query = "UPDATE posts SET `Deleted` = 1 WHERE `Id` = " . $_POST['id'] . ";";
    }
    else if (isset($_POST["clear"]))
    {
        $query = "UPDATE posts SET `ContentDeleted` = 1 WHERE `Id` = " . $_POST['id'] . ";";
    }
    if (!empty($_POST))
    {
        mysqli_query($conn, $query);
    }
    if ((isset($_POST["update"])) or (isset($_POST["insert"])))
    {
        $_POST['id'] =  mysqli_insert_id($conn);
        if ($_FILES['content']['size'] > 0) 
        $query = "UPDATE posts SET `Content` = '" . mysqli_real_escape_string($conn, file_get_contents($_FILES['content']['tmp_name'])) . "' WHERE `Id` = '" . $_POST['id'] . "';";
        mysqli_query($conn, $query);
    }
    if (!empty($_POST))
        header("Location: " . $npath . '/view.php?id=' . $_POST['masterid']);
?>