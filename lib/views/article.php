<!DOCTYPE html>
<html>
<head>
  <meta charset='utf-8' />
  <title>what to do with article</title>
</head>

<body>
<?php
if(isset($_SESSION['username'])){
  echo "<h1>Welcome ".$_SESSION['username'].", to Article Website!</h1>";
}
else{
  echo "<h1>Welcome to Article Website!</h1>";
}
?>
<hr>
<?php
//WILL SHOW ALL ARTICLES IN DATABASE
//find what we looking for in sql
$sql= "SELECT * FROM article i, users ii where i.user_id=ii.user_id";
$result = $db->query($sql);

if(!empty($result)){
         //Loop getting each name
         foreach($result as $item){
           echo "<h2>{$item['title']}</h2>
           <p>{$item['content']}</p>
           <p>Written by: {$item['username']}</p>";
           echo "<hr>";
         }
      }
      //if there is nothing in the database
      else{
         echo "<p>No results</p>";
      }

  ?>
</body>
</html>
