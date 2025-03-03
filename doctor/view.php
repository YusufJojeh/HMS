<?php
session_start();
?>

<!DOCTYPE html>
<html lang='en'>

<head>
  <meta charset='UTF-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1.0'>
  <title>View Patient Detalis</title>
</head>

<body>
  <?php

// include( '../include/header.php' );
include( 'sidenav.php' );
include( '../include/connection.php' );
?>
  <div class='page container-fluid bg-dark text-white'>
    <div class='col-md-12'>
      <div class='row'>

        <div class='col-md 10'>
          <h5 class='text-center my-3 fw-bold'>View Patient Details</h5>

          <div class='col-md-12'>
            <div class='row'>
              <div class='col-md-3'></div>
              <?php
if ( isset( $_GET[ 'patient_id' ] ) ) {

    $id = $_GET[ 'patient_id' ];
    $query = "SELECT * FROM patients WHERE patient_id='$id'";
    $res = mysqli_query( $connect, $query );
    $row = mysqli_fetch_array( $res );
}

?>
              <div class='col-md-6'>
                <?php echo "<img src='../patient/img/".$row[ 'profile_img' ]."'  class='col-md-12 my-2' height='250px'>";

?>
                <table class='table table-bordered table-dark'>
                  <tr>
                    <th class='text-center' colspan='2'>Details</th>
                  </tr>
                  <tr>
                    <td>Firstname</td>
                    <td><?php echo $row[ 'first_name' ];
?></td>
                  </tr>
                  <tr>
                    <td>Surname</td>
                    <td><?php echo $row[ 'last_name' ];
?></td>
                  </tr>
                  <tr>
                    <td>Username</td>
                    <td><?php echo $row[ 'username' ];
?></td>
                  </tr>
                  <tr>
                    <td>Email</td>
                    <td><?php echo $row[ 'email' ];
?></td>
                  </tr>

                  <tr>
                    <td>Phone</td>
                    <td><?php echo $row[ 'phone' ];
?></td>
                  </tr>

                  <tr>
                    <td>Gender</td>
                    <td><?php echo $row[ 'gender' ]?></td>
                  </tr>

                  <tr>
                    <td>Date Registered</td>
                    <td><?php echo $row[ 'registration_date' ];
?></td>
                  </tr>

                </table>
              </div>
              <div class='col-md-3'></div>
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