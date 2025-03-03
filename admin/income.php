<?php
session_start();

?>

<!DOCTYPE html>
<html lang='en'>

<head>
  <meta charset='UTF-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1.0'>
  <title>Total Income</title>
</head>

<body>
  <?php
include( 'sidenav.php' );

include( '../include/connection.php' );
?>
  <div class='page container-fluid text-white bg-dark fw-bold'>
    <div class='col-md-12'>
      <div class='row'>

        <div class='col-md-12'>
          <h5 class='text-center my-2 fw-bold'>Total Income</h5>
          <?php
$query = "SELECT 
    incomes.income_id,
    incomes.date_discharge,
    incomes.amount_paid,
    incomes.description,
    
    doctors.doctor_id,
    CONCAT(doctors.first_name, ' ', doctors.last_name) AS doctor_name,
    
    patients.patient_id,
    CONCAT(patients.first_name, ' ', patients.last_name) AS patient_name,
    

    appointments.appointment_id,
    appointments.appointment_date,
    appointments.symptoms,
    appointments.status AS appointment_status,
    appointments.created_at AS appointment_created_at
FROM incomes
JOIN doctors ON incomes.doctor_id = doctors.doctor_id
JOIN patients ON incomes.patient_id = patients.patient_id
JOIN appointments ON incomes.appointment_id = appointments.appointment_id;";
$res = mysqli_query( $connect, $query );
$output = '';
$output .= "
            <table class='table table-bordered'>
              <tr>
                <th>ID</th>
                <th>Doctor</th>
                <th>Patient</th>
                <th>symptoms</th>
                <th>status</th>
                <th>appointment_date</th>
                
                <th>date_discharge</th>
                <th>Amount Paid</th>
              
              
              </tr>
          ";

if ( mysqli_num_rows( $res )<1 ) {
    $output .= "
                <tr>
                  <td class='text-center'colspan='5'>No Patient Discharge Yet.</td>
                </tr>
              ";
}

while( $row = mysqli_fetch_array( $res ) ) {
    $output .= "
              
                <tr>
                  <td>".$row[ 'income_id' ]."</td>
                    <td>".$row[ 'doctor_name' ]."</td>
                    <td>".$row[ 'patient_name' ]."</td>
                    <td>".$row[ 'symptoms' ]."</td>
                    <td>".$row[ 'appointment_status' ]."</td>
                    <td>".$row[ 'appointment_date' ]."</td>
                    
                  <td>".$row[ 'date_discharge' ]."</td>
                  <td>".'$'.$row[ 'amount_paid' ]*( 20/100 )."</td>
              
              
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