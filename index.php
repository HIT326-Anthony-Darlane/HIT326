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
      //if user did not fill in all inputs, they will be redirected here. you can more below.
      if(isset($_GET['emptyinput'])){
        echo "You must've forgotten to fill something in :(";
      }



      //this part for adding the new article
      //if the _POST's submit button was called
      //will find the input name
      if(isset($_POST['submitarticle'])){
        //if the _POST's input title and content are not empty, say it worked else fuk
        if(!empty($_POST['title']) && !empty($_POST['content']) && !empty($_POST['user_id'])){
          $title = $_POST['title'];
          $content = $_POST['content'];
          $user_id = $_POST['user_id'];
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
          header('location:index.php?emptyinput');
          exit();
        }

      }

      //This for when you press submit in new user
      if(isset($_POST['signup'])){
        //if the _POST's input title and content are not empty, say it worked else fuk
        if(!empty($_POST['username']) && !empty($_POST['firstname']) && !empty($_POST['lastname']) && !empty($_POST['password'])){
          $username = $_POST['username'];
          $firstname = $_POST['firstname'];
          $lastname = $_POST['lastname'];
          $password = $_POST['password'];
          //Salting password for security//
          $hashed_password = password_hash($password,PASSWORD_DEFAULT);
          //so that it can insert into database, dont know how specifically but it works
          $query = "INSERT INTO users (username, firstname, lastname,password) VALUES ('$username','$firstname','$lastname','$hashed_password')" ;
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
          header('location:index.php?emptyinput');
          exit();
        }
      }


// Will show the message "signed in when the sign in button is pressed "
      if(isset($_POST['signin'])){
        if(!empty($_POST['username']) && !empty($_POST['password'])){

          $username = $_POST['username'];
          $password = $_POST['password'];
          $query = "SELECT * FROM users WHERE username = '$username' and password = '$password'";
          $run = mysqli_query($db,$query);
          $row = mysqli_fetch_array($run, MYSQLI_ASSOC);
          $count = mysqli_num_rows($run);
          if($count == 1){
              echo "signed in!";
          }
          else {
            echo "invalid username or password";
          }
        }
        else{
          header('location:index.php?emptyinput');
          exit();
        }
      }




?>
