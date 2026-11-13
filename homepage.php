<?php
// CHANGED: Added a login check. auth.php sends visitors who are not
// logged in back to index.php, so only signed-in users can see this page.
require 'auth.php';
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="homepage.css" />
<title>Flamingo Home Page</title>
<style type="text/css">
	h1{ text-align: center; }
</style>
</head>
<body>
<!-- CHANGED: The heading and menu now come from nav.php, so every product
     page shares the same menu instead of each page repeating it.
     The menu links used to point to "#" (nowhere); they now open the
     real pages (addproduct.php, updateproduct.php, etc.).
     The old heading said "Registration Page" by mistake; nav.php uses
     "Flamingo Product Manager" instead. -->
<?php include 'nav.php'; ?>

<!-- CHANGED: Replaced the stray "\" character with a welcome message. -->
<p>Welcome! Choose an option from the menu above.</p>
</body>
</html>
