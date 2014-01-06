<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/Config/connect.php';

function getUserByLogin($login) {
    global $connect;

    $query = $connect->prepare("SELECT * FROM users WHERE login=:login");
    $query->bindValue(':login', $login, PDO::PARAM_STR);
    $query->execute();
    $result = $query->fetch(PDO::FETCH_ASSOC);

    return $result;
}

function  createUser($login, $hash, $salt) {
    global $connect;

    $insert = $connect->prepare("INSERT INTO users (id, login, password, salt) VALUES (NULL, :login, :hash, :salt)");
    $insert->execute(array(
        ':login' => $login,
        ':hash' => $hash,
        ':salt' => $salt
    ));

    return $insert;
}
?>