<!DOCTYPE html>
<html>
<head>
  <meta charset='utf-8' />
  <title>signup</title>
</head>
<h3>make new article here</h3>

<body>
  <form action='index.php' method='POST'>
    <?php
    require PARTIALS."/form.title.php";
    require PARTIALS."/form.content.php";
    ?>

  <input type='submit' name='submitarticle' value='Post Article'>
  </form>




</body>
</html>
