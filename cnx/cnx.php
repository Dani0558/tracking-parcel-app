<?php
$dsn    =   'server name;user;charset=utf8';
$user   =   'user';
$pass   =   'password';

try {
    $cnx    =   new PDO($dsn, $user, $pass);
} catch (PDOException $e) {
    echo 'An error has occured!';
}