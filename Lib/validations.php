<?php
function isLoginValid($login) {
    if(!preg_match('/^[\\w\\.\\*-]{3,20}$/', $login, $matches)) {
        if(!preg_match('/^[\\w\\.\\*-]*$/', $login, $matches)) {
            $error = "Incorrect login type: Login contains invalid characters.";
        } elseif(!preg_match('/^[.]{,3}$/', $login, $matches)) {
            $error = "Incorrect login type: Login is too short.";
        } elseif(!preg_match('/^[.]{20,}$/', $login, $matches)) {
            $error = "Incorrect login type: Login is too long.";
        }
    } else {
        $error = "";
    }

    return $error;
}

function isPasswordValid($password) {
    if(!preg_match('/^[\\w\\.\\*-]{3,20}$/', $password, $matches)) {
        if(!preg_match('/^[\\w\\.\\*-]*$/', $password, $matches)) {
            $error = "Incorrect login type: Password contains invalid characters.";
        } elseif(!preg_match('/^[.]{,3}$/', $password, $matches)) {
            $error = "Incorrect login type: Password is too short.";
        } elseif(!preg_match('/^[.]{20,}$/', $password, $matches)) {
            $error = "Incorrect login type: Password is too long.";
        }
    } else {
        $error = "";
    }

    return $error;
}
?>