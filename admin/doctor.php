<?php
session_start();
?>

<!DOCTYPE html>
<html lang='en'>

<head>
  <meta charset='UTF-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1.0'>
  <title></title>
</head>

<body>
  <?php
// include( '../include/header.php' );
include( 'sidenav.php' );
include( '../include/connection.php' );
?>

  <div class='page container-fluid text-white bg-dark fw-bold'>
    <div class='col-md-12'>
      <div class='row'>

        <div class='col-md-12'>
          <h5 class='text-center fw-bold'>Total Doctors</h5>
          <?php
$query = "SELECT * FROM doctors WHERE status ='Approved' ORDER BY 
registration_date ASC";
$res = mysqli_query( $connect, $query );

$output = '';
$output .= "

      <table class='table table-bordered my-3'>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Username</th>
          <th>Gender</th>
          <th>Phone</th>
          <th>Country</th>
          <th>Salary</th>
          <th>Date Registered</th>
          <th>Action</th>
        </tr>
      
";

if ( mysqli_num_rows( $res ) < 1 ) {
    $output .= "
        <tr>
          <td colspan ='10' class='text-center'> No Job Request Yet. </td>
        </tr>
  ";
}

while( $row = mysqli_fetch_array( $res ) ) {
    $output .= "
    <tr>
      <td>".$row[ 'doctor_id' ]. "</td>
      <td>" .$row[ 'first_name' ]. ' ' .$row[ 'last_name' ] . " </td>
      
      <td>" . $row[ 'username' ] . "</td>
      <td>" . $row[ 'gender' ] . "</td>
      <td>" . $row[ 'phone' ] . "</td>
      <td>" . $row[ 'country' ] . "</td>
      <td>" . $row[ 'salary' ] . "</td>
      <td>" . $row[ 'registration_date' ] . "</td>
      <td>
        <a href = 'edit.php?doctor_id = ".$row[ 'doctor_id' ]."'>
            <button class ='btn navigation text-dark fw-bold'>Edit</button>
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