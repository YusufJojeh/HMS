    <?php
    session_start();
    
    include("../include/connection.php");
    if(isset($_POST['apply'])){
      $firstname = $_POST['fname'];
      $surname = $_POST['sname'];
      $username = $_POST['uname'];
      $email = $_POST['email'];
      $gender = $_POST['gender'];
      $phone = $_POST['phone'];
      $country = $_POST['country'];
      $password = $_POST['pass'];
      $confirm = $_POST['con_pass'] ;
      $error = array();
      if(empty($firstname)){
        $error['apply'] = "Enter Firstname" ;
      }elseif(empty($surname)){
        $error['apply'] = "Enter Surname";
      }elseif(empty($username)){
        $error['apply'] = "Enter Username ";
      }elseif (empty($email)){
        $error['apply'] = "Enter Email Address";
      }elseif($gender ==""){
        $error['apply'] = "Select Your Gender ";
      }elseif(empty($phone)){
        $error['apply'] = "Enter Your Phone Number";
      }elseif($country==""){
        $error['apply'] = "Enter Country ";
      }elseif(empty($password)){
        $error['apply'] = "Enter Password";
      }elseif($confirm!=$password){
        $error['apply'] = "Both Passwords Do Not Match";
      }
      if(count($error)==0){
        $query ="INSERT INTO doctors(firstname,surname,user,email,gender,phone,country,password,salary,date_reg,status) VALUES('$firstname','$surname','$username','$email','$gender','$phone','$country','$password','0',NOW(),'Pendding')";
      
        $result = mysqli_query($connect,$query);


        if($result){
          echo "<script>alert('YOU HAVE SUCCESSFULLY APPLED')</script>";
          header("Location: login.php");
        }
        else{
          echo "<script>alert('Failed')</script>";
          die('ERROR DATABASE');
        }
      }
    }
          if(isset($error['apply'])){
        $s = $error['apply'];
        $show = "<lable class='text-center alert-danger'>$s</lable>";
      }
      else{
        $show = "";
      }
    
    
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>APPLY NOW!!</title>
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
      <div class="d-flex flex-column">
        <div class="row">
          <div class="col-md-4"></div>
          <div class="col-md-4 my-3 jumbotron shadow border border-primary rounded ">
            <h5 class="text-center text-primary">APPLY NOW!!</h5>
            <div>
              <?php
echo $show;
?></div>
            <form method="post" id="form">
              <div class="form-group">
                <lable class="mx-2">FirstName</lable>
                <input type="text" name="fname" class="form-control" autocomplete="off" placeholder="Enter First Name"
                  value="<?php if(isset($_POST['fname'])) {echo $_POST['fname'];}?>">
              </div>
              <div class="form-group">
                <lable class="mx-2">Surname</lable>
                <input type="text" name="sname" class="form-control" autocomplete="off" placeholder="Enter Surname"
                  value="<?php if(isset($_POST['sname'])) {echo $_POST['sname'];}?>">
              </div>
              <div class="form-group">
                <lable class="mx-2">UserName</lable>
                <input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Enter UserName"
                  value="<?php if(isset($_POST['uname'])) {echo $_POST['uname'];}?>">
              </div>
              <div class="form-group">
                <lable class="mx-2">Email</lable>
                <input type="email" name="email" id="email" class="form-control" autocomplete="off"
                  placeholder="Enter Email" value="<?php if(isset($_POST['email'])) {echo $_POST['email'];}?>"
                  onkeydown="validation()">
                <span id="text"></span>
              </div>
              <div class="form-group">
                <lable class="mx-2">Select Gender</lable>
                <select name="gender" class="form-control">
                  <option value="">Select Gender</option>
                  <option value="Male">Male</option>
                  <option value="Famale">Famale</option>
                </select>
              </div>
              <div class="form-group">
                <lable class="mx-2">Phone Number</lable>
                <input type="number" name="phone" class="form-control" autocomplete="off"
                  placeholder="Enter Phone Number" value="<?php if(isset($_POST['phone'])) {echo $_POST['phone'];}?>">
              </div>

              <div class="form-group">
                <lable class="mx-2">Select Country</lable>
                <select name="country" class="form-control">
                  <option value="">Select Country</option>
                  <option value="syria">Syria</option>
                  <option value="iraq">Iraq</option>
                  <option value="egypt">Eygpt</option>
                </select>
              </div>
              <div class="form-group">
                <lable class="mx-2">Password</lable>
                <input type="password" name="pass" class="form-control" autocomplete="off" placeholder="Enter Password">
              </div>
              <div class="form-group">
                <lable class="mx-2"> Confirm Password</lable>
                <input type="password" name="con_pass" class="form-control" autocomplete="off"
                  placeholder="Enter Confirm Password">
              </div>
              <input type="submit" name="apply" value="Apply Now" class="btn btn-success">
              <h6 class="my-2">I ALREADY HAVE AN ACCOUNT <a href="login.php">Click here.. </a></h6>
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





    </body>

    </html>