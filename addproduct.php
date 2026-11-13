<?php
require 'auth.php';
require 'db.php';

$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $conn->prepare("INSERT INTO prodlist (prodCode, prodName, prodDesc, prodPrice) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("sssd", $_POST['prodCode'], $_POST['prodName'], $_POST['prodDesc'], $_POST['prodPrice']);
    $message = $stmt->execute() ? "Product added!" : "Error: " . $conn->error;
}
?>
<html>
<head><title>Add Product</title>
<link rel="stylesheet" type="text/css" href="homepage.css" />
<style>h1{text-align:center}</style></head>
<body>
<?php include 'nav.php'; ?>
<h2>Add New Product</h2>
<p><?php echo htmlspecialchars($message); ?></p>
<form method="POST">
  Code: <input type="text" name="prodCode" required><br/><br/>
  Name: <input type="text" name="prodName" required><br/><br/>
  Description: <input type="text" name="prodDesc" size="50" required><br/><br/>
  Price: <input type="number" name="prodPrice" step="1" min="0" required><br/><br/>
  <input type="submit" value="Add Product">
</form>
</body>
</html>

