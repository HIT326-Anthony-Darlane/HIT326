<div class="container-fluid text-center p-3">
    <form action='index.php' method='POST'>
      <input type='hidden' name='submitarticle' value='Submit Article'>
      <?php
        require PARTIALS."/form.title.php";
        echo "<br>";
        require PARTIALS."/form.content.php";
        echo "<br>";
        require PARTIALS."/form.tags.php";
      ?>
      <br>
    <input type='submit' value='Post Article'>
    </form>
  </div>
<?php include VIEWS.'/footer.php'?>
