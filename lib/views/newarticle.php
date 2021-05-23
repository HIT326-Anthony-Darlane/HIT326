<!DOCTYPE html>
<html>
<head>
  <meta charset='utf-8' />
  <title>signup</title>
</head>
<h3>make new article here</h3>

<body>
  <form action='index.php' method='POST'>
    <input type='hidden' name='submitarticle' value='submit article'>
    <?php
      require PARTIALS."/form.title.php";
      echo "<br>";
      require PARTIALS."/form.content.php";
      echo "<br>";
    ?>
  <!--TO SELECT WHICH USER WHO WROTE THE ARTICLE FOR NOW?-->
    <label for="pickuser_id">Author:</label>
    <select name='user_id'>
  <?php
    $sql="SELECT user_id, firstname, lastname from users";
    $result=$db->query($sql);

    if(!empty($result)){
      foreach($result as $result){
      echo "<option value='{$result['user_id']}'>{$result['firstname']} {$result['lastname']}</option>";
    }
  }
  else{
    echo "it did not work";
  }
  ?>
  </select>

  <input type='submit' value='Post Article'>
  </form>



</body>
</html>
