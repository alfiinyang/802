<?php
// Handles the form submitted from index.php
session_start();
require 'db.php';

$email    = trim($_POST['txtUserName'] ?? '');
$password = $_POST['txtPassword'] ?? '';

$stmt = $conn->prepare("SELECT password FROM users WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$user = $stmt->get_result()->fetch_assoc();

if ($user && password_verify($password, $user['password'])) {
    $_SESSION['user'] = $email;
    header("Location: homepage.php");
    exit;
}

echo "Invalid username or password. <a href='index.php'>Try again</a>";
?>

