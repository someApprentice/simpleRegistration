<?php
require_once __DIR__ . '/connect.php';

function getUserByLogin($login) {
    $connect = getPdo();

    $query = $connect->prepare("SELECT * FROM users WHERE login=:login");
    $query->bindValue(':login', $login, PDO::PARAM_STR);
    $query->execute();
    $result = $query->fetch(PDO::FETCH_ASSOC);

    return $result;
}

function  createUser($login, $hash, $salt) {
    $connect = getPdo();

    $insert = $connect->prepare("INSERT INTO users (id, login, password, salt) VALUES (NULL, :login, :hash, :salt)");
    $insert->execute(array(
        ':login' => $login,
        ':hash' => $hash,
        ':salt' => $salt
    ));

    return $insert;
}
?>