<?php
// Include this on pages that only logged-in users may see.
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: index.php");
    exit;
}
?>

