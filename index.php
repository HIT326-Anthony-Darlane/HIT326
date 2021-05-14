<!DOCTYPE html>
<html>
<head>
  <meta charset='utf-8' />
  <title>article</title>
</head>

<body>
<h1>THIS IS AN ARTICLE WEBSITE</h1>

<?php
//To connect the stuff together. pls keep in//
//path to folders
DEFINE ("LIB",$_SERVER['DOCUMENT_ROOT']."/article/lib");
DEFINE ("VIEWS",LIB."/views");
//path to files
DEFINE ("MODEL",LIB."/model.php");
DEFINE ("APP",LIB."/application.php");


  include MODEL;
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
