<?php
// Database connection - include this at the top of any page that needs the database.
// XAMPP defaults: user "root", empty password.
$conn = new mysqli("localhost", "root", "", "flamingo");

if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}
?>

