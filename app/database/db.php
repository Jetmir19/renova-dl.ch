<?php

$dbHost = DB_HOST;
$dbName = DB_NAME;
$dbCharset = DB_CHARSET;
$dbUser = DB_USER;
$dbPw = DB_PASS;

try {
    $db = new PDO(
        "mysql:host=$dbHost;dbname=$dbName;charset=$dbCharset",
        "$dbUser",
        "$dbPw"
    );
} catch (PDOException $e) {
    die("Connection to Database failed.");
}
