<!--ONLY FOR TESTING. THE WHOLE FILE CAN BE DELETED-->
<!DOCTYPE html>
<html>
<head>
  <meta charset='utf-8' />
  <title>test</title>
</head>
<h3>test</h3>

<body>
  <form action='index.php' method='POST'>
    <select name="author">
  <?php
    $sql="SELECT user_id, firstname, lastname from users";
    $result=$db->query($sql);

    if(!empty($result)){
      foreach($result as $result){
      echo "<option value='{$result['user_id']}'>{$result['firstname']} {$result['lastname']}</option>";
    }
  }
  else{
    echo "AHHHH";
  }
  ?>
</select>
  <input type='submit' name='submittest' value='Post Article'>
  </form>

</body>
</html>
