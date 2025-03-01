<?php
session_start();
?>

<?php
if ( !isset( $_SESSION[ 'admin' ] ) && !isset( $_SESSION[ 'doctor' ] ) && !isset( $_SESSION[ 'patient' ] ) ) {
    // include( '../include\header.php' );
    header( 'Location:../Login/login.php' );
}

include( 'sidenav.php' );
include( '../include\connection.php' );
?>
<div class = ' page container-fluid text-white bg-dark'>
<div class = 'col-md-12'>
<div class = 'row'>
<div class = 'col-md-12  '>
<h4 class = 'my-2 text-white mx-2 fw-bold'>Admin Dashboard</h4>
<div class = 'col-md-12 my-5 '>
<div class = 'row justify-content-center '>
<div class = 'col-md-4 my-2 mx-1'
style = 'height:150px;   background: linear-gradient(to bottom, #2980b9, #6dd5fa, #ffffff);'>
<div class = 'col-md-12'>
<div class = 'row'>
<div class = 'col-md-8 fw-bold'>
<?php
$ID = mysqli_query( $connect, 'SELECT * from admins ' ) ;

$id = mysqli_num_rows( ( $ID ) );
?>
<div class = 'd-flex my-3'>
<h5 class = 'text-white mx-1'>Admins</h5>
</div>
<div class = 'd-flex my-3'>
<h6 class = 'text-white mx-1'>Admins Count</h6>
</div>
<div class = 'd-flex my-3'>
<h6 class = 'text-white mx-1'><?php echo $id;
?></h6>
</div>
</div>
<div class = 'col-md-4'>
<a href = 'admin.php'><i class = 'fa fa-users-cog fa-3x my-4' style = 'color:white;'></i></a>
<a href = 'profile.php' class = 'btn btn-light text-white'
style = ' background: linear-gradient(to bottom, #2980b9, #6dd5fa, #ffffff);'>Profile</a>
</div>
</div>
</div>
</div>

<div class = 'col-md-4 my-2 mx-1'
style = 'height:150px;  background: linear-gradient(to top, #fceabb, #f8b500);'>
<div class = 'col-md-12'>
<div class = 'row'>
<div class = 'col-md-8'>
<?php

$p = mysqli_query( $connect, 'SELECT * FROM patients' );
$pp = mysqli_num_rows( $p );

?>
<div class = 'd-flex my-3'>
<h5 class = 'text-white '>Patient</h5>

</div>
<div class = 'd-flex my-3'>Patient Count</div>
<div class = 'd-flex my-3'>
<h6 class = 'text-white my-2'><?php echo $pp;
?></h6>
</div>

</div>
<div class = 'col-md-4'>
<a href = 'patient.php'><i class = 'fa fa-procedures fa-3x my-4' style = 'color:white;'></i></a>
<a href = 'patient.php' class = 'btn btn-light text-white'
style = ' background: linear-gradient(to top, #fceabb, #f8b500);'>View</a>

</div>

</div>
</div>
</div>
<div class = 'col-md-4 my-2 mx-1'
style = 'height:150px; background: linear-gradient(to bottom, #ef3b36, #ffffff);'>
<div class = 'col-md-12'>
<div class = 'row'>
<div class = 'col-md-8'>
<?php

$p = mysqli_query( $connect, 'SELECT * FROM doctors' );
$pp = mysqli_num_rows( $p );

?>
<div class = 'd-flex my-3'>
<h5 class = 'text-white '>Doctors</h5>
</div>
<div class = 'd-flex my-3'>Doctors Count</div>
<div class = 'd-flex my-3'>
<h6 class = 'text-white my-2'><?php echo $pp;
?></h6>
</div>

</div>
<div class = 'col-md-4'>
<a href = 'doctor.php'><i class = 'fa  fa-user-md fa-3x my-4' style = 'color:white;'></i></a>
<a href = 'doctor.php' class = 'btn btn-light text-white'
style = 'background: linear-gradient(to bottom, #ef3b36, #ffffff);'>View</a>

</div>

</div>
</div>
</div>
<div class = 'col-md-4 my-2 mx-1'
style = 'height:150px;    background: linear-gradient(to bottom, #56ab2f, #b7df87); '>
<div class = 'col-md-12'>

<div class = 'row'>
<div class = 'col-md-8'>
<?php

$p = mysqli_query( $connect, 'SELECT sum(amount_paid) as profit FROM incomes' );
$row = mysqli_fetch_array( $p );
$inc = $row[ 'profit' ];

?>
<div class = 'd-flex my-3'>
<h5 class = 'text-white '>Incomes</h5>

</div>
<div class = 'd-flex my-3'>
Total Incomes
</div>
<div class = 'd-flex my-3'>
<h5 class = 'text-white my-2'><?php

echo "$$inc";
?></h5>
</div>

</div>
<div class = 'col-md-4'>
<a href = 'income.php'><i class = 'fa fa-money-check-alt fa-3x my-4' style = 'color:white;'></i></a>
<a href = 'income.php' class = 'btn btn-light text-white'
style = '  background: linear-gradient(to bottom, #56ab2f, #b7df87); '>View</a>

</div>

</div>
</div>
</div>
<div class = 'col-md-4 my-2 mx-1'
style = 'height:150px;  background: linear-gradient(to top, #f0f2f0, #000c40);'>
<div class = 'col-md-12'>
<div class = 'row'>
<div class = 'col-md-8'>
<?php

$p = mysqli_query( $connect, "SELECT * FROM doctors WHERE status= 'pendding'" );
$pp = mysqli_num_rows( $p );

?>
<div class = 'd-flex my-3'>
<h5 class = 'text-white '>Job Requests</h5>

</div>
<div class = 'd-flex my-3'>
Count Requests

</div>
<div class = 'd-flex my-3'>
<h6 class = 'text-white '><?php echo $pp;
?></h6>

</div>
</div>
<div class = 'col-md-4'>
<a href = 'job_request.php'><i class = 'fa-solid fa-envelope fa-3x text-white my-4'></i></a></>
</a>
<a href = 'job_request.php' class = 'btn btn-light text-white'
style = 'background: linear-gradient(to top, #f0f2f0, #000c40);'>Check</a>

</div>

</div>
</div>
</div>
<div class = 'col-md-4 my-2 mx-1'
style = 'height:150px;  background: linear-gradient(to bottom, #304352, #d7d2cc);'>
<div class = 'col-md-12'>
<div class = 'row'>
<div class = 'col-md-8'>
<?php

$p = mysqli_query( $connect, 'SELECT * FROM reports' );
$pp = mysqli_num_rows( $p );

?>
<div class = 'd-flex my-3'>
<h5 class = 'text-white '>Reports</h5>

</div>
<div class = 'd-flex my-3'>Reports Count</div>
<div class = 'd-flex my-3'>
<h6 class = 'text-white my-2'><?php echo $pp;
?></ </div>

</div>
</div>
<div class = 'col-md-4'>
<a href = 'report.php'><i class = 'fa fa-book-open fa-3x my-4' style = 'color:white;'></i></a>
<a href = 'report.php' class = 'btn btn-light text-white'
style = 'background: linear-gradient(to bottom, #304352, #d7d2cc);'>View</a>

</div>

</div>
</div>
</div>

<!-- </div>
</div>
</div>
</div>
</div>
</div> -->

</body>

</html>