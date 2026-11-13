<html>
<head><title> Flamingo Registration Page</title>
<link rel="stylesheet" type="text/css" href="registration.css" /></head>
<body>
<form action="register.php" method="POST">
  <div class="container">
    <b>Email</b>
    <input type="text" name="txtUserName" required><br/>

    <b>Password</b>
    <input type="password" name="txtPassword" required>

    <b>Repeat Password</b>
    <input type="password" name="txtRepeatPassword" required>
    
    <div class="clearfix">
      <input type="button"  class="cancelbtn" value="Cancel" onclick="location.href='index.php'"/>
      <input type="submit" class="signupbtn" value="Sign Up"/>
    </div>
  </div>
</form>
</body>
</html>
