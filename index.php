<!DOCTYPE html>
<html>
<head>
  <meta charset='utf-8' />
  <title>article</title>
</head>

<body>
<h1>Article stuff</h1>

<?php
//path to folders
DEFINE ("LIB",$_SERVER['DOCUMENT_ROOT']."/article/lib");
DEFINE ("VIEWS",LIB."/views");
//path to files
DEFINE ("MODEL",LIB."/model.php");
DEFINE ("APP",LIB."/application.php");


  include MODEL;
  //find what we looking for in sql
  $sql= "SELECT * FROM author";
  // will execute the sql statement as a PDOstatement object
  $result = $db->query($sql);

  if(!empty($result)){
           //Loop getting each name
           foreach($result as $item){
             echo "<p>{$item['author_id']}, {$item['firstname']}, {$item['lastname']}</p>";
           }
        }
        //if there is nothing in the database
        else{
           echo "<p>No results</p>";
        }

?>

</body>
</html>
