<?php
function get_db(){
  //GETS DATABASE
  $db = null;
  $errors= array();
  try{
    $server='localhost';
    $username='root';
    $password='hit326';
    $dbname='article_db';

    $db=mysqli_connect($server,$username,$password,$dbname);
  }
  //catch code will run if above aint right pre much acts as the 'else' statement to your if
  //copied it too
  catch(PDOException $e){
    $errors[]=$e->getMessage();
  }
  //finds out what error it is
  if(count($errors) > 0){
     echo "<p>The connection did not work</p>";
     echo "<ul>";
     foreach($errors As $error){
        echo "<li>{$error}</li>";
     }
     echo "</ul>";
  }
  return $db;
}


//if user didnt fill in  every input
function else_empty(){
  header('location:index.php?emptyinput');
  exit();
};

function signin($username,$password){
  $db=get_db();
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

function signup($username,$firstname,$lastname,$password){
  $db=get_db();
  //This is to find if the username already exists
  $query="SELECT username FROM users WHERE username='$username'";
  $run=mysqli_query($db,$query);
  $row = mysqli_fetch_array($run,MYSQLI_ASSOC);
  $count = mysqli_num_rows($run);
  //if the username is found in the database, will output message that it already exists
  if($count == 1){
    echo "
    <div class='container text-center'>
    <p>uh oh!</p>
    <p>This username already exists!</p>
    </div>
    ";
  }
  //if it doesn't exist in the database, it will insert into database
  else{
    //Salting password for security//
    $hashed_password = password_hash($password,PASSWORD_DEFAULT);
    //so that it can insert into database, dont know how specifically but it works
    $query = "INSERT INTO users (username, firstname, lastname,password) VALUES ('$username','$firstname','$lastname','$hashed_password')" ;
    $run = mysqli_query($db,$query) or die(mysqli_error());
    //when you press submit, it will show this message if successful
    if($run){
      echo "
      <div class='container text-center'>
      <p>Added new user!</p>
      <p>You can now sign in!</p>
      </div>
      ";
    }
    else{
      echo "<p>There was a problem making this user</p>";
    }
  }
}

function submit_article($article_id,$title,$content,$user_id,$tags,$tags_list){
  $db=get_db();
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

function update_article($article_id,$title, $content){
  $db=get_db();
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

function delete_article($article_id){
  $db=get_db();
  $query = "DELETE FROM article WHERE article_id='$article_id'";
  $run = mysqli_query($db,$query) or die(mysqli_error());
  if($run){
    header('location:index.php?articles');
    exit();
  }
  else{
    echo "There was a problem trying to delete this article";
  }
}

 ?>
