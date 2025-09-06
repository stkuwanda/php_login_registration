<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'users_db';

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
  echo 'Connection Error' . $conn->connect_error . '<br>';
  die('Connection failed: ' . $conn->connect_error);
}