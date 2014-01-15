<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/Lib/registration.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $login = isset($_POST['login']) && is_scalar($_POST['login']) ? $_POST['login'] : '';
    $password = isset($_POST['password']) && is_scalar($_POST['password']) ? $_POST['password'] : '';
    $retryPassword = isset($_POST['retryPassword']) && is_scalar($_POST['retryPassword']) ? $_POST['retryPassword'] : '';

    $login = trim($login);
    $password = trim($password);
    $retryPassword = trim($retryPassword);

    $errors = array(
        'login' => "",
        'password' => "",
        'retryPassword' => ""
    );

    if($retryPassword != $password) {
        $errors['retryPassword'] = "Passwords do not match";
    }

    session_start();
    if (signUp($login, $password,  $errors)) {
        $location = $_GET['go'];

        header("Location: /" . $location);
        die();
    }
} else {
    require 'Templates/registration.html';
}
?>