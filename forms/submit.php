<?php
    require_once  $parent . '/core/functionalities.php';
    use core\functionalities;
    $functionalitiesInstance = new functionalities();
    include('securitycheck.php');
    require_once ($parent . '/core/authentication.php'); /* Check before send */
    use core\authentication;
    require_once $parent . '/semi-orm/Posts.php';
    use orm\Posts;
    $conn  = $db->open();
    $Post = new Posts($conn);

    if (isset($_POST["insert"]) || isset($_POST['update']) || isset($_POST['clear'])) {
        $Post->Insert([
            ["MasterId", "'" . mysqli_real_escape_string($conn, $_POST['masterid']) . "'"],
            ["Title", ($functionalitiesInstance->ifexistsidx($_POST, 'title') == NULL) ? "NULL" : "'" . mysqli_real_escape_string($conn, ($_POST['title'])) . "'"],
            ["Submit", "'" . mysqli_real_escape_string($conn, $_POST['submit']) . "'"],
            ["Type", "'" . mysqli_real_escape_string($conn, $_POST['type']) . "'"],
            ["Language", "'" . mysqli_real_escape_string($conn, $_POST['language']) . "'"],
            ["Level", ($functionalitiesInstance->ifexistsidx($_POST, 'level') == NULL) ? "NULL" : "'" . mysqli_real_escape_string($conn, ($_POST['level'])) . "'"],
            ["Body", "'" . mysqli_real_escape_string($conn, $_POST['body']) . "'"],
            ["UserId", mysqli_real_escape_string($conn, $_POST['userid'])],
            ["ContentDeleted", "0"],
            ["Status", "'" . mysqli_real_escape_string($conn, $_POST['status']) . "'"],
            ["RefrenceId", ($functionalitiesInstance->ifexistsidx($_POST, 'refrenceid') == NULL) ? "NULL" : "'" . mysqli_real_escape_string($conn, ($_POST['refrenceid'])) . "'"],
            ["Index", mysqli_real_escape_string($conn, (($functionalitiesInstance->ifexistsidx($_POST, 'index') == NULL) ? "NULL" : $_POST['index']))],
            ["Deleted", "0"],
        ]);
    }
    else if (isset($_POST["delete"])) {
        $Post->Delete($_POST['id'], 
            $_POST['language']);
    }
    if (isset($_POST["clear"]))
    {
        $Post->Update(mysqli_insert_id($conn),[
            ["ContentDeleted", "1"],
        ]);
    }
    else if ((isset($_POST["update"])) or (isset($_POST["insert"])))
    {
        if ($_FILES['content']['size'] > 0) 
        $Post->Update(mysqli_insert_id($conn), [
            ["Content", 
                "'" . mysqli_real_escape_string($conn, file_get_contents($_FILES['content']['tmp_name'])) . "'"],
        ]);
    }
    if (!empty($_POST))
    {
        if ($_POST['type'] == "FILE")
            exit(header("Location: " . $npath . '/box.php'));
        else if ($_POST['type'] == "ANSR")
            exit(header("Location: " . $npath . '/answer.php?lang=' . $_POST['language'] . '&id=' . $_POST['masterid']));
       
        if (isset($_POST["delete"]))
            exit(header("Location: " . $npath ));
        
        if ($_POST['type'] == "QUST")
            exit(header("Location: " . $npath . '/view.php?lang=' . $_POST['language'] . '&id=' . $_POST['masterid']));
        if ($_POST['type'] == "COMT")
            exit(header("Location: " . $npath . '/view.php?lang=' . $_POST['language'] . '&id=' . $_POST['refrenceid']));
        if ($_POST['type'] == "POST")
            exit(header("Location: " . $npath . '/post.php?lang=' . $_POST['language'] . '&id=' . $_POST['masterid']));
    }
?>