<h3>Sign up!</h3>
<form action='index.php' method='POST'>
  <input type='hidden' name='signup' value='signup'>
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
<input type='submit' value='Sign up!'>
</form>
