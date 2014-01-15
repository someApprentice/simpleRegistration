<?php
function isLoggedIn() {
    if(isset($_SESSION['id'])) {
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
    $salt = substr(str_shuffle('0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ.*-^%$#@'), 0, 44);
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

?>