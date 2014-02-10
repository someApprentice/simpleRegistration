<?php
require_once __DIR__ . '/Lib/registration.php';
require_once __DIR__ . '/Lib/functions.php';

$login = "";
$password = "";
$retryPassword = "";

$errors = array(
    'login' => "",
    'password' => "",
    'retryPassword' => ""
);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $login = isset($_POST['login']) && is_scalar($_POST['login']) ? $_POST['login'] : '';
    $password = isset($_POST['password']) && is_scalar($_POST['password']) ? $_POST['password'] : '';
    $retryPassword = isset($_POST['retryPassword']) && is_scalar($_POST['retryPassword']) ? $_POST['retryPassword'] : '';

    $login = trim($login);
    $password = trim($password);
    $retryPassword = trim($retryPassword);

    if($retryPassword != $password) {
        $errors['retryPassword'] = "Passwords do not match";
    }

    session_start();
    if (signUp($login, $password,  $errors)) {
        redirect();
        die();
    }
}

require 'Templates/registration.phtml';
?>