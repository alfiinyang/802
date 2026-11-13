<?php
// Handles the form submitted from registration.php
require 'db.php';

$email    = trim($_POST['txtUserName'] ?? '');
$password = $_POST['txtPassword'] ?? '';
$repeat   = $_POST['txtRepeatPassword'] ?? '';

if ($email === '' || $password === '') {
    die("Email and password are required. <a href='registration.php'>Go back</a>");
}
if ($password !== $repeat) {
    die("Passwords do not match. <a href='registration.php'>Go back</a>");
}

// Check if the email is already registered
$stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
if ($stmt->get_result()->num_rows > 0) {
    die("That email is already registered. <a href='index.php'>Log in</a>");
}

// Save the new user with a hashed password
$hash = password_hash($password, PASSWORD_DEFAULT);
$stmt = $conn->prepare("INSERT INTO users (email, password) VALUES (?, ?)");
$stmt->bind_param("ss", $email, $hash);
$stmt->execute();

echo "Registration successful! <a href='index.php'>Log in now</a>";
?>

