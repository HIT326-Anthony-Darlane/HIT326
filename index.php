<!DOCTYPE html>
<html>
<head>
  <meta charset='utf-8' />
  <title>article</title>
</head>

<body>
<h1>Article stuff</h1>

<?php
  include 'db.php';
  //Set this attribute while testing so PDO doesn't silence error reporting

  //find what we looking for in sql
  $sql= "SELECT * FROM author";
  //
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

</table>


</body>
</html>
