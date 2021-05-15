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
require VIEWS.'/home.php';

//connecting to model so that it is always conneected to the database
  include MODEL;

//when the link is pressed it will come here and do this :|
      if(isset($_GET['articles'])){
        require VIEWS.'/article.php';
        exit();
      }


      if(isset($_GET['signup'])){
        require VIEWS.'/signup.php';
        exit();
      }

      if(isset($_GET['newarticle'])){
        require VIEWS.'/newarticle.php';
        exit();
      }

      //this part for adding the new article
      //if the _POST's submit button was called
      if(isset($_POST['submit'])){
        //if the _POST's input title and content are not empty, say it worked else fuk
        if(!empty($_POST['title']) && !empty($_POST['content'])){
          $title = $_POST['title'];
          $content = $_POST['content'];

          $query = "INSERT INTO article (title, content) VALUES ('$title','$content')" ;
          $run = mysqli_query($db,$query) or die(mysqli_error());

          if($run){
            echo "IT WORKED";
          }
          else{
            echo "yeah that didn't work trying to insert";
          }
        }
        else{
          echo "FUCK, YOU DIDNT FILL IT ALL IN";
        }
      }




?>
