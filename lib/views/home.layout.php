<!--The base template-->
<!DOCTYPE html>
<html>
<head>
  <meta charset='utf-8'/>
  <title>Austro-Asian Times</title>
  <!--put echo time() because css would not load properly cause of cache?-->

  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css?v=<?php echo time();?>">
  <link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.css?v=<?php echo time();?>">
  <link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.min.css?v=<?php echo time();?>">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css?v=<?php echo time();?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="css/style.css?v=<?php echo time();?>">

<body>
<section>
  <div class="container-fluid text-center">
    <div class="p-2">
      <h1>AUSTRO-ASIAN TIMES</h1>
      <p class="lead">News for Northern Australia and Southeast Asia</p>
      <a href='?articles'>Home</a>
        <?php
          if(isset($_SESSION['loggedin'])){
            echo "<a href='?newarticle'>New Article</a> ";
            echo "<a href='?logout'>Log Out</a>";
          }
          else{
            echo "<a href='?signin'>Signin</a> ";
            echo "<a href='?signup'>Signup</a>";
          }
        ?>
  </div>
</div>
</section>
<br>
