<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/Lib/database.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Lib/functions.php';

function signIn($login, $password) {
    session_start();
    $array = getUserByLogin($login);

    if (!$array) {
        return false;
    }

    $salt = $array['salt'];
    $hash = hashPassword($password, $salt);

    if ($hash !== $array['password']) {
        return false;
    }

    $_SESSION['id'] = $array['id'];
    $_SESSION['login'] = $array['login'];
    $_SESSION['password'] = $array['password'];

    return true;
}

if(isset($_POST['signIn'])) {
    $login = isset($_POST['login']) ? strval($_POST['login']) : '';
    $password = isset($_POST['password']) ? strval($_POST['password']) : '';

    $login = trim($login);
    $password = trim($password);

    if(signIn($login, $password)) {
        $location = $_GET['go'];

        header("Location: /" . $location);
        die();
    }

}


?>