<?php
require_once __DIR__ . '/connect.php';

function getUserById($id) {
    $connect = getPdo();

    $user = $connect->prepare("SELECT * FROM users WHERE id=:id");
    $user->bindValue(':id', $id, PDO::PARAM_STR);
    $user->execute();
    $result = $user->fetch(PDO::FETCH_ASSOC);

    return $result;
}

function getUserByLogin($login) {
    $connect = getPdo();

    $query = $connect->prepare("SELECT * FROM users WHERE login=:login");
    $query->bindValue(':login', $login, PDO::PARAM_STR);
    $query->execute();
    $result = $query->fetch(PDO::FETCH_ASSOC);

    return $result;
}

function  createUser($login, $hash, $salt, $token) {
    $connect = getPdo();

    $insert = $connect->prepare("INSERT INTO users (id, login, password, salt, token) VALUES (NULL, :login, :hash, :salt, :token)");
    $insert->execute(array(
        ':login' => $login,
        ':hash' => $hash,
        ':salt' => $salt,
        ':token' => $token
    ));

    return $insert;
}
?>