<?php
    include('securitycheck.php');

    require_once $parent . '/semi-orm/Posts.php';
    use orm\Posts;
    $conn  = $db->open();
    $Post = new Posts($conn);

    if (isset($_POST["insert"]) || isset($_POST['update'])) {

        $Post->Insert([
            ["MasterId", "'" . mysqli_real_escape_string($conn, $_POST['masterid']) . "'"],
            ["Title", "'" . mysqli_real_escape_string($conn, $_POST['title']) . "'"],
            ["Submit", "'" . mysqli_real_escape_string($conn, $_POST['submit']) . "'"],
            ["Type", "'" . mysqli_real_escape_string($conn, $_POST['type']) . "'"],
            ["Level", "'" . mysqli_real_escape_string($conn, $_POST['level']) . "'"],
            ["Body", "'" . mysqli_real_escape_string($conn, $_POST['body']) . "'"],
            ["CategoryId", mysqli_real_escape_string($conn, $_POST['categoryid'])],
            ["UserId", mysqli_real_escape_string($conn, $_POST['userid'])],
            ["Status", "'" . mysqli_real_escape_string($conn, $_POST['status']) . "'"],
            ["RefrenceId", mysqli_real_escape_string($conn, (($_POST['refrenceid'] == NULL) ? "NULL" : $_POST['refrenceid']))],
            ["Index", mysqli_real_escape_string($conn, $_POST['index'])],
            ["Deleted", "0"],
        ]);

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
    /*
    if ((isset($_POST["update"])) or (isset($_POST["insert"])))
    {
        $_POST['id'] =  mysqli_insert_id($conn);
        if ($_FILES['content']['size'] > 0) 
        $query = "UPDATE posts SET `Content` = '" . mysqli_real_escape_string($conn, file_get_contents($_FILES['content']['tmp_name'])) . "' WHERE `Id` = '" . $_POST['id'] . "';";
        mysqli_query($conn, $query);
    }
    */
    if (!empty($_POST))
        header("Location: " . $npath . '/view.php?id=' . $_POST['masterid']);
?>