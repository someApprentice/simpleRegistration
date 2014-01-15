<?php
require_once __DIR__ . '\database.php';
require_once __DIR__ . '\functions.php';

function signIn($login, $password) {
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
?>