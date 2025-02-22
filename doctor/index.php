<?php
session_start();
?>
<?php
// تعطيل عرض الأخطاء على الشاشة
ini_set( 'display_errors', 0 );
ini_set( 'display_startup_errors', 0 );
error_reporting( E_ALL );
// تسجيل جميع الأخطاء
ini_set( 'log_errors', 1 );
// تمكين تسجيل الأخطاء
ini_set( 'error_log', '/path/to/error_log' );
// تحديد ملف سجل الأخطاء
?>

<!DOCTYPE html>
<html lang = 'en'>

<head>
<meta charset = 'UTF-8'>
<meta name = 'viewport' content = 'width=device-width, initial-scale=1.0'>
<title>Doctor's Dashboard</title>
</head>

<body>
  <?php
  // include("../include/header.php");
  include("sidenav.php");
  include("../include/connection.php");
  ?>
  <div class=" page container-fluid bg-dark text-white">
    <div class="col-md-12">
      <div class="row">

        <div class="col-md-12 ">
          <div class="container-fluid">
            <h5 class="my-2 fw-bold ">Doctor's Dashboard</h5>
<div class = 'col-md-12'>
<div class = 'row justify-content-center'>
<div class = 'col-md-3 my-2' style = 'height:150px;background: linear-gradient(to top, #403b4a, #e7e9bb);'>
<div class = 'col-md-12'>
<div class = 'row'>
<div class = 'col-md-8'>
<h5 class = 'text-white my-4'>My Profile</h5>
</div>
<div class = 'col-md-4'>
<a href = 'profile.php'><i class = 'fa fa-user-circle fa-3x my-4' style = 'color:white;'></i></a>
</div>

</div>
</div>
</div>
<div class = 'col-md-3 my-2 mx-5'
style = 'height:150px;  background: linear-gradient(to bottom, #eb5757, #000000);'>
<div class = 'col-md-12'>
<div class = 'row'>
<div class = 'col-md-8'>
<?php

$p = mysqli_query( $connect, 'SELECT * FROM patients' );
$pp = mysqli_num_rows( $p );

?>
<h5 class = 'text-white my-2' style = 'font-size:30px;'><?php

echo $pp;
?></h5>
<h5 class = 'text-white '>Total</h5>
<h5 class = 'text-white '>Patient</h5>
</div>
<div class = 'col-md-4'>
<a href = 'patient.php'><i class = 'fa fa-procedures fa-3x my-4' style = 'color:white;'></i></a>
</div>

</div>
</div>
</div>
<div class = 'col-md-3 my-2'
style = 'height:150px;  background: linear-gradient(to top, #4ca1af, #c4e0e5);'>
<div class = 'col-md-12'>
<div class = 'row'>
<div class = 'col-md-8'>
<?php
$query = "SELECT * FROM appointments WHERE status='pendding'";
$result = mysqli_query( $connect, $query );
$num = mysqli_num_rows( $result )

?>
<h5 class = 'text-white my-2' style = 'font-size:30px;'><?php echo $num;
?></h5>
<h5 class = 'text-white '>Total</h5>
<h5 class = 'text-white '>Appointment</h5>
</div>
<div class = 'col-md-4'>
<a href = 'appointment.php'><i class = 'fa fa-calendar fa-3x my-4' style = 'color:white;'></i></a>
</div>

</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<!-- <?php include( '../include/footer.php' );
?> -->
</body>

</html>