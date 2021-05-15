<!DOCTYPE html>
<html>
<head>
  <meta charset='utf-8' />
  <title>signup</title>
</head>

<body>
<h3>Sign up!</h3>
<form action='index.php' method='POST'>
  <?php
  require PARTIALS."/form.username.php";
  require PARTIALS."/form.firstname.php";
  require PARTIALS."/form.lastname.php";
  ?>
<input type='submit' name='submituser' value='Create User'>
</form>

</body>
</html>
