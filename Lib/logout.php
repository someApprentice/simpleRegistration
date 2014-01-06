<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/Lib/functions.php';
session_start();

if(isLoggedIn()) {
    session_destroy();
}
header("Location: /index.php");
?>