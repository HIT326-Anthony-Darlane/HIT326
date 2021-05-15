<!DOCTYPE html>
<html>
<head>
  <meta charset='utf-8' />
  <title>signup</title>
</head>

<body>
<h3>Sign in</h3>
<form action='index.php' method='POST'>
  <?php
  require PARTIALS."/form.username.php";
  ?>
  <!--placeholder-->
  <label>password</label>
  <input type='password' name='password'/>

<input type='submit' name='signin' value='Sign in'>
</form>

</body>
</html>
