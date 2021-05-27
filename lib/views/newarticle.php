<h3>make new article here</h3>

<body>
  <form action='index.php' method='POST'>
    <input type='hidden' name='submitarticle' value='Submit Article'>
    <?php
      require PARTIALS."/form.title.php";
      echo "<br>";
      require PARTIALS."/form.content.php";
      echo "<br>";
      require PARTIALS."/form.tags.php";
    ?>

  </select>

  <input type='submit' value='Post Article'>
  </form>
<?php include VIEWS.'/footer.php'?>
