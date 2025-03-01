<?php
session_start();

?>

<!DOCTYPE html>
<html lang = 'en'>

<head>
<meta charset = 'UTF-8'>
<meta name = 'viewport' content = 'width=device-width, initial-scale=1.0'>
<title>Total Income</title>
</head>

<body>
<?php
include( 'sidenav.php' );

include( '../include/connection.php' );
?>
<div class = 'page container-fluid text-white bg-dark fw-bold'>
<div class = 'col-md-12'>
<div class = 'row'>

<div class = 'col-md-12'>
<h5 class = 'text-center my-2 fw-bold'>Total Income</h5>
<?php
$query = "SELECT 
        i.id,
        i.date_discharge,
        i.amount_paid,
        i.patient,
        i.doctor,
        p.firstname AS patient_firstname,
        p.surname AS patient_surname,
        d.firstname AS doctor_firstname,
        d.surname AS doctor_surname
    FROM 
        income i
    JOIN 
        doctors d ON i.doctor = d.doctor_id
    JOIN 
        patients p ON i.patient = p.patient_id";
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
    $output .= "
              
                <tr>
                  <td>".$row[ 'id' ]."</td>
                    <td>".$row[ 'doctor_firstname' ].' '.$row[ 'doctor_surname' ]."</td>
                    <td>".$row[ 'patient_firstname' ].' '.$row[ 'patient_surname' ]."</td>
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