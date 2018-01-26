<?php
    if (isset($_POST["insert"])) {
        
        /*
        TODO: Modify queries.
        TODO: If there was a master ID, update (insert new version) else insert.
        */

        $post_query = "INSERT INTO posts (`Title`,`Submit`,`Body`,`CategoryId`,`UserId`, `Type`) VALUES(" . "'" . mysqli_real_escape_string($conn, $_POST['title']) . "'" . ", " . "'" . mysqli_real_escape_string($conn, $_POST['submit']) . "'" . ", " . "'" . mysqli_real_escape_string($conn, $_POST['body']) . "'" . ", " . "'" . mysqli_real_escape_string($conn, $_POST['categoryid']) . "'" . ", " . "'" . mysqli_real_escape_string($conn, $_POST['userid']) . "'" .
        ", " . "'" . mysqli_real_escape_string($conn, $_POST['type']) . "'" .
        ");";

        if ($_FILES['content']['size'] > 0) 
            $post_query .= "UPDATE posts SET `Content` = '" . mysqli_real_escape_string($conn, file_get_contents($_FILES['content']['tmp_name'])) . "' WHERE `Id` = " . $Id . ";";
    }
    else if (isset($_POST["delete"])) {
        $post_query = "UPDATE posts SET `Deleted` = '1' WHERE `Id` = " . $Id . ";";
    } 
    if (isset($_POST["delete"]) || isset($_POST["insert"]))
    {
        // TODO: $post_result = mysqli_query($conn, $post_query);
        header("Location: " . $path);
    }
?>