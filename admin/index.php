<?php session_start(); ?>
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
    <div class="container">
        <div class="admin-login">
            <form method="post">
                <div class="form-group">
                    <label>Admin name</label>
                    <input type="text" class="form-control" name="adminName">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" name="adminPassword">
                </div>
                <button type="submit" class="btn btn-primary" name="login">Login</button>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

  </body>
</html>

<?php
if(isset($_POST["login"])){
    $name = $_POST["adminName"];
    $psd = $_POST["adminPassword"];
    if($name == "admin" && $psd == 123){
        $_SESSION["admin"] = "admin";
        header("Location: post.php");
    }else{
        echo "Wrong password or admin name";
    }
}
?>