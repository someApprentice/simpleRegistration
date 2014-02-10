<?php
require_once __DIR__ . '/database.php';
require_once __DIR__ . '/functions.php';
require_once __DIR__ . '/cookies.php';

function signIn($login, $password, $remember) {
    $array = getUserByLogin($login);

    if (!$array) {
        return false;
    }

    $salt = $array['salt'];
    $hash = hashPassword($password, $salt);

    if ($hash !== $array['password']) {
        return false;
    }

    if($remember) {
        createCookies($array['id'], $array['login'], $array['token']);
    }

    $_SESSION['id'] = $array['id'];
    $_SESSION['login'] = $array['login'];
    $_SESSION['token'] = $array['token'];

    return true;
}
?>