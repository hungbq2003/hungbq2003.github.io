<?php session_start();
include("../db.php");
if(isset($_SESSION["admin"]) && $_SESSION["admin"] == "admin"){
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="adminstyle.css">

    <title>My Blog Admin</title>
  </head>

  <body>
    <!--MENU-->
    <nav class="navbar navbar-expand-lg navbar-dark mynav">
      <a class="navbar-brand" href="index.php"><img width="100px" src="../img/logo.png"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="post.php">Posts <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="new.php">New</a>
          </li>
        </ul>
      </div>
    </nav>
    <div class="container">
        <?php
              $sql = "SELECT * FROM posts";
              $result = mysqli_query($conn, $sql);

              if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_assoc($result)){
                  echo "<br>";
                  echo "<div class='post'>";
                  echo "<h4 class='title'>".$row["title"]."</h4><hr>
                        <p class='content'>".$row["content"]."</p>";
                        ?>
                        <a href="post.php?delete=<?php echo $row["id"]; ?>" class="btn btn-info">Delete</a>
                        <?php
                  echo "</div>";
                }
              }
              ?>      
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

  </body>
</html>
<?php 
if(isset($_GET["delete"])){
  $delete = $_GET["delete"];
  $sql = "DELETE FROM posts WHERE id = '".$delete."' ";
  if(!mysqli_query($conn, $sql)){
    echo "There was a problem deleting the post";
  }else{
    header("Location: post.php");
  }
}
}else{
	header("Location: index.php");
}
?>