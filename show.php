<?php

    /*
    TODO: Parameters (Id || (SKIP, TAKE, ORDERBY, ASC-DESC))
            update index.php with standards above
    */

    require_once 'core/functionalities.php';
    use core\functionalities;
    include('core/init.php');
    $functionalitiesInstance = new functionalities();
    $Id = mysqli_real_escape_string($conn, $_GET["id"]);
    $query = "select Username, Title, Submit, Body, Type from post_details where ID=" . $Id . ";";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);        
    include ('views/' . $row["Type"] . '.php');
    include('core/database_close.php');
?>