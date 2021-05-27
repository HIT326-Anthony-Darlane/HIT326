<h3>Sign in</h3>
<form action='index.php' method='POST'>
  <input type='hidden' name='signin' value='signin'>
  <?php
  require PARTIALS."/form.username.php";
  echo "<br>";
  require PARTIALS."/form.password.php";
  ?>

<input type='submit' value='Sign in'>
</form>
<?php include VIEWS.'/footer.php'?>
