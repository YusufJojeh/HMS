<?php
session_start();
?>
1
<!DOCTYPE html>
<html lang='en'>

<head>
  <meta charset='UTF-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1.0'>
  <title></title>
</head>

<body>
  <?php
include( '../include/connection.php' );
if ( isset( $_SESSION[ 'doctor' ] ) ) {
    include( 'sidenav.php' );
} else {
    include( 'patient/sidenav.php' );
}
?>
  <div class='page container-fluid bg-dark text-white'>
    <div class='col-md-12'>
      <div class='row'>

        <div class='col-md-12'>
          <h5 class='text-center my-2 fw-bold'>Total Report</h5>
          <?php
$query = 'SELECT reports.*, doctors.first_name, doctors.last_name FROM reports 
          JOIN doctors ON doctors.doctor_id = reports.doctor_id ';
$res = mysqli_query( $connect, $query );
$output = '';
$output .= "
                <table class='table table-bordered'>
                  <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Message</th>
                    <th>Full Name Patient</th>
                    <th>Date Send</th>
                    <th>Test</th>
                  </tr>
          ";

if ( mysqli_num_rows( $res )<1 ) {
    $output .= "
            <tr>
              <td class='text-center' colspan='6'>No Report Yet</td>
            </tr>
            ";
}
while( $row = mysqli_fetch_array( $res ) ) {
    $output .= "
                  <tr>
                    <td>".$row[ 'report_id' ]."</td>
                    <td>".$row[ 'report_title' ]."</td>
                    <td>".$row[ 'report_content' ]."</td>
                    <td>".$row[ 'first_name' ].' '.$row[ 'last_name' ]."</td>
                    <td>".$row[ 'report_date' ]."</td>
                  <td><a href='../patient/img/$row[img]' target='_blank'name=pdf>View Test</a></td>
                  
                  
            ";
}
$output .= "
          </tr>
          </table>

";
echo $output;
if ( isset( $_REQUEST[ 'name' ] ) ) {

}
?>

        </div>
      </div>
    </div>
  </div>

  <!-- <?php include( '../include/footer.php' );
?> -->
</body>

</html>