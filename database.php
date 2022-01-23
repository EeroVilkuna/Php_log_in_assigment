<?php

$server = 'localhost:8888';
$username = 'root';
$password = 'root';
$database = 'users';

try {
  $conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
} catch (PDOException $e) {
  die('Connection Failed: ' . $e->getMessage());
}
?>
