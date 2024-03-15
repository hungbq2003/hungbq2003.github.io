<?php session_start();
include("../db.php");
if(isset($_SESSION["admin"]) && $_SESSION["admin"] == "admin"){
if(isset($_GET["success"])){
  echo "New post published";
}
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
      <form>
        <div class="form-group">
          <label>Title</label>
          <input type="text" class="form-control" name="title">
        </div>
        <div class="form-group">
          <label>Content</label>
          <textarea class="form-control" rows="3" name="content"></textarea>
        </div>
        <input type="submit" class="btn btn-primary" name="submit" value="Publish">
      </form>
        
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

  </body>
</html>
<?php
if(isset($_GET["submit"])){
  $title = $_GET["title"];
  $content = $_GET["content"];
  if($title == "" && $content == ""){
    echo "You didnt write anything";
  }else{
    $sql = "INSERT INTO posts (title, content) VALUES ('".$title."', '".$content."')";
    if(!mysqli_query($conn, $sql)){
      echo "Something wen wrong";
    }else{
      header("Location: new.php?success");
    }
  }

}
}else{
	header("Location: index.php");
}
?>