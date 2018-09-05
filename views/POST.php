<?php
if ($row['Type'] == "QUST")
{
    echo '<article>';
    echo '<h3><a href="view.php?lang=' . $row['Language'] . '&id=' . $row['MasterID'] . '">' . $row['Title'] . '</h3></a>';
    echo '</article>';
}
else
switch ($_GET["level"])
{
    case "view":
        echo '<article>';
        $content = $row["Content"];
        $finfo = new finfo(FILEINFO_MIME);
        $type = $finfo->buffer($content);
        $size = strlen($content);
        $delimiters = array("/",";"," ","=");
        $ready = str_replace($delimiters, $delimiters[0], $type);
        $launch = explode($delimiters[0], $ready);
        $extension = $launch[1];
        $os = array("png", "jpg", "jpeg", "bmp", "gif");
        if (in_array($extension, $os)) {
            echo '<img src="download.php?id=' . $Id . '" alt="' . $row["Title"] . '" />';
        }
        else if ($extension != "x-empty") {
             echo '<a class="attachment" href="download.php?id=' . $Id . '">' . $functionalitiesInstance->label("دانلود پیوست") . '</a>';
        }
        include ('helper/post_edit.php');
        echo '<h1>' . $row['Title'] . '</h1>';
        echo $Parsedown->text($row['Body']);
        echo '</article>';
        $rows=[];
        $rows = $post->ToList(-1, -1, "Submit", "DESC", "WHERE `Type` = 'KWRD' AND `RefrenceId`='" . mysqli_real_escape_string($conn, $functionalitiesInstance->ifexistsidx($_GET, 'id')) . "'");
        echo '<div class="keywords">';
        foreach ($rows as $row) {
            $_GET['masterid'] = $row['MasterID'];
            $_GET["type"] = 'KWRD';
            include ('views/render.php');
        }
        echo '</div>';
        include ('helper/post_comment.php');
        $rows=[];
        $rows = $post->ToList(-1, -1, "Submit", "DESC", "WHERE `Type` = 'COMT' AND `RefrenceId`='" . mysqli_real_escape_string($conn, $functionalitiesInstance->ifexistsidx($_GET, 'id')) . "'");
        echo '<div class="comments">';
        foreach ($rows as $row) {
            $_GET['masterid'] = $row['MasterID'];
            $_GET["type"] = 'COMT';
            include ('views/render.php');
        }
        echo '</div>';
        break;
    case "3":
        echo '<li><a href="view.php?lang="' . $row['Language'] . '"&id=' . $row['MasterID'] . '">';
        echo '  <h1>' . $row['Title'] . '</h1><br>';
        echo '  <span>' . $functionalitiesInstance->makeAbstract($Parsedown->text($row['Body']), 120) . '</span>';
        echo '</a></li>';
        break;
    case "1":
        echo '<a href="view.php?lang=' . $row['Language'] . '&id=' . $row['MasterID'] . '">';
        echo '<img src="download.php?id=' . $row['MasterID'] . '" alt="' . $row["Title"] . '" >';
        echo '<h2>' . $row['Title'] . '</h2>';
        echo '<p>' . $functionalitiesInstance->makeAbstract($Parsedown->text($row['Body']), 480)  . '</p>';
        echo '</a>';
        break;
    case "2":
        echo '<article>';
        echo $row['Submit'] . '<br>';
        echo '<div>';
        echo '<h4><b>' . $row['Username'] . '</b></h4>';
        echo '<h2><a href="view.php?lang=' . $row['Language'] . '&id=' . $row['MasterID'] . '">' . $row['Title'] . '</a></h2>';
        echo $functionalitiesInstance->makeAbstract($Parsedown->text($row['Body']), 960, "<img>");
        echo '</div>';
        echo '</article>';
        break;
    default:
        break;
}
?>
