<div class="container text-center">
  <h3>Please sign in!</h3>
    <form action='index.php' method='POST'>
      <input type='hidden' name='signin' value='signin'>
      <?php
      require PARTIALS."/form.username.php";
      echo "<br>";
      require PARTIALS."/form.password.php";
      ?>
      <br>
      <input type='submit' value='Sign in'>
    </form>
</div>
<?php include VIEWS.'/footer.php'?>
