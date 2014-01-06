<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/Config/config.php';

function getConfig($key) {
    global $config;

    return $config[$key];
}

function getPdo(){
    static $pdo = null;

    if (!$pdo) {
        $pdo = new PDO(
            getConfig('db_dsn'),
            getConfig('db_user'),
            getConfig('db_password')
        );
    }

    return $pdo;
}

$connect = getPdo();
?>