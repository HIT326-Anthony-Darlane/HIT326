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
    echo "<br>";
    require PARTIALS."/form.content.php";
    ?>
    <select name="author">
  <?php
    $sql="SELECT user_id, firstname, lastname from users";
    $result=$db->query($sql);

    if(!empty($result)){
      foreach($result as $result){
      echo "<option value=''>{$result['firstname']} {$result['lastname']}</option>";
    }
  }
  else{
    echo "AHHHH";
  }
  ?>
</select>



  <input type='submit' name='submitarticle' value='Post Article'>
  </form>



</body>
</html>
