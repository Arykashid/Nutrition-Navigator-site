<?php
$host = 'localhost';
$db = 'nutrition_db';
$user = 'root';
$pass = ''; // default password for XAMPP is empty

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>
