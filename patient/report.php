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
include( 'sidenav.php' );
include( '../include/header.php' );

include( '../include/connection.php' );
?>
  <div class='page container-fluid bg-dark text-white '>
    <div class='col-md-12'>
      <div class='row'>

        <div class='col-md-12'>
          <h5 class='text-center my-2 fw-bold'>Total Report</h5>
          <?php
$pat = $_SESSION[ 'patient' ];
$query = "SELECT report_title,report_content,report_date FROM reports where patient_id='$pat' order by report_date DESC";
$res = mysqli_query( $connect, $query );
$output = '';
$output .= "
                <table class='table table-bordered'>
                  <tr>

                    <th>Title</th>
                    <th>Message</th>
                    <th>Date Send</th>
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

                    <td>".$row[ 'report_title' ]."</td>
                    <td>".$row[ 'report_content' ]."</td>
                    <td>".$row[ 'report_date' ]."</td>
                  
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

</body>

</html>