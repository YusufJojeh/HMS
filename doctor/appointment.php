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
<title>Total Apppintment</title>
</head>

<body>
<?php
// include( '../include/header.php' );
include( '../include/connection.php' );
include( 'sidenav.php' );

?>
<div class = 'page container-fluid bg-dark  text-white'>
<div class = 'col-md-12'>
<div class = 'row'>

<div class = 'col-md-12'>
<h5 class = 'text-center my-4 fw-bold'>Total Appointment</h5>
<?php
$query = "SELECT * FROM appointments JOIN patients p on p.patient_id = patient WHERE status='pendding'   ";
$res = mysqli_query( $connect, $query );

$output = '';

$output .= "
              <table class='table table-bordered'>
              <tr>
              <th>ID</th>
              <th>Firstname</th>
              <th>Surname</th>
              <th>Gender</th>
              <th>Phone</th>
              <th>Appointment</th>
              <th>Symptoms</th>
              <th>Date Booked</th>
              <th>Action</th>
              
              </tr>
          ";
if ( mysqli_num_rows( $res )<1 ) {

    $output .= "
            <tr>
            <td class='text-center'colspan='9'>No Appointment Yet.</td>
            </tr>
            
            ";
}
while( $row = mysqli_fetch_array( $res ) ) {
    $output .= "
                <tr>
                <td>".$row[ 'id' ]."</td>
                <td>".$row[ 'patient' ]."</td>
                <td>".$row[ 'surname' ]."</td>
                <td>".$row[ 'gender' ]."</td>
                <td>".$row[ 'phone' ]."</td>
                <td>".$row[ 'appointment_date' ]."</td>
                <td>".$row[ 'symptoms' ]."</td>
                <td>".$row[ 'date_booked' ]."</td>
                <td>
                <a href='discahrge.php?id=".$row[ 'id' ]."'><button class='btn btn-primary'>Check</button></a>
                </td>
                
                
            ";
}
$output .= "
            </tr>
            </table>
          
          ";
echo $output;
?>
</div>
</div>
</div>
</div>

<!-- <?php include( '../include/footer.php' );
?> -->

</body>

</html>