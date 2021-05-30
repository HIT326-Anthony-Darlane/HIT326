<div class="container-fluid text-center p-3">
  <form action='index.php' method='POST'>
    <input type='hidden' name='update_article' value='submit article'>
    <input type='hidden' name='article_id' value='<?php echo $article_id=$_GET['article_id'] ?>'>
    <?php
    $db=get_db();
    $query = "SELECT * FROM article WHERE article_id='$article_id'";
    $run = mysqli_query($db,$query) or die(mysqli_error());
    $result = mysqli_fetch_array($run);
    $all_articles = $result;

    //forms from partials
      require PARTIALS."/form.title.php";
      echo "<br>";
      require PARTIALS."/form.content.php";
      echo "<br>";
    ?>

  </select>
  <input type='submit' class='button-blue' value='Update Article'>
  </form>
</div>
