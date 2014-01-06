<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/Lib/database.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Lib/functions.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Lib/validations.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/Lib/authentication.php';

function signUp ($login, $password, &$errors = array()) {
    if (getUserByLogin($login)) {
        $errors['login'] = 'This user already exists';

        //return false;
    }

    if (isLoginValid($login)) {
        $errors['login'] = isLoginValid($login);
    }

    if (isPasswordValid($password)) {
        $errors['password'] = isPasswordValid($password);
    }

    //$errors = array_filter($errors);

    if (!empty(array_filter($errors))) {
        include $_SERVER['DOCUMENT_ROOT'] . '/Templates/form.php';

        return false;
    }

    $salt = generateSalt();
    $hash = hashPassword($password, $salt);

    createUser($login, $hash, $salt);

    if (!signIn($login, $password)) {
        $errors['login'] = 'Unable to login, all broke.';
        echo "<br>" . $errors['login'] . "<br>";

        return false;
    }

    return true;
}

if(isset($_POST['signUp'])) {
    $login = isset($_POST['login']) ? strval($_POST['login']) : '';
    $password = isset($_POST['password']) ? strval($_POST['password']) : '';
    $retryPassword = isset($_POST['retryPassword']) ? strval($_POST['retryPassword']) : '';

    $login = trim($login);
    $password = trim($password);
    $retryPassword = trim($retryPassword);

    $errors = array(
        'login' => "",
        'password' => "",
        'retryPassword' => ""
    );

    if($retryPassword != $password) {
        $errors['retryPassword'] = "Passwords do not match";
    }

    if (signUp($login, $password,  $errors)) {
        $location = $_GET['go'];

        header("Location: /" . $location);
        die();
    }
}
?>