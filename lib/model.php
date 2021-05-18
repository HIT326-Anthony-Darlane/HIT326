<?php
//GETS DATABASE
$db = null;
$errors= array();

try{
  $server='localhost';
  $username='root';
  $password='hit326';
  $dbname='article_db';

  $db=mysqli_connect($server,$username,$password,$dbname);
}
//catch code will run if above aint right pre much acts as the 'else' statement to your if
//copied it too
catch(PDOException $e){
  $errors[]=$e->getMessage();
}
//finds out what error it is
if(count($errors) > 0){
   echo "<p>The connection did not work</p>";
   echo "<ul>";
   foreach($errors As $error){
      echo "<li>{$error}</li>";
   }
   echo "</ul>";
}
 ?>
