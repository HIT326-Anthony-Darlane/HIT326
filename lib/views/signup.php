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
  echo "<br>";
  require PARTIALS."/form.firstname.php";
  echo "<br>";
  require PARTIALS."/form.lastname.php";
  echo "<br>";
  require PARTIALS.'/form.password.php';
  echo "<br>";
  ?>
<input type='submit' name='signup' value='Sign up!'>
</form>

</body>
</html>
