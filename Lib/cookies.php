<?php
function createCookies($id, $login, $password, $token) {
    setcookie("id", $id, time() + 60*60*24*30*12, null, null, null, true);
    setcookie("login", $login, time() + 60*60*24*30*12, null, null, null, true);
    setcookie("password", $password, time() + 60*60*24*30*12, null, null, null, true);
    setcookie("token", $token, time() + 60*60*24*30*12, null, null, null, true);
}
?>