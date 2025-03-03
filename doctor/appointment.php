<?php
session_start();
?>

<!DOCTYPE html>
<html lang='en'>

<head>
  <meta charset='UTF-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1.0'>
  <title>Total Apppintment</title>
</head>

<body>
  <?php
// include( '../include/header.php' );
include( '../include/connection.php' );
include( 'sidenav.php' );

?>
  <div class='page container-fluid bg-dark  text-white'>
    <div class='col-md-12'>
      <div class='row'>

        <div class='col-md-12'>
          <h5 class='text-center my-4 fw-bold'>Total Appointment</h5>
          <?php
$query = "SELECT * FROM appointments a JOIN patients p on p.patient_id = a.patient_id WHERE status='pending'   ";
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
                <td>".$row[ 'appointment_id' ]."</td>
                <td>".$row[ 'first_name' ]."</td>
                <td>".$row[ 'last_name' ]."</td>
                <td>".$row[ 'gender' ]."</td>
                <td>".$row[ 'phone' ]."</td>
                <td>".$row[ 'appointment_date' ]."</td>
                <td>".$row[ 'symptoms' ]."</td>
                <td>".$row[ 'created_at' ]."</td>
                <td>
                <a href='discahrge.php?id=".$row[ 'patient_id' ]."'><button class='btn btn-primary'>Check</button></a>
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