<?php
require 'db.php';

$email = $_POST['email'];
$password = $_POST['password'];

$stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($user = $result->fetch_assoc()) {
  if (password_verify($password, $user['password'])) {
    echo "Welcome, " . htmlspecialchars($user['name']) . "! Login successful.";
    // You can redirect to dashboard here using: header("Location: dashboard.php");
  } else {
    echo "Incorrect password.";
  }
} else {
  echo "User not found.";
}
?>
