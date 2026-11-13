<?php
require 'auth.php';
require 'db.php';

$result = $conn->query("SELECT * FROM prodlist ORDER BY prodCode");
?>
<html>
<head><title>All Products</title>
<link rel="stylesheet" type="text/css" href="homepage.css" />
<style>h1{text-align:center} table{border-collapse:collapse} td,th{border:1px solid #ccc;padding:6px 10px}</style></head>
<body>
<?php include 'nav.php'; ?>
<h2>All Products</h2>
<table>
<tr><th>Code</th><th>Name</th><th>Description</th><th>Price</th></tr>
<?php while ($row = $result->fetch_assoc()): ?>
<tr>
  <td><?php echo htmlspecialchars($row['prodCode']); ?></td>
  <td><?php echo htmlspecialchars($row['prodName']); ?></td>
  <td><?php echo htmlspecialchars($row['prodDesc']); ?></td>
  <td>$<?php echo htmlspecialchars($row['prodPrice']); ?></td>
</tr>
<?php endwhile; ?>
</table>
</body>
</html>

