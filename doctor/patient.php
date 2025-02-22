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
<html lang='en'>

<head>
  <meta charset='UTF-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1.0'>
  <title>Total Patient</title>
</head>

<body>

  <?php

include( '../include/connection.php' );
include( 'sidenav.php' );

?>
  <div class='page container-fluid bg-dark text-white'>
    <div class='col-md-12'>
      <div class='row'>
        <div class='col-md-12'>
          <h5 class='text-center my-3 fw-bold'>Total Patient</h5>
          <?php
$query = 'SELECT * FROM patients';

$res = mysqli_query( $connect, $query );
$output  = '';

$output .= "
              
              <table class='table table-bordered '>
                <tr>  
                <th>ID</th>
                <th>Firstname</th>
                <th>Surname</th>
                <th>Username</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Gender</th>
                <th>Country</th>
                <th>Date Reg</th>
                <th>Act</th>
                </tr>  
        ";
if ( mysqli_num_rows( $res )<1 ) {
    $output .= "
          <tr>
            <td class ='text-center' colspan='10'>No Patient Yet</td>
          
          </tr>
          ";
}
While( $row = mysqli_fetch_array( $res ) ) {
    $output .= "
            <tr>
            <td>".$row[ 'patient_id' ]."</td>
            <td>".$row[ 'firstname' ]."</td>
            <td>".$row[ 'surname' ]."</td>
            <td>".$row[ 'user' ]."</td>
            <td>".$row[ 'email' ]."</td>
            <td>".$row[ 'phone' ]."</td>
            <td>".$row[ 'gender' ]."</td>
            <td>".$row[ 'country' ]."</td>
            <td>".$row[ 'date_reg' ]."</td>
            <td>
              <a href='view.php?patient_id=".$row[ 'patient_id' ]."'>
                  <button class='btn btn-primary'>View</button>
              </a>
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