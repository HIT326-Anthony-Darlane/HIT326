  <form action='index.php' method='POST'>
    <!--<input type='hidden' name='edit_view' value='edit article'>-->
    <input type='hidden' name='update_article' value='submit article'>
    <input type='hidden' name='article_id' value=''>
    <?php

    //To show the title annd content in the inputs for easier changes.
    $article_id=$_GET['article_id'];
    $query = "SELECT * FROM article WHERE article_id='$article_id'";
    $run = mysqli_query($db,$query) or die(mysqli_error());
    $result = mysqli_fetch_array($run);

    //forms from partials
      require PARTIALS."/form.title.php";
      echo "<br>";
      require PARTIALS."/form.content.php";
      echo "<br>";
    ?>

  </select>



  <input type='submit' value='Update Article'>
  </form>
