<?php
require 'auth.php';
require 'db.php';

$term = trim($_GET['q'] ?? '');
$result = null;
if ($term !== '') {
    $like = "%$term%";
    $stmt = $conn->prepare("SELECT * FROM prodlist WHERE prodCode LIKE ? OR prodName LIKE ? OR prodDesc LIKE ?");
    $stmt->bind_param("sss", $like, $like, $like);
    $stmt->execute();
    $result = $stmt->get_result();
}
?>
<html>
<head><title>Search Products</title>
<link rel="stylesheet" type="text/css" href="homepage.css" />
<style>h1{text-align:center} table{border-collapse:collapse} td,th{border:1px solid #ccc;padding:6px 10px}</style></head>
<body>
<?php include 'nav.php'; ?>
<h2>Search for a Product</h2>
<form method="GET">
  <input type="text" name="q" value="<?php echo htmlspecialchars($term); ?>" placeholder="code, name or description">
  <input type="submit" value="Search">
</form>
<?php if ($result): ?>
  <?php if ($result->num_rows === 0): ?>
    <p>No products found.</p>
  <?php else: ?>
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
  <?php endif; ?>
<?php endif; ?>
</body>
</html>

