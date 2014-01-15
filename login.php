<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/Lib/authentication.php';

$login = '';
$password = '';

$errors = array(
    'login' => "",
    'password' => ""
);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $login = isset($_POST['login']) && is_scalar($_POST['login']) ? $_POST['login'] : '';
    $password = isset($_POST['password']) && is_scalar($_POST['password']) ? $_POST['password'] : '';

    $login = trim($login);
    $password = trim($password);

    if ('' === $login) {
        $errors['login'] = "Empty login field.";
    } elseif ('' === $password) {
        $errors['password'] = "Empty password field";
    } else {
        session_start();

        if (signIn($login, $password, $errors)) {
            $location = $_GET['go'];

            header("Location: /" . $location);
            die();
        }
    }
}

require 'Templates/login.phtml';
?>
