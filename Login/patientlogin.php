<?php
session_start();
include("include/connection.php");

if(isset($_POST['login'])){
  $uname= $_POST['uname'];
  $pass= $_POST['pass'];

  if(empty($uname)){
echo"<script>alert('Enter Username')</script>";
  }elseif(empty($pass)){
    echo"<script>alert('Enter Password')</script>";
  }
  else {
    $query = "SELECT * FROM patient WHERE user='$uname'AND password='$pass'";
    $res = mysqli_query($connect,$query);

    if(mysqli_num_rows($res)==1){
      header("Location:patient/index.php");
      $_SESSION['patient'] = $uname;
    }else{
      echo "<script>alert('Invalied Account')</script>";
    }
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Patient Login Page</title>
</head>

<body>
  <?php
  include("include/header.php");

  ?>

  <div class="container-fluid">
    <div class="col-md-12">
      <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4 jumbotron shadow my-3 border border-primary rounded-1">
          <img src="img/sign.png" alt="" class="col-md-12 py-2" style="border-radius:10%;">
          <h5 class="text-center my-3">Patient Login</h5>
          <form method="post">
            <div class="form-group">
              <lable>Username</lable>
              <input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Enter Username">
            </div>
            <div class="form-group">
              <lable>Password</lable>
              <input type="password" name="pass" class="form-control" autocomplete="off" placeholder="Enter Password">
            </div>
            <input type="submit" name="login" class="btn btn-primary my-3" value="Login">
            <h6>I Don't Have An Account <a href="account.php">Click Here...</a></h6>
          </form>
        </div>
        <div class="col-md-4"></div>
      </div>
    </div>
  </div>
</body>

</html>