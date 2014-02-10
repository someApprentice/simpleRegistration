<?php
require_once __DIR__ . '/Lib/functions.php';
require_once __DIR__ . '/Lib/cookies.php';
session_start();

if(isLoggedIn()) {
    if(tokenIsMatch()) {
        session_destroy();

        if(isset($_COOKIE['id'])) {
            deleteCookies();
        }
    }

    redirect();
    die();
} else {
    redirect();
}
?>