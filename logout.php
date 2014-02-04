<?php
require_once __DIR__ . '/Lib/functions.php';
session_start();

if(isLoggedIn()) {
    if(tokenIsMatch()) {
        session_destroy();

        if(isset($_COOKIE['id'])) {
            unset($_COOKIE['id']);
            unset($_COOKIE['login']);
            unset($_COOKIE['password']);
            unset($_COOKIE['token']);

            setcookie('id', null, -1, '/');
            setcookie('login', null, -1, '/');
            setcookie('password', null, -1, '/');
            setcookie('token', null, -1, '/');
        }
    }

    redirection();
    die();
} else {
    redirection();
}
?>