<?php
session_start();
include("../include/connection.php");
if(isset($_POST['login'])){
  $username = $_POST['uname'];
  $password = $_POST['password'];
  $error = array();
  if(empty($username)){
    $error['login'] = "Enter Username";
  }
  else if(empty($password)){
    $error['login'] = "Enter Password";
  }
  if(count($error)==0){
    $query = "SELECT * FROM admins WHERE username='$username' AND PASSWORD='$password'";
    $result =mysqli_query($connect,$query);
    if(mysqli_num_rows($result)==1){
      echo"<script>alert('WELCOME BACK ADMIN'); </script>";
      $_SESSION['admin']=$username;
      header("Location:../admin/index.php");
      exit();
    }
    else if(mysqli_num_rows($result)==0){
      $q = "SELECT *FROM doctors WHERE username = '$username'AND PASSWORD='$password'";
      $qq =mysqli_query($connect,$q);
      $row = mysqli_fetch_array($qq);
      $err =array();
      if($row['status'] == "Pendding"){
        $err['login'] = "Please Wait For the admin to confirm";
      }
      elseif($row['status'] == "Rejected"){
    $err['login'] = "Try Again Later";
  }if(count($err)==0){
          $query1 = "SELECT *FROM doctors WHERE username = '$username'AND PASSWORD='$password'";
      $result1 =mysqli_query($connect,$query1);
      if(mysqli_num_rows($result1)==1){
      echo"<script>alert('WELCOME BACK Doctor')</script>";
      $_SESSION['doctor']=$username;
    header("Location:../doctor/index.php");
      exit();
    }

    else if(mysqli_num_rows($result1)==0){
      $query2 = "SELECT * FROM patient WHERE username = '$username'AND PASSWORD='$password'";
      $result2 =mysqli_query($connect,$query2);
            if(mysqli_num_rows($result2)==1){
        echo"<script>alert('WELCOME BACK ')</script>";
      $_SESSION['patient']=$username;
    header("Location:../patient/index.php");
      exit();
    }
    }
    if(mysqli_num_rows($result)==0 && mysqli_num_rows($result1)==0 && mysqli_num_rows($result2)==0){
      echo "<script>confirm('Invalid Username Or Passoword');</script>";
      header("Location:#");
    }
      }

    }
    
  }
  else {
      echo "<script>alert('Invalid Username Or Passoword');</script>";
      header("Location:#");

    }
}

              if(isset($error['login'])){
                      $l =$error['login'];
                      $show = "<h5 class='text-center alert alert-danger'>$l</h5>";
              }else{
                      $show = "";
              }
              if(isset($err['login'])){
                      $s =$err['login'];
                      $show = "<h5 class='text-center alert alert-danger'>$s</h5>";
              }else{
                      $show = "";
              }





?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"
  integrity="sha512-L7MWcK7FNPcwNqnLdZq86lTHYLdQqZaz5YcAgE+5cnGmlw8JT03QB2+oxL100UeB6RlzZLUxCGSS4/++mNZdxw=="
  crossorigin="anonymous" referrerpolicy="no-referrer" />
<link href="../Bootstrap/bootstrap.min.css" rel="stylesheet">
<link href="../Bootstrap/all.min.css " rel="stylesheet">
<link href="../css/style.css" rel="stylesheet">

<body>
  <?php
  include("../include/header.php");
  ?>

  <div class="container ">
    <div class="col-md-12 ">
      <div class="row  ">
        <div class="col-md-4"></div>
        <div class="col-md-4 jumbotron my-5  shadow border border-primary rounded-3 ">
          <img src="../img/Login.png" alt="" class="col-md-12 py-2 rounded-pill">
          <h4 class="text-center my-3 text-primary">Login</h4>
          <div><?php echo $show; ?></div>
          <form action="" method="post" class="needs-validation" novalidate>
            <div>
              <?php
              if(isset($error['login'])){
                      $l =$error['login'];
                      $show = "<h5 class='text-center alert alert-danger'>$l</h5>";
              }else{
                      $show = "";
              }
              if(isset($err['login'])){
                      $s =$err['login'];
                      $show = "<h5 class='text-center alert alert-danger'>$s</h5>";
              }else{
                      $show = "";
              }
              ?>
            </div>

            <div class="form-group">
              <label for="validationCustom01">Username</label>
              <input type="text" name="uname" class=" form-control " id="validationCustom01" autocomplete="off"
                placeholder="Enter Username">
            </div>
            <div class="form-group">
              <label for="validationCustom02">Password</label>
              <input type="password" name="password" id="validationCustom02" class=" form-control " autocomplete="off"
                placeholder="Enter Password">
            </div>
            <input type="submit" name="login"
              class="btn bg-primary rounded-pill text-white text-center form-control my-5" value="Login">

          </form>


        </div>
      </div>
    </div>
  </div>
  </form>
  <script>
  (() => {
    'use strict'

    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    const forms = document.querySelectorAll('.needs-validation')

    // Loop over them and prevent submission
    Array.from(forms).forEach(form => {
      form.addEventListener('submit', event => {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }

        form.classList.add('was-validated')
      }, false)
    })
  })()
  </script>
</body>

</html>