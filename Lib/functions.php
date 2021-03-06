<?php
require_once __DIR__ . '/database.php';

function isLoggedIn() {
    if((!isset($_SESSION['id'])) || (!isset($_COOKIE['id']))){
        session_start();
    }

    if(isset($_SESSION['id'])) {
        return true;
    } elseif(isset($_COOKIE['id'])) {
        $user = getUserById($_COOKIE['id']);

        if($user['token'] == $_COOKIE['token']) {
            $_SESSION['id'] = $user['id'];
            $_SESSION['login'] = $user['login'];
            $_SESSION['token'] = $user['token'];
        } else {
            return false;
        }

        return true;
    } else {
        return false;
    }
}

function hashPassword($password, $salt) {
    $hash = md5($password . $salt);

    return $hash;
}

function generateSalt() {
    $salt = substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ.*-^%$#@!?%&%_=+<>[]{}0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ.*-^%$#@!?%&%_=+<>[]{}'), 0, 44);
    return $salt;
}

function retryPasswordIsMatch($password, $retryPassword) {
    if ($password != $retryPassword) {
        $error['retryPassword'] = "Passwords do not match";
    } else {
        $error = "";
    }

    return $error;
}

function redirect() {
    if(isset($_GET['go'])) {
        $location = $_GET['go'];

        //if (!preg_match('/^(http(s)?:)?(\\\\\\\\|\\/\\/).+$/', $location, $matches)) {
        if (preg_match('!^/([^/]|\\Z)!', $location, $matches)) {
            header("Location: " . $location);
        }
    }
}

function generateToken() {
    $token = substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyz'), 0, 32);
    return $token;
}

function getName() {
    if(isset($_COOKIE['id'])) {
        $name = $_COOKIE['login'];
    } else {
        $name = $_SESSION['login'];
    }

    return $name;
}

function getToken() {
    if(isset($_COOKIE['id'])) {
        $token = $_COOKIE['token'];
    } else {
        $token = $_SESSION['token'];
    }

    return $token;
}

function tokenIsMatch() {
    if(isset($_GET['token'])) {
        $token = $_GET['token'];

        if(($_SESSION['token'] == $token) || ($_COOKIE['token'] == $token)) {
            return true;
        } else {
            return false;
        }
    }
}
?>