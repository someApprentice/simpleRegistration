<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/Lib/functions.php';
session_start();

if(isLoggedIn()) {
    session_destroy();

    $location = $_GET['go'];

    header("Location: /" . $location);
    die();
} else {
    header("Location: /index.php");
}
?>