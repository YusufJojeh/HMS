<?php 
session_start();
include("include/connection.php");
if(isset($_POST['login'])){
  $username =$_POST['uname'];
  $password =$_POST['pass'];
  $error = array();
  if(empty($username)){
    $error['admin']="Enter Username";
  }
  elseif(empty($password)){
    $error['admin'] = "Enter Password";
  }
  if(count($error)==0){
    $query = "SELECT * FROM admin WHERE user='$username' AND password='$password' ";
    $result = mysqli_query($connect,$query);
    if(mysqli_num_rows($result)==1){
      echo "<script>alert('You have Login As an Admin')</script>";
      $_SESSION['admin'] =$username;
      header("Location:admin/index.php");
      exit();
      }else{
        echo"<script>alert('Invalid Username Or Password')</script>";
      }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Login Page </title>
</head>

<body>
  <?php
  include("include/header.php");
  ?>
  <div class="container ">
    <div class="col-md-12 ">
      <div class="row  ">
        <div class="col-md-4"></div>
        <div class="col-md-4 jumbotron my-5  shadow border border-primary rounded-3 ">
          <img src="img/Login.png" alt="" class="col-md-12 py-2 rounded-pill">
          <h4 class="text-center my-3 text-primary">Admin Login</h4>
          <form action="" method="post">
            <div>
              <?php
                    if(isset($error['admin'])){
                      $sh =$error['admin'];
                      $show = "<h4 class='alert alert-danger'>".$sh."</h4>";
                    }
                    else {
                      $show = "";
                    }
                    echo $show;
                ?>
            </div>

            <div class="form-group">
              <label>Username</label>
              <input type="text" name="uname" class=" form-control " autocomplete="off" placeholder="Enter Username">
            </div>
            <div class="form-group">
              <label>Password</label>
              <input type="password" name="pass" class=" form-control " autocomplete="off">
            </div>
            <input type="submit" name="login" class="btn bg-primary rounded-pill text-white" value="Login">
          </form>
        </div>
      </div>
    </div>
  </div>
</body>

</html>