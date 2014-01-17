<?php
require_once __DIR__ . '/database.php';
require_once __DIR__ . '/functions.php';
require_once __DIR__ . '/validations.php';
require_once __DIR__ . '/authentication.php';

function signUp ($login, $password, &$errors = array()) {
    if (getUserByLogin($login)) {
        $errors['login'] = 'This user already exists';

        //return false;
    }

    if (isLoginInvalid($login)) {
        $errors['login'] = isLoginInvalid($login);
    }

    if (isPasswordInvalid($password)) {
        $errors['password'] = isPasswordInvalid($password);
    }

    //$errors = array_filter($errors);

    if (!empty(array_filter($errors))) {
        //include $_SERVER['DOCUMENT_ROOT'] . '/Templates/form.php';

        return false;
    }

    $salt = generateSalt();
    $hash = hashPassword($password, $salt);

    createUser($login, $hash, $salt);

    if (!signIn($login, $password)) {
        $errors['login'] = 'Unable to login, all broke.';

        return false;
    }

    return true;
}
?>