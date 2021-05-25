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

echo "<hr>";
?>


<?php
//WILL SHOW ALL ARTICLES IN DATABASE
//find what we looking for in sql and will order it by descending order aka. newest first
$sql= "SELECT * FROM article i, users ii where i.user_id=ii.user_id order by created_date desc";
$result = $db->query($sql);

if(!empty($result)){
         //Loop getting each name
           while($item = mysqli_fetch_array($result)){
             echo
             "<h2>{$item['title']}</h2>
             <p>{$item['content']}</p>
             <p>Written by: {$item['username']}</p>
             <p>Published: {$item['created_date']}</p>";
             //Only someone who is logged in will be able to delete articles
             if(isset($_SESSION['loggedin'])){
               //To edit article
              echo "<a href='?edit={$item['article_id']}'>edit </a>";
              echo "<form action='index.php' method='POST'>
                <input type='hidden' name='delete' value='delete_article'/>
                <input type='hidden' name='article_id' value={$item['article_id']}/>
                <input type='submit' value='delete'/>
              </form>";

              }
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
