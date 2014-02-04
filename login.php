<?php
require_once __DIR__ . '/Lib/authentication.php';
require_once __DIR__ . '/Lib/registration.php';
require_once __DIR__ . '/Lib/cookies.php';

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

        if(isset($_POST['rememberMe'])) {
            $remember = true;
        } else {
            session_start();
            $remember = false;
        }

        if (signIn($login, $password, $remember)) {
            redirection();
            die();
        } else {
            $errors['login'] = "Incorrect username or password.";
        }
    }
}

require 'Templates/login.phtml';
?>
