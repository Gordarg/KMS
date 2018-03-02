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
        $Post->Delete($_POST['id']);
        exit(header("Location: " . $npath ));
    }
    else if (isset($_POST["clear"]))
    {
        $Post->Update($_POST['id'], [
            ["ContentDeleted", "1"],
        ]);
    }
    if ((isset($_POST["update"])) or (isset($_POST["insert"])))
    {
        if ($_FILES['content']['size'] > 0) 
        $Post->Update(mysqli_insert_id($conn), [
            ["Content", 
                "'" . mysqli_real_escape_string($conn, file_get_contents($_FILES['content']['tmp_name'])) . "'"],
        ]);
    }
    if (!empty($_POST))
        exit(header("Location: " . $npath . '/view.php?id=' . $_POST['masterid']));
?>