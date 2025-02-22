<?php
session_start();
include("include/connection.php");
if(isset($_POST['login'])){
  $uname = $_POST['uname'];
  $password = $_POST['pass'];
  $error = array();
  $q = "SELECT * FROM doctors WHERE user ='$uname' AND password ='$password'";
  $qq = mysqli_query($connect,$q);
  $row = mysqli_fetch_array($qq);
  
  if(empty($uname)){
    $error['login'] = "Enter Username";
  }elseif(empty($password)){
    $error['login'] = "Enter Password";
  }elseif($row['status'] == "Pendding"){
    $error['login'] = "Please Wait For the admin to confirm";
  }elseif($row['status'] == "Rejected"){
    $error['login'] = "Try Again Later";
  }

if(count($error)==0){
  $query = "SELECT * From doctors Where user='$uname' AND password ='$password'";
  $res = mysqli_query($connect,$query);
  if(mysqli_num_rows($res)){
    echo "<script>alert('Done')</script>";
    $_SESSION['doctor'] = $uname;
    header("Location:doctor/index.php");
  }else{
    echo "<script>alert('Invalid Account')</script>";
  }
}
}

if(isset($error['login'])){
  $l =$error['login'];
  $show = "<h5 class='text-center alert alert-danger'>$l</h5>";
}else{
  $show = "";
}


?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DOCTOR LOGIN PAGE</title>
</head>

<body>
  <?php
  include("include/header.php");
  ?>
  <div class="container-fluid">
    <div class="col-md-12">
      <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4 jumbotron my-5 shadow border border-primary rounded ">
          <img src="img/med.png" alt="" class="col-md-12 py-2 rounded">
          <h4 class="text-center my-3 text-primary">Doctors Login</h4>
          <div><?php echo $show; ?></div>
          <form method="post">
            <div class="form-group">
              <label>Username</label>
              <input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Enter Username">
            </div>
            <div class="form-group">
              <label>Password</label>
              <input type="password" name="pass" class="form-control" autocomplete="off" placeholder="Enter Password">
            </div>
            <input type="submit" name="login" value="Login" class="btn btn-primary ">

            <p class="my-5">I DON'T HAVE AN ACCOUNT <a href="apply.php">APPLY NOW!!</a></p>
          </form>
        </div>
        <div class="col-md-4"></div>
      </div>
    </div>
  </div>
</body>

</html>