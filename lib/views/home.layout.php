<!--The base template-->
<!DOCTYPE html>
<html>
<head>
  <meta charset='utf-8'/>
  <title>article</title>
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/bootstrap-responsive.css">
  <link rel="stylesheet" href="css/bootstrap-responsive.min.css">
  <link rel="stylesheet" href="css/bootstrap.css">
</head>

<body>
<section>
  <div class="container text-center">
  <h1>ARTICLE WEBSITE</h1>
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
