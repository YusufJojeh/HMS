<?php

include("../include/connection.php");

if(isset($_POST['create'])){

$fname = $_POST['fname'];
$sname = $_POST['sname'];
$uname = $_POST['uname'];
$email= $_POST['email'];
$phone = $_POST['phone'];
$gender = $_POST['gender'];
$country = $_POST['country'];
$password = $_POST['pass'];
$con_pass = $_POST['con_pass'];

$error =array();

if(empty($fname)){
  $error['create']="Enter Firstname";
}
elseif(empty($sname)){
  $error['create']="Enter Surname";
}
elseif(empty($uname)){
  $error['create']="Enter Username";
}
elseif(empty($email)){
  $error['create']="Enter Your Email";
}
elseif(empty($phone)){
  $error['create']="Enter Your Phone Number";
}
elseif($gender == ""){
  $error['create']="Select Your Gender";
}
elseif($country==""){
  $error['create']="Select Your Country";
}
elseif(empty($password)){
  $error['create']="Enter Password";
}
elseif($con_pass != $password){
  $error['create']="Both Password Don't Match";
}
if(count($error)==0){
  $query = "INSERT INTO patient(firstname,surname,user,email,phone,gender,country,password,date_reg) VALUES ('$fname','$sname','$uname','$email','$phone','$gender','$country','$password',NOW())";
  $res  = mysqli_query($connect,$query);

  if($res){
    header("Location:login.php");
  }else{
    echo "<script>alert('failed')</script>";
  }
}

}


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create Account</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"
    integrity="sha512-L7MWcK7FNPcwNqnLdZq86lTHYLdQqZaz5YcAgE+5cnGmlw8JT03QB2+oxL100UeB6RlzZLUxCGSS4/++mNZdxw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="../Bootstrap/bootstrap.min.css" rel="stylesheet">
  <link href="../Bootstrap/all.min.css " rel="stylesheet">
  <link href="../css/style.css" rel="stylesheet">
</head>

<body>
  <?php
      include("../include/header.php");
      ?>



  </ul>
  </div>
  </div>
  </nav>
  <div class="container-fluid">
    <div class="col-md-12">
      <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4 my-4 jumbotron shadow border border-primary rounded-1 bg-eee">
          <h5 class="text-center text-primary my-2">Create Account</h5>
          <form method="post" id="form">
            <div class=" from-group">
              <?php
                    if(isset($error['create'])){
                      $sh =$error['create'];
                      $show = "<h4 class='alert alert-danger text-center'>".$sh."</h4>";
                    }
                    else {
                      $show = "";
                    }
                    echo $show;
                ?>
              <lable>Firstname</lable>
              <input type="text" name="fname" class="form-control" autocomplete="off" placeholder="Enter Firstname">
            </div>
            <div class="from-group">
              <lable>Surname</lable>
              <input type="text" name="sname" class="form-control" autocomplete="off" placeholder="Enter Surname">
            </div>
            <div class="from-group">
              <lable>Username</lable>
              <input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Enter Username">
            </div>
            <div class="from-group">
              <lable>Email</lable>
              <input type="email" name="email" id="email" class="form-control" autocomplete="off"
                placeholder="Enter Your Email" onkeydown="validation()">
              <span id="text"></span>
            </div>
            <div class="from-group">
              <lable>Phone</lable>
              <input type="text" name="phone" class="form-control" autocomplete="off"
                placeholder="Enter Your Phone Number">
            </div>
            <div class="form-group">
              <lable>Gender</lable>
              <select name="gender" class="form-control">
                <option value="">Select Your Gender</option>
                <option value="Male">Male</option>
                <option value="Famale">Famale</option>
              </select>
            </div>
            <div class="form-group">
              <lable>Country</lable>
              <select name="country" class="form-control">
                <option value="">Select Your Country</option>
                <option value="syria">Syria</option>
                <option value="Iraq">Iraq</option>
                <option value="Eygpt">Eygpt</option>
              </select>
            </div>
            <div class="form-group">
              <lable>Password</lable>
              <input type="password" name="pass" class="form-control" autocomplete="off" placeholder="Enter Password">
            </div>
            <div class="form-group">
              <lable>Confirm Password</lable>
              <input type="password" name="con_pass" class="form-control" autocomplete="off"
                placeholder="Enter Confirm Password">
            </div>
            <input type="submit" name="create" value="CREATE" class="btn btn-primary">
            <h6 class="my-4">I Already Have An Account <a href="login.php">Click Here..</a></h6>
          </form>
          <script type="text/javascript">
          function validation() {
            var form = document.querySelector("#form");
            var email = document.querySelector("#email").value;
            var pattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;

            if (email.match(pattern)) {
              form.classList.add("valid");
              form.classList.remove("invalid");
              text.innerHTML = "Your Email Address in valid .";
              text.style.color = "#00ff00";

            } else {
              form.classList.remove("valid");
              form.classList.add("invalid");
              text.innerHTML = "Please Enter Valid Email Address";
              text.style.color = "#ff0000";
            }
            if (email == "") {
              form.classList.remove("valid");
              form.classList.remove("invalid");
              text.innerHTML = "Your Email Address in valid .";
              text.style.color = "#00ff00"
            }
          }
          </script>
        </div>
        <div class="col-md-4"></div>
      </div>
    </div>
  </div>
  <script src="../Bootstrap/bootstrap.bundle.min.js"></script>
  <script src="../Bootstrap/all.min.js"></script>


</html>