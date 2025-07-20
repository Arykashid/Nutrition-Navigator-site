<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "nutrition_db"; // use your actual DB name

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}