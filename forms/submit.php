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
        
        /*
        TODO: this if clause is not triggered
        */

        /*
        TODO: Status
        TODO: Modify queries.
        TODO: If there was a master ID, update (insert new version) else insert.
        NOTE: There is a trigger in database that will fill the MasterId field with automatic value if your Guid.NewId() / newid() is not present.
        */

    }
    else if (isset($_POST["delete"])) {      
        $query = "UPDATE posts SET `Deleted` = '1' WHERE `Id` = " . $_POST['id'] . ";";
    } 
    if ((isset($_POST["delete"])) or (isset($_POST["insert"])))
    {
        $result = mysqli_query($conn, $query);

        /* TODO:
        Get last inserted id
        */
        $_POST['id'] = 17;

        if ($_FILES['content']['size'] > 0) 
            $query = "UPDATE posts SET `Content` = '" . mysqli_real_escape_string($conn, file_get_contents($_FILES['content']['tmp_name'])) . "' WHERE `Id` = '" . $_POST['id'] . "';";
  
        $result = mysqli_query($conn, $query);
        header("Location: " . $path);
    }
?>