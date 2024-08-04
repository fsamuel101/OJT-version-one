<?php

$host = 'localhost';
$dbname = 'plsp_pdf_library';
$dbusername = 'root'; //default
$dbpassword = '';   //default

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $dbusername, $dbpassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die('Connection failed: ' . $e->getMessage());
}
