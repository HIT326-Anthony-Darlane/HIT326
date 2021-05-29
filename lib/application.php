<?php
  //if user didnt fill in  every input
  function else_empty(){
    header('location:index.php?emptyinput');
    exit();
  };

  //if there is an error message, it will be wrapped around a div
  function err_message($message,$second){
    echo "<div class='container-fluid text-center p-3'>
    <h3>$message</h3>
    <h4>$second</h4>
    </div>";
  }

 ?>
