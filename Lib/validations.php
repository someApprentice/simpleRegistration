<?php
function isLoginInvalid($login) {
    if(!preg_match('/^[\\w\\(\\)\\.\\*-]{3,20}$/', $login, $matches)) {
        if(!preg_match('/^[\\w\\(\\)\\.\\*-]*$/', $login, $matches)) {
            $error = "Incorrect login type: Login contains invalid characters.";
        } elseif(mb_strlen($login) < 3) {
            $error = "Incorrect login type: Login is too short.";
        } elseif(mb_strlen($login) > 20) {
            $error = "Incorrect login type: Login is too long.";
        }
    } else {
        $error = "";
    }

    return $error;
}

function isPasswordInvalid($password) {
    if(!preg_match('/^[\\w\\(\\)\\.\\*-]{3,20}$/', $password, $matches)) {
        if(!preg_match('/^[\\w\\(\\)\\.\\*-]*$/', $password, $matches)) {
            $error = "Incorrect login type: Password contains invalid characters.";
        } elseif(mb_strlen($password) < 3) {
            $error = "Incorrect login type: Password is too short.";
        } elseif(mb_strlen($password) > 20) {
            $error = "Incorrect login type: Password is too long.";
        }
    } else {
        $error = "";
    }

    return $error;
}
?>