<?php
//To connect the stuff together. pls keep in//
//path to folders
DEFINE ("LIB",$_SERVER['DOCUMENT_ROOT']."/article/lib");
DEFINE ("VIEWS",LIB."/views");
DEFINE ("PARTIALS",VIEWS."/partials");
//path to files
DEFINE ("MODEL",LIB."/model.php");
DEFINE ("APP",LIB."/application.php");

//connecting to model so that it is always conneected to the database
  include MODEL;
  include APP;

  //will call the home page from the top which is just the header? it will rremain on all pages
  session_start();
  require VIEWS.'/home.php';


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
        echo "You must've forgotten to fill something in :(";
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

          //so that it can insert into database, dont know how specifically but it works
          $query = "INSERT INTO article (article_id,title, content,user_id) VALUES ('$article_id','$title','$content','$user_id')" ;
          $run = mysqli_query($db,$query) or die(mysqli_error());

          foreach($tags_list as $item){
            $item = trim($item);
            $tag_id=uniqid();
            $tagquery = "INSERT INTO tag (tag_id,tag) VALUES ('$tag_id','$item')";
            $run = mysqli_query($db,$tagquery) or die(mysqli_error());
            $taggingquery="INSERT INTO tagging (article_id,tag_id) VALUES ('$article_id','$tag_id')";
            $run = mysqli_query($db,$taggingquery) or die(mysqli_error());
          }
          //when you press submit, it will show this message
          if($run){
            header('location:index.php?articles');
          }
          else{
            echo "couldn't add new article";
          }
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
          $query = "UPDATE article SET title='$title', content='$content' WHERE article_id='$article_id'" ;
          $run = mysqli_query($db,$query) or die(mysqli_error());
          if($run){
            header('location:index.php?articles');
            exit();
          }
          else{
            echo "There was a problem trying to delete this article";
          }
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
          //Salting password for security//
          $hashed_password = password_hash($password,PASSWORD_DEFAULT);
          //so that it can insert into database, dont know how specifically but it works
          $query = "INSERT INTO users (username, firstname, lastname,password) VALUES ('$username','$firstname','$lastname','$hashed_password')" ;
          $run = mysqli_query($db,$query) or die(mysqli_error());
          //when you press submit, it will show this message if successful
          if($run){
            echo "Added new user";
          }
          else{
            echo "There was a problem making this user";
          }
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
          $query = "SELECT * FROM users WHERE username = '$username'";
          $run = mysqli_query($db,$query);
          $row = mysqli_fetch_array($run, MYSQLI_ASSOC);
          $user_id = $row['user_id'];
          $count = mysqli_num_rows($run);
          //will find the 1 username in database, else will say invalid username
          if($count == 1){
            //will find password with username that was searched
            $passquery = "SELECT password from users where username = '$username'";
            $passrun = mysqli_query($db,$query);
            $passrow = mysqli_fetch_array($passrun, MYSQLI_ASSOC);
            $hash = $passrow['password'];
            //verify password
            if(password_verify($password, $hash)){
              //if password is the same, will say this
              $_SESSION['user_id']= $user_id;
              $_SESSION['username'] = $username;
              $_SESSION['loggedin'] = true;
              header('location:index.php?articles');
            }
            else{
          //if password wrong, will say this
          echo "entered wrong password";
          }
        }
        else {
          //if username is not in datase
        echo "invalid username";
      }
    }
          else{
            else_empty();
          }
        }
require VIEWS.'/footer.php';
?>
