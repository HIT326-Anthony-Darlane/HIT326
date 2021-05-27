<!--The base template-->
<!DOCTYPE html>
<html>
<head>
  <meta charset='utf-8'/>
  <title>article</title>
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.min.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=ZCOOL+KuaiLe&display=swap" rel="stylesheet">

<body>
<section>
  <div class="container text-center">
    <h1>AUSTRO-ASIAN TIMES</h1>
    <p class="lead">News for Northern Australia and Southeast Asia</p>
    <a href='?articles'>Home(lists all articles)</a>
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
</section>
<hr>
