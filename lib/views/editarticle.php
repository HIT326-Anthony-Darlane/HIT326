<div class="container">
  <form action='index.php' method='POST'>
    <input type='hidden' name='update_article' value='submit article'>
    <input type='hidden' name='article_id' value='<?php echo $article_id=$_GET['article_id'] ?>'>
    <?php
    $db=get_db();
    //To show the title annd content in the inputs for easier changes.
    $query = "SELECT * FROM article WHERE article_id='$article_id'";
    $run = mysqli_query($db,$query) or die(mysqli_error());
    $result = mysqli_fetch_array($run);
    //so that i can make it a global variable.
    $all_articles = $result;

    //forms from partials
      require PARTIALS."/form.title.php";
      echo "<br>";
      require PARTIALS."/form.content.php";
      echo "<br>";
    ?>

  </select>
  <input type='submit' value='Update Article'>
  </form>
</div>
