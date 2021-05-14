<?php
//GETS DATABASE
$db = null;
$errors= array();

try{
  // to connect to database on phpadmin or something liek that
  $db = new PDO('mysql:host=localhost;dbname=article_db', 'root', 'hit326');
//Testing connection
  if ($db) {
    echo "<p>connected to database successfully</p>";
  }
//else catch error
}
//catch code will run if above aint right pre much acts as the 'else' statement to your if
catch(PDOException $e){
  $errors[]=$e->getMessage();
}
//finds out what error it is
if(count($errors) > 0){
   echo "<p>What a shit connection</p>";
   echo "<ul>";
   foreach($errors As $error){
      echo "<li>{$error}</li>";
   }
   echo "</ul>";
}
 ?>
