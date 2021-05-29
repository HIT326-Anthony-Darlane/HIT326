<?php
//To connect the stuff together. pls keep in//
//path to folders
DEFINE ("LIB",$_SERVER['DOCUMENT_ROOT']."/article/lib");
DEFINE ("VIEWS",LIB."/views");
DEFINE ("PARTIALS",VIEWS."/partials");
//path to files
DEFINE ("MODEL",LIB."/model.php");
DEFINE ("APP",LIB."/application.php");

DEFINE("LAYOUT","home");

//connecting to model so that it is always conneected to the database
  include MODEL;
  include APP;

//will call the home page from the top which is just the header? it will rremain on all pages
  session_start();
  require VIEWS.'/home.layout.php';


//when the link is pressed it will come here and do this
      if(isset($_GET['articles'])){
        require VIEWS.'/article.php';
        exit();
      }

      if(isset($_GET['signin'])){
        require VIEWS.'/signin.php';
        exit();
      }
      //when you press the logout link, it will end all set sessions stuff.
      if(isset($_GET['logout'])){
        header('location:index.php?articles');
        session_destroy();
      }

      if(isset($_GET['signup'])){
        require VIEWS.'/signup.php';
        exit();
      }

      if(isset($_GET['newarticle'])){
        require VIEWS.'/newarticle.php';
        exit();
      }
      //if user did not fill in all inputs, they will be redirected here. you can see more below.
      if(isset($_GET['emptyinput'])){
        echo "<div class='container-fluid text-center p-3'>
            <h3>Uh Oh!</h3>
            <h4>You must've forgotten to fill something in :(</h4>
          </div>";
      }

      if(isset($_GET['articles'])){

      }

      //this part for adding the new article
      //if the _POST's submit button was called
      //will find the input name
      if(isset($_POST['submitarticle'])){
        //if the _POST's input title and content are not empty, say it worked else fuk
        if(!empty($_POST['title']) && !empty($_POST['content']) && !empty($_POST['taglist'])){
          $article_id=uniqid();
          $title = $_POST['title'];
          $content = $_POST['content'];
          $user_id = $_SESSION['user_id'];
          //add these new tags to database
          $tags = $_POST['taglist'];
          $tags_list = array();
          $tags_list = explode(",", $tags);
          submit_article($article_id,$title,$content,$user_id,$tags,$tags_list);
        }
        //when you press submit but you didn't fill in the inputs :|
        else{
          else_empty();
        }
      }

      //edit article not finished
      if(isset($_GET['edit_view'])){
        require VIEWS.'/editarticle.php';
      }

      if(isset($_POST['update_article'])){
        if(!empty($_POST['title']) && !empty($_POST['content'])){
          $article_id = $_POST['article_id'];
          $title = $_POST['title'];
          $content = $_POST['content'];
          update_article($article_id,$title,$content);
        }
        else{
          else_empty();
        }
      }


      //delete article by callling function in model.php
        if(isset($_POST['delete'])){
          $article_id=$_POST['article_id'];
          delete_article($article_id);
        }

      //This for when you press submit in new user
      if(isset($_POST['signup'])){
        //if the _POST's input title and content are not empty, say it worked else
        if(!empty($_POST['username']) && !empty($_POST['firstname']) && !empty($_POST['lastname']) && !empty($_POST['password'])){
          $username = $_POST['username'];
          $firstname = $_POST['firstname'];
          $lastname = $_POST['lastname'];
          $password = $_POST['password'];
          signup($username,$firstname,$lastname,$password);
        }
        //when you press submit but you didn't fill in the inputs :|
        else{
          else_empty();
        }
      }

      //This is for when you wannt to sign in
      if(isset($_POST['signin'])){
        if(!empty($_POST['username']) && !empty($_POST['password'])){
          $username = $_POST['username'];
          $password = $_POST['password'];
          signin($username,$password);
        }
          else{
            else_empty();
          }
        }
require VIEWS.'/footer.php';
?>
