<?php
//To connect the stuff together. pls keep in//
//path to folders
DEFINE ("LIB",$_SERVER['DOCUMENT_ROOT']."/article/lib");
DEFINE ("VIEWS",LIB."/views");
DEFINE ("PARTIALS",VIEWS."/partials");
//path to files
DEFINE ("MODEL",LIB."/model.php");
DEFINE ("APP",LIB."/application.php");

//will call the home page from the top
require PARTIALS.'/home.php';

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
