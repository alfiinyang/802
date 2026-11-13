<?php
require 'auth.php';
require 'db.php';

$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $conn->prepare("UPDATE prodlist SET prodName = ?, prodDesc = ?, prodPrice = ? WHERE prodCode = ?");
    $stmt->bind_param("ssds", $_POST['prodName'], $_POST['prodDesc'], $_POST['prodPrice'], $_POST['prodCode']);
    $stmt->execute();
    $message = $stmt->affected_rows > 0 ? "Product updated!" : "No changes made.";
}

// If a product was picked, load it into the form
$selected = null;
$code = $_GET['code'] ?? ($_POST['prodCode'] ?? '');
if ($code !== '') {
    $stmt = $conn->prepare("SELECT * FROM prodlist WHERE prodCode = ?");
    $stmt->bind_param("s", $code);
    $stmt->execute();
    $selected = $stmt->get_result()->fetch_assoc();
}

$all = $conn->query("SELECT prodCode, prodName FROM prodlist ORDER BY prodCode");
?>
<html>
<head><title>Update Product</title>
<link rel="stylesheet" type="text/css" href="homepage.css" />
<style>h1{text-align:center}</style></head>
<body>
<?php include 'nav.php'; ?>
<h2>Update a Product</h2>
<p><?php echo htmlspecialchars($message); ?></p>

<form method="GET">
  Choose product:
  <select name="code" onchange="this.form.submit()">
    <option value="">-- select --</option>
    <?php while ($p = $all->fetch_assoc()): ?>
      <option value="<?php echo htmlspecialchars($p['prodCode']); ?>"
        <?php if ($p['prodCode'] === $code) echo 'selected'; ?>>
        <?php echo htmlspecialchars($p['prodCode'] . ' - ' . $p['prodName']); ?>
      </option>
    <?php endwhile; ?>
  </select>
</form>

<?php if ($selected): ?>
<form method="POST">
  <input type="hidden" name="prodCode" value="<?php echo htmlspecialchars($selected['prodCode']); ?>">
  Name: <input type="text" name="prodName" value="<?php echo htmlspecialchars($selected['prodName']); ?>" required><br/><br/>
  Description: <input type="text" name="prodDesc" size="50" value="<?php echo htmlspecialchars($selected['prodDesc']); ?>" required><br/><br/>
  Price: <input type="number" name="prodPrice" step="1" min="0" value="<?php echo htmlspecialchars($selected['prodPrice']); ?>" required><br/><br/>
  <input type="submit" value="Save Changes">
</form>
<?php endif; ?>
</body>
</html>

