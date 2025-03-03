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
include( '../include/connection.php' );
include( 'sidenav.php' );

?>
  <div class='page container-fluid bg-dark text-white'>
    <div class='col-md-12'>
      <div class='row'>

        <div class='col-md-12'>
          <h5 class='text-center my-4 fw-bold'>Total Income</h5>
          <?php
$query = "SELECT 
    incomes.income_id,
    d.first_name AS doctor_firstname,
    d.last_name AS doctor_surname,
    p.first_name AS patient_firstname,
    p.last_name AS patient_surname,
    incomes.date_discharge,
    incomes.amount_paid
FROM 
    incomes 
JOIN 
    doctors d ON d.doctor_id = incomes.doctor_id 
JOIN 
    patients p ON p.patient_id = incomes.patient_id;
";
$res = mysqli_query( $connect, $query );
$output = '';
$output .= "
            <table class='table table-bordered'>
              <tr>
                <th>ID</th>
                <th>Doctor</th>
                <th>Patient</th>
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
    $money = $row[ 'amount_paid' ];
    $money = $money-( 20/100 )*$money;
    $output .= "
              
                <tr>
                  <td>".$row[ 'income_id' ]."</td>
                  <td>".$row[ 'doctor_firstname' ].' '.$row[ 'doctor_surname' ]."</td>
                  <td>".$row[ 'patient_firstname' ].' '.$row[ 'patient_surname' ]."</td>
                  <td>".$row[ 'date_discharge' ]."</td>
                  <td>".$money."</td>

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

  <?php include( '../include/footer.php' );
?>
</body>

</html>