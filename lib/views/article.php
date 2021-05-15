<!DOCTYPE html>
<html>
<head>
  <meta charset='utf-8' />
  <title>what to do with article</title>
</head>

<body>

<h1>ths is article.php!</h1>
<?php
//find what we looking for in sql
$sql= "SELECT * FROM article";
// will execute the sql statement as a PDOstatement object
$result = $db->query($sql);

if(!empty($result)){
         //Loop getting each name
         foreach($result as $item){
           echo "<h2>{$item['title']}</h2><p>{$item['content']}</p>";
         }
      }
      //if there is nothing in the database
      else{
         echo "<p>No results</p>";
      }

  ?>
</body>
</html>
