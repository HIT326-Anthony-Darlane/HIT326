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
  <!--placeholder-->
  <label>password</label>
  <input type='password' name='password'/>
<input type='submit' name='signup' value='Sign up!'>
</form>

</body>
</html>
