<?php
session_start();
?>
<!DOCTYPE html>
<html lang='en'>

<head>
  <meta charset='UTF-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1.0'>
  <title>Check Patient Appointment</title>
</head>

<body>
  <?php
// include( '../include/header.php' );
include( 'sidenav.php' );
include( '../include/connection.php' );

function sendNotification( $user_id, $user_type, $message ) {
    include( '../include/connection.php' );
    // Insert notification
    // $query = "INSERT INTO notifications (user_id, user_type, message, status) VALUES ($user_id, '$user_type', '$message', 'unread')";
    // mysqli_query( $connect, $query );
}
?>

  <?php
$doc = $_SESSION[ 'doctor' ];
if ( isset( $_GET[ 'id' ] ) ) {
    $id = $_GET[ 'id' ];
    // Retrieve appointment details along with patient information using a JOIN query.
    $query = "SELECT a.*, p.first_name, p.last_name, p.gender, p.phone 
              FROM appointments AS a 
              INNER JOIN patients AS p ON a.patient_id = p.patient_id
              WHERE a.patient_id = '$id'";
    $result = mysqli_query( $connect, $query );
    $row = mysqli_fetch_array( $result );
}
?>

  <div class='col-md-12'>
    <div class='row'>
      <div class='col-md-12'>
        <h5 class='text-center'>Total Appointment</h5>
        <div class='col-md-12 '>
          <div class='row'>
            <div class='col-md-6 gap-3 '>
              <table class='table table-bordered'>
                <tr>
                  <td colspan='2' class='text-center fw-bold'>Appointment Details</td>
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
                  <td>Gender</td>
                  <td><?php echo $row[ 'gender' ];
?></td>
                </tr>
                <tr>
                  <td>Phone</td>
                  <td><?php echo $row[ 'phone' ];
?></td>
                </tr>
                <tr>
                  <td>Appointment Date</td>
                  <td><?php echo $row[ 'appointment_date' ];
?></td>
                </tr>
                <tr>
                  <td>Symptoms</td>
                  <td><?php echo $row[ 'symptoms' ];
?></td>
                </tr>
              </table>
            </div>
            <div class='col-md-5'>
              <h5 class='text-center my-1'>Invoice</h5>
              <?php
if ( isset( $_POST[ 'send' ] ) ) {
    $fee = $_POST[ 'fee' ];
    $des = $_POST[ 'des' ];

    if ( empty( $fee ) ) {

    } elseif ( empty( $des ) ) {

    } else {
        $doc = $_SESSION[ 'doctor' ];
        $fname = $row2[ 'first_name' ];

        $sel1 = mysqli_query( $connect, "SELECT doctor_id FROM doctors WHERE user ='$doc'" );
        $res1 = mysqli_fetch_array( $sel1 );
        extract( $res1 );

        $sel2 = mysqli_query( $connect, "SELECT patient_id FROM patient WHERE first_name='$fname'" );
        $res2 = mysqli_fetch_array( $sel2 );
        extract( $res2 );

        $query = "INSERT INTO income(doctor, patient, date_discharge, amount_paid, description, checked, appoint) 
                                VALUES('".$res1[ 'doctor_id' ]."', '".$res2[ 'patient_id' ]."', NOW(), '$fee', '$des', 0, '$appoin')";
        $result = mysqli_query( $connect, $query );

        if ( $result ) {
            echo "<script>alert('You Have Send Invoice');</script>";
        }
    }
    sendNotification( $sel2, 'doctor', 'You have a new appointment scheduled.' );
}
?>
              <form method='post'>
                <label>Fee</label>
                <input type='number' name='fee' class='form-control' autocomplete='off' placeholder='Enter Patient'>
                <label>Description</label>
                <input type='text' name='des' class='form-control' autocomplete='off' placeholder='Enter Description'>
                <input type='submit' class='btn btn-primary my-2' value='Send' name='send'>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php include( '../include/footer.php' );
?>
</body>

</html>