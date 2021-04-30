<!DOCTYPE html>
<html>
<head>
  <meta charset='utf-8' />
  <title>article</title>
</head>

<body>
<h1>Article stuff</h1>


<?php
try{
  // to connect to database on phpadmin or something liek that
  $db = new PDO('mysql:host=localhost;dbname=article_db', 'root', 'hit326');


//Testing connection
  if ($db) {
    echo "connected";
  } else{
    echo "What a shit connection1";
  }


}
//catch code will run if above aint right
catch(PDOException $e){
  $errors[]=$e->getMessage();
  echo "What a shit connection2";
}



?>

</body>
</html>
