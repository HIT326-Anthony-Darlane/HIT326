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

      if(isset($_GET['signin'])){
        require VIEWS.'/signin.php';
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
      //will find the input name
      if(isset($_POST['submitarticle'])){
        //if the _POST's input title and content are not empty, say it worked else fuk
        if(!empty($_POST['title']) && !empty($_POST['content']) && !empty($_POST['author'])){
          $title = $_POST['title'];
          $content = $_POST['content'];
          $author = $_POST['author'];
          //so that it can insert into database, dont know how specifically but it works
          $query = "INSERT INTO article (title, content,user_id) VALUES ('$title','$content','$user_id')" ;
          $run = mysqli_query($db,$query) or die(mysqli_error());
          //when you press submit, it will show this message
          if($run){
            echo "added new article!";
          }
          else{
            echo "couldn't add new article";
          }
        }
        //when you press submit but you didn't fill in the inputs :|
        else{
          echo "You need to fill in everything";
        }
      }

      //This for when you press submit in new user
      if(isset($_POST['signup'])){
        //if the _POST's input title and content are not empty, say it worked else fuk
        if(!empty($_POST['username']) && !empty($_POST['firstname']) && !empty($_POST['lastname'])){
          $username = $_POST['username'];
          $firstname = $_POST['firstname'];
          $lastname = $_POST['lastname'];
          //so that it can insert into database, dont know how specifically but it works
          $query = "INSERT INTO users (username, firstname, lastname) VALUES ('$username','$firstname','$lastname')" ;
          $run = mysqli_query($db,$query) or die(mysqli_error());
          //when you press submit, it will show this message
          if($run){
            echo "Added new user";
          }
          else{
            echo "There was a problem making this user";
          }
        }
        //when you press submit but you didn't fill in the inputs :|
        else{
          echo "You didn't fill in everything dipshit";
        }
      }


// Will show the message "signed in when the sign in button is pressed "
      if(isset($_POST['signin'])){
        if(!empty($_POST['username']) && !empty($_POST['password'])){
          echo "signed in!";
        }
        else{
          echo "you did not fill in everything bro";
        }
      }





?>
