<?php session_start();
include("db.php");
$user = $_SESSION["admin"];
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!--Google font-->
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@300;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>My Beatiful Blog</title>
  </head>

  <body>
    <!--MENU-->
    <nav class="navbar navbar-expand-lg navbar-dark mynav">
      <a class="navbar-brand" href="index.php"><img width="100px" src="img/logo.png"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
        <li class="nav-item active">
            <a class="nav-link" href="index.php"><?php echo"Hello $user";?><span class="sr-only">(current)</span></a>
          </li>
        
          <li class="nav-item active">
            <a class="nav-link" href="index.php">Posts <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="about.php">About Me</a>
          </li>
        </ul>
      </div>
    </nav>
    <!--CONTENT-->
    <div class="container">
        <div class="row"> 
            <div class="col-12 col-lg-8">
              <?php
              $sql = "SELECT * FROM posts";
              $result = mysqli_query($conn, $sql);

              if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_assoc($result)){
                  echo "<br>";
                  echo "<div class='post'>";
                  echo "<h4 class='title'>".$row["title"]."</h4><hr>
                        <p class='content'>".$row["content"]."</p>";
                  echo "</div>";
                }
              }
              ?>
            </div>
            <div class="col-4" id="asidecolumn">
              <?php
              $sql = "SELECT * FROM posts";
              $result = mysqli_query($conn, $sql);
              echo "<br>";
              echo "<div class='post'>";
              if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_assoc($result)){
                  
                  
                  echo "<h4 class='title'>".$row["title"]."</h4><hr>";
                  
                }
              }
              echo "</div>";
              ?>
            </div>
        </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>


  </body>
</html>