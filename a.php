<?php
/* TODO: Route URLS here */

// Grabs the URI and breaks it apart in case we have querystring stuff
$request_uri = explode('?', $_SERVER['REQUEST_URI'], 2);

switch ($request_uri[0]) {
    case '/':
        require '../index.php';
        break;
    case '/login':
        require '../login.php';
        break;

    default:
        header('HTTP/1.0 404 Not Found');
        require '../error.php?code=404';
        break;
}