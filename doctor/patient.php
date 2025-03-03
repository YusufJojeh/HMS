<?php
session_start();
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
            <td>".$row[ 'first_name' ]."</td>
            <td>".$row[ 'last_name' ]."</td>
            <td>".$row[ 'username' ]."</td>
            <td>".$row[ 'email' ]."</td>
            <td>".$row[ 'phone' ]."</td>
            <td>".$row[ 'gender' ]."</td>
            <td>".$row[ 'registration_date' ]."</td>
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