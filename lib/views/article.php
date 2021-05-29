<?php
echo "<div class = 'container-fluid text-center'>
<div class='p-3'>";
if(isset($_SESSION['username'])){
  echo "<h4 class='lead'>Welcome back ".$_SESSION['username'].", to Austro-Asian Times!</h3>";
}
else{
  echo "<h4 class='lead'>Welcome to Austro-Asian Times</h3>";
}
echo "
</div>
</div>
<br>";

//container div
echo "<div class='container-fluid'>";
echo "<div class='container p-3'>";
//div to add padding


//WILL SHOW ALL ARTICLES IN DATABASE
//find what we looking for in sql and will order it by descending order aka. newest first
$db=get_db();
$sql= "SELECT * FROM article i, users ii where i.user_id=ii.user_id order by created_date desc";
$result = $db->query($sql);

if(!empty($result)){
         //Loop getting each name
           while($item = mysqli_fetch_array($result)){
             echo
             "<h2 class='text-capitalize'>{$item['title']}</h2>
             <p class='text-justify'>{$item['content']}</p>
             <div class=''>
             <p>Tags:";

             //to find all the tags linked to this article
             $sqltag="SELECT tag FROM tag i, tagging ii where i.tag_id=ii.tag_id and article_id='".$item['article_id']."'";
             $run2= $db->query($sqltag);
             if(!empty($run2)){
               while($tag=mysqli_fetch_array($run2)){
                 echo "{$tag['tag']}, ";
               }
               echo
               "</p>
              <small>Written by: {$item['username']}</small>
              <br>
              <small>Published: {$item['created_date']}</small>
              </div>";
             }
             //Only someone who is logged in will be able to delete articles
             if(isset($_SESSION['loggedin'])){
               //To edit article
              echo "<form action='index.php' method='GET'>
                <input type='hidden' name='edit_view' value='edit article'/>
                <input type='hidden' name='article_id' value={$item['article_id']}>
                <input class='btn' type='submit' value='edit'/>
              </form>";
              //This is to delete article which will send to index php and go to: if(isset($_POST['delete'])){
              echo "<form action='index.php' method='POST'>
                <input type='hidden' name='delete' value='delete article'/>
                <input type='hidden' name='article_id' value={$item['article_id']}>
                <input class='btn' type='submit' value='delete'/>
              </form>";

              }
             }
           }
          //if there is nothing in the database
         else{
           echo "<p>No results</p>";
          }


        echo "

          </div>
        </div>";
      include VIEWS.'/footer.php';
  ?>
