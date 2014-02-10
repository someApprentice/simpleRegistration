<?php
function createCookies($id, $login, $token) {
    $expires = 60*60*24*30*12;

    setcookie("id", $id, time() + $expires, null, null, null, true);
    setcookie("login", $login, time() + $expires, null, null, null, true);
    setcookie("token", $token, time() + $expires, null, null, null, true);
}

function deleteCookies() {
    unset($_COOKIE['id']);
    unset($_COOKIE['login']);
    unset($_COOKIE['token']);

    setcookie('id', null, -1, '/');
    setcookie('login', null, -1, '/');
    setcookie('password', null, -1, '/');
    setcookie('token', null, -1, '/');
}
?>