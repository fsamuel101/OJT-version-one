<?php

$host = 'localhost';
$dbname = 'library';
$dbusername = 'root'; //default
$dbpassword = 'admin';   //default

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $dbusername, $dbpassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die('Connection failed: ' . $e->getMessage());
}
