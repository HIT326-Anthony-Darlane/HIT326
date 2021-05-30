<?php

//container div
echo "<div class='container-fluid'>";
echo "<hr>";

//WILL SHOW ALL ARTICLES IN DATABASE
$db=get_db();
$sql= "SELECT * FROM article i, users ii where i.user_id=ii.user_id order by created_date desc";
$result = $db->query($sql);

if(!empty($result)){
         //Loop getting each name
           while($item = mysqli_fetch_array($result)){
             echo
             "<div class='container p-2'>
             <h2 class='text-capitalize'>{$item['title']}</h2>
             <p class='text-justify'>{$item['content']}</p>
             <p>Tags:";

             //to find all the tags linked to this article
             $sqltag="SELECT tag FROM tag i, tagging ii where i.tag_id=ii.tag_id and article_id='".$item['article_id']."'";
             $run2= $db->query($sqltag);
             if(!empty($run2)){
               while($tag=mysqli_fetch_array($run2)){
                 echo "<span class='tags'> {$tag['tag']}, </span>";
               }
               echo
               "</p>
              <small>Written by: {$item['username']}</small>
              <br>
              <small>Published: {$item['created_date']}</small>";
             }
             //Only someone who is logged in will be able to delete articles
             if(isset($_SESSION['loggedin'])){
               //To edit article
              echo "<div class='form-container'>
                <div class='form-left'>
                  <form action='index.php' method='GET'>
                    <input type='hidden' name='edit_view' value='edit article'/>
                    <input type='hidden' name='article_id' value={$item['article_id']}>
                    <input class='button-white' type='submit' value='Edit'/>
                  </form>
                </div>";

                echo "
                <div class='form-right'>
                  <form action='index.php' method='POST'>
                    <input type='hidden' name='delete' value='delete article'/>
                    <input type='hidden' name='article_id' value={$item['article_id']}>
                    <input class='button-blue' type='submit' value='Delete'/>
                  </form>
                  </div>
                </div>";

              }
              echo "</div>";
              echo "<hr>";
             }

           }
          //if there is nothing in the database
         else{
           err_message("There were no results","");
          }


        echo "</div>";
      include VIEWS.'/footer.php';
  ?>
