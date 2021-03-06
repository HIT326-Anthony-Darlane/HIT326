<!--The base template-->
<!DOCTYPE html>
<html>
<head>
  <meta charset='utf-8'/>
  <title>Austro-Asian Times</title>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css?v=<?php echo time();?>">
  <link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.css?v=<?php echo time();?>">
  <link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.min.css?v=<?php echo time();?>">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css?v=<?php echo time();?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="css/style.css?v=<?php echo time();?>">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
</head>

<body>
<section>
  <div class="container-fluid text-center p-2">
      <h1 class="text-uppercase">AUSTRO-ASIAN TIMES</h1>
      <p class="lead font-18 font-italic">News for Northern Australia and Southeast Asia</p>
      <?php
      if(isset($_SESSION['username'])){
        echo "<h4 class='font-15'>Welcome back ".$_SESSION['username'].", to Austro-Asian Times!</h5>";
      }
      else{
        echo "<h4 class='font-15'>Welcome to Austro-Asian Times</h5>";
      }
      ?>

      <!--nav-->
      <div class="row">
        <div class='col'>
        <a href='?articles'>Home</a>
        <?php
          if(isset($_SESSION['loggedin'])){
            echo "<a href='?newarticle'>New Article</a>
              <a href='?logout'>Log Out</a>";
          }
          else{
            echo "<a href='?signin'>Signin</a>
            <a href='?signup'>Signup</a>";
          }
        ?>
        </div>
    </div>
    <!--end of nav-->
</div>
</section>
<br>
